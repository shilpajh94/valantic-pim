pimcore.registerNS("pimcore.plugin.b2btranslation.configItem");
pimcore.plugin.b2btranslation.configItem = Class.create(pimcore.element.abstract, {
    
    initialize: function (data, pimId, parent, parentType) {
        this.parent = parent;
        this.parentType = parentType;
        this.pimId = pimId;
        this.data = data;
        this.mappingAttributeSetting = {};
        this.allAVBData = new Array();
        if (this.data.data.vendor && this.data.data.type) {
            Ext.Ajax.request({
                url: '/admin/b2b_translation/getAVBData?vendor='+this.data.data.vendor+'&type='+this.data.data.type,
                method: "get",
                async: false,
                success: function (response) {
                    var rdata = Ext.decode(response.responseText);
//                    this.allAVBData = rdata.data;
                    var avbData = [];
                    Ext.each(rdata.data, function(value) {
                        avbData[value.id] = value.name;
                    });
                    this.allAVBData = avbData;
                }.bind(this)
            });
//            console.log(this.allAVBData);
        }
        
        // this.modificationDate = data.modificationDate;
        // this.getFiltersConfig = new pimcore.plugin.distributionhub.tabs.filtersConfig(this.data, this.parentType);
        this.tab = new Ext.Panel({
//            activeTab: 0,
            title: this.data.general.o_key,
            closable: true,
            padding: '10px',

//            deferredRender: false,
            forceLayout: true,
            iconCls: "pimcore_icon_translations",
            id: "mapping_panel_" + this.data.general.o_id,
            buttons: {
                itemId: 'footer'
            },
            // layout: "border",
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
//            console.log(vendorValue);
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
        // if (typeof this.config.classId != "undefined" && !Ext.isEmpty(this.config.classId) && this.config.classId.length > 0 && this.langSelection.isValid()) {
            //pimcore.helpers.loadingShow();
            // this.commitData();
            var gridData = this.mappingGrid.getStore().data.items;
            var gridDataArray = [];
            Ext.each(gridData, function(value) {
                gridDataArray.push(value.data);
            });
//            console.log(gridDataArray);
            // var form = btn.up('form');
            // console.log(form);
            // var values = form.getValues();

            // Ext.state.Manager.set('formFieldValues', values); 
            
            // let mappingJson = Ext.encode(values);
            let saveData = {
                mappingId: this.pimId,
                gridData: JSON.stringify(gridDataArray),
                vendor: this.comboVendors.getValue(),
                type: this.comboMappingType.getValue()
            };
////            
            Ext.Ajax.request({
                url: "/admin/b2b_translation/update",
                params: saveData,
//                jsonData: gridData,
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
        // }
    },
    getGridPanel: function() {
        if (!this.gridPanel) {
            this.gridPanel = new Ext.Panel({
//                layout: "border",
                height:"100%",
                items: [this.showCustomTab()]

            });
        }
        return this.gridPanel;
    },
//    updateCreateGrid: function() {
//        
//    },
//    loadStoreData: function() {
//        if (this.comboMappingType.getValue() && this.comboMappingType.getValue()) {
//            Ext.Ajax.request({
//                url: "/admin/mapping-config/getDataToMap",
//                params: {
//                    vendor: this.comboVendors.getValue(),
//                    type: this.comboMappingType.getValue()
//                },
//                method: "get",
//                success: function (response) {
//                    var rdata = Ext.decode(response.responseText);
//                    this.vendorDataStore.setData(rdata.vendorData);
//                }.bind(this)
//            });
//        }
//    },
    updateGrid: function() {
        if (this.comboMappingType.getValue()) {
            var url = '/admin/b2b_translation/getAVBData?vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var avbDataStore = new Ext.data.Store({
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
            
            var url = '/admin/b2b_translation/getVendorData?mappingId='+this.pimId+'&vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var vendorDataStore = new Ext.data.Store({
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
                        {name:'avbName', type: 'string'}
                ]
            });
            
            this.mappingGrid.setStore(vendorDataStore);
            this.mappingGrid.getStore().reload();
        }
    },
    
    showCustomTab: function() {
        if (this.comboMappingType.getValue()) {
//            if(!Ext.ClassManager.isCreated('AVBData')){
//                Ext.define('AVBData', {
//                    extend: 'Ext.data.Model',
//                    fields: [ {
//                            name: 'avbName',
//                            type: 'string'
//                        }
//                    ]
//                });
//            }
            var url = '/admin/b2b_translation/getAVBData?vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var avbDataStore = new Ext.data.Store({
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
            
            var url = '/admin/b2b_translation/getVendorData?mappingId='+this.pimId+'&vendor='+this.comboVendors.getValue()+'&type='+this.comboMappingType.getValue();
            var vendorDataStore = new Ext.data.Store({
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
                        {name:'avbName', type: 'string'},
                ]
            });
            
            if (!this.mappingGrid) {
                this.mappingGrid = Ext.create('Ext.grid.Panel', {
                    store: vendorDataStore,
                    width: 1000,
                    height: 600,

                    columns: [{
                        text: 'PIM Attribute Name',
                        dataIndex: 'name',
                        width: '40%',
                    }, {
                        text: 'B2B SalesForce Attribute Name',
                        dataIndex: 'avbName',
                        width: '40%',
                        editor: {
                            xtype: 'combobox',
                            name:'cmbAVBData',
                            forceSelection: true,
                            store: avbDataStore, //assigning the store
                            triggerAction: 'all',			
        //                    editable:false,
                            typeAhead: true,
                            typeAheadDelay: 100,
                            minChars: 2,
                            queryMode: 'local',
                            displayField:'name',
                            valueField: 'id',
                            hiddenName: 'id'
                        },
                        renderer: function(value) {
                            if (value) {
                                var record = avbDataStore.findRecord('id', value, 0, false, false, true);
                                if (record) {
                                    return record.data.name;
                                } else {
                                    if (this.allAVBData[value]) {
                                        return this.allAVBData[value];
                                    }
                                    return value;
                                } 
//                                
                            }
                        }.bind(this)
                    }],
                    plugins: {
                        ptype: 'cellediting',
                        clicksToEdit: 1

                    }
                })
            }
//            if (this.data.data.gridData) {
//                var models = this.mappingGrid.getStore();
//                console.log(models); 
////                models[0].set(fieldName, "new value");
//            }
            this.gridFormPanel = Ext.create('Ext.form.Panel', {
                //title: 'Mapping ' + this.pimId,
                // width: '100%',
                items:[this.mappingGrid],
                buttons: {
                    itemId: 'footer'
                }
            });
            
            return this.gridFormPanel;
//        console.log(this.data.vendors);
        // The data store containing the list of states
        
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