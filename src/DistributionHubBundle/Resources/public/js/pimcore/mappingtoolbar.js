/**
 * 
 * @class mappingtoolbar
 * @desc This file is used to create new panel for Mapping Screen
 * @version 1.0
 *
 */


pimcore.registerNS("pimcore.plugin.mappingtoolbar");

pimcore.plugin.mappingtoolbar = Class.create({
    
    /*
     * @constructor
     */
    initialize: function () {
        
    },
    
    showDataConnector: function () {
        if (!Ext.getCmp("distdataconnector")) {
            var dataCon = new pimcore.plugin.distdataconnection();
        } else {
            Ext.getCmp("pimcore_panel_tabs").setActiveItem("distdataconnector");
        }
    }

});

var mappingToolbar = new pimcore.plugin.mappingtoolbar();
