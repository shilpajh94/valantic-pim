pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle");

pimcore.plugin.RequiredAttributesBundle = Class.create(pimcore.plugin.admin, {

    getClassName: function () {
        return "pimcore.plugin.RequiredAttributesBundle";
    },

    initialize: function () {

        let timeout = 300000;
        Ext.Ajax.timeout= timeout;
        Ext.override(Ext.form.Basic, { timeout: timeout / 1000 });
        Ext.override(Ext.data.proxy.Server, { timeout: timeout });
        Ext.override(Ext.data.Connection, { timeout: timeout });
        Ext.override(Ext.data.proxy.Ajax, { timeout:timeout });

        /**
         * screen was moving up and down when setTitle was running to set dirty mark on the tab
         */
        Ext.override(pimcore.element.abstract,{
            detectedChange: function () {
                // this.tab.setTitle(this.tab.initialConfig.title + " *");
                let titleDom = this.tab.tab.btnInnerEl.dom;
                titleDom.innerHTML = titleDom.innerHTML + " *";

                this.dirty = true;
                this.stopChangeDetector();
            },
        });

        this.overrideTreeGetChildsByIdProxyTimeout();

        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {

        new pimcore.plugin.RequiredAttributesBundle.overrides().quicksearchOverride();

        /**
         * screen was moving up and down when setTitle was running to set dirty mark on the tab
         */
        Ext.override(pimcore.element.abstract,{
            detectedChange: function () {
                // this.tab.setTitle(this.tab.initialConfig.title + " *");
                let titleDom = this.tab.tab.btnInnerEl.dom;
                titleDom.innerHTML = titleDom.innerHTML + " *";

                this.dirty = true;
                this.stopChangeDetector();
            },
        });

        new pimcore.plugin.RequiredAttributesBundle.overrides().showNomenclatureCustomPanel();
        new pimcore.plugin.RequiredAttributesBundle.pdf_preview_override().overrideGetLayout();
        new pimcore.plugin.RequiredAttributesBundle.pdf_preview_override().overrideGeneratePdf();

        new pimcore.plugin.RequiredAttributesBundle.overrides().overrideSelect();
        new pimcore.plugin.RequiredAttributesBundle.overrides().overrideMultiselect();

    },
    postOpenObject: function (object, type) {

        new pimcore.plugin.RequiredAttributesBundle.overrides().allowSQLEditorOnObjectGrid(object,type);

        self = this;
        var configs = this.configdata;
        Ext.override(pimcore.object.tags.objectbricks, {
            getControls: function (blockElement) {

                var menuData = this.objectbricks;
                var menu = this.buildMenu(menuData, blockElement);
                var items = [];
                if (!this.fieldConfig.noteditable) {

                    if (menu.length == 1) {
                        if (!menu[0].menu) {
                            var handler = menu[0].menu ? menu[0].menu[0].handler : menu[0].handler;
                            items.push({
                                cls: "pimcore_block_button_plus",
                                iconCls: "pimcore_icon_plus",
                                handler: handler
                            });
                        } else {
                            items.push({
                                cls: "pimcore_block_button_plus",
                                iconCls: "pimcore_icon_plus",
                                menu: menu
                            });

                        }
                    } else if (menu.length > 1) {
                        items.push({
                            cls: "pimcore_block_button_plus",
                            iconCls: "pimcore_icon_plus",
                            menu: menu
                        });
                    }
                }

                items.push({
                    xtype: "tbtext",
                    text: t(this.fieldConfig.title)
                });
                if (this.object.data.general.o_className == "Product") {
                    var toolbar = new Ext.Toolbar({
//                    items: items
                    });
                } else {
                    var toolbar = new Ext.Toolbar({
                        items: items
                    });
                }
                return toolbar;
            },

            addBlockElement: function (index, type, blockData, ignoreChange, title) {
                if (!type) {
                    return;
                }
                if (!this.layoutDefinitions[type]) {
                    return;
                }
                if (this.fieldConfig.maxItems && this.getCurrentElementsCount() >= this.fieldConfig.maxItems) {
                    Ext.Msg.alert(t("error"), t("limit_reached"));
                    return;
                }

                var dataFields = [];
                var currentData = {};
                var currentMetaData = {};

                if (blockData) {
                    currentData = blockData.data;
                    currentMetaData = blockData.metaData;
                }

                var dataProvider = {
                    getDataForField: function (fieldConfig) {
                        var name = fieldConfig.name;
                        return currentData[name];
                    },

                    getMetaDataForField: function (fieldConfig) {
                        var name = fieldConfig.name;
                        return currentMetaData[name];
                    },

                    addToDataFields: function (field, name) {
                        dataFields.push(field);
                    }
                };

                var childConfig = this.layoutDefinitions[type];
                var closable = !this.fieldConfig.noteditable;
                if (this.object.data.general.o_className == "Product") {
                    closable = false;
                }



                var blockElement = new Ext.Panel({
                    //bodyStyle: "padding:10px;",
                    style: "margin: 0 0 10px 0;",
                    cls: 'pimcore_objectbrick_item',
                    closable: closable,
                    autoHeight: true,
                    border: false,
                    title: title ? ts(title) : ts(type),
                    // items: items
                    items: [],
                    listeners: { 
                        afterrender: function (childConfig, dataProvider, panel) {
                            if (!panel.__tabpanel_initialized) {
                                var copy = Ext.decode(Ext.encode(childConfig));
                                var children = this.getRecursiveLayout(copy, null, {
                                    containerType: "objectbrick",
                                    containerKey: type,
                                    ownerName: this.fieldConfig.name
                                }, false, true, dataProvider);
                                if (this.fieldConfig.noteditable && children) {
                                    children.forEach(function (record) {
                                        record.disabled = true;
                                    });
                                }

                                if (children) {
                                    panel.add(children);
                                }

                                panel.updateLayout();

                                if (panel.setActiveTab) {
                                    var activeTab = panel.items.items[0];
                                    if (activeTab) {
                                        activeTab.updateLayout();
                                        panel.setActiveTab(activeTab);
                                    }
                                }

                                panel.__tabpanel_initialized = true;


                            }
                        }.bind(this, childConfig, dataProvider)

                    }
                });

                if (!this.fieldConfig.noteditable) {
                    blockElement.on("beforeclose", this.removeBlock.bind(this, blockElement));
                }

                this.component.remove(this.component.getComponent(0));

                this.addedTypes[type] = true;

                blockElement.key = type;
                blockElement.fieldtype = type;
                this.tabpanel.add(blockElement);
                this.component.insert(0, this.getControls(null));

                this.tabpanel.updateLayout();
                this.component.updateLayout();

                this.currentElements[type] = null;
                this.currentElements[type] = {
                    container: blockElement,
                    fields: dataFields,
                    type: type
                };

                if (!ignoreChange) {
                    this.dirty = true;
                    this.tabpanel.setActiveTab(blockElement);
                }
            }
        });
    },
    preOpenObject: function (object) {
        Ext.override(pimcore.object.tags.objectbricks, {
            initData: function (response) {
                var bricksData = Ext.decode(response.responseText);
                this.objectbricks = bricksData.objectbricks;
                this.layoutDefinitions = bricksData.layoutDefinitions;
                this.component.insert(0, this.getControls());
                if (this.data.length > 0) {
                    for (var i = 0; i < this.data.length; i++) {
                        if (this.data[i] != null) {
                            if (this.object.data.general.o_className == "Product") {//class name Needs to be changed for different system
                                this.preventDelete[this.data[i].type] = true;
                            } else {
                                this.preventDelete[this.data[i].type] = this.data[i].inherited;
                            }
                            this.addBlockElement(i, this.data[i].type, this.data[i], true, this.data[i].title);
                        }
                    }
                }
                this.tabpanel.setActiveTab(0);
                pimcore.layout.refresh();
            },
        });
    },

    postSaveObject: function(object){

        // reload product on save
        if(object.data.general.o_className == "Product"){
            setTimeout(function(){
                object.reload();
            },100);
        }
    },

    overrideTreeGetChildsByIdProxyTimeout: function(){
        /**
         * /admin/asset/tree-get-childs-by-id was getting cancelled in 1 min
         * Overriding to comment the proxy timeout of 60 seconds
         */
        Ext.override(pimcore.asset.tree,{
            init: function(rootNodeConfig) {

                var itemsPerPage = pimcore.settings['asset_tree_paging_limit'];

                rootNodeConfig.text = t("home");
                rootNodeConfig.allowDrag = true;
                rootNodeConfig.id = "" +  rootNodeConfig.id;
                rootNodeConfig.iconCls = "pimcore_icon_home";
                rootNodeConfig.cls = "pimcore_tree_node_root";
                rootNodeConfig.expanded = true;

                var store = Ext.create('pimcore.data.PagingTreeStore', {
                    autoLoad: false,
                    autoSync: false,
                    proxy: {
                        type: 'ajax',
                        url: this.treeDataUrl,
                        reader: {
                            type: 'json',
                            totalProperty : 'total',
                            rootProperty: 'nodes'

                        },
                        extraParams: {
                            limit: itemsPerPage,
                            view: this.config.customViewId
                        },
                        // timeout: 60000
                    },
                    pageSize: itemsPerPage,
                    root: rootNodeConfig
                });

                // assets
                this.tree = Ext.create('pimcore.tree.Panel', {
                    selModel : {
                        mode : 'MULTI'
                    },
                    store: store,
                    autoLoad: false,
                    id: this.config.treeId,
                    title: this.config.treeTitle,
                    iconCls: this.config.treeIconCls,
                    cls: this.config['rootVisible'] ? '' : 'pimcore_tree_no_root_node',
                    autoScroll:true,
                    animate:false,
                    containerScroll: true,
                    ddAppendOnly: true,
                    rootVisible: this.config.rootVisible,
                    forceLayout: true,
                    bufferedRenderer: false,
                    border: false,
                    viewConfig: {
                        plugins: {
                            ptype: 'treeviewdragdrop',
                            appendOnly: true,
                            ddGroup: "element"
                        },
                        listeners: {
                            beforedrop: function (node, data) {
                            },
                            nodedragover: this.onTreeNodeOver.bind(this),
                            startdrag: function() {
                            }
                        },
                        xtype: 'pimcoretreeview'

                    },
                    tools: [{
                        type: "right",
                        handler: pimcore.layout.treepanelmanager.toRight.bind(this),
                        hidden: this.position == "right"
                    },{
                        type: "left",
                        handler: pimcore.layout.treepanelmanager.toLeft.bind(this),
                        hidden: this.position == "left"
                    }],
                    root: rootNodeConfig,
                    listeners: this.getTreeNodeListeners()
                });

                //TODO
                this.tree.getView().on("itemafterrender",this.enableHtml5Upload.bind(this));
                this.tree.on("render", function () {
                    this.getRootNode().expand();
                });
                this.tree.on("afterrender", function () {
                    try {
                        this.tree.loadMask = new Ext.LoadMask({
                            target: this.tree,
                            msg: t("please_wait"),
                            hidden: true
                        });

                        // add listener to root node -> other nodes are added om the "append" event -> see this.enableHtml5Upload()
                        this.addHtml5DragListener(this.tree.getRootNode());

                        // html5 upload
                        if (window["FileList"]) {
                            this.tree.getEl().dom.addEventListener("drop", function (e) {

                                e.stopPropagation();
                                e.preventDefault();

                                pimcore.helpers.treeNodeThumbnailPreviewHide();

                                try {
                                    var selection = this.tree.getSelection();
                                    if (!selection) {
                                        return true;
                                    }
                                    if (selection.length < 1) {
                                        return true;
                                    }
                                } catch (e2) {
                                    return true;
                                }

                                var node = selection[0];
                                this.uploadFileList(e.dataTransfer, node);

                            }.bind(this), true);
                        }
                    } catch (e) {
                        console.log(e);
                    }
                }.bind(this));

                if(!pimcore.settings.asset_disable_tree_preview) {
                    this.tree.on("itemmouseenter", pimcore.helpers.treeNodeThumbnailPreview.bind(this));
                    this.tree.on("itemmouseleave", pimcore.helpers.treeNodeThumbnailPreviewHide.bind(this));
                }

                store.on("nodebeforeexpand", function (node) {
                    pimcore.helpers.addTreeNodeLoadingIndicator("asset", node.data.id, false);
                });

                store.on("nodeexpand", function (node, index, item, eOpts) {
                    pimcore.helpers.removeTreeNodeLoadingIndicator("asset", node.data.id);
                });

                this.config.parentPanel.insert(this.config.index, this.tree);
                this.config.parentPanel.updateLayout();

                if (!this.config.parentPanel.alreadyExpanded && this.perspectiveCfg.expanded) {
                    this.config.parentPanel.alreadyExpanded = true;
                    this.tree.expand();
                }
            },
        });
    }
});

var RequiredAttributesBundlePlugin = new pimcore.plugin.RequiredAttributesBundle();
