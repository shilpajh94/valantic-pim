pimcore.registerNS("pimcore.plugin.IFSEUProductBundle");

pimcore.plugin.IFSEUProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.IFSEUProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("IFSEUProductBundle ready!");
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
                this.disableAttributes(object,baseAttributes,addMaskForClasses);
                this.disableAttributes(object,skeletonAttributes);
            }
            var tabPanell = object.edit.layout.items.items[0];
            tabPanell.on("tabchange", function (tabObject) {
                let tabName =tabObject.activeTab.config.name.toLowerCase();
                if(productLevel.level =='fert'){
                    baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
                    baseAttributes.attributes.push('Skeleton');
                    this.disableAttributes(object,baseAttributes,addMaskForClasses);
                    
                }
    
            }.bind(this));
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

        // class attributes take some time  to load so we use timeout function
        setTimeout(function(){

            if(hideTabClassNames !== null){
                if(attributes.level=='base'){
                    hideTabClassNames.forEach((hideTabClassName)=>{
                        Ext.select(hideTabClassName).removeCls('x-mask');
                    })
                }else{
                    hideTabClassNames.forEach((hideTabClassName)=>{
                        Ext.select(hideTabClassName).addCls('x-mask');
                    })
                }
               
            }
            for(attribute  of attributes.attributes ){
                object.edit.dataFields[attribute].component.setDisabled(true);
                if(attribute == 'localizedfields'){
                    object.edit.dataFields[attribute].component.setDisabled(true);
                }
                if(attribute=='Base'){
                    object.edit.dataFields[attribute].component.setDisabled(true)
                }
            }
        },10);
    }
});

var IFSEUProductBundlePlugin = new pimcore.plugin.IFSEUProductBundle();
