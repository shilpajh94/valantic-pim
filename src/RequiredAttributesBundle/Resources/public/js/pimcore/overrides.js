
pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle.overrides");

pimcore.plugin.RequiredAttributesBundle.overrides = Class.create({

    allowSQLEditorOnObjectGrid: function(){
        Ext.override(pimcore.object.helpers.gridTabAbstract, {
            createSqlEditor: function () {

                this.sqlEditor = new Ext.form.TextField({
                    xtype: "textfield",
                    width: 500,
                    name: "condition",
                    hidden: true,
                    enableKeyEvents: true,
                    listeners: {
                        "keydown": function (field, key) {
                            if (key.getKey() == key.ENTER) {
                                var proxy = this.store.getProxy();
                                proxy.setExtraParams(
                                    {
                                        class: proxy.extraParams.class,
                                        objectId: proxy.extraParams.objectId,
                                        "fields[]": proxy.extraParams["fields[]"],
                                        language: proxy.extraParams.language
                                    }
                                );
                                proxy.setExtraParam("condition", field.getValue());
                                this.grid.filters.clearFilters();

                                this.pagingtoolbar.moveFirst();
                            }
                        }.bind(this)
                    }
                });

                this.sqlButton = new Ext.Button({
                    iconCls: "pimcore_icon_sql",
                    enableToggle: true,
                    tooltip: t("direct_sql_query"),
                    // hidden: !pimcore.currentuser.admin,
                    hidden: !this.object.data.isAllowedSQLEditor,
                    handler: function (button) {

                        this.sqlEditor.setValue("");
                        this.searchField.setValue("");

                        // reset base params, because of the condition
                        var proxy = this.store.getProxy();
                        proxy.setExtraParams(
                            {
                                class: proxy.extraParams.class,
                                objectId: proxy.extraParams.objectId,
                                "fields[]": proxy.extraParams["fields[]"],
                                language: proxy.extraParams.language
                            }
                        );

                        this.grid.filters.clearFilters();

                        this.pagingtoolbar.moveFirst();

                        if (button.pressed) {
                            this.sqlEditor.show();
                        } else {
                            this.sqlEditor.hide();
                        }
                    }.bind(this)
                });
            },
        });
    },

    showNomenclatureCustomPanel: function(){

        /**
         * overriding this file so that custom panel (helper panel) can be shown
         * for the nomenclature relation field in product
         */

        Ext.override(pimcore.object.tags.advancedManyToManyObjectRelation,{
            initialize: function (data, fieldConfig) {
                this.data = [];
                this.fieldConfig = fieldConfig;

                var classStore = pimcore.globalmanager.get("object_types_store");
                var classIdx = classStore.findExact("text", fieldConfig.allowedClassId);
                var classNameText;
                if (classIdx >= 0) {
                    var classRecord = classStore.getAt(classIdx);
                    classNameText = classRecord.data.text;
                } else {
                    classNameText = "";
                }

                this.fieldConfig.classes = [{classes: classNameText, id: fieldConfig.allowedClassId}];

                if (data) {
                    this.data = data;
                }

                var fields = [];
                var visibleFields = Ext.isString(this.fieldConfig.visibleFields) ? this.fieldConfig.visibleFields.split(",") : [];
                this.visibleFields = visibleFields;

                fields.push("id");
                fields.push("index");
                fields.push("inheritedFields");
                fields.push("metadata");

                var i;

                for (i = 0; i < visibleFields.length; i++) {
                    fields.push(visibleFields[i]);
                }

                for (i = 0; i < this.fieldConfig.columns.length; i++) {
                    fields.push(this.fieldConfig.columns[i].key);
                }

                var modelName = 'ObjectsMultipleRelations';
                if (!Ext.ClassManager.isCreated(modelName)) {
                    Ext.define(modelName, {
                        extend: 'Ext.data.Model',
                        idProperty: this.idProperty,
                        fields: fields
                    });
                }

                this.store = new Ext.data.JsonStore({
                    data: this.data,
                    listeners: {
                        add: function () {
                            this.dataChanged = true;
                        }.bind(this),
                        remove: function () {
                            this.dataChanged = true;
                            //-----------------------------------------------------------------------------------
                            this.updateHelperPanel();
                            //-----------------------------------------------------------------------------------
                        }.bind(this),
                        clear: function () {
                            this.dataChanged = true;
                            //-----------------------------------------------------------------------------------
                            this.updateHelperPanel();
                            //-----------------------------------------------------------------------------------
                        }.bind(this),
                        update: function (store) {
                            if (store.ignoreDataChanged) {
                                return;
                            }
                            this.dataChanged = true;
                        }.bind(this)
                    },
                    model: modelName
                });
            },

            createLayout: function (readOnly) {
                var autoHeight = false;
                if (intval(this.fieldConfig.height) < 15) {
                    autoHeight = true;
                }

                var cls = 'object_field';
                var i;

                var visibleFields = this.visibleFields || [];

                var columns = [];

                if(visibleFields.length === 0) {
                    columns.push(
                        {text: 'ID', dataIndex: 'id', width: 50},
                        {text: t("reference"), dataIndex: 'fullpath', flex: 200, renderer:this.fullPathRenderCheck.bind(this)}
                    );
                }

                for (i = 0; i < visibleFields.length; i++) {
                    if (!empty(this.fieldConfig.visibleFieldDefinitions) && !empty(visibleFields[i])) {
                        var layout = this.fieldConfig.visibleFieldDefinitions[visibleFields[i]];

                        var field = {
                            key: visibleFields[i],
                            label: layout.title == "fullpath" ? t("reference") : layout.title,
                            layout: layout,
                            position: i,
                            type: layout.fieldtype
                        };

                        var fc = pimcore.object.tags[layout.fieldtype].prototype.getGridColumnConfig(field);

                        fc.flex = 1;
                        fc.hidden = false;
                        fc.layout = field;
                        fc.editor = null;
                        fc.sortable = false;
                        if(fc.layout.key === "fullpath") {
                            fc.renderer = this.fullPathRenderCheck.bind(this);
                        }
                        columns.push(fc);
                    }
                }

                for (i = 0; i < this.fieldConfig.columns.length; i++) {
                    var width = 100;
                    if (this.fieldConfig.columns[i].width) {
                        width = this.fieldConfig.columns[i].width;
                    }

                    var cellEditor = null;
                    var renderer = null;
                    var listeners = null;

                    if (this.fieldConfig.columns[i].type == "number" && !readOnly) {
                        cellEditor = function() {
                            return new Ext.form.NumberField({});
                        }.bind();
                    } else if (this.fieldConfig.columns[i].type == "text" && !readOnly) {
                        cellEditor = function() {
                            return new Ext.form.TextField({});
                        };
                    } else if (this.fieldConfig.columns[i].type == "select") {
                        if(!readOnly) {
                            var selectData = [];

                            if (this.fieldConfig.columns[i].value) {
                                var selectDataRaw = this.fieldConfig.columns[i].value.split(";");

                                for (var j = 0; j < selectDataRaw.length; j++) {
                                    selectData.push([selectDataRaw[j], t(selectDataRaw[j])]);
                                }
                            }

                            cellEditor = function(selectData) {
                                return new Ext.form.ComboBox({
                                    typeAhead: true,
                                    queryDelay: 0,
                                    queryMode: "local",
                                    forceSelection: true,
                                    triggerAction: 'all',
                                    lazyRender: false,
                                    mode: 'local',

                                    store: new Ext.data.ArrayStore({
                                        fields: [
                                            'value',
                                            'label'
                                        ],
                                        data: selectData
                                    }),
                                    valueField: 'value',
                                    displayField: 'label'
                                });
                            }.bind(this, selectData);
                        }

                        renderer = function (value, metaData, record, rowIndex, colIndex, store) {
                            return t(value);
                        }
                    } else if(this.fieldConfig.columns[i].type == "multiselect") {
                        if(!readOnly) {
                            cellEditor =  function(fieldInfo) {
                                return new pimcore.object.helpers.metadataMultiselectEditor({
                                    fieldInfo: fieldInfo
                                });
                            }.bind(this, this.fieldConfig.columns[i]);
                        }

                        renderer = function (value, metaData, record, rowIndex, colIndex, store) {
                            if (Ext.isString(value)) {
                                value = value.split(',');
                            }

                            if (Ext.isArray(value)) {
                                return value.map(function (str) {
                                    return t(str);
                                }).join(',')
                            } else {
                                return value;
                            }
                        }
                    } else if (this.fieldConfig.columns[i].type == "bool") {
                        renderer = function (value, metaData, record, rowIndex, colIndex, store) {
                            if (value) {
                                return '<div style="text-align: center"><div role="button" class="x-grid-checkcolumn x-grid-checkcolumn-checked" style=""></div></div>';
                            } else {
                                return '<div style="text-align: center"><div role="button" class="x-grid-checkcolumn" style=""></div></div>';
                            }
                        };

                        listeners = {
                            "mousedown": this.cellMousedown.bind(this, this.fieldConfig.columns[i].key, this.fieldConfig.columns[i].type)
                        };

                        if (readOnly) {
                            columns.push(Ext.create('Ext.grid.column.Check', {
                                text: t(this.fieldConfig.columns[i].label),
                                dataIndex: this.fieldConfig.columns[i].key,
                                width: width,
                                renderer: renderer
                            }));
                            continue;
                        }
                    }

                    var columnConfig = {
                        text: t(this.fieldConfig.columns[i].label),
                        dataIndex: this.fieldConfig.columns[i].key,
                        renderer: renderer,
                        listeners: listeners,
                        width: width
                    };

                    if (cellEditor) {
                        columnConfig.getEditor = cellEditor;
                    }

                    columns.push(columnConfig);
                }


                if (!readOnly) {
                    columns.push({
                        xtype: 'actioncolumn',
                        menuText: t('up'),
                        width: 40,
                        hideable: false,
                        items: [
                            {
                                tooltip: t('up'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/up.svg",
                                handler: function (grid, rowIndex) {
                                    if (rowIndex > 0) {
                                        var rec = grid.getStore().getAt(rowIndex);
                                        grid.getStore().removeAt(rowIndex);
                                        grid.getStore().insert(rowIndex - 1, [rec]);
                                    }
                                }.bind(this)
                            }
                        ]
                    });
                    columns.push({
                        xtype: 'actioncolumn',
                        menuText: t('down'),
                        width: 40,
                        hideable: false,
                        items: [
                            {
                                tooltip: t('down'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/down.svg",
                                handler: function (grid, rowIndex) {
                                    if (rowIndex < (grid.getStore().getCount() - 1)) {
                                        var rec = grid.getStore().getAt(rowIndex);
                                        grid.getStore().removeAt(rowIndex);
                                        grid.getStore().insert(rowIndex + 1, [rec]);
                                    }
                                }.bind(this)
                            }
                        ]
                    });
                }

                columns.push({
                    xtype: 'actioncolumn',
                    menuText: t('open'),
                    width: 40,
                    hideable: false,
                    items: [
                        {
                            tooltip: t('open'),
                            icon: "/bundles/pimcoreadmin/img/flat-color-icons/open_file.svg",
                            handler: function (grid, rowIndex) {
                                var data = grid.getStore().getAt(rowIndex);
                                pimcore.helpers.openObject(data.data.id, "object");
                            }.bind(this)
                        }
                    ]
                });

                if (!readOnly) {
                    columns.push({
                        xtype: 'actioncolumn',
                        menuText: t('remove'),
                        width: 40,
                        hideable: false,
                        items: [
                            {
                                tooltip: t('remove'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                                handler: function (grid, rowIndex) {
                                    grid.getStore().removeAt(rowIndex);
                                }.bind(this)
                            }
                        ]
                    });
                }

                var toolbarItems = this.getEditToolbarItems(readOnly);


                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 1,
                    listeners: {
                        beforeedit: function (editor, context, eOpts) {
                            editor.editors.each(function (e) {
                                try {
                                    // complete edit, so the value is stored when hopping around with TAB
                                    e.completeEdit();
                                    Ext.destroy(e);
                                } catch (exception) {
                                    // garbage collector was faster
                                    // already destroyed
                                }
                            });

                            editor.editors.clear();
                        }
                    }
                });


                this.component = Ext.create('Ext.grid.Panel', {
                    store: this.store,
                    border: true,
                    style: "margin-bottom: 10px",
                    enableDragDrop: true,
                    ddGroup: 'element',
                    trackMouseOver: true,
                    selModel: {
                        selType: (this.fieldConfig.enableBatchEdit ? 'checkboxmodel': 'rowmodel')
                    },
                    columnLines: true,
                    stripeRows: true,
                    columns: {
                        defaults: {
                            sortable: false
                        },
                        items: columns
                    },
                    viewConfig: {
                        plugins: {
                            ptype: 'gridviewdragdrop',
                            draggroup: 'element'
                        },
                        markDirty: false,
                        enableTextSelection: true,
                        listeners: {
                            afterrender: function (gridview) {
                                this.requestNicePathData(this.store.data, true);
                            }.bind(this),
                            drop: function () {
                                // this is necessary to avoid endless recursion when long lists are sorted via d&d
                                // TODO: investigate if there this is already fixed 6.2
                                if (this.object.toolbar && this.object.toolbar.items && this.object.toolbar.items.items) {
                                    this.object.toolbar.items.items[0].focus();
                                }
                            }.bind(this),
                            // see https://github.com/pimcore/pimcore/issues/979
                            // probably a ExtJS 6.0 bug. withou this, dropdowns not working anymore if plugin is enabled
                            // TODO: investigate if there this is already fixed 6.2
                            cellmousedown: function (element, td, cellIndex, record, tr, rowIndex, e, eOpts) {
                                if (cellIndex >= visibleFields.length) {
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        }
                    },
                    componentCls: cls,
                    width: this.fieldConfig.width,
                    height: this.fieldConfig.height,
                    tbar: {
                        items: toolbarItems,
                        ctCls: "pimcore_force_auto_width",
                        cls: "pimcore_force_auto_width",
                        minHeight: 32
                    },
                    autoHeight: autoHeight,
                    bodyCls: "pimcore_object_tag_objects pimcore_editable_grid",
                    plugins: [
                        this.cellEditing
                    ],
                    listeners: {
                        rowdblclick: this.gridRowDblClickHandler
                    }
                });

                if (!readOnly) {
                    this.component.on("rowcontextmenu", this.onRowContextmenu);
                }

                this.component.reference = this;

                if (!readOnly) {
                    this.component.on("afterrender", function () {

                        var dropTargetEl = this.component.getEl();
                        var gridDropTarget = new Ext.dd.DropZone(dropTargetEl, {
                            ddGroup: 'element',
                            getTargetFromEvent: function (e) {
                                return this.component.getEl().dom;
                                //return e.getTarget(this.grid.getView().rowSelector);
                            }.bind(this),

                            onNodeOver: function (overHtmlNode, ddSource, e, data) {
                                var returnValue = Ext.dd.DropZone.prototype.dropAllowed;
                                data.records.forEach(function (record) {
                                    var fromTree = this.isFromTree(ddSource);
                                    if (!this.dndAllowed(record.data, fromTree)) {
                                        returnValue = Ext.dd.DropZone.prototype.dropNotAllowed;
                                    }
                                }.bind(this));

                                return returnValue;
                            }.bind(this),

                            onNodeDrop: function (target, dd, e, data) {

                                this.nodeElement = data;
                                var fromTree = this.isFromTree(dd);
                                var toBeRequested = new Ext.util.Collection();

                                data.records.forEach(function (record) {
                                    var data = record.data;
                                    if (this.dndAllowed(data, fromTree)) {
                                        if (data["grid"] && data["grid"] == this.component) {
                                            var rowIndex = this.component.getView().findRowIndex(e.target);
                                            if (rowIndex !== false) {
                                                var rec = this.store.getAt(data.rowIndex);
                                                this.store.removeAt(data.rowIndex);
                                                toBeRequested.add(this.store.insert(rowIndex, [rec]));
                                                this.requestNicePathData(toBeRequested);
                                            }
                                        } else {
                                            var initData = {
                                                id: data.id,
                                                metadata: '',
                                                fullpath: data.path,
                                                inheritedFields: {}
                                            };

                                            if (this.fieldConfig.allowMultipleAssignments || !this.objectAlreadyExists(initData.id)) {
                                                toBeRequested.add(this.loadObjectData(initData, this.visibleFields));
                                            }
                                        }
                                    }
                                }.bind(this));

                                if(toBeRequested.length) {
                                    this.requestNicePathData(toBeRequested);
                                    return true;
                                }

                                return false;

                            }.bind(this)
                        });

                        if (this.fieldConfig.enableBatchEdit) {
                            var grid = this.component;
                            var menu = grid.headerCt.getMenu();

                            var batchAllMenu = new Ext.menu.Item({
                                text: t("batch_change"),
                                iconCls: "pimcore_icon_table pimcore_icon_overlay_go",
                                handler: function (grid) {
                                    var columnDataIndex = menu.activeHeader;
                                    this.batchPrepare(columnDataIndex, grid, false, false);
                                }.bind(this, grid)
                            });

                            menu.add(batchAllMenu);

                            var batchSelectedMenu = new Ext.menu.Item({
                                text: t("batch_change_selected"),
                                iconCls: "pimcore_icon_structuredTable pimcore_icon_overlay_go",
                                handler: function (grid) {
                                    menu = grid.headerCt.getMenu();
                                    var columnDataIndex = menu.activeHeader;
                                    this.batchPrepare(columnDataIndex, grid, true, false);
                                }.bind(this, grid)
                            });
                            menu.add(batchSelectedMenu);
                            menu.on('beforeshow', function (batchAllMenu, batchSelectedMenu, grid) {
                                var menu = grid.headerCt.getMenu();
                                var columnDataIndex = menu.activeHeader.dataIndex;
                                var metaIndex = this.fieldConfig.columnKeys.indexOf(columnDataIndex);

                                if (metaIndex < 0) {
                                    batchSelectedMenu.hide();
                                    batchAllMenu.hide();
                                } else {
                                    batchSelectedMenu.show();
                                    batchAllMenu.show();
                                }

                            }.bind(this, batchAllMenu, batchSelectedMenu, grid));
                        }
                    }.bind(this));
                }

                //-----------------------------------------------------------------------------------
                this.updateHelperPanel();
                //-----------------------------------------------------------------------------------

                return this.component;
            },

            getNewHelperPanel: function(){
                //-----------------------------------------------------------------------------------
                var outerScope = this;

                let originalStoreData = this.store.data;
                if( originalStoreData.length > 0 ){
                    let firstRowData = this.store.data.items[0].data;

                    let objectId = firstRowData.id;

                    Ext.Ajax.request({
                        url: "/admin/required_attribute/customization/get_label_value_data",
                        async:false,
                        params: {
                            objectId: objectId
                        },
                        method: "get",
                        success: function (response) {
                            var resdata = Ext.decode(response.responseText);
                            if(resdata.success){
                                let labelValueData = resdata.data;

                                if(labelValueData.length > 0){
                                    let panelWidth = 900;

                                    let fieldSet1 = new Ext.create('Ext.form.FieldSet', {
                                        defaults:{
                                            labelWidth: 210,
                                        },
                                        width: panelWidth/2,
                                    });
                                    let fieldSet2 = new Ext.create('Ext.form.FieldSet', {
                                        defaults:{
                                            labelWidth: 210,
                                        },
                                        width: panelWidth/2
                                    });

                                    let highlightRow = false;
                                    for(let i=0;i < labelValueData.length;i++){

                                        let columnText = labelValueData[i]["label"];
                                        let columnData = labelValueData[i]["value"];;

                                        if(i % 2 == 0){
                                            highlightRow = !highlightRow;
                                        }

                                        let cssCls = "nome_panel_label";
                                        if(highlightRow){
                                            cssCls += " nome_panel_label_highlight";
                                        }

                                        let displayField = new Ext.create('Ext.form.field.Display',{
                                            fieldLabel: "<b>"+columnText+"</b>  ",
                                            // name: colDataIndex,
                                            value: columnData,
                                            // style: style,
                                            cls: cssCls,
                                            labelCls: "small_font_for_nome_panel",
                                            fieldCls: "small_font_for_nome_panel",
                                            height: 35
                                        });

                                        if(i % 2 == 0){
                                            fieldSet1.add(displayField);
                                        }else{
                                            fieldSet2.add(displayField);
                                        }
                                    }

                                    outerScope.helperPanel = new Ext.create('Ext.panel.Panel',{
                                        items : [fieldSet1, fieldSet2],
                                        width: (panelWidth + 50),
                                        layout: 'hbox',
                                    });

                                    outerScope.component.insert(1, outerScope.helperPanel);
                                }
                            }
                        }
                    });

                }
            },

            removeHelperPanel: function(){
                this.component.remove(this.helperPanel);
            },

            updateHelperPanel: function(){
                if(this.fieldConfig.name == "nomenclatureDetails" && this.component){
                    this.removeHelperPanel();
                    this.getNewHelperPanel();
                    // this.component.insert(1, helperPanel);
                }
            }
        });

    },

    // Overriding quicksearch - avoiding use of Enter key in quick search 
    quicksearchOverride: function(){
        Ext.define('Pimcore.view.BoundListKeyNav', {
            extend: 'Ext.view.BoundListKeyNav',
        
            alias: 'view.navigation.quicksearch.boundlist',
        
            initKeyNav: function(view) {
                var me = this,
                    field = view.pickerField;
        
                // Add the regular KeyNav to the view.
                // Unless it's already been done (we may have to defer a call until the field is rendered.
                if (!me.keyNav) {
                    me.callParent([view]);
        
                    // Add ESC handling to the View's KeyMap to collapse the field
                    me.keyNav.map.addBinding({
                        key: Ext.event.Event.ESC,
                        fn: me.onKeyEsc,
                        scope: me
                    });
                }
        
                // BoundLists must be able to function standalone with no bound field
                if (!field) {
                    return;
                }
        
                if (!field.rendered) {
                    field.on('render', Ext.Function.bind(me.initKeyNav, me, [view], 0), me, {single: true});
                    return;
                }
        
                // BoundListKeyNav also listens for key events from the field to which it is bound.
                me.fieldKeyNav = new Ext.util.KeyNav({
                    disabled: true,
                    target: field.inputEl,
                    forceKeyDown: true,
                    up: me.onKeyUp,
                    down: me.onKeyDown,
                    right: me.onKeyRight,
                    left: me.onKeyLeft,
                    pageDown: me.onKeyPageDown,
                    pageUp: me.onKeyPageUp,
                    home: me.onKeyHome,
                    end: me.onKeyEnd,
                    tab: me.onKeyTab,
                    space: me.onKeySpace,
                    // enter: me.onKeyEnter,
                    // This object has to get its key processing in first.
                    // Specifically, before any Editor's key hyandling.
                    priority: 1001,
                    scope: me
                });
            }
        });
    },

    /**
     * to add anyMatch: true for the select fields so that the search in field work as str_contains
     */
    overrideSelect: function(){

        Ext.override(pimcore.object.tags.select,{

            getLayoutEdit: function () {
                // generate store
                var validValues = [];
                var storeData = [];
                var hasHTMLContent = false;
        
                if(!this.fieldConfig.mandatory) {
                    storeData.push({'value': '', 'key': "(" + t("empty") + ")"});
                }
        
                var restrictTo = null;
                if (this.fieldConfig.restrictTo && this.fieldConfig.restrictTo.length > 0) {
                    restrictTo = this.fieldConfig.restrictTo.split(",");
                }
        
                if (this.fieldConfig.options) {
                    for (var i = 0; i < this.fieldConfig.options.length; i++) {
                        var value = this.fieldConfig.options[i].value;
                        if (restrictTo) {
                            if (!in_array(value, restrictTo)) {
                                continue;
                            }
                        }
        
                        var label = t(this.fieldConfig.options[i].key);
                        if(label.indexOf('<') >= 0) {
                            hasHTMLContent = true;
                            label = replace_html_event_attributes(strip_tags(label, "div,span,b,strong,em,i,small,sup,sub2"));
                        }
        
                        storeData.push({'value': value, 'key': label});
        
                        validValues.push(value);
                    }
                }
        
                var store = Ext.create('Ext.data.Store', {
                    fields: ['value', 'key'],
                    data : storeData
                });
        
        
                var options = {
                    name: this.fieldConfig.name,
                    triggerAction: "all",
                    editable: true,
                    queryMode: 'local',
                    autoComplete: false,
                    forceSelection: true,
                    selectOnFocus: true,
                    fieldLabel: this.fieldConfig.title,
                    store: store,
                    componentCls: "object_field",
                    width: 250,
                    displayField: 'key',
                    valueField: 'value',
                    labelWidth: 100,
                    anyMatch: true
                };
        
                if(hasHTMLContent) {
                    options.displayTpl = Ext.create('Ext.XTemplate',
                        '<tpl for=".">',
                        '{[Ext.util.Format.stripTags(values.key)]}',
                        '</tpl>'
                    );
                }
        
                if (this.fieldConfig.labelWidth) {
                    options.labelWidth = this.fieldConfig.labelWidth;
                }
        
                if (this.fieldConfig.width) {
                    options.width = this.fieldConfig.width;
                }
        
                options.width += options.labelWidth;
        
                if (typeof this.data == "string" || typeof this.data == "number") {
                    if (in_array(this.data, validValues)) {
                        options.value = this.data;
                    } else {
                        options.value = "";
                    }
                } else {
                    options.value = "";
                }
        
                this.component = new Ext.form.ComboBox(options);
        
                return this.component;
            },
        }) 
    },

    /**
     * to add anyMatch: true for the multiselect fields so that the search in field work as str_contains
     */
    overrideMultiselect: function(){

        Ext.override(pimcore.object.tags.multiselect,{

            getLayoutEdit: function () {

                // generate store
                var validValues = [];
                var hasHTMLContent = false;
                var storeData = this.prepareStoreDataAndFilterLabels(this.fieldConfig);
                for (var i = 0; i < storeData.length; i++) {
                    validValues.push(storeData[i].text);
                    if(storeData[i].text.indexOf('<') >= 0) {
                        hasHTMLContent = true;
                    }
                }
        
                var store = Ext.create('Ext.data.Store', {
                    fields: ['id', 'text'],
                    data: storeData
                });
        
        
                var options = {
                    name: this.fieldConfig.name,
                    triggerAction: "all",
                    editable: false,
                    fieldLabel: this.fieldConfig.title,
                    store: store,
                    componentCls: "object_field",
                    valueField: 'id',
                    labelWidth: this.fieldConfig.labelWidth ? this.fieldConfig.labelWidth : 100,
                    listeners: {
                        change : function  ( multiselect , newValue , oldValue , eOpts ) {
                            if (this.fieldConfig.maxItems && multiselect.getValue().length > this.fieldConfig.maxItems) {
                                // we need to set a timeout so setValue is applied when change event is totally finished
                                // without this, multiselect wont be updated visually with oldValue (but internal value will be oldValue)
                                setTimeout(function(multiselect, oldValue){
                                    multiselect.setValue(oldValue);
                                }, 100, multiselect, oldValue);
        
                                Ext.Msg.alert(t("error"),t("limit_reached"));
                            }
                            return true;
                        }.bind(this)
                    },
                    anyMatch: true
                };
        
                if (this.fieldConfig.width) {
                    options.width = this.fieldConfig.width;
                } else {
                    options.width = 300;
                }
        
                options.width += options.labelWidth;
        
                if (this.fieldConfig.height) {
                    options.height = this.fieldConfig.height;
                } else if (this.fieldConfig.renderType != "tags") {
                    options.height = 100;
                }
        
                if (typeof this.data == "string" || typeof this.data == "number") {
                    options.value = this.data;
                }
        
                if (this.fieldConfig.renderType == "tags") {
                    options.queryMode = 'local';
                    options.editable = true;
                    if(hasHTMLContent) {
                        options.labelTpl = '{[Ext.util.Format.stripTags(values.text)]}';
                    }
                    this.component = Ext.create('Ext.form.field.Tag', options);
                } else {
                    this.component = Ext.create('Ext.ux.form.MultiSelect', options);
                }
        
                return this.component;
            },
        })
    },
    /** 
     * so that the search string is enclosed withing double quotes by default
     * so that mysql full text indexing provides more relevent results
     */
    dataObjectSearchOverride: function(){

        Ext.override(pimcore.element.selector.object, {
            applyExtraParamsToStore: function () {
                var formValues = this.formPanel.getForm().getFieldValues();
        
                var proxy = this.store.getProxy();
        
                proxy.setExtraParam("type", "object");
                
                /** condition added to show result in case of blank string*/
                if (formValues.query == null || formValues.query == "" || formValues.query == undefined) {
                    proxy.setExtraParam("query", formValues.query );
                } else {
                    proxy.setExtraParam("query", "\""+formValues.query +"\"" );
                }
                proxy.setExtraParam("subtype", formValues.subtype);
                proxy.setExtraParam("class", formValues.class);
        
                if (this.gridLanguage) {
                    proxy.setExtraParam("language", this.gridLanguage);
                }
        
                if (this.parent.config && this.parent.config.context) {
                    proxy.setExtraParam("context", Ext.encode(this.parent.config.context));
                }
        
                this.updateTabTitle(formValues.query);
            },
        })
    },

    /**
     * so that the search string is enclosed withing double quotes by default
     * so that mysql full text indexing provides more relevent results
     */
    assetSearchOverride: function(){

        Ext.override(pimcore.element.selector.asset, {
            search: function () {
                var formValues = this.formPanel.getForm().getFieldValues();
        
                var proxy = this.store.getProxy();
                proxy.setExtraParam("type", "asset");
                /** condition added to show result in case of blank string*/
                if (formValues.query == null || formValues.query == "" || formValues.query == undefined) {
                    proxy.setExtraParam("query", formValues.query );
                } else {
                    proxy.setExtraParam("query", "\""+formValues.query +"\"" );
                }
                proxy.setExtraParam("subtype", formValues.subtype);
        
                if (this.parent.config && this.parent.config.context) {
                    proxy.setExtraParam("context", Ext.encode(this.parent.config.context));
                }
        
                this.pagingtoolbar.moveFirst();
                this.updateTabTitle(formValues.query);
            }
        })

    },

    /**
     * so that the search string is enclosed withing double quotes by default
     * so that mysql full text indexing provides more relevent results
     */
    documentSearchOverride: function(){

        Ext.override(pimcore.element.selector.document, {
            search: function () {
                var formValues = this.formPanel.getForm().getFieldValues();
        
                var proxy = this.store.getProxy();
                proxy.setExtraParam("type", "document");
                proxy.setExtraParam("query", "\"" + formValues.query + "\"");
                proxy.setExtraParam("subtype", formValues.subtype);
        
                if (this.parent.config && this.parent.config.context) {
                    proxy.setExtraParam("context", Ext.encode(this.parent.config.context));
                }
        
                this.pagingtoolbar.moveFirst();
                this.updateTabTitle(formValues.query);
            }
        })

    }

});