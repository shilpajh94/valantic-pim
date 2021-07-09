pimcore.registerNS("pimcore.plugin.CSProductBundle");

pimcore.plugin.CSProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CSProductBundle";
    },

    initialize: function (data, productName) {
        pimcore.plugin.broker.registerPlugin(this);
        this.data = data;
        //console.log(this.data);
        this.productName = productName;
        
        //this.categoryId = this.data[0].categoryId ? this.data[0].categoryId : null;
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
        var toolbar = pimcore.globalmanager.get("layout_toolbar");
        
        Ext.get('cs_product').on('click', function (e, el) {
            this.addNewProductForm();
        }.bind(this));
    },

    addNewProductForm: function () {
        let classCombo = this.getClassCombo();
        this.basicForm = new Ext.create("Ext.Window", {
            title: 'Add Product',
            width: 600,
            height: 400,
            html: '',
            modal : true,
            maskOnDisable: false,
            items: [{
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
                    classCombo],
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
                            text: 'Save',
                            itemId: 'save',
                            cls: 'pimcore_save_button',
                            iconCls: 'pimcore_icon_apply',
                            handler: this.saveCallBack.bind(this)
                        }
                    ]
                }
            ],
        }).show();
        return this.basicForm;
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
                url: '/admin/csproduct/category/get_categories',
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

        // Create the combo box, attached to the states data store
        let combo = new Ext.create('Ext.form.ComboBox', {
            fieldLabel: 'Select Parent Category <span style="color:red;">*</span>',
            name: 'categoryId',
            style: {
                margin: '30px'
            },
            store: categories,
            queryMode: 'local',
            editable: false,
            allowBlank: false,
            blankText: 'Field is required',
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 500,
            labelWidth: 200,
            value: this.categoryId,

        });
        return combo;
    },

    saveCallBack: function (saveCall) {
        //console.log(this.basicForm.getComponent(1).getValue());
        this.saveCall = saveCall;
        Ext.Ajax.request({
            url: '/admin/csproduct/default/save_product',
            async: false,
            params: {
                productName: this.basicForm.getComponent(0).getValue(),
                productCategoryId: this.basicForm.getComponent(1).getValue()
            },
            success: function (response) {
                var res = Ext.decode(response.responseText);
            },

            failure: function (response) {
                console.log('server-side failure with status code ' + response.status);
            }
        });
    },
});

var CSProductBundlePlugin = new pimcore.plugin.CSProductBundle();
