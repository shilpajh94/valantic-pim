pimcore.registerNS("pimcore.plugin.CatalogUIApiBundle");

pimcore.plugin.CatalogUIApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CatalogUIApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     //alert("CatalogUIApiBundle ready!");
    // },
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.CatalogUIApiBundle::pimcoreReady'));
    },
    postOpenDocument: function(doc,type){

        let parentFolderPath    = getFolderPath();
        let docPath             = doc.data.path;
        let docType             = doc.data.type;

        if(docType == "printcontainer" && docPath.startsWith(parentFolderPath)){
            let printPageObject = new pimcore.plugin.lpe.printPage(doc);
            printPageObject.addPublishPdfButton();
        }
    }
});

//var CatalogUIApiBundlePlugin = new pimcore.plugin.CatalogUIApiBundle();
document.addEventListener('pimcore.plugin.CatalogUIApiBundle::pimcoreReady', function (event) {
    // For instance: alert("ImportBundle ready!");
});


function getFolderPath()
{
    var folderPath = '';
    Ext.Ajax.request({
        url: "/modular-catalogs-folder-path",
        params: {},
        async:false,
        success: function (response)
        {
            response = Ext.decode(response.responseText);
            console.log(response);

            if(response.success == true)
            {
                let msg = response.msg;
                folderPath = response.path;
            }
            else if(response.success == false)
            {
                let msg = response.msg;
                Ext.MessageBox.alert(t("Info"),msg);
            }

        }.bind(this)
    });
    return folderPath;
}