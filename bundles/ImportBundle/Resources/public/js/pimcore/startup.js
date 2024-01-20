pimcore.registerNS("pimcore.plugin.ImportBundle");

pimcore.plugin.ImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ImportBundle ready!");
    },

    postSaveObject: function (object) {
        if (object.data.general.o_className == "Product") {
            var tabPanel = object.edit.layout.items.items[0].items.items[0].items.items[0];
            if(tabPanel.getActiveTab().title == "Spec Sheet Export"){
                tabPanel.setActiveTab(0);

                var colComp = Ext.getCmp(object.edit.dataFields.Columns.component.id);
                colComp.hide();
    
                let csheaderSelection = new pimcore.plugin.csheaderSelection();
                csheaderSelection.attachCSHeaders(object);    
            }
            console.log(tabPanel.getActiveTab().title);
        }
    },

    postOpenObject: function (object, type) {
        var tabPanell = object.edit.layout.items.items[0].items.items[0].items.items[0];
        tabPanell.on("tabchange", function (tabObject) {
            let tabName = tabObject.activeTab.config.name.toLowerCase();
            if (tabName == 'spec sheet export') {
                if(Object.keys(object.edit.dataFields).length === 0){
                    // console.log(typeof(object.edit.dataFields));    
                }
                else{  
                    if (object.data.general.o_className == 'Product') {
                        var colComp = Ext.getCmp(object.edit.dataFields.Columns.component.id);
                        colComp.hide();

                        let csheaderSelection = new pimcore.plugin.csheaderSelection();
                        csheaderSelection.attachCSHeaders(object);
            
                        var objectId = object.id;
                        var productBrandStore = Ext.create('Ext.data.Store', {
                            fields: ['id', 'text'],
                            proxy: {
                                type: 'ajax',
                                url: '/contitech_us_product/default/get_ferts_brand',
                                method:'POST',
                                extraParams: {
                                    objectId: objectId,
                                },
                                reader: {
                                    type: 'json',
                                    rootProperty: 'data'
                                }
                            },
                        });
                        
                        productBrandStore.load();

                        object.edit.dataFields.selectBrandName.component.setStore(productBrandStore);
                        if (object.data.data.selectBrandName !== null)
                        {
                        object.edit.dataFields.selectBrandName.component.setValue(object.data.data.selectBrandName);
                        }
                        productBrandStore.load();

                        if (object.edit.dataFields.selectBrandName.data !== null && object.edit.dataFields.sapRange.data !== null) {
                            if(object.edit.dataFields.sapRange.data == 'CustomSelection'){
                                if(Ext.getCmp('exportbtn')){
                                    Ext.getCmp('exportbtn').hide();
                                }
                                this.showGrid(object, tabObject, object.id, object.edit.dataFields.sapRange.data, object.edit.dataFields.selectBrandName.data.split(","));
                                Ext.getCmp('dataGrid').hide(false);
                                Ext.getCmp('dataGrid').show();

                            }else if(object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                                if(Ext.getCmp('dataGrid')){
                                    Ext.getCmp('dataGrid').hide();
                                }
                                if(Ext.getCmp('exportbtn')){
                                    Ext.getCmp('exportbtn').hide();
                                }
                                this.listAllFerts(object, tabObject, object.id, object.edit.dataFields.sapRange.data, object.edit.dataFields.selectBrandName.data.split(","));
                                Ext.getCmp('exportbtn').hide(false);
                                Ext.getCmp('exportbtn').show();
                            }    
                        }

                        object.edit.dataFields.sapRange.component.on('select', function (s){
                            if(object.edit.dataFields.selectBrandName.data){
                                this.sapRangeData = s.getValue();
                                if(this.sapRangeData == 'CustomSelection'){
                                    this.showGrid(object, tabObject, object.id, s.getValue(), object.edit.dataFields.selectBrandName.data.split(",") );
                                    Ext.getCmp('dataGrid').hide(false);
                                    Ext.getCmp('dataGrid').show();
                                    if(Ext.getCmp('exportbtn')){
                                        Ext.getCmp('exportbtn').hide();
                                    }
                                }else if(this.sapRangeData == 'PrintedCatalog'){
                                    if(Ext.getCmp('exportbtn')){
                                        Ext.getCmp('exportbtn').hide();
                                    }
                                    if(Ext.getCmp('dataGrid')){
                                        Ext.getCmp('dataGrid').hide();
                                    }
                                    this.listAllFerts(object, tabObject, object.id, s.getValue(), object.edit.dataFields.selectBrandName.data.split(",") );
                                }
                            }
        
                        }.bind(this));

                        object.edit.dataFields.selectBrandName.component.on('select', function (e) {
                            if(object.edit.dataFields.sapRange.data == 'CustomSelection' && e.getValue()){
                                this.brandName = e.getValue();
                                this.showGrid(object, tabObject, object.id, object.edit.dataFields.sapRange.data, e.getValue());
                            }else if(object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                                if(Ext.getCmp('exportbtn')){
                                    Ext.getCmp('exportbtn').hide();
                                }
                                if(Ext.getCmp('dataGrid')){
                                    Ext.getCmp('dataGrid').hide();
                                }
                                this.listAllFerts(object, tabObject, object.id, object.edit.dataFields.sapRange.data, e.getValue());
                            }
                        }.bind(this));

                        object.edit.dataFields.selectBrandName.component.on('select', function (e) {
                            if(this.sapRangeData == 'CustomSelection' && e.getValue()){
                                this.brandName = e.getValue();
                                this.showGrid(object, tabObject, object.id, this.sapRangeData, e.getValue());
                            }else if(this.sapRangeData == 'PrintedCatalog'){
                                if(Ext.getCmp('exportbtn')){
                                    Ext.getCmp('exportbtn').hide();
                                }
                                if(Ext.getCmp('dataGrid')){
                                    Ext.getCmp('dataGrid').hide();
                                }
                                this.listAllFerts(object, tabObject, object.id, this.sapRangeData, e.getValue());
                            }
                            object.edit.dataFields.sapRange.component.on('select', function (s){
                                this.sapRangeData = s.getValue();
                                if(this.sapRangeData == 'CustomSelection'){
                                    this.showGrid(object, tabObject, object.id, s.getValue(), e.getValue());
                                    Ext.getCmp('dataGrid').hide(false);
                                    Ext.getCmp('dataGrid').show();
                                    if(Ext.getCmp('exportbtn')){
                                        Ext.getCmp('exportbtn').hide();
                                    }
                                }else if(this.sapRangeData == 'PrintedCatalog'){
                                    if(Ext.getCmp('exportbtn')){
                                        Ext.getCmp('exportbtn').hide();
                                    }
                                    if(Ext.getCmp('dataGrid')){
                                        Ext.getCmp('dataGrid').hide();
                                    }
                                    this.listAllFerts(object, tabObject, object.id, s.getValue(), e.getValue());
                                }
                            }.bind(this));
                        }.bind(this));
                    }
                }
            }
        }.bind(this));
    },

    showGrid: function (object,tabObject, objectId, sapRange, brandName) {
        this.store = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_us_product/default/get_grid_ferts',
                method: 'POST',
                extraParams: {
                    objectId: objectId,
                    sapRange: sapRange,
                    brandName: JSON.stringify(brandName),
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "articleNumber", "sapDescription", "SIOPLevel3", "SIOPLevel4", "published"],
        });
        this.store.load();

        this.grid = Ext.create('Ext.grid.Panel', {
            title: 'Data',
            store: this.store,
            id: 'dataGrid',            
            columns: [{
                text: 'Id',
                dataIndex: 'id',
                width: 100,
                filter: {
                    type: 'string'
                }
            }, 
            {
                text: 'Sap Number',
                dataIndex: 'articleNumber',
                width: 100,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'Sap Description',
                dataIndex: 'sapDescription',
                width: 275,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'SIOPLevel3',
                dataIndex: 'SIOPLevel3',
                width: 171,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'SIOPLevel4',
                dataIndex: 'SIOPLevel4',
                width: 200,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'Published',
                dataIndex: 'published',
                width: 120,
                filter: {
                    type: 'string'
                }
            },
            ],
            plugins: 'gridfilters',
            height: 350,
            width: 1000,
            renderTo: Ext.getBody(),
            selModel: {
                checkOnly: false,
                mode: 'SIMPLE'
            },
            selType: 'checkboxmodel',
            buttons: [{
                text: 'Select All',
                handler: function () {
                    Ext.getCmp('dataGrid').getSelectionModel().selectAll();
                }
            }, {
                text: 'Deselect All',
                handler: function () {
                    Ext.getCmp('dataGrid').getSelectionModel().deselectAll();
                }
            },{
                text:'Export Selected Record',
                handler:function(){
                    var selection = Ext.getCmp('dataGrid').getSelection();
                    var fieldArray = new Array();
                    for(let i in selection){
                        fieldArray.push((selection[i].data.articleNumber))
                    }
                    if(selection.length){
                        var selectFertForExportListArr = JSON.parse("[" + fieldArray.join() + "]");
                        var records = [];
                        var store  = Ext.create('Ext.data.Store',{
                            fields : ['articleNumber'],
                            data: records,
                            paging : false
                        });       
                        Ext.Ajax.request({
                            url : '/contitech_us_product/default/get_selected_ferts',
                            params : {
                                objectId: objectId,
                                articleNumber: JSON.stringify(selectFertForExportListArr),
                            },
                            success : function(r){
                                var res = Ext.decode(r.responseText);
                                var assetIdWithInvertedComma = res.data;
                                assetId = assetIdWithInvertedComma.replace(/['"]+/g, ''); 
                                if (assetId) {
                                    pimcore.helpers.download("/admin/asset/download?id=" +assetId);
                                }
                            },
                        });
                    }
                },
            },
        ],
        });
        tabObject.activeTab.add(this.grid);
    },

    listAllFerts: function (object,tabObject, objectId, sapRange, brandName) {
        let btn = Ext.create('Ext.Button', {
            text: 'Export Data',
            tooltip: 'Spec Sheet Export',
            id: 'exportbtn',
            style : "margin-top :10px; margin-left : 635px; background-color: #555555; border: none; border-radius: 5px;",
            handler: function() {
                var records = [];
                var store  = Ext.create('Ext.data.Store',{
                    data: records,
                    paging : false
                }); 
                Ext.Ajax.request({
                    url : '/contitech_us_product/default/get_fert_for_export',
                    params : {
                        objectId: objectId,
                    },
                    success : function(r){
                        var res = Ext.decode(r.responseText);
                        var assetIdWithInvertedComma = res.data;
                        assetId = assetIdWithInvertedComma.replace(/['"]+/g, '');                    
                        if (assetId) {
                            pimcore.helpers.download("/admin/asset/download?id=" +assetId);
                        }
                    },
                });
            }
        });
       tabObject.activeTab.add(btn);
    },   
});

var ImportBundlePlugin = new pimcore.plugin.ImportBundle();
