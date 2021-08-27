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

    pimcoreReady: function (params, broker) {
        let user = pimcore.globalmanager.get("user");
        if (user.admin || user.isAllowed("plugin_csproduct")) {
            this.leftNavigation();
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
        let classCombo = this.getClassCombo();
        this.basicForm = new Ext.create("Ext.form.Panel", {
            width: 600,
            height: 300,
            html: '',
            url: '/contitech_cs_product/default/save_product',
            async: false,
            items: [
                    {
                        xtype: 'label',
                        html: '',
                        name: 'addProductError',
                        itemId:'addProductError'
                    },
                    {
                        xtype: 'textfield',
                        name: 'productName',
                        style: {
                            margin: '30px'
                        },
                        width: 500,
                        labelWidth: 200,
                        fieldLabel: 'Product Name <span style="color:red;">*</span>',
                        allowBlank: false,
                        blankText: 'Field is required',
                        msgTarget: 'under',
                        value: this.productName,
                    },
                    classCombo,
                    {
                        xtype: 'checkbox',
                        name: 'productCategoryCheck',
                        style: {
                            margin: '30px'
                        },
                        width: 500,
                        labelWidth: 300,
                        fieldLabel: 'Create Product Group at same Category Level',
                        allowBlank: true,
                        value: this.productCategoryCheck,
                    },
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
                            handler: function() {
                                var form = this.up('form');
                                if (form.isValid()) 
                                {
                                    form.submit({
                                        success: function(form, response) {

                                            var win = Ext.WindowManager.getActive();
                                            if (win) {
                                                win.close();
                                            }
                                            pimcore.helpers.openElement(response.result.objectId, 'object');
                                            pimcore.treenodelocator.showInTree(response.result.objectId, "object");
                                            
                                        },
                                        failure: function(form, response) {
                                            var label = Ext.ComponentQuery.query('label');
                                            label[0].setHtml('<div class="alert alert-danger alert-dismissible"><strong>Error : </strong> '+response.result.msg+'</div>');
                                        }
                                    });
                                }
                                else{
                                    console.log('form validation failed');
                                }   
                            }
                        }
                    ]
                }
            ]
        });
        
        this.basicFormWin = new Ext.create("Ext.Window", {
            title: 'Add Product',
            modal : true,
            maskOnDisable: false,
            items: [this.basicForm]
        }).show();
    },

    hideErrorLabel: function(){
        alert('close');
    },

    /**
     * return class select combo
     *
     * @returns {Ext.create}
     */
     getClassCombo: function () {

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
                margin: '30px'
            },
            store: categories,
            queryMode: 'local',
            editable: true,
            allowBlank: false,
            blankText: 'Field is required',
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 500,
            labelWidth: 200,
            value: this.categoryId,

        });
    },
});

var ContitechCSProductBundlePlugin = new pimcore.plugin.ContitechCSProductBundle();
