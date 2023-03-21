pimcore.registerNS("pimcore.plugin.b2btranslation.mappingLeftPanel");
pimcore.plugin.b2btranslation.mappingLeftPanel = Class.create({

    // initialize
    initialize: function () {
    },

    // create vendor and avb mapping tab panel
    getTabPanel: function () {
        if (!this.panel) {
            this.panel = new Ext.Panel({
                border: false,
                layout: "border",
                items: [{
                    region: 'center',
                    layout: 'border',
                    items: [{
                        title:t('b2b_translation_my_mapping'),
                        region: 'west',
                        width: 300,
                        id: 'menu_tree_mapping',
                        split: true,
//                        layout: 'accordion',
                        header: false,
                        items:[this.getMappingTableTree()]
                    }, this.getChannelEditContainer()]
                }]
            });
            pimcore.layout.refresh();
        }
        return this.panel;
    },
    getMappingTableTree: function () {
        if (!this.tree) {

            var store = Ext.create('Ext.data.TreeStore', {
                proxy: {
                    type: 'ajax',
                    url: '/admin/b2b_translation/tree',
                },
                // root: {
                //     text: 'Eatables',
                //     id: 'root_node',
                //     expanded: true
                // },
                folderSort: true,
                sorters: [{
                    property: 'text',
                    direction: 'ASC'
                }]
            });
            // console.log(store);

            // var tree = Ext.create('Ext.tree.Panel', {
            //     store: store,
            //     renderTo: 'tree_el',
            //     height: 300,
            //     width: 250,
            //     title: 'Eatables'
            // });


            // let channelStore = Ext.create('pimcore.plugin.avbvendormapping.helpers.customPagingTreeStore', {
            //     autoLoad: true,
            //     autoSync: false,
            //     proxy: {
            //         type: 'ajax',
            //         url: '/admin/mapping-config/tree',
            //         reader: {
            //             type: 'json',
            //             totalProperty: 'total',
            //             rootProperty: 'nodes'
            //         },
            //         extraParams: {
            //             limit: 15,
            //         }
            //     },
            //     pageSize: 15,
            // });
            // var store = Ext.create('Ext.data.TreeStore', {
            //     root: {
            //         expanded: true,
            //         children: [
            //             { text: 'detention', leaf: true },
            //             { text: 'homework', expanded: true, children: [
            //                 { text: 'book report', leaf: true },
            //                 { text: 'algebra', leaf: true}
            //             ] },
            //             { text: 'buy lottery tickets', leaf: true }
            //         ]
            //     }
            // });
            
            this.tree = Ext.create('Ext.tree.Panel', {
//                title: 'Simple Tree',
                store: store,
                rootVisible: true,
//                autoScroll: true,
//                containerScroll: true,
                // viewConfig: {
                //             listeners: {
                                
                //             },
                //             xtype: 'custompimcoretreeview'
                //         },
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
                            text: t('b2b_translation_add_new_mapping'),
                            iconCls: "pimcore_icon_add",
                            handler: this.addNewMappingForm.bind(this)
                        }]
                    }
            });

            
            // channelStore = [];
            // this.tree = Ext.create('Ext.tree.Panel', {
            //     title: t('avbAttributeMapping_my_mapping'),
            //     store: channelStore,
            //     rootVisible: true,
            //     autoScroll: true,
            //     containerScroll: true,
            //     viewConfig: {
            //         listeners: {
                        
            //         },
            //         xtype: 'custompimcoretreeview'
            //     },
            //     root: {
            //         id: '0',
            //         iconCls: "pimcore_icon_home",
            //         text: t('home'),
            //         expanded: true,
            //         reload: true,
            //         draggable: false,
            //         allowChildren: true
            //     },
            //     listeners: this.getTreeNodeListeners(),
            //     tbar: {
            //         items: [{
            //             text: t('avbAttributeMapping_add_mapping'),
            //             iconCls: "pimcore_icon_add",
            //             handler: this.addNewMappingForm.bind(this)
            //         }]
            //     }
            // });
        }
        return this.tree;
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
                newChildNode.data.iconCls = "pimcore_icon_translations";
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
                    newChildNode.data.iconCls = "pimcore_icon_translations";
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
        const existingPanel = Ext.getCmp("mapping_panel_" + id);

        if (existingPanel) {
            this.editPanel.setActiveTab(existingPanel);
            return;
        }
        pimcore.helpers.loadingShow();
        Ext.Ajax.request({
            url: "/admin/b2b_translation/get",
            params: {
                id: id
            },
            success: function (response) {
                pimcore.helpers.loadingHide();
                let data = Ext.decode(response.responseText);
                var fieldPanel = new pimcore.plugin.b2btranslation.configItem(data, id, this, parentTypeId);
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
    addNewMappingForm: function () {

        Ext.MessageBox.prompt(t('b2b_translation_add_a_new_mapping'),
            t('b2b_translation_enter_name_of_new_mapping'),
            this.addNewMapping.bind(this), null, null, "");
    },
    addNewMapping: function (button, value, object) {
        if (button === 'ok') {
            if(typeof value !="undefined" && value!=null && value!='') {
                if (pimcore.helpers.isValidFilename(value)) {
                    Ext.Ajax.request({
                        url: "/admin/b2b_translation/add",
                        params: {
                            name: value
                        },
                        success: function (response) {
                            const result = Ext.decode(response.responseText);

                            if (result.success) {
                                this.openTabPanel(result.id, 0);
                            } else if (result.success === false && result.id) {
                                pimcore.helpers.showNotification(t("error"), t("b2b_translation_name_already_in_use"));
                            } else {
                                pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                            }
                            this.tree.getStore().load({
                                node: this.tree.getRootNode()
                            });
                        }.bind(this)
                    });
                } else {
                    pimcore.helpers.showNotification(t('error'), t('b2b_translation_invalid_name'), 'error');
                }
            }else {
                pimcore.helpers.showNotification(t('error'), t('b2b_translation_key_required'), 'error');
            }
        }
    },


    // delete mapping
    deleteMapping: function (tree, record) {
        Ext.Msg.confirm(t('b2b_translation_delete_channel'), t("b2b_translation_delete_confirm"), function (btnText) {
            if (btnText === "yes") {
                Ext.Ajax.request({
                    url: "/admin/b2b_translation/delete",
                    params: {
                        id: record.data.id
                    },success: function (response) {
                        const result = Ext.decode(response.responseText);

                        if (result.success === true) {
                            pimcore.helpers.showNotification(t('success'), t('b2b_translation_delete_success'), 'success');
                            this.tree.getStore().load({
                                node: this.tree.getRootNode()
                            });

                        }

                    }.bind(this)
                });

                const activeTabIndex = this.editPanel.items.findIndex('id', "mapping_panel_" + record.data.id);
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

        Ext.MessageBox.prompt(t('rename'), t('b2b_translation_enter_the_new_name'), completeCallback, window, false, options.default);

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

        Ext.Msg.confirm("Confirmation", t("b2b_translation_clone_confirm"), function(btnText) {

            if (btnText === "yes") {
                this.cloneFieldComplete(tree, options);
            }
        }, this);
    },
    cloneFieldComplete: function (tree, options) {
        let regresult = options.default.match(/[a-zA-Z0-9_.\-~]+/);
        if (options.default.length >= 1 && regresult == options.default) {
            Ext.Ajax.request({
                url: "/admin/b2b_translation/clone",
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
                        pimcore.helpers.showNotification(t('success'), t('b2b_translation_item_save_success'), 'success');
                    } else if (result.success === false) {
                        Ext.MessageBox.alert(t('Error'), t(result.message));
                    } else {
                        pimcore.helpers.showNotification(t('error'), t('error_info_msg'), 'error');
                    }

                }.bind(this)
            });
        }else {
            Ext.Msg.alert(t("b2b_translation_channel_prompt_title"), t("b2b_translation_invalid_name"));
        }
    },
    
    rename: function (options, button, value, object) {
        if (button === "ok") {
            if(typeof value !="undefined" && value!=null && value!='') {
            if (pimcore.helpers.isValidFilename(value)) {
                const id = options.id;
                const newName = pimcore.helpers.getValidFilename(value, "object");

                Ext.Ajax.request({
                    url: "/admin/b2b_translation/rename",
                    params: {
                        id: id,
                        name: newName
                    },
                    success: function (response) {
                        const result = Ext.decode(response.responseText);
                        if (result.success) {
                            const existingTab = Ext.getCmp("mapping_panel_" + id);
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
                pimcore.helpers.showNotification(t('error'), t('b2b_translation_invalid_name'), 'error');
            }
            }else {
                pimcore.helpers.showNotification(t('error'), t('b2b_translation_key_required'), 'error');
            }
        }
    },
    
    reloadChannelTree:function(treeType){
        if(typeof treeType !="undefined" && treeType=="shared") {
            this.tree.getStore().load({
                node: this.tree.getRootNode()
            });
        }
    },
});

