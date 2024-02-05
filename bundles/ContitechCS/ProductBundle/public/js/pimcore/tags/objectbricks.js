Ext.override(pimcore.object.tags.objectbricks, {
    getLayoutEdit: function () {
        
        this.loadFieldDefinitions();
        /** following condition added to make objectbricks layout as accordian **/
        if (this.object.data.general.className == 'CSProducts') {
            var panelConf = {
                autoHeight: true,
                activeTab: 0,
                closable: false,
                layout: {
                    // layout-specific configs go here
                    type: 'accordion',
                    titleCollapse: false,
                    animate: true,
                    activeOnTop: false
                }
            };
            this.tabpanel = new Ext.Panel(panelConf);
        } else {
            var panelConf = {
                autoHeight: true,
                activeTab: 0,
                closable: false
            };
            this.tabpanel = new Ext.TabPanel(panelConf);
        }
        
        panelConf = {
            autoHeight: true,
            border: this.fieldConfig.border,
            style: "margin-bottom: 10px",
            componentCls: "object_field",
            items: [this.tabpanel]
        };

        this.component = new Ext.Panel(panelConf);

        return this.component;
    },
    addBlockElement: function (index, type, blockData, ignoreChange, title, manuallyAdded) {
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
        /** following condition added to remove delete button from objectbricks. **/
        var closable = !this.fieldConfig.noteditable;
        if (this.object.data.general.className == 'CSProducts') {
            closable = false;
        }
        /** Above condition added to remove delete button from objectbricks. **/
        
        var childConfig = this.layoutDefinitions[type];

        var blockElement = new Ext.Panel({
            //bodyStyle: "padding:10px;",
            style: "margin: 0 0 10px 0;",
            cls: 'pimcore_objectbrick_item',
            closable: closable,
            autoHeight: true,
            border: false,
            title: title ? t(title) : t(type),
            // items: items
            items: [],
            listeners: {
                afterrender: function (childConfig, dataProvider, manuallyAdded, panel) {
                    if (!panel.__tabpanel_initialized) {
                        var copy = Ext.decode(Ext.encode(childConfig));
                        var children = this.getRecursiveLayout(copy, null, {
                            containerType: "objectbrick",
                            containerKey: type,
                            ownerName: this.fieldConfig.name,
                            applyDefaults: manuallyAdded
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
                }.bind(this, childConfig, dataProvider, manuallyAdded)

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
    },
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
        /** following condition added to remove controls of objectbricks. **/
        if (this.object.data.general.className == 'CSProducts') {//class name Needs to be changed for different system
            var toolbar = new Ext.Toolbar({
//                    items: items
            });
        }
        /** above condition added to remove controls of objectbricks. **/
        else {
            var toolbar = new Ext.Toolbar({
                items: items
            });
        }
        return toolbar;
    },
});