pimcore.registerNS("pimcore.plugin.CatalogUIApiBundle");

pimcore.plugin.CatalogUIApiBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.CatalogUIApiBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.postOpenDocument, this.postOpenDocument.bind(this));
    },

    postOpenDocument: function(e){

        let parentFolderPath    = getFolderPath();
        let docPath             = e.detail.document.data.path;
    	let docType             = e.detail.document.data.type;

        if(docType == "printcontainer" && docPath.startsWith(parentFolderPath)){
            let printPageObject = new pimcore.plugin.csUiApi.printPage(e.detail.document);
            console.log(printPageObject);
            printPageObject.addPublishPdfButton();
        }
    }
});

var CatalogUIApiBundlePlugin = new pimcore.plugin.CatalogUIApiBundle();


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

            if(response.success == true)
            {
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