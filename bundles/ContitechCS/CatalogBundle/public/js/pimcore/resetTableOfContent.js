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

pimcore.registerNS("pimcore.plugin.lpe.resetTableOfContent");
pimcore.plugin.lpe.resetTableOfContent = Class.create({

    /**
     * constructor
     * @param docuemnt
     */
    initialize: function (doc) {
        this.doc = doc;
    },

    addResetContentButton: function(){
        let docToolbar = this.doc.toolbar;

        let resetButton = new Ext.Button({
            text: '<div class="pimcore_save_button">Reset Content</div>',
            scale: "medium",
            handler: this.resetContent.bind(this)
        });

        docToolbar.insert(16,resetButton);

    },

    resetContent: function(){

        Ext.Ajax.request({
            url: "/reset-table-of-content",
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