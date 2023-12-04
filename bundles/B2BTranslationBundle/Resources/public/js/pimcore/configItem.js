pimcore.registerNS("pimcore.plugin.b2btranslation.configItem");
pimcore.plugin.b2btranslation.configItem = Class.create(pimcore.element.abstract, {
    
    initialize: function (data, pimId, parent, parentType) {
        this.parent = parent;
        this.parentType = parentType;
        this.pimId = pimId;
        this.data = data;
        this.mappingAttributeSetting = {};
        this.allB2BData = new Array();
        if (this.data.data.vendor && this.data.data.type) {
            Ext.Ajax.request({
                url: '/admin/b2b_translation/getB2BData?vendor='+this.data.data.vendor+'&type='+this.data.data.type,
                method: "get",
                async: false,
                success: function (response) {
                    var rdata = Ext.decode(response.responseText);
                    var b2bData = [];
                    Ext.each(rdata.data, function(value) {
                        b2bData[value.id] = value.name;
                    });
                    this.allB2BData = b2bData;
                }.bind(this)
            });
        }
        
        this.tab = new Ext.Panel({
            title: this.data.general.o_key,
            closable: true,
            padding: '10px',
            forceLayout: true,
            iconCls: "pimcore_icon_translations",
            id: "mapping_panel_" + this.data.general.o_id,
            buttons: {
                itemId: 'footer'
            },
            items: [
                this.getFilterPanel(),
                this.getGridPanel()
            ]
        });

        this.tab.on("activate", this.tabactivated.bind(this));
        this.tab.on("destroy", this.tabdestroy.bind(this));

        this.getCustomConfigButton();
        this.parent.editPanel.add(this.tab);
        this.parent.editPanel.setActiveTab(this.tab);
        this.parent.editPanel.updateLayout();

    },

    getFilterPanel: function () {

        if (!this.filterPanel) {
            var vendorValue = null;
            var vendorStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'name'],
                data : this.data.vendors
            });
            if (this.data.data.vendor) {
                vendorValue = this.data.data.vendor;
            } else {
                for (var i = 0; i < this.data.vendors.length; i++) {
                    if (i == 0) {
                        vendorValue = this.data.vendors[0].id;
                    }
                }
            }

            var mappingTypeStore = Ext.create('Ext.data.Store', {
                fields: ['abbr', 'name'],
                data : [
                    {"id":"Product", "name":"Product"},
                    {"id":"Category", "name":"Category"}
                ]
            });
            
            // Create the combo box, attached to the states data store
            this.comboVendors = Ext.create('Ext.form.ComboBox', {
                fieldLabel: 'Select Business Unit',
                width: 500,
                labelStyle: 'width:200px',
                value: vendorValue,
                store: vendorStore,
                queryMode: 'local',
                autoSelect: true,
                forceSelection: true,
                displayField: 'name',
                valueField: 'id',
                listeners: {
                    change: function () {
                        this.updateGrid();
                    }.bind(this)
                }
            });
            var typeValue = "Product";
            if (this.data.data.type) {
                typeValue = this.data.data.type;
            }
            this.comboMappingType = Ext.create('Ext.form.ComboBox', {
                fieldLabel: 'Select Product / Category',
                name: 'filterMappingType',
                width: 500,
                labelStyle: 'width:200px',
                store: mappingTypeStore,
                value: typeValue,
                autoSelect: true,
                forceSelection: true,
                queryMode: 'local',
                displayField: 'name',
                valueField: 'id',
                listeners: {
                    change: function () {
                        this.updateGrid();
                    }.bind(this)
                }
            });
            
            this.filterPanel = new Ext.form.FormPanel({
                region: "north",
                bodyStyle: "padding: 5px;",
                height: 100,
                items: [this.comboVendors, this.comboMappingType]
            });
        }
        return this.filterPanel;
    },

    saveChannelMappingConfig: function () { 
        var gridData = this.mappingGrid.getStore().data.items;
        var gridDataArray = [];
        Ext.each(gridData, function(value) {
            gridDataArray.push(value.data);
        });

        let saveData = {
            mappingId: this.pimId,
            gridData: JSON.stringify(gridDataArray),
            vendor: this.comboVendors.getValue(),
            type: this.comboMappingType.getValue()
        };

        Ext.Ajax.request({
            url: "/admin/b2b_translation/update",
            params: saveData,
            waitMsg: 'Saving Columns Config....',
            method: "post",
            success: function (response) {
                var rdata = Ext.decode(response.responseText);
                pimcore.helpers.loadingHide();
                if (rdata && rdata.success) {
                    pimcore.helpers.showNotification(t("success"), t("b2b_translation_mapping_save_success"), "success");
                } else {
                    pimcore.helpers.showNotification(t("error"), t("b2b_translation_mapping_saveerror"), "error", t(rdata.message));
                }
            }.bind(this)
        });
    },
    getGridPanel: function() {
        if (!this.gridPanel) {
            this.gridPanel = new Ext.Panel({
                height:"100%",
                items: [this.showCustomTab()]

            });
        }
        return this.gridPanel;
    },

    updateGrid: function() {
        if (this.comboMappingType.getValue()) {
            var url = '/admin/b2b_translation/getB2BData?vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var b2bDataStore = new Ext.data.Store({
                autoLoad:true,
                proxy: {
                    type: 'ajax',
                    url: url,
                    reader: {
                        type: 'json',
                        root: 'data'
                    }
                },
                totalProperty: 'num',
                fields: [
                        {name:'name', type: 'string'},
                        {name:'id', type: 'string'}
                ]
            });
            
            if(!Ext.ClassManager.isCreated('VendorData')){
                Ext.define('VendorData', {
                    extend: 'Ext.data.Model',
                    fields: [ {
                            name: 'name',
                            type: 'string'
                        }
                    ]
                });
            }
            
            var url = '/admin/b2b_translation/getPIMData?mappingId='+this.pimId+'&vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var pimDataStore = new Ext.data.Store({
                model: 'VendorData',
                autoLoad:true,
                proxy: {
                    type: 'ajax',
                    url: url,
                    reader: {
                        type: 'json',
                        root: 'data'
                    }
                },
                totalProperty: 'num',
                fields: [
                        {name:'name', type: 'string'},
                        {name:'id', type: 'string'},
                        {name:'b2bName', type: 'string'}
                ]
            });

            cmb = this.mappingGrid.getColumns()[1];
            cmb.getEditor().setStore(b2bDataStore);
            cmb.getEditor().getStore().reload();

            this.mappingGrid.setStore(pimDataStore);
            this.mappingGrid.getStore().reload();
        }
    },
    
    showCustomTab: function() {
        if (this.comboMappingType.getValue()) {
            
            var url = '/admin/b2b_translation/getB2BData?vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var b2bDataStore = new Ext.data.Store({
                autoLoad:true,
                proxy: {
                    type: 'ajax',
                    url: url,
                    reader: {
                        type: 'json',
                        root: 'data'
                    }
                },
                totalProperty: 'num',
                fields: [
                        {name:'name', type: 'string'},
                        {name:'id', type: 'string'}
                ]
            });
            
            if(!Ext.ClassManager.isCreated('VendorData')){
                Ext.define('VendorData', {
                    extend: 'Ext.data.Model',
                    fields: [ {
                            name: 'name',
                            type: 'string'
                        }
                    ]
                });
            }
            
            var url = '/admin/b2b_translation/getPIMData?mappingId='+this.pimId+'&vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var pimDataStore = new Ext.data.Store({
                model: 'VendorData',
                autoLoad:true,
                proxy: {
                    type: 'ajax',
                    url: url,
                    reader: {
                        type: 'json',
                        root: 'data'
                    }
                },
                totalProperty: 'num',
                fields: [
                        {name:'name', type: 'string'},
                        {name:'id', type: 'string'},
                        {name:'b2bName', type: 'string'},
                ]
            });
            
            if (!this.mappingGrid) {
                this.mappingGrid = Ext.create('Ext.grid.Panel', {
                    store: pimDataStore,
                    width: 1000,
                    height: 600,

                    columns: [{
                        text: 'PIM Attribute Name',
                        dataIndex: 'name',
                        width: '50%',
                    }, {
                        text: 'B2B SalesForce Attribute Name',
                        dataIndex: 'b2bName',
                        width: '49.75%',
                        editor: {
                            xtype: 'combobox',
                            name:'comboB2BData',
                            // forceSelection: true,
                            store: b2bDataStore, //assigning the store
                            anyMatch: true,
                            // triggerAction: 'all',			
                            // typeAhead: true,
                            // typeAheadDelay: 100,
                            // minChars: 2,
                            queryMode: 'local',
                            displayField:'name',
                            valueField: 'id',
                            hiddenName: 'id'
                        },
                        renderer: function(value) {
                            if (value) {
                                var record = b2bDataStore.findRecord('id', value, 0, false, false, true);
                                if (record) {
                                    return record.data.name;
                                } else {
                                    if (this.allB2BData[value]) {
                                        return this.allB2BData[value];
                                    }
                                    return value;
                                } 
                            }
                        }.bind(this)
                    }],
                    plugins: {
                        ptype: 'cellediting',
                        clicksToEdit: 1

                    }
                })
            }

            this.gridFormPanel = Ext.create('Ext.form.Panel', {
                items:[this.mappingGrid],
                buttons: {
                    itemId: 'footer'
                }
            });
            
            return this.gridFormPanel;        
        }
    },
    getCustomConfigButton: function () {
        var footer = this.tab.getDockedComponent('footer');
        footer.removeAll();
        footer.add({
            text: t("save"),
            iconCls: "pimcore_icon_apply",
            handler: this.saveChannelMappingConfig.bind(this)
        });
    },

    tabactivated: function () {
        this.setupChangeDetector();
        this.tabdestroyed = false;
    },

    tabdestroy: function () {
        this.tabdestroyed = true;
    },

    onAdd: function (type) {
        this.showEntitySelectionDialog(type);
    },

    updateData: function (data, grid) {
    },

    save: function () {
        Ext.Ajax.request({
            url: "/admin/b2b_translation/mapping/save",
            params: {
                data: saveData,
                modificationDate: this.modificationDate
            },
            method: "post",
            success: function (response) {
                var rdata = Ext.decode(response.responseText);
                if (rdata && rdata.success) {
                    pimcore.helpers.showNotification(t("success"), t("Configuration save successfully"), "success");
                    this.modificationDate = rdata.modificationDate;
                    this.resetChanges();
                } else {
                    pimcore.helpers.showNotification(t("error"), t("Configuration save error"), "error", t(rdata.message));
                }
            }.bind(this)
        });
    }

});