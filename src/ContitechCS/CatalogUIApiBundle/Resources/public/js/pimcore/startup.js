pimcore.registerNS("pimcore.plugin.CatalogUIApiBundle");

pimcore.plugin.CatalogUIApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CatalogUIApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        //alert("CatalogUIApiBundle ready!");
    },
    postOpenDocument: function(doc,type){

        let parentFolderPath = "/ConveyorBeltSolutions/ModularCatalogs/";

        let docPath = doc.data.path;
        let docType = doc.data.type;

        if(docType == "printcontainer" && docPath.startsWith(parentFolderPath)){
            let printPageObject = new pimcore.plugin.lpe.printPage(doc);
            printPageObject.addPublishPdfButton();
        }
    }
});

var CatalogUIApiBundlePlugin = new pimcore.plugin.CatalogUIApiBundle();


function getFolderPath()
{
    return "test";
}