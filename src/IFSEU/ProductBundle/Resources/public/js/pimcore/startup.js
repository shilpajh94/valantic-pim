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

        // object.edit.dataFields['DampableUntil1C'].component.setReadOnly(true);
        productLevel =this.productAjax('/IFSEU/product/get/level/info','POST',{ idPath: object.data.idPath });
        if(productLevel.level =='skeleton'){
            parms ={ levelName: 'base' };
            baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',parms);
            setTimeout(function(){
                // object.edit.dataFields['DampableUntil1C'].component.setReadOnly(true);
                for(baseAttribute  of baseAttributes.attributes ){
                    // console.log(object.edit.dataFields[baseAttribute],baseAttribute);
                    if(baseAttribute == 'localizedfields'){
                        object.edit.dataFields[baseAttribute].component.setDisabled(true);
                        console.log(object.edit.dataFields[baseAttribute],baseAttribute);
                    }
                    if(baseAttribute=='Base'){
                        object.edit.dataFields[baseAttribute].component.setDisabled(true)
                        console.log(object.edit.dataFields[baseAttribute].component.setDisabled(true),baseAttribute);
                    }
                }
                // object.edit.dataFields.Base.component.setdisabled(true)
                console.log(object.edit.layout.items.items[0]);
                // localizedfields.component.setDisabled(true)
            },30);
                
                console.log( object);
        }
        else if(productLevel.level =='fert'){
            attributes = this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: 'base' })
        }
        var tabPanell = object.edit.layout.items.items[0];
        tabPanell.on("tabchange", function (tabObject) {
            object.edit.dataFields.DampableUntil1C.component.setReadOnly(true);
            let tabName=tabObject.activeTab.config.name;
            let tabattributes=this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: tabName });
            if(tabObject.activeTab.config.name=='Skeleton'){
                
            }
            console.log(tabObject.activeTab.config.name);
            // alert(tabObject.activeTab);

        }.bind(this));
        innertabPanell = object.edit.layout.items.items[0].items.items[0];

        innertabPanell.on('tabchange',function (tabObject){alert()});
    },
    productAjax:function(url,method,parms,callback ){
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
});

var IFSEUProductBundlePlugin = new pimcore.plugin.IFSEUProductBundle();
