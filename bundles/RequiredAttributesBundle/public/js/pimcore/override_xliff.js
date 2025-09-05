pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle.override_xliff");

/**
 * overriding this file so that custom filter panel can be added on xliff export objects
 */

pimcore.plugin.RequiredAttributesBundle.override_xliff = Class.create({

    filterOnExportProducts: function(){
        Ext.override(pimcore.bundle.xliff.settings, {

            
            //This function is used to get all the values provided in the filter panel

            getFilterValues : function (){
                var outerScope = this;
                var allXliffFilterDataJson = {};
                var configData = outerScope.getConfigData();
                for (var eachClassLevelData in configData) {
                    var eachClassLevelDataVal = configData[eachClassLevelData];
                    var className = eachClassLevelData;
                    var eachXliffFilterDataJson = {};

                    for (var eachFieldLevel in eachClassLevelDataVal.filters) {
                        var eachFieldLevelVal = eachClassLevelDataVal.filters[eachFieldLevel];
                        var attributeName = eachFieldLevelVal.fieldName;
                        var idValue = className + "-" + attributeName;
                        var eachFilterData = Ext.getCmp(idValue).getValue();
                        if(eachFilterData){
                            eachXliffFilterDataJson[attributeName] = eachFilterData;
                        }
                    }
                    if((Object.keys(eachXliffFilterDataJson).length === 0 && eachXliffFilterDataJson.constructor === Object) != true){
                        allXliffFilterDataJson[className] = eachXliffFilterDataJson;
                    }
                }
                return allXliffFilterDataJson;
            },

            //This function is used to get xliff filters config

            getConfigData : function (){

                Ext.Ajax.request({
                    url: "/admin/xliff-filters/get-data",
                    async:false,
                    params: {},
                    success: function (response) {
                        var resdata = Ext.decode(response.responseText);
                        if(resdata.success){
                            this.configData = resdata.data;
                        }else if(response.success == false){
                            console.log(response);
                        }
                    }
                });
                return configData;
            },

            // This function is used set the required filters in pimcore UI - xliff export screen

            setFilterPanel : function (){

                var outerScope = this;
                var configData = outerScope.getConfigData();
                var fieldSetArray = new Array();

                for (var eachClassLevelData in configData) {
                    var fieldArray = new Array();
                    var eachClassLevelDataVal = configData[eachClassLevelData];
                    var className = eachClassLevelData;
                    for (var eachFieldLevel in eachClassLevelDataVal.filters) {
                        var eachFieldLevelVal = eachClassLevelDataVal.filters[eachFieldLevel];
                        var attributeName = eachFieldLevelVal.fieldName;
                        var idValue = className + "-" + attributeName;

                        if(eachFieldLevelVal.fieldType == 'select'){


                            let sheetNamesStoreData = [];

                            for (var key in eachFieldLevelVal.values){
                                let val = eachFieldLevelVal.values[key];
                                let storeItem = {id: key, name: val};
                                sheetNamesStoreData.push(storeItem);
                                    
                            }

                            let sheetNamesStore = new Ext.data.JsonStore({
                                proxy: {
                                    type: 'memory'
                                },
                                data: sheetNamesStoreData,
                                fields: ["id", "name"],
                            });                                            
                            
                            this.xyz = new Ext.form.ComboBox({
                                id: idValue,
                                fieldLabel: eachFieldLevelVal.fieldLabel,
                                name: eachFieldLevelVal.fieldName,
                                store: sheetNamesStore,
                                editable: false,
                                triggerAction: 'all',
                                mode: "local",
                                displayField: 'name',
                                valueField: 'id',
                                listWidth: 200
                            });
                        }
                        else if(eachFieldLevelVal.fieldType == 'checkbox'){
                            this.xyz = new Ext.form.field.Checkbox(
                                {
                                    id: idValue,
                                    fieldLabel: eachFieldLevelVal.fieldLabel,
                                    inputValue: true,
                                    name: eachFieldLevelVal.fieldName,
                                    value: false,
                                    labelWidth: 220
                                }
                            );
                        }
                        else if(eachFieldLevelVal.fieldType == 'text'){
                            this.xyz = new Ext.form.TextField({
                                id: idValue,
                                fieldLabel: eachFieldLevelVal.fieldLabel,
                                labelWidth: 200,
                            });
                    
                        }
                        fieldArray.push(this.xyz);                                          

                    } 
                    this.fieldSet = new Ext.create('Ext.form.FieldSet', {
                        title: eachClassLevelDataVal.fieldsetLabel,
                        defaults:{
                            labelWidth: 200,
                        },
                        items: fieldArray
                    });
                    fieldSetArray.push(this.fieldSet);
                }
                this.xliffFilterPanel = new Ext.create('Ext.form.Panel', {
                    fullscreen: true,
                    items: fieldSetArray
                });
                
                return this.xliffFilterPanel;
                
            },

            getExportPanel: function () {

                var outerScope = this;
                this.xliffFilters = outerScope.setFilterPanel();  // Calling of function to set the filters on pimcore UI

                let fields = [
                    "rowId",
                    "id",
                    "path",
                    "type",
                    "children",
                    "relations"
                ];
                
                let modelName = 'pimcore.model.xliff.store';
                if (!Ext.ClassManager.isCreated(modelName)) {
                    Ext.define(modelName, {
                        extend: 'Ext.data.Model',
                        idProperty: "rowId",
                        fields: fields
                    });
                }
        
                this.exportStore = new Ext.data.ArrayStore({
                    model: modelName
                });
        
                this.component = Ext.create('Ext.grid.Panel', {
                    store: this.exportStore,
                    autoHeight: true,
                    border: true,
                    style: "margin-bottom: 10px",
                    selModel: Ext.create('Ext.selection.RowModel', {}),
                    columns: {
                        defaults: {
                            sortable: false
                        },
                        items: [
                            {text: 'ID', dataIndex: 'id', width: 50},
                            {text: t("type"), dataIndex: 'type', width: 100},
                            {text: t("path"), dataIndex: 'path', flex: 200},
                            Ext.create('Ext.grid.column.Check', {
                                text: t("children"),
                                dataIndex: "children",
                                width: 70
                            }),
                            Ext.create('Ext.grid.column.Check', {
                                text: t("relations"),
                                dataIndex: "relations",
                                width: 100
                            }),
                            {
                                xtype: 'actioncolumn',
                                menuText: t('remove'),
                                width: 30,
                                items: [{
                                    tooltip: t('remove'),
                                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                                    handler: function (grid, rowIndex) {
                                        grid.getStore().removeAt(rowIndex);
                                    }.bind(this)
                                }]
                            }
                        ]
                    },
                    tbar: {
                        items: [
                            {
                                xtype: "tbspacer",
                                width: 24,
                                height: 24,
                                cls: "pimcore_icon_droptarget"
                            },
                            t("elements_to_export"),
                            "->",
                            {
                                xtype: "button",
                                iconCls: "pimcore_icon_delete",
                                handler: function () {
                                    this.exportStore.removeAll();
                                }.bind(this)
                            }
                            ,
                            {
                                xtype: "button",
                                iconCls: "pimcore_icon_search"
                                ,
                                handler: function () {
                                    pimcore.helpers.itemselector(true, function (items) {
                                        if (items.length > 0) {
                                            for (var i = 0; i < items.length; i++) {
                                                let rowId = items[i].type + '-' + items[i].id;
                                                this.exportStore.add({
                                                    rowId: rowId,
                                                    id: items[i].id,
                                                    path: items[i].fullpath,
                                                    type: items[i].type,
                                                    children: true,
                                                    relations: false
                                                });
                                            }
                                        }
                                    }.bind(this), {
                                        type: ["object", "document"]
                                    });
                                }.bind(this)
                            }
                        ]
                    }
                });
        
                //this.component.on("rowcontextmenu", this.onRowContextmenu);
        
                this.component.on("afterrender", function () {
        
                    var dropTargetEl = this.component.getEl();
                    var gridDropTarget = new Ext.dd.DropZone(dropTargetEl, {
                        ddGroup    : 'element',
                        getTargetFromEvent: function(e) {
                            return this.component.getEl().dom;
                            //return e.getTarget(this.grid.getView().rowSelector);
                        }.bind(this),
                        onNodeOver: function (overHtmlNode, ddSource, e, data) {
                            if (data.records.length == 1) {
                                var record = data.records[0];
        
                                var type = record.data.elementType;
        
                                if (type == "document" || type == "object") {
                                    return Ext.dd.DropZone.prototype.dropAllowed;
                                }
                            }
                            return Ext.dd.DropZone.prototype.dropNotAllowed;
        
                        }.bind(this),
                        onNodeDrop : function(target, dd, e, data) {
                            if (pimcore.helpers.dragAndDropValidateSingleItem(data)) {
                                data = data.records[0].data;
        
                                var type = data.elementType;
                                if (type == "document" || type == "object") {
                                    let rowId = type + '-' + data.id;
                                    this.exportStore.add({
                                        rowId: rowId,
                                        id: data.id,
                                        path: data.path,
                                        type: data.elementType,
                                        children: true,
                                        relations: false
                                    });
                                    return true;
                                }
                            }
                            return false;
                        }.bind(this)
                    });
                }.bind(this));
        
                var languagestore = [];
                for (var i=0; i<pimcore.settings.websiteLanguages.length; i++) {
                    languagestore.push([pimcore.settings.websiteLanguages[i],pimcore.settings.websiteLanguages[i]]);
                }
        
                this.exportSourceLanguageSelector = new Ext.form.ComboBox({
                    fieldLabel: t("source"),
                    name: "source",
                    store: languagestore,
                    editable: false,
                    triggerAction: 'all',
                    mode: "local",
                    listWidth: 200
                });
        
                this.exportTargetLanguageSelector = new Ext.form.ComboBox({
                    fieldLabel: t("target"),
                    name: "target",
                    store: languagestore,
                    editable: false,
                    triggerAction: 'all',
                    mode: "local",
                    listWidth: 200
                });

                // ------------ CUSTOMIZATION STARTED ----------------- //
                
                this.publishState = new Ext.form.field.Checkbox(
                    {
                        fieldLabel: t("Export Published Products Only"),
                        inputValue: true,
                        name: "publishState",
                        value: false,
                        labelWidth: 220
                    }
                );

                // ------------ CUSTOMIZATION ENDED ----------------- //
                
                this.exportPanel = new Ext.Panel({
                    title: t("export"),
                    autoScroll: true,
                    region: "center",
                    bodyStyle: "padding: 10px",
                    items: [{
                        html: '<div>' + t("xliff_export_notice") + '</div>',
                        style: "margin-bottom: 10px"
                    }, {
                        title: t("important_notice") + " (" + t("documents") + ")",
                        bodyStyle: 'padding-top:10px;',
                        html: '<div>' + t("xliff_export_documents") + '</div>',
                        style: "margin-bottom: 10px",
                        iconCls: "pimcore_icon_document"
                    }, {
                        title: t("important_notice") + " (" + t("data_objects") + ")",
                        bodyStyle: 'padding-top:10px;',
                        html: '<div>' + t("xliff_export_objects") + '</div>',
                        style: "margin-bottom: 10px",
                        iconCls: "pimcore_icon_object"
                    }, this.component, {
                        xtype: "form",
                        title: t("language"),
                        bodyStyle: "padding: 10px",
                        items: [this.exportSourceLanguageSelector, this.exportTargetLanguageSelector, this.publishState, this.xliffFilters],
                        style: "margin-bottom: 10px"
                    }],
                    buttons: [{
                        text: t("export"),
                        iconCls: "pimcore_icon_export",
                        handler: this.startExport.bind(this)
                    }]
                });
                return this.exportPanel;
            },

        
            startExport: function () {

                var outerScope = this;
                var tmData = [];
                var allXliffFilterDataJson = outerScope.getFilterValues();  // Calling of function to get the filter values from pimcore UI
                var data = this.exportStore.queryBy(function(record, id) {
                    return true;
                });
        
                // skip if no items are selected to export
                if(data.items.length < 1) {
                    return;
                }
        
                for (var i = 0; i < data.items.length; i++) {
                    tmData.push(data.items[i].data);
                }

                Ext.Ajax.request({
                    url: "/admin/translation/content-export-jobs",
                    method: 'POST',
                    params: {
                        source: this.exportSourceLanguageSelector.getValue(),
                        target: this.exportTargetLanguageSelector.getValue(),
                        publishState: this.publishState.getValue(),
                        xliffFilters: JSON.stringify(allXliffFilterDataJson),
                        data: Ext.encode(tmData),
                        type: "xliff"
                    },
                    success: function(response) {
                        var res = Ext.decode(response.responseText);
                        this.exportProgressbar = new Ext.ProgressBar({
                            text: t('initializing')
                        });
        
                        this.exportProgressWin = new Ext.Window({
                            title: t("export"),
                            layout:'fit',
                            width:200,
                            bodyStyle: "padding: 10px;",
                            closable:false,
                            plain: true,
                            items: [this.exportProgressbar],
                            listeners: pimcore.helpers.getProgressWindowListeners()
                        });
        
                        this.exportProgressWin.show();
        
        
                        var pj = new pimcore.tool.paralleljobs({
                            success: function (id) {
                                if(this.exportProgressWin) {
                                    this.exportProgressWin.close();
                                }
        
                                this.exportProgressbar = null;
                                this.exportProgressWin = null;
        
                                pimcore.helpers.download('/admin/translation/xliff-export-download?id='+ id);
                            }.bind(this, res.id),
                            update: function (currentStep, steps, percent) {
                                if(this.exportProgressbar) {
                                    var status = currentStep / steps;
                                    this.exportProgressbar.updateProgress(status, percent + "%");
                                }
                            }.bind(this),
                            failure: function (message) {
                                this.exportProgressWin.close();
                                pimcore.helpers.showNotification(t("error"), t("error"),
                                    "error", t(message));
                            }.bind(this),
                            jobs: res.jobs
                        });
                    }.bind(this)
                });
            },
        });
    }
});