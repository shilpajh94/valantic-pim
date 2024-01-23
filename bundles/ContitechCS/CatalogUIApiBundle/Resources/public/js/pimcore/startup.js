document.addEventListener(pimcore.events.postOpenDocument, (e) => {
    console.log('pimcore.plugin.CatalogUIApiBundle postOpenDocument')
    let parentFolderPath    = getFolderPath();
    let docPath             = e.detail.document.data.path;
    let docType             = e.detail.document.data.type;

    if(docType == "printcontainer" && docPath.startsWith(parentFolderPath)){
        let printPageObject = new pimcore.plugin.lpe.printPage(e.detail.document);
        printPageObject.addPublishPdfButton();
    }

    e.preventDefault();
    e.stopPropagation();
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