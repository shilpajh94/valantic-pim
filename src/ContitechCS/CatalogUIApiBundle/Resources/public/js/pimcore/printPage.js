/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

pimcore.registerNS("pimcore.plugin.lpe.printPage");
pimcore.plugin.lpe.printPage = Class.create({

    /**
     * constructor
     * @param docuemnt
     */
    initialize: function (doc) {
        this.doc = doc;
    },

    addPublishPdfButton: function(){

        let docToolbar = this.doc.toolbar;

        let publishPdfButton = new Ext.Button({
            text: '<div class="pimcore_save_button">Save PDF</div>',
            scale: "medium",
            handler: this.publishPdf.bind(this)
        });

        docToolbar.insert(16,publishPdfButton);

    },

    publishPdf: function(){

        /* var myMask = new Ext.LoadMask(Ext.getBody(), {msg:"Please wait..."});
        myMask.show();
        var window = Ext.create('Ext.window.Window', {
            title: 'Hello',
            height: 200,
            width: 400
        });
        setTimeout(function() {
            window.show();
            myMask.hide();
        }, 3000);

        return false; */ 


        /* var myMask = new Ext.LoadMask(Ext.getBody(), {msg:"Please wait..."});

        myMask.unMask(); */
    

        Ext.Ajax.request({
            url: "/move-container-pdf-to-assets",
            params: {
                docId: this.doc.id
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);

                if (response.success == true) {

                    let msg = response.msg;
                    pimcore.helpers.showNotification(t("Success"), msg);

                }else if(response.success == false){
                    let msg = response.msg;
                    Ext.MessageBox.alert(t("Info"),msg);
                }

            }.bind(this)
        })
    }
});