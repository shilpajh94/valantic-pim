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
        this.productAjax('/IFSEU/product/get/level/info','POST',{ idPath: object.data.idPath });
        var tabPanell = object.edit.layout.items.items[0];
        console.log(object ,object.data.childdata.data.general.o_key);
        // console.log(object.dependencies.element.data);
        tabPanell.on("tabchange", function (tabObject) {
            object.edit.dataFields.DampableUntil1C.component.setReadOnly(true);
            let tabName=tabObject.activeTab.config.name;
            let tabattributes=this.productAjax('/IFSEU/product/get/level/attributes','POST',{ levelName: tabName });
            if(tabObject.activeTab.config.name=='Skeleton'){
                
            }
            console.log(tabObject.activeTab.config.name);
            // alert(tabObject.activeTab);

        }.bind(this));
        
    },
    productAjax:function(url,method,parms ){
        Ext.Ajax.request({
            url: url,
            method: method,
            timeout: 60000,
            dataType: "json",
            params: parms,
            success: function (response) {

                let resp = JSON.parse(response.responseText);
                    
                if (resp.success) {
                    console.log(resp);
                } else {
                    pimcore.helpers.showNotification(
                        "Error Occured !!",
                        resp.msg,
                        "Error"
                    );
                }
            },
            failure: function () {
                console.log('failure');
            }
        });

    },
    getLevelInfo: function(path){

    }
});

var IFSEUProductBundlePlugin = new pimcore.plugin.IFSEUProductBundle();
