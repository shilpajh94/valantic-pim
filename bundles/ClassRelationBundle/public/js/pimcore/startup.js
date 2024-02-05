pimcore.registerNS("pimcore.plugin.ClassRelationBundle");

pimcore.plugin.ClassRelationBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ClassRelationBundle";
    },
    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
        document.addEventListener(pimcore.events.preOpenObject, this.preOpenObject.bind(this));
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
    },
    pimcoreReady: function (e) {

        Ext.Ajax.request({
            url: "/admin/ClassRelation/index/get-parameters",
            method: "POST",
            async: false,
            success: function (response) {
                var response = JSON.parse(response.responseText);
                if (response != null) {
                    pimcore.custom = {};
                    pimcore.custom.classname = response.Classname;
                    pimcore.custom.categoryClassname = response.CategoryClassname;
                    pimcore.custom.categoryFieldnameInClass = response.CategoryFieldnameInClass;
                    pimcore.custom.objectbrickFieldnameInClass = response.ObjectbrickFieldnameInClass;

                    pimcore.custom.buildCategoryFieldnameInClass = response.BuildCategoryFieldnameInClass;
                    pimcore.custom.buildObjectbrickFieldnameInClass = response.BuildObjectbrickFieldnameInClass;
                }
            },
            failure: function (failResponse) {
                Ext.Msg.alert(failResponse.responseText);
            }
        });

        // Ext.override(pimcore.plugin.channels.helpers.grid, {
        //     getStore: function () {
        //         var readerFields = [];
        //         for (var i = 0; i < this.fields.length; i++) {
        //             readerFields.push({name: this.fields[i].key, allowBlank: true});
        //         }
        //         var fields = this.fields;
        //         var proxy = {
        //             type: 'ajax',
        //             url: this.url,
        //             timeout: 600000,
        //             reader: {
        //                 type: 'json',
        //                 totalProperty: 'total',
        //                 successProperty: 'success',
        //                 rootProperty: 'data'
        //             },
        //             api: {
        //                 create: this.url + "?xaction=create",
        //                 read: this.url + "?xaction=read",
        //                 update: this.url + "?xaction=update",
        //                 destroy: this.url + "?xaction=destroy"
        //             },
        //             actionMethods: {
        //                 create: 'POST',
        //                 read: 'POST',
        //                 update: 'POST',
        //                 destroy: 'POST'
        //             },
        //             extraParams: this.baseParams
        //         };
        //         this.store = new Ext.data.Store({
        //             remoteSort: true,
        //             remoteFilter: true,
        //             autoDestroy: true,
        //             fields: readerFields,
        //             proxy: proxy,
        //             autoSync: true
        //         });
        //         return this.store;
        //     },
        // });
    },
    preOpenObject: function (e) {
        Ext.override(pimcore.object.tags.objectbricks, {
            initData: function (response) {
                var bricksData = Ext.decode(response.responseText);
                this.objectbricks = bricksData.objectbricks;
                this.layoutDefinitions = bricksData.layoutDefinitions;
                this.component.insert(0, this.getControls());
                if (this.data.length > 0) {
                    for (var i = 0; i < this.data.length; i++) {
                        if (this.data[i] != null) {
                            if (e.detail.object.data.general.className == pimcore.custom.classname) {//class name Needs to be changed for different system
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
    postOpenObject: function (e) {
        self = this;
        var configs = this.configdata;
        Ext.override(pimcore.object.tags.objectbricks, {
            removeBlock: function (blockElement) {
                if (e.detail.object.data.general.className == pimcore.custom.classname) {//class name Needs to be changed for different system
                    var key = blockElement.key;
                    this.currentElements[key].action = "deleted";

                    this.tabpanel.remove(blockElement);
                    this.addedTypes[blockElement.fieldtype] = false;
                    this.component.remove(this.component.getComponent(0));
                    this.component.insert(0, this.getControls());
                    this.component.updateLayout();
                    this.dirty = true;
                } else {
                    Ext.MessageBox.confirm(t('delete_objectbrick'), t('delete_objectbrick_text'), function (blockElement, answer) {
                        if (answer == "yes") {
                            var key = blockElement.key;
                            this.currentElements[key].action = "deleted";
                            this.tabpanel.remove(blockElement);
                            this.addedTypes[blockElement.fieldtype] = false;
                            this.component.remove(this.component.getComponent(0));
                            this.component.insert(0, this.getControls());
                            this.component.updateLayout();
                            this.dirty = true;
                        }
                    }.bind(this, blockElement), this);
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
                if (e.detail.object.data.general.className == pimcore.custom.classname) {//class name Needs to be changed for different system
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
                if (e.detail.object.data.general.className == pimcore.custom.classname) {
                    closable = false;
                }



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

        if (e.detail.object.data.general.className == pimcore.custom.classname) { //class name Needs to be changed for different system
            /*
             * adding field collections in 'classifications' field
             * firstly category will be enabled and skuType disabled
             * on droping category ;if field collection mapping exists it will be added
             * else type will be enabled
             * on droping skuType ; if field collection mapping exists , add the field collection
             * else error message will be displayed
             */
            var dataFields = e.detail.object.edit.dataFields;
            var attributes = dataFields[pimcore.custom.objectbrickFieldnameInClass];//key Needs to be changed for different system
            var buildAttributes = dataFields[pimcore.custom.buildObjectbrickFieldnameInClass];//key Needs to be changed for different system

            var classificationField = dataFields[pimcore.custom.categoryFieldnameInClass]; //key Needs to be changed for different system
            var buildClassificationField = dataFields[pimcore.custom.buildCategoryFieldnameInClass]; //key Needs to be changed for different system

            var index = 0;
            var classType = null;
            //var classTypes = classificationField.data;
            if (classificationField != null) {
                var classTypes = classificationField.data;
            }

            if (buildClassificationField != null) {
                var buildClassTypes = buildClassificationField.data;
            }

            var tabPanel = e.detail.object.edit.layout.items.items[0];
            tabPanel.on("tabchange", function () {
                var attributes = dataFields[pimcore.custom.objectbrickFieldnameInClass];//key Needs to be changed for different system
                var classificationField = dataFields[pimcore.custom.categoryFieldnameInClass]; //key Needs to be changed for different system
                if (classificationField != null) {
                    var classTypes = classificationField.data;
                }

                console.log('custom--');
                console.log(pimcore.custom);
                var buildAttributes = dataFields[pimcore.custom.buildObjectbrickFieldnameInClass];//key Needs to be changed for different system
                var buildClassificationField = dataFields[pimcore.custom.buildCategoryFieldnameInClass]; //key Needs to be changed for different system
                if (buildClassificationField != null) {
                    var buildClassTypes = buildClassificationField.data;
                }

                //proceed if the opened tab contains field named as specificAttributes and category
                if (classTypes != null && classTypes.length != null && classTypes.length >= 0) {
                    var fields = [];
                    for (var i = 0; i < classTypes.length; i++) {
                        if (classTypes[i][0] != '' && classTypes[i][0] != null && classTypes[i][0] != undefined) {
                            fields.push(classTypes[i][0]);
                        } else {
                            fields.push(classTypes[i]['id']);
                        }
                    }
                    var obj = self;
                    // on change in data of the category field
                    classificationField.store.addListener("add", function (store, records) {
                        var fields = [];
                        var categoryFieldItems = store.getData().items;
                        var categoryId = "";
                        if (categoryFieldItems.length > 0) {
                            for (var i = 0; i < categoryFieldItems.length; i++) {
                                fields.push(categoryFieldItems[i].getData().id);
                            }
                        } else {
                            fields = [];
                        }
                        //if new category is added then length of category field will be greater than 0
                        if (fields.length > 0) {
                            obj.sendRequestToAddMappedClassification(fields, attributes, '');
                        }
                    });
                    classificationField.store.addListener("remove", function (store, records) {
                        var fields = [];
                        var categoryFieldItems = store.getData().items;
                        var categoryId = "";
                        if (categoryFieldItems.length > 0) {
                            for (var i = 0; i < categoryFieldItems.length; i++) {
                                fields.push(categoryFieldItems[i].getData().id);
                            }
                        } else {
                            fields = [];
                        }
                        //if new category is added then length of category field will be greater than 0
                        //if new category is added then length of category field will be greater than 0
                        if (fields.length > 0) {
                            obj.sendRequestToAddMappedClassification(fields, attributes, 'remove');
                        } else {
                            obj.deleteAllBricks(attributes);
                        }
                    });
                    classificationField.store.addListener("clear", function (store, records) {
                        obj.deleteAllBricks(attributes);
                    });
                    self.sendRequestToAddMappedClassification(fields, attributes, 'remove');
                } else {
                    if (attributes != null) {
                        self.deleteAllBricks(attributes);
                    }
                }


                console.log(buildClassTypes);
                //proceed if the opened tab contains field named as specificbuildAttributes and category
                if (buildClassTypes != null && buildClassTypes.length != null && buildClassTypes.length >= 0) {
                    var fields = [];
                    for (var i = 0; i < buildClassTypes.length; i++) {
                        if (buildClassTypes[i][0] != '' && buildClassTypes[i][0] != null && buildClassTypes[i][0] != undefined) {
                            fields.push(buildClassTypes[i][0]);
                        } else {
                            fields.push(buildClassTypes[i]['id']);
                        }
                    }
                    var obj = self;
                    // on change in data of the category field
                    buildClassificationField.store.addListener("add", function (store, records) {
                        var fields = [];
                        var categoryFieldItems = store.getData().items;
                        var categoryId = "";
                        if (categoryFieldItems.length > 0) {
                            for (var i = 0; i < categoryFieldItems.length; i++) {
                                fields.push(categoryFieldItems[i].getData().id);
                            }
                        } else {
                            fields = [];
                        }
                        //if new category is added then length of category field will be greater than 0
                        if (fields.length > 0) {
                            obj.sendRequestToAddMappedClassification(fields, buildAttributes, '');
                        }
                    });
                    buildClassificationField.store.addListener("remove", function (store, records) {
                        var fields = [];
                        var categoryFieldItems = store.getData().items;
                        var categoryId = "";
                        if (categoryFieldItems.length > 0) {
                            for (var i = 0; i < categoryFieldItems.length; i++) {
                                fields.push(categoryFieldItems[i].getData().id);
                            }
                        } else {
                            fields = [];
                        }
                        //if new category is added then length of category field will be greater than 0
                        //if new category is added then length of category field will be greater than 0
                        if (fields.length > 0) {
                            obj.sendRequestToAddMappedClassification(fields, buildAttributes, 'remove');
                        } else {
                            obj.deleteAllBricks(buildAttributes);
                        }
                    });
                    buildClassificationField.store.addListener("clear", function (store, records) {
                        obj.deleteAllBricks(buildAttributes);
                    });
                    self.sendRequestToAddMappedClassification(fields, buildAttributes, 'remove');
                } else {
                    if (buildAttributes != null) {
                        self.deleteAllBricks(buildAttributes);
                    }
                }


            });


            //proceed if the opened product first/current tab contains field named as specificAttributes and category
            if (classTypes != null && classTypes.length != null && classTypes.length >= 0) {
                var fields = [];
                for (var i = 0; i < classTypes.length; i++) {
                    if (classTypes[i][0] != '' && classTypes[i][0] != null && classTypes[i][0] != undefined) {
                        fields.push(classTypes[i][0]);
                    } else {
                        fields.push(classTypes[i]['id']);
                    }
                }
                var obj = this;
                // on change in data of the category field
                classificationField.store.addListener("add", function (store, records) {
                    var fields = [];
                    var categoryFieldItems = store.getData().items;
                    var categoryId = "";
                    if (categoryFieldItems.length > 0) {
                        for (var i = 0; i < categoryFieldItems.length; i++) {
                            fields.push(categoryFieldItems[i].getData().id);
                        }
                    } else {
                        fields = [];
                    }
                    //if new category is added then length of category field will be greater than 0
                    if (fields.length > 0) {
                        obj.sendRequestToAddMappedClassification(fields, attributes, '');
                    }
                });
                classificationField.store.addListener("remove", function (store, records) {
                    var fields = [];
                    var categoryFieldItems = store.getData().items;
                    var categoryId = "";
                    if (categoryFieldItems.length > 0) {
                        for (var i = 0; i < categoryFieldItems.length; i++) {
                            fields.push(categoryFieldItems[i].getData().id);
                        }
                    } else {
                        fields = [];
                    }
                    //if new category is added then length of category field will be greater than 0
                    //if new category is added then length of category field will be greater than 0
                    if (fields.length > 0) {
                        obj.sendRequestToAddMappedClassification(fields, attributes, 'remove');
                    } else {
                        obj.deleteAllBricks(attributes);
                    }
                });
                classificationField.store.addListener("clear", function (store, records) {
                    obj.deleteAllBricks(attributes);
                });
                this.sendRequestToAddMappedClassification(fields, attributes, 'remove');
            } else {
                if (attributes != null) {
                    this.deleteAllBricks(attributes);
                }
            }


            //proceed if the opened product first/current tab contains field named as specificbuildAttributes and category
            if (buildClassTypes != null && buildClassTypes.length != null && buildClassTypes.length >= 0) {
                var fields = [];
                for (var i = 0; i < buildClassTypes.length; i++) {
                    if (buildClassTypes[i][0] != '' && buildClassTypes[i][0] != null && buildClassTypes[i][0] != undefined) {
                        fields.push(buildClassTypes[i][0]);
                    } else {
                        fields.push(buildClassTypes[i]['id']);
                    }
                }
                var obj = this;
                // on change in data of the category field
                buildClassificationField.store.addListener("add", function (store, records) {
                    var fields = [];
                    var categoryFieldItems = store.getData().items;
                    var categoryId = "";
                    if (categoryFieldItems.length > 0) {
                        for (var i = 0; i < categoryFieldItems.length; i++) {
                            fields.push(categoryFieldItems[i].getData().id);
                        }
                    } else {
                        fields = [];
                    }
                    //if new category is added then length of category field will be greater than 0
                    if (fields.length > 0) {
                        obj.sendRequestToAddMappedClassification(fields, buildAttributes, '');
                    }
                });
                buildClassificationField.store.addListener("remove", function (store, records) {
                    var fields = [];
                    var categoryFieldItems = store.getData().items;
                    var categoryId = "";
                    if (categoryFieldItems.length > 0) {
                        for (var i = 0; i < categoryFieldItems.length; i++) {
                            fields.push(categoryFieldItems[i].getData().id);
                        }
                    } else {
                        fields = [];
                    }
                    //if new category is added then length of category field will be greater than 0
                    //if new category is added then length of category field will be greater than 0
                    if (fields.length > 0) {
                        obj.sendRequestToAddMappedClassification(fields, buildAttributes, 'remove');
                    } else {
                        obj.deleteAllBricks(buildAttributes);
                    }
                });
                buildClassificationField.store.addListener("clear", function (store, records) {
                    obj.deleteAllBricks(buildAttributes);
                });
                this.sendRequestToAddMappedClassification(fields, buildAttributes, 'remove');
            } else {
                if (buildAttributes != null) {
                    this.deleteAllBricks(buildAttributes);
                }
            }
        }
    },
    deleteAllBricks: function (attributes) {
        Ext.each(attributes.fieldConfig.allowedTypes, function (key, value) {
            if (attributes.currentElements[key]) {
                attributes.preventDelete[key] = false;
                attributes.removeBlock(attributes.currentElements[key].container);
            }
        });
    },
    sendRequestToAddMappedClassification: function (fields, attributes, action) {
        var fieldsJson = JSON.stringify(fields);
        Ext.Ajax.request({
            url: "/get-allowed-bricks",
            method: "POST",
            params: {
                fields: fieldsJson
            },
            success: function (successResponse) {
                var response = JSON.parse(successResponse.responseText);
                var addNewBlock = false;
                if (response != false) {
                    addNewBlock = true;
                    if (addNewBlock) {
                        //add the field collection block of type recieved from response
                        var allowedKeys = {};
                        Ext.each(response, function (obj, value) {
                            //attributes.addedTypes[response[i]] = true;
                            var key = obj.key;
                            allowedKeys[key] = obj;
                            if (!attributes.addedTypes[key]) {
                                attributes.preventDelete[key] = true;
                                attributes.addBlockElement(i, key, obj, true, obj.title);
                            }
                            //attributes.currentElements[response[i]] = attributes.layoutDefinitions[response[i]];
                        });
                        if (action == 'remove') {
                            Ext.each(attributes.fieldConfig.allowedTypes, function (key, value) {
                                if ((!allowedKeys[key]) && (attributes.currentElements[key])) {
                                    attributes.preventDelete[key] = false;
                                    attributes.removeBlock(attributes.currentElements[key].container);
                                }
                            });
                        }
                        pimcore.layout.refresh();
                    }
                } else if (response == "error") {
                    Ext.Msg.alert("Error", "Opps Something Went Wrong");
                }

            },
            failure: function (failResponse) {
                Ext.Msg.alert(failResponse.responseText);
            }
        });
    }
});

var ClassRelationBundlePlugin = new pimcore.plugin.ClassRelationBundle();
