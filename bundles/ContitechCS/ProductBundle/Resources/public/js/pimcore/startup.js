pimcore.registerNS("pimcore.plugin.ContitechCSProductBundle");

pimcore.plugin.ContitechCSProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ContitechCSProductBundle";
    },

    initialize: function (data, productName) {
        pimcore.plugin.broker.registerPlugin(this);
        this.data = data;
        this.productName = productName;
    },

    // pimcoreReady: function (params, broker) {
    //     let user = pimcore.globalmanager.get("user");
    //     if (user.admin || user.isAllowed("plugin_cs_add_product")) {
    //         this.leftNavigation();
    //     }
    // },
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.ContitechCSProductBundle::pimcoreReady'));
    },

    postOpenObject: function (object, type) {
        let objectClassName = object.data.general.o_className;
        if (objectClassName == 'CSHierarchy') {
            //console.log(object.data.general.o_parentId);
            this.setParentBricks(object, object.data.general.o_parentId);
        }
        if (objectClassName == 'CSProducts') {
            if (object.edit.dataFields.CSSegment.data !== null) {
                this.listCountries(object, object.edit.dataFields.CSSegment.data.split(","));
            }
            object.edit.dataFields.CSSegment.component.on('select', function (e) {
                this.listCountries(object, e.getValue());
            }.bind(this));

        }
    },

    setParentBricks: function (object, parentId) {
        let bricksStore = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_parent_bricks',
                method: 'POST',
                extraParams: {
                    parentId: JSON.stringify(parentId),
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "text"]
        });
        bricksStore.load();

        object.edit.dataFields.ParentBricks.component.setStore(bricksStore);
        if (object.data.data.ParentBricks !== null) {
            object.edit.dataFields.ParentBricks.component.setValue(object.data.data.ParentBricks);
        }
    },

    listCountries: function (object, segmentId) {
        let countriesOptionStore = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_countries',
                method: 'POST',
                extraParams: {
                    segmentId: JSON.stringify(segmentId),
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "text"]
        });
        countriesOptionStore.load();

        object.edit.dataFields.SelectCountries.component.setStore(countriesOptionStore);
        if (object.data.data.SelectCountries !== null) {
            object.edit.dataFields.SelectCountries.component.setValue(object.data.data.SelectCountries);
        }
    },
    //    preOpenObject: function (object) {
    ////      if (object.data.general.o_className == 'CSProducts') {
    //object.edit.dataFields.name.component.NameVal.hide(true);
    ////object.edit.datafields.Name.fieldConfig.noteditable = true;
    ////console.log(object.edit.dataFields);
    //          
    ////      }  
    //    },



    postSaveObject: function (object) {

        // reload hierarchy object on save
        if (object.data.general.o_className == "CSHierarchy") {
            setTimeout(function () {
                object.reload();
            }, 1);
        }

    },

    leftNavigation: function () {
        let navigation = Ext.get("pimcore_navigation");
        let ulElement = navigation.selectNode('ul');
        let li = document.createElement("li");
        li.setAttribute("id", "cs_product");
        li.setAttribute("class", "cs_product");
        li.setAttribute("data-menu-tooltip", t("Add Product"));
        ulElement.appendChild(li);
        let svg = document.createElement("svg");
        svg.setAttribute("class", "pimcore_icon_add");
        li.appendChild(svg);
        ulElement.appendChild(li);
        pimcore.helpers.initMenuTooltips();

        Ext.get('cs_product').on('click', function (e, el) {
            this.addNewProductForm();
        }.bind(this));
    },

    addNewProductForm: function () {
        var user = pimcore.globalmanager.get("user");
        let classCombo = this.getHierarchyClassCombo();
        let userCombo = this.getUsersCombo();
        let marcomCombo = this.getMarcomCombo();
        let editorCombo = this.getEditorCombo();
        this.basicForm = new Ext.create("Ext.form.Panel", {
            width: 600,
            height: 500,
            html: '',
            url: '/contitech_cs_product/default/save_product',
            async: false,
            items: [
                {
                    xtype: 'label',
                    html: '',
                    name: 'addProductError',
                    itemId: 'addProductError'
                },
                {
                    xtype: 'hiddenfield',
                    name: 'currentUser',
                    value: user.id
                },
                {
                    xtype: 'checkboxfield',
                    name: 'productCategoryCheck',
                    style: {
                        margin: '20px'
                    },
                    listeners: {
                        change: function (checkbox) {
                            if (checkbox.checked) {
                                Ext.getCmp('pName').setValue(classCombo.rawValue);
                                this.productName = classCombo.rawValue;
                                Ext.getCmp('pName').setReadOnly(true);
                            }
                            else {
                                Ext.getCmp('pName').setReadOnly(false);
                            }
                        }
                    },
                    width: 500,
                    labelWidth: 200,
                    fieldLabel: 'Create Product Group',
                    allowBlank: true,
                    id: 'cName',
                    value: this.productCategoryCheck,
                },
                {
                    xtype: 'textfield',
                    name: 'productName',
                    style: {
                        margin: '20px'
                    },
                    width: 500,
                    labelWidth: 200,
                    fieldLabel: 'Product Name <span style="color:red;">*</span>',
                    allowBlank: false,
                    allowOnlyWhitespace: false,
                    blankText: 'Field is required',
                    msgTarget: 'under',
                    id: 'pName',
                    value: this.productName,
                },
                classCombo,
                userCombo,
                marcomCombo,
                editorCombo
            ],
            dockedItems: [
                {
                    xtype: 'toolbar',
                    flex: 1,
                    dock: 'bottom',
                    ui: 'footer',
                    layout: {
                        pack: 'end',
                        type: 'hbox'
                    },
                    items: [
                        {
                            xtype: 'button',
                            text: 'Submit',
                            cls: 'pimcore_save_button',
                            iconCls: 'pimcore_icon_apply',
                            handler: function () {
                                var form = this.up('form');
                                if (form.isValid()) {
                                    form.submit({
                                        success: function (form, response) {

                                            var win = Ext.WindowManager.getActive();
                                            if (win) {
                                                win.close();
                                            }
                                            pimcore.helpers.openElement(response.result.objectId, 'object');
                                            pimcore.treenodelocator.showInTree(response.result.objectId, "object");

                                        },
                                        failure: function (form, response) {
                                            var label = Ext.ComponentQuery.query('label');
                                            label[0].setHtml('<div class="alert alert-danger alert-dismissible"><strong>Error : </strong> ' + response.result.msg + '</div>');
                                        }
                                    });
                                }
                                else {
                                    console.log('form validation failed');
                                }
                            }
                        }
                    ]
                }
            ]
        });

        this.basicFormWin = new Ext.create("Ext.Window", {
            title: 'Add New Product/Product Group',
            modal: true,
            maskOnDisable: false,
            items: [this.basicForm]
        }).show();
    },

    hideErrorLabel: function () {
        alert('close');
    },

    /**
     * return class select combo for Hierarchy
     *
     * @returns {Ext.create}
     */
    getHierarchyClassCombo: function () {
        let categories = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_categories',
                reader: {
                    type: 'json',
                    rootProperty: 'categoryList'
                }
            },
            fields: ["id", "name"],
            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });
        categories.load();

        return new Ext.create('Ext.form.ComboBox', {
            fieldLabel: 'Select Category <span style="color:red;">*</span>',
            name: 'categoryId',
            style: {
                margin: '20px'
            },
            store: categories,
            queryMode: 'local',
            editable: true,
            allowBlank: false,
            blankText: 'Field is required',
            forceSelection: true,
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            listeners: {
                change: function () {
                    if (Ext.getCmp('cName').checked) {
                        Ext.getCmp('pName').setValue(this.rawValue);
                        this.productName = Ext.getCmp('pName').getValue();
                    }
                }
            },
            width: 500,
            labelWidth: 200,
            value: this.categoryId,

        });
    },

    /**
     * return class select combo for Users
     *
     * @returns {Ext.create}
     */
    getUsersCombo: function () {

        let users = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_users',
                extraParams: {
                    param: 'owner',
                },
                reader: {
                    type: 'json',
                    rootProperty: 'userList'
                }
            },
            fields: ["id", "name"],
            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });
        users.load();

        return new Ext.create('Ext.form.ComboBox', {
            fieldLabel: 'Select Product Owner <span style="color:red;">*</span>',
            name: 'userId',
            style: {
                margin: '20px'
            },
            store: users,
            queryMode: 'local',
            editable: true,
            allowBlank: false,
            blankText: 'Field is required',
            forceSelection: true,
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 500,
            labelWidth: 200,
            value: this.userId,
        });
    },

    /**
     * return class select combo for Marcom Users
     *
     * @returns {Ext.create}
     */
    getMarcomCombo: function () {

        let marcom = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_users',
                extraParams: {
                    param: 'marcom',
                },
                reader: {
                    type: 'json',
                    rootProperty: 'userList'
                }
            },
            fields: ["id", "name"],
            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });
        marcom.load();

        return new Ext.create('Ext.form.ComboBox', {
            fieldLabel: 'Select Marcom User <span style="color:red;">*</span>',
            name: 'marcomId',
            style: {
                margin: '20px'
            },
            store: marcom,
            queryMode: 'local',
            editable: true,
            allowBlank: false,
            blankText: 'Field is required',
            forceSelection: true,
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 500,
            labelWidth: 200,
            value: this.marcomId,
        });
    },

    /**
     * return class select combo for Editor/R&D
     *
     * @returns {Ext.create}
     */
    getEditorCombo: function () {

        let editor = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_product/default/get_users',
                extraParams: {
                    param: 'editor',
                },
                reader: {
                    type: 'json',
                    rootProperty: 'userList'
                }
            },
            fields: ["id", "name"],
            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });
        editor.load();

        return new Ext.create('Ext.form.ComboBox', {
            fieldLabel: 'Select Editor/R&D User <span style="color:red;">*</span>',
            name: 'editorId',
            style: {
                margin: '20px'
            },
            store: editor,
            queryMode: 'local',
            editable: true,
            allowBlank: false,
            blankText: 'Field is required',
            forceSelection: true,
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 500,
            labelWidth: 200,
            value: this.editorId,
        });
    },
});

// var ContitechCSProductBundlePlugin = new pimcore.plugin.ContitechCSProductBundle();

document.addEventListener('pimcore.plugin.ContitechCSProductBundle::pimcoreReady', function (event) {
    let user = pimcore.globalmanager.get("user");
    if (user.admin || user.isAllowed("plugin_cs_add_product")) {
        this.leftNavigation();
    }
});
