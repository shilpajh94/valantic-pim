/**
 * Pimcore
 *
 * This source file is available under two different licenses: - GNU General
 * Public License version 3 (GPLv3) - Pimcore Enterprise License (PEL) Full
 * copyright and license information is available in LICENSE.md which is
 * distributed with this source code.
 *
 * @copyright Copyright (c) 2009-2016 pimcore GmbH ( http://www.pimcore.org)
 * @license http://www.pimcore.org/license GPLv3 and PEL
 *
 * @desc This file is used for Mapping list panel
 *
 */

pimcore.registerNS("pimcore.plugin.mappanel");

pimcore.plugin.mappanel = Class.create({
    initialize: function () {

    },
    // Opens Mapping tab panel
    getTabPanel: function () {

        if (!this.panel) {
            this.panel = new Ext.Panel({
                border: false,
                layout: "border",
                items: [this.getTree(), this.getEditPanel()]
            });
            pimcore.layout.refresh();
        }

        return this.panel;
    },
    // Lists Mapping Objects
    getTree: function () {

        if (!this.tree) {
            var store = Ext.create('Ext.data.TreeStore', {
                autoLoad: false,
                autoSync: true,
                proxy: {
                    type: 'ajax',
                    url: '/admin/DistributionHub/mapping/tree',
                    reader: {
                        type: 'json'
                    }
                },
                root: {
                    iconCls: "pimcore_icon_thumbnails"
                }
            });

            this.tree = new Ext.tree.TreePanel({
                id: "distribution_hub_tree",
                store: store,
                region: "west",
                autoScroll: true,
                animate: false,
                containerScroll: true,
                width: 250,
                split: true,
                root: {
                    id: '0',
                    expanded: true
                },
                rootVisible: false,
                listeners: this.getTreeNodeListeners(),
                tbar: {
                    items: [{
                            text: 'Add Column Mapping',
                            iconCls: "plugin_data_mapping_list",
                            handler: this.addField.bind(this)
                        }]
                }
            });
            this.tree.on("render", function () {
                this.getRootNode().expand();
            });
        }

        return this.tree;
    },
    // Open Mapping objects edit panel
    getEditPanel: function () {
        if (!this.editPanel) {
            this.editPanel = new Ext.TabPanel({
                region: "center",
                plugins: ['tabclosemenu']
            });
        }

        return this.editPanel;
    },
    // Mapping event listeners
    getTreeNodeListeners: function () {
        var treeNodeListeners = {
            'itemclick': this.onTreeNodeClick.bind(this),
            "itemcontextmenu": this.onTreeNodeContextmenu.bind(this),
            'beforeitemappend': function (thisNode, newChildNode,
                    index, eOpts) {
                newChildNode.data.leaf = true;
                newChildNode.data.expaned = true;
                newChildNode.data.iconCls = "pimcore_icon_sql";
            }
        };
        return treeNodeListeners;
    },
    // Opens Mapping Object
    onTreeNodeClick: function (tree, record, item, index, e, eOpts) {
        var tree = Ext.getCmp("pimcore_panel_tree_objects");
        this.openConfig(record.data.id);
    },
    // Opens Mapping configuration
    openConfig: function (id) {
        var existingPanel = Ext.getCmp("mapping_" + id);
        // Activates already existing panel
        if (existingPanel) {
            this.editPanel.setActiveTab(existingPanel);
            return;
        }

        Ext.Ajax.request({
            url: "/admin/DistributionHub/mapping/get-channel-detail",
            params: {
                id: id
            },
            success: function (response) {
                var data = Ext.decode(response.responseText);
                if (data.success) {
                    var fieldPanel = new pimcore.plugin.mapitem(data, this);
                } else {
                    pimcore.helpers.showNotification('Error',
                            'Error while getting info.',
                            'error');
                    this.tree.getStore().load({
                        node: this.tree.getRootNode()
                    });
                }
                pimcore.layout.refresh();
            }.bind(this)
        });
    },
    // Creates an option to delete Mapping object
    onTreeNodeContextmenu: function (tree, record, item, index, e, eOpts) {
        e.stopEvent();
        tree.select();
        var menu = new Ext.menu.Menu();
        menu.add(new Ext.menu.Item({
            text: t('delete'),
            iconCls: "pimcore_icon_delete",
            handler: this.deleteField.bind(this, tree, record)
        }));
        menu.add(new Ext.menu.Item({
            text: "Duplicate",
            iconCls: "pimcore_icon_clone",
            handler: this.pasteInfo.bind(this, tree, record, "child")
        }));
        menu.add(new Ext.menu.Item({
            text: t('rename'),
            iconCls: "pimcore_icon_key pimcore_icon_overlay_go",
            handler: this.editObjectKey.bind(this, tree, record)
        }));

        menu.showAt(e.pageX, e.pageY);
    },
    // Creates prompt box for adding new Mapping object
    addField: function () {
        Ext.MessageBox.prompt(
                'Mapping',
                'Please add mapping name',
                this.addFieldComplete.bind(this), null, null, "");
    },
    // Adds new Mapping Object
    addFieldComplete: function (button, value, object) {

        // Validation on Mapping name
        var regresult = value.match(/[a-zA-Z0-9_\-]+/);
        if (button == "ok" && value.length > 2 && regresult == value) {

            var codes = this.tree.getRootNode().childNodes;
            for (var i = 0; i < codes.length; i++) {
                if (codes[i].text == value) {
                    Ext.MessageBox.alert('add_conector_title', 'Mapping key already exists');
                    return;
                }
            }
            Ext.Ajax.request({
                url: "/admin/DistributionHub/mapping/add",
                params: {
                    name: value
                },
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    this.tree.getStore().load({
                        node: this.tree.getRootNode()
                    });
                    if (data.success == false) {
                        Ext.Msg.alert(t('error'), "Mapping already Exists");
                    } else if (data.conn == false) {
                        Ext.Msg.alert(t('error'), "Mapping already Exists");
                    } else {
                        this.openConfig(data.id);
                    }
                }.bind(this)
            });
        } else if (button == "cancel") {
            return;
        } else {
            Ext.Msg.alert(t('error'),
                    t('connector_add_error'));
        }
    },
    // Deletes Mapping object
    deleteField: function (tree, record) {
        Ext.Ajax.request({
            url: "/admin/DistributionHub/mapping/delete",
            params: {
                name: record.data.id
            }
        });
        this.getEditPanel().removeAll();
        record.remove();
    },
    // Copy already existing Mapping object
    /*
     copy: function (tree, record) {
     pimcore.cachedMappingId = record.data.id;
     console.log(record.data.id);
     },
     */
    // Duplicate a Mapping Object
    pasteInfo: function (tree, record, type) {
        pimcore.cachedMappingId = record.data.id;
        var targetFolderId = null;
        Ext.Ajax.request({
            url: "/admin/DistributionHub/mapping/get-mapping-folder-id",
            success: function (response) {
                var response = Ext.decode(response.responseText);
                if (response.success) {
                    targetFolderId = response.mappingFolderId;
                    pimcore.helpers.addTreeNodeLoadingIndicator("object", record.data.id);
                    Ext.Ajax.request({
                        url: "/admin/DistributionHub/mapping/copy-info",
                        params: {
                            targetId: targetFolderId,
                            sourceId: pimcore.cachedMappingId,
                            type: type
                        },
                        success: this.paste.bind(this, tree, record)
                    });
                } else {
                    var msg = response.msg;
                    Ext.MessageBox.alert('Error', msg);
                }
            }.bind(this)
        });

    },
    paste: function (tree, record, response) {

        try {
            var res = Ext.decode(response.responseText);

            if (res.pastejobs) {

                record.pasteProgressBar = new Ext.ProgressBar({
                    text: t('initializing')
                });
                record.pasteWindow = new Ext.Window({
                    title: t("paste"),
                    layout: 'fit',
                    width: 500,
                    bodyStyle: "padding: 10px;",
                    closable: false,
                    plain: true,
                    modal: true,
                    items: [record.pasteProgressBar]
                });
                record.pasteWindow.show();
                var pj = new pimcore.tool.paralleljobs({
                    success: function () {

                        try {
                            this.pasteComplete(tree, record);
                        } catch (e) {
                            console.log(e);
                            pimcore.helpers.showNotification(t("error"), t("error_pasting_object"), "error");
                            pimcore.elementservice.refreshNodeAllTrees("object", record.id);
                        }
                    }.bind(this),
                    update: function (currentStep, steps, percent) {
                        if (record.pasteProgressBar) {
                            var status = currentStep / steps;
                            record.pasteProgressBar.updateProgress(status, percent + "%");
                        }
                    }.bind(this),
                    failure: function (message) {
                        record.pasteWindow.close();
                        record.pasteProgressBar = null;
                        pimcore.helpers.showNotification(t("error"), t("error_pasting_object"), "error", t(message));
                        pimcore.elementservice.refreshNodeAllTrees("object", record.parentNode.id);
                    }.bind(this),
                    jobs: res.pastejobs
                });
            } else {
                throw "There are no pasting jobs";
            }
        } catch (e) {
            console.log(e);
            Ext.MessageBox.alert(t('error'), e);
            this.pasteComplete(tree, record);
        }
    },
    pasteComplete: function (tree, record) {
        if (record.pasteWindow) {
            record.pasteWindow.close();
        }

        record.pasteProgressBar = null;
        record.pasteWindow = null;
        //this.tree.loadMask.hide();
        pimcore.helpers.removeTreeNodeLoadingIndicator("object", record.id);
        pimcore.elementservice.refreshNodeAllTrees("object", record.id);
        this.tree.getStore().load();
    },
    editObjectKey: function (tree, record) {
        var options = {
            sourceTree: tree,
            elementType: "object",
            elementSubType: record.data.type,
            id: record.data.id,
            default: record.data.text
        };
        this.editElementKey(options);
    },
    editElementKey: function (options) {
        if (options.elementType == "asset") {
            completeCallback = pimcore.elementservice.editAssetKeyComplete.bind(this, options);
        } else if (options.elementType == "document") {
            completeCallback = pimcore.elementservice.editDocumentKeyComplete.bind(this, options);
        } else if (options.elementType == "object") {
            completeCallback = this.editObjectKeyComplete.bind(this, options);
        } else {
            throw new Error("type " + options.elementType + " not supported!");
        }

        Ext.MessageBox.prompt(t('rename'), t('please_enter_the_new_name'), completeCallback, window, false, options.default);
    },
    editObjectKeyComplete: function (options, button, value, object) {
        if (button == "ok") {

            var record;
            var id = options.id;
            var elementType = options.elementType;
            value = pimcore.helpers.getValidFilename(value, "object");

            if (options.sourceTree) {
                var tree = options.sourceTree;
                var store = tree.getStore();
                record = store.getById(id);
                if (pimcore.elementservice.isKeyExistingInLevel(record.parentNode, value, record)) {
                    return;
                }
            }

            var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
            if (affectedNodes) {
                record = affectedNodes[0];
                if (record) {
                    originalText = record.get("text");
                    originalPath = record.get("path");
                }
            }
            pimcore.elementservice.applyNewKey(affectedNodes, elementType, id, value);

            pimcore.elementservice.updateObject(id, {key: value},
                    function (response) {
                        var index, record;
                        for (index = 0; index < affectedNodes.length; index++) {
                            record = affectedNodes[index];
                            pimcore.elementservice.refreshNode(record);
                        }

                        try {
                            var rdata = Ext.decode(response.responseText);
                            if (rdata && rdata.success) {
                                pimcore.elementservice.reopenElement(options);
                                // removes loading indicator added in the applyNewKey method
                                pimcore.helpers.removeTreeNodeLoadingIndicator(elementType, id);
                            } else {
                                pimcore.helpers.showNotification(t("error"), t("error_renaming_object"), "error",
                                        t(rdata.message));
                                for (index = 0; index < affectedNodes.length; index++) {
                                    record = affectedNodes[index];
                                    pimcore.elementservice.refreshNode(record.parentNode);
                                }
                            }
                        } catch (e) {
                            pimcore.helpers.showNotification(t("error"), t("error_renaming_object"), "error");
                            for (index = 0; index < affectedNodes.length; index++) {
                                record = affectedNodes[index];
                                pimcore.elementservice.refreshNode(record.parentNode);
                            }
                        }
                        this.tree.getStore().load();

                    }.bind(this))
                    ;
        }
    }
}); 