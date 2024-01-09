pimcore.registerNS("pimcore.plugin.IFSEUProductBundle");

pimcore.plugin.IFSEUProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.IFSEUProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("IFSEUProductBundle ready!");
    // },
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.IFSEUProductBundle::pimcoreReady'));
    },
    postOpenObject: function (object, type) {

        // object.data.layout.childs[0].childs // all tab panel name
        //object.edit.dataFields // showing rendred edit fields of current tab
        // object.data.data // showing  all editable fields
        //object.general.o_parentId // parend id
        // object.edit.layout.query('[name=Fert]') //get tab by name
        //object ,object.data.childdata.data.general.o_key //tab name
        // object.dependencies.element.data //all field
         //Ext.getCmp('productBrandName');//Ext.select('.highcharts-container');

        addMaskForClasses=['.objectlayout_element_hoseBaseData','.objectlayout_element_Temperatures'];
        var tabPanell = object.edit.layout.items.items[0];
        if(object.data.general.o_className=="IFSEUProduct"){
            productLevel =this.productAjax('/IFSEU/product/get/level/info','POST',{ idPath: object.data.idPath });
            if(productLevel.level =='skeleton'){
                parms ={ levelName: 'base' };
                baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',parms);
                this.disableAttributes(object,baseAttributes,addMaskForClasses);
            }
            if(productLevel.level =='fert'){
                baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
                skeletonAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
                baseAttributes.attributes.push('Skeleton');
                this.disableAttributes(object,baseAttributes,addMaskForClasses);
                this.disableAttributes(object,skeletonAttributes,addMaskForClasses);
            }
            tabPanell.on("tabchange", function (tabObject) {
                productLevel =this.productAjax('/IFSEU/product/get/level/info','POST',{ idPath: object.data.idPath });
                //console.log(productLevel.level)
                let tabName =tabObject.activeTab.config.name.toLowerCase();
                if(productLevel.level =='fert'){
                    baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
                    baseAttributes.attributes.push('Skeleton');
                     this.disableAttributes(object,baseAttributes,addMaskForClasses);
                    
                }
                if(productLevel.level =='skeleton'){
                    baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
                    this.disableAttributes(object,baseAttributes,addMaskForClasses);
                }
    
            }.bind(this));
            setTimeout(function(){
                if(productLevel.level =='skeleton'){
                    tabPanell.setActiveTab(1);
                }
                if(productLevel.level =='fert'){
                    tabPanell.setActiveTab(2);
                }
            },1000);
        }
        
    },
    postSaveObject: function(object){
        // reload product on save
        if(object.data.general.o_className =="IFSEUProduct"){
            setTimeout(function(){
            object.reload();
            },100);
        }
    },
    productAjax:function(url,method,parms ){
        var resp ='';
        Ext.Ajax.request({
            url: url,
            method: method,
            timeout: 60000,
            dataType: "json",
            async: false,
            params: parms,
            success: function (response) {
                var data = Ext.decode(response.responseText);
                if (data.success) {
                    resp = data;
                } else {
                    pimcore.helpers.showNotification(
                        "Error Occured !!",
                        data.msg,
                        "Error"
                    );
                }
            }.bind(this),
        });
        return resp;
    },
    disableAttributes:function(object,attributes,hideTabClassNames=null){
        //console.log(hideTabClassNames);
        // class attributes take some time  to load so we use timeout function
        setTimeout(function(){
            for(attribute  of attributes.attributes ){
                //console.log(attribute);
                object.edit.dataFields[attribute].component.setDisabled(true);
                if(attribute == 'localizedfields'){
                    let panelId=object.edit.dataFields[attribute].tabPanel.body.component.id;
                    let PanelBodyId=panelId+'-body';
                    Ext.get(PanelBodyId).setStyle('pointer-events', 'none');
                    object.edit.dataFields[attribute].component.setDisabled(false);
                    //object.edit.dataFields[attribute].tabPanel.body.component.setDisabled(true);
                }
                if(attribute=='Base'){
                    let panelBaseId=object.edit.dataFields[attribute].component.id;
                    Ext.get(panelBaseId).setStyle('pointer-events', 'none');
                    //console.log(object.edit.dataFields[attribute].component.id);
                    object.edit.dataFields[attribute].component.setDisabled(false);
                }
                if(attribute=='Skeleton'){
                    let panelBaseId=object.edit.dataFields[attribute].component.id;
                    Ext.get(panelBaseId).setStyle('pointer-events', 'none');
                    //console.log(object.edit.dataFields[attribute].component.id);
                    object.edit.dataFields[attribute].component.setDisabled(false);
                }
            }
        },200);
    }
});

//var IFSEUProductBundlePlugin = new pimcore.plugin.IFSEUProductBundle();
document.addEventListener('pimcore.plugin.IFSEUProductBundle::pimcoreReady', function (event) {
    // For instance: alert("IFSEUProductBundle ready!");
});
