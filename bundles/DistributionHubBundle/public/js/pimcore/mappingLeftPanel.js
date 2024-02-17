pimcore.registerNS("pimcore.plugin.distributionhub.mappingLeftPanel");
pimcore.plugin.distributionhub.mappingLeftPanel = Class.create({

    // initialize
    initialize: function () {
    },

    // create distribution hub mapping tab panel
    getTabPanel: function () {
        if (!this.panel) {
            this.panel = new Ext.Panel({
                border: false,
                layout: "border",
                //items: [this.getChannelTree(), this.getChannelEditContainer()]
                items: [{
                    region: 'center',
                    layout: 'border',
                    items: [{
                        title:t('dHub_my_channel'),
                        region: 'west',
                        width: 250,
                        id: 'menu_tree_ch',
                        split: true,
                        layout: 'accordion',
                        header: false,
                        items:[this.getChannelTree(), this.getSharedChannelTree()]
                    }, this.getChannelEditContainer()]
                }]
            });
            pimcore.layout.refresh();
        }
        return this.panel;
    },
    getChannelTree: function () {
        if (!this.tree) {
            //let channelStore = Ext.create('pimcore.plugin.distributionhub.helpers.customPagingTreeStore', {
            let channelStore = Ext.data.JsonStore({
                autoLoad: true,
                autoSync: false,
                proxy: {
                    type: 'ajax',
                    url: '/admin/distributionhub/channel/tree',
                    reader: {
                        type: 'json',
                        totalProperty: 'total',
                        rootProperty: 'nodes'
                    },
                    extraParams: {
                        limit: 15,
                    }
                },
                pageSize: 15,
            });
            this.tree = Ext.create('Ext.tree.Panel', {
                title: t('dHub_my_channel'),
                store: channelStore,
                rootVisible: true,
                autoScroll: true,
                containerScroll: true,
                viewConfig: {
                    listeners: {
                        
                    },
                    xtype: 'custompimcoretreeview'
                },
                root: {
                    id: '0',
                    iconCls: "pimcore_icon_home",
                    text: t('home'),
                    expanded: true,
                    reload: true,
                    draggable: false,
                    allowChildren: true
                },
                listeners: this.getTreeNodeListeners(),
                tbar: {
                    items: [{
                        text: t('dHub_add_channel'),
                        iconCls: "pimcore_icon_add",
                        handler: this.addNewChannelForm.bind(this)
                    }]
                }
            });
        }
        return this.tree;
    },
    getSharedChannelTree:function f() {
        if (!this.sharedChannelTree) {
            //let sharedChannelStore = Ext.create('pimcore.plugin.distributionhub.helpers.customPagingTreeStore', {
                let sharedChannelStore = Ext.data.JsonStore({
                autoLoad: true,
                autoSync: false,
                proxy: {
                    type: 'ajax',
                    url: '/admin/distributionhub/channel/tree',
                    reader: {
                        type: 'json',
                        totalProperty : 'total',
                        rootProperty: 'nodes'
                    },
                    extraParams: {
                        limit: 15,
                        type:"shared"
                    }
                },
                pageSize: 15
            });

            this.sharedChannelTree = Ext.create('Ext.tree.Panel', {
                title: t('dHub_shared_channel'),
                store: sharedChannelStore,
                rootVisible: true,
                header: {
                    style: {
                    }
                },
                autoScroll: true,
                containerScroll: true,
                viewConfig: {
                    listeners: {
                    },
                    xtype: 'custompimcoretreeview'
                },
                root: {
                    id: 'shared',
                    iconCls: "pimcore_icon_home",
                    text: t('home'),
                    expanded: true,
                    reload: true,
                    collapsed:false,
                    draggable: false
                },
                listeners: this.getTreeNodeListeners('shared')
            });
        }
        return this.sharedChannelTree;
    },
    getChannelEditContainer: function() {
        if (!this.editPanel) {
            this.editPanel = new Ext.TabPanel({
                region: "center"
            });
        }
        return this.editPanel;

    },
    getTreeNodeListeners: function (treeType) {
        let treeNodeListeners=null;
        if(typeof treeType!="undefined" && treeType=="shared"){
        treeNodeListeners = {
            'itemclick': this.onTreeNodeClick.bind(this),
            'beforeitemappend': function (thisNode, newChildNode,
                                          index, eOpts) {
                newChildNode.data.leaf = true;
                newChildNode.data.expaned = true;
                newChildNode.data.iconCls = "pimcore_icon_gridconfig_class_attributes";
            }
        };
        }else{
            treeNodeListeners = {
                'itemclick': this.onTreeNodeClick.bind(this),
                "itemcontextmenu": this.onTreeNodeContextmenu.bind(this),
                'beforeitemappend': function (thisNode, newChildNode,
                                              index, eOpts) {
                    newChildNode.data.leaf = true;
                    newChildNode.data.expaned = true;
                    newChildNode.data.iconCls = "pimcore_icon_gridconfig_class_attributes";
                }
            };
        }

        return treeNodeListeners;
    },
    onTreeNodeClick: function (tree, record, item, index, e, eOpts) {
        if(record.data.id>0){
            this.openTabPanel(record.data.id, record.data.parentId);
        }
    },
    openTabPanel: function (id, parentTypeId) {
        const existingPanel = Ext.getCmp("distributionhub_mapping_panel_" + id);

        if (existingPanel) {
            this.editPanel.setActiveTab(existingPanel);
            return;
        }
        pimcore.helpers.loadingShow();
        Ext.Ajax.request({
            url: "/admin/distributionhub/channel/get",
            params: {
                id: id
            },
            success: function (response) {
                pimcore.helpers.loadingHide();
                let data = Ext.decode(response.responseText);
                data.columnAttributeMapping = Ext.decode(data.data.columnAttributeMapping);
                var fieldPanel = new pimcore.plugin.distributionhub.configItem(data, id, this, parentTypeId);
            }.bind(this)
        });
    },
    onTreeNodeContextmenu: function (tree, record, item, index, e, eOpts) {
            e.stopEvent();

            tree.select();

            const menu = new Ext.menu.Menu();
            if (record.data.allowChildren) {
                menu.add(new Ext.menu.Item({
                    text: t('refresh'),
                    iconCls: "pimcore_icon_reload",
                    listeners: {
                        "click": this.reloadChannelTree.bind(this, 'shared')
                    }
                }));
            }
        if(record.data.id>0) {
            menu.add(new Ext.menu.Item({
                text: t('rename'),
                iconCls: "pimcore_icon_key",
                handler: this.renameMapping.bind(this, tree, record)
            }));
            menu.add(new Ext.menu.Item({
                text: t('clone'),
                iconCls: "pimcore_icon_clone",
                handler: this.cloneMapping.bind(this, tree, record)
            }));
            menu.add(new Ext.menu.Item({
                text: t('delete'),
                iconCls: "pimcore_icon_delete",
                handler: this.deleteMapping.bind(this, tree, record)
            }));
        }
        menu.showAt(e.pageX, e.pageY);
    },
    addNewChannelForm: function () {

        Ext.MessageBox.prompt(t('dHub_enterkey_title'),
            t('dHub_enterkey_label'),
            this.addNewChannel.bind(this), null, null, "");
    },
    addNewChannel: function (button, value, object) {
        if (button === 'ok') {
            if(typeof value !="undefined" && value!=null && value!='') {
                if (pimcore.helpers.isValidFilename(value)) {
                    Ext.Ajax.request({
                        url: "/admin/distributionhub/channel/add",
                        params: {
                            name: value
                        },
                        success: function (response) {
                            const result = Ext.decode(response.responseText);
                            if (result.success) {
                                this.openTabPanel(result.id, 0);
                            } else if (result.success === false && result.id) {
                                pimcore.helpers.showNotification(t("error"), t("dHub_name_already_in_use"));
                            } else {
                                pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                            }
                            this.tree.getStore().load({
                                node: this.tree.getRootNode()
                            });
                        }.bind(this)
                    });
                } else {
                    pimcore.helpers.showNotification(t('error'), t('dHub_invalid_name'), 'error');
                }
            }else {
                pimcore.helpers.showNotification(t('error'), t('dHub_key_required'), 'error');
            }
        }
    },


    // delete mapping
    deleteMapping: function (tree, record) {
        Ext.Msg.confirm(t('dHub_delete_channel'), t("dHub_delete_confirm"), function (btnText) {
            if (btnText === "yes") {
                Ext.Ajax.request({
                    url: "/admin/distributionhub/channel/delete",
                    params: {
                        id: record.data.id
                    },success: function (response) {
                        const result = Ext.decode(response.responseText);

                        if (result.success === true) {
                            pimcore.helpers.showNotification(t('success'), t('dHub_item_delete_success'), 'success');
                            this.tree.getStore().load({
                                node: this.tree.getRootNode()
                            });

                        }

                    }.bind(this)
                });

                const activeTabIndex = this.editPanel.items.findIndex('id', "distributionhub_mapping_panel_" + record.data.id);
                this.editPanel.remove(this.editPanel.items.getAt(activeTabIndex));
                record.remove();
            }
        }, this);
    },

    // rename mapping
    renameMapping: function (tree, record) {
        const options = {
            sourceTree: tree,
            elementType: "object",
            elementSubType: record.data.type,
            id: record.data.id,
            default: record.data.text
        };

        let completeCallback = null;
        if (options.elementType === "object") {
            completeCallback = this.rename.bind(this, options);
        } else {
            throw new Error("type " + options.elementType + " not supported!");
        }

        Ext.MessageBox.prompt(t('rename'), t('dHub_enter_the_new_name'), completeCallback, window, false, options.default);

    },

    cloneMapping: function (tree, record) {
        const options = {
            sourceTree: tree,
            elementType: "object",
            elementSubType: record.data.type,
            id: record.data.id,
            parent_id:record.data.parent_id,
            default: record.data.text
        };
        var completeCallback = null;
        if (options.elementType === "object") {
            completeCallback = this;
        } else {
            throw new Error("type " + options.elementType + " not supported!");
        }

        Ext.Msg.confirm("Confirmation", t("dHub_clone_confirm"), function(btnText) {

            if (btnText === "yes") {
                this.cloneFieldComplete(tree, options);
            }
        }, this);
    },
    cloneFieldComplete: function (tree, options) {
        let regresult = options.default.match(/[a-zA-Z0-9_.\-~]+/);
        if (options.default.length >= 1 && regresult == options.default) {
            Ext.Ajax.request({
                url: "/admin/distributionhub/channel/clone",
                params: {
                    name: options.default,
                    id: options.id
                },
                success: function (response) {
                    const result = Ext.decode(response.responseText);
                    if (result.success) {
                        this.tree.getStore().load({
                            node: this.tree.getRootNode()
                        });
                        pimcore.helpers.showNotification(t('success'), t('dHub_item_save_success'), 'success');
                    } else if (result.success === false) {
                        Ext.MessageBox.alert(t('Error'), t(result.message));
                    } else {
                        pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                    }

                }.bind(this)
            });
        }else {
            Ext.Msg.alert(t("dHub_channel_prompt_title"), t("dHub_invalid_name"));
        }
    },
    clone: function(postObject){
        var object = this;
        postObject.success = function(response) {
            const result = Ext.decode(response.responseText);
            if (result.success) {
                object.tree.getStore().load({
                    node: object.tree.getRootNode()
                });
                pimcore.helpers.showNotification(t('success'), t('dHub_item_save_success'), 'success');
            } else if (result.success === false) {
                Ext.MessageBox.alert(t('Error'), t(result.msg));
            } else {
                pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
            }
        }.bind(this);
        Ext.Ajax.request(postObject);
    },
    copyInfo: function (options) {

        const id = options.id;
        var object  = this;
        Ext.Ajax.request({
            url: "/admin/distributionhub/channel/clone",
            params: {
                csrfToken:pimcore.settings.csrfToken,
                sourceId: id,
                type:'child',
                targetId: options.parent_id
            },
            method:"GET",
            success: function (response) {
                const result = Ext.decode(response.responseText);
                if (result.pastejobs && result.pastejobs.length>0) {
                    object.clone(result.pastejobs[0][0]);
                } else if (result.success === false) {
                    Ext.MessageBox.alert(t('Error'), t(result.msg));
                } else {
                    pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                }
            }.bind(this)
        });
    },
    rename: function (options, button, value, object) {
        if (button === "ok") {
            if(typeof value !="undefined" && value!=null && value!='') {
            if (pimcore.helpers.isValidFilename(value)) {
                const id = options.id;
                const newName = pimcore.helpers.getValidFilename(value, "object");

                Ext.Ajax.request({
                    url: "/admin/distributionhub/channel/rename",
                    params: {
                        id: id,
                        name: newName
                    },
                    success: function (response) {
                        const result = Ext.decode(response.responseText);
                        if (result.success) {
                            const existingTab = Ext.getCmp("distributionhub_mapping_panel_" + id);
                            if (existingTab) {
                                existingTab.destroy();
                            }
                            this.tree.getStore().load({
                                node: this.tree.getRootNode(),
                            });
                            this.openTabPanel(id, 0);
                            pimcore.elementservice.refreshNodeAllTrees("object", options.id);
                        } else if (result.success === false && result.id) {
                            pimcore.helpers.showNotification(t("error"), t("name_already_in_use"));
                        } else {
                            pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                        }
                    }.bind(this)
                });
            }else {
                pimcore.helpers.showNotification(t('error'), t('dHub_invalid_name'), 'error');
            }
            }else {
                pimcore.helpers.showNotification(t('error'), t('dHub_key_required'), 'error');
            }
        }
    },
    add: function (type, cloneRecord, selectedRecord) {
        if (cloneRecord) {
            let rid = cloneRecord.data.id;
            let parentNode = cloneRecord.parentNode;
        } else {
            let rid = 0;
            let parentNode = selectedRecord;
        }
        let pid = parentNode.data.id;
        Ext.MessageBox.prompt(t('add'), t('enter_the_name_of_the_new_item'), function (button, value, object) {
            if(button=='ok' && value != ''){
                Ext.Ajax.request({
                    url: "/admin/distributionhub/channel/add",
                    method: 'POST',
                    params: {
                        parentId: pid,
                        type: type,
                        name: value,
                        active: 1,
                        rid: rid
                    },
                    success: this.addComplete.bind(this, parentNode)
                });
            }
        }.bind(this));
    },
    addComplete: function (parentNode, transport) {
        try{
            let data = Ext.decode(transport.responseText);
            if(data && data.success){
                let tree = parentNode.getOwnerTree();
                tree.getStore().reload({
                    node: parentNode
                });
            } else {
                pimcore.helpers.showNotification(t("error"), t("user_creation_error"), "error",t(data.message));
            }

        } catch(e){
            pimcore.helpers.showNotification(t("error"), t("user_creation_error"), "error");
        }
    },
    reloadChannelTree:function(treeType){
        if(typeof treeType !="undefined" && treeType=="shared") {
            this.tree.getStore().load({
                node: this.tree.getRootNode()
            });
        }else{
            this.sharedChannelTree.getStore().load({
                node: this.sharedChannelTree.getRootNode()
            });
        }
    },
});

