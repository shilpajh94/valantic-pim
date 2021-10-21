pimcore.registerNS("pimcore.plugin.tree");

pimcore.plugin.tree = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.tree";
    },
    initialize: function () {
        folderClassMapArray = [];
        Ext.Ajax.request({
            url: '/admin/contitechcs/roles/get-folder-class-map',
            async: false,
            success: function(response, opts) {
            	var res = Ext.decode(response.responseText);
            	if (res.success) {
                    folderClassMapArray = res.mapping;
            	}
            }
        });
        Ext.override(pimcore.object.tree, {
            onTreeNodeContextmenu: function (tree, record, item, index, e, eOpts ) {
                e.stopEvent();

                if(pimcore.helpers.hasTreeNodeLoadingIndicator("object", record.data.id)) {
                    return;
                }

                tree.select();

                var menu = new Ext.menu.Menu();
                var perspectiveCfg = this.perspectiveCfg;

                if(tree.getSelectionModel().getSelected().length > 1) {
                    var selectedIds = [];
                    tree.getSelectionModel().getSelected().each(function (item) {
                        selectedIds.push(item.id);
                    });

                    if (record.data.permissions["delete"] && record.data.id != 1 && !record.data.locked && perspectiveCfg.inTreeContextMenu("object.delete")) {
                        menu.add(new Ext.menu.Item({
                            text: t('delete'),
                            iconCls: "pimcore_icon_delete",
                            handler: this.remove.bind(this, selectedIds.join(','))
                        }));
                    }
                } else {
                    var object_types = pimcore.globalmanager.get("object_types_store_create");

                    var objectMenu = {
                        objects: [],
                        importer: [],
                        ref: this
                    };

                    var groups = {
                        importer: {},
                        objects: {}
                    };

                    var tmpMenuEntry;
                    var tmpMenuEntryImport;
                    
                    var allowedClassArray = [];//$this.config.allowedClasses;
                    var currentPath = record.data.path;
                    var currentKey = record.data.key;
                    var user = pimcore.globalmanager.get("user");
                    var folderAllowed = true;
                    var allowAll = true;
                    if(!user.admin) {
                        var currentContextType = record.data.type;
                        var currentPathArray = currentPath.split('/');
                        var publishedFlag = true;
                        Ext.each(folderClassMapArray, function(key, value) {
                            var folderPath = key.path;
                            var newPath = '';
                            if (key.class=='CSProducts') {
                                for(var i=0; i< currentPathArray.length; i++) {
                                    if (i==1) {
                                        newPath = newPath + currentPathArray[i];
                                    } else {
                                        newPath = newPath+'/'+currentPathArray[i];
                                    }
                                    if (currentContextType == 'object') {
                                        folderAllowed = false;
                                    }
                                    if (newPath.toLowerCase().includes(folderPath.toLowerCase())) {
                                        allowAll = false;
                                        if (currentContextType.toLowerCase()== key.parentType.toLowerCase()) {
                                            if (key.class.trim()!==record.data.className) {
                                                folderAllowed = key.allowFolder;
                                            } else {
                                                folderAllowed = false;
                                            }
                                        }
                                    }
                                }
                            } else {
                                for(var i=0; i< currentPathArray.length; i++) {
                                    if (i==1) {
                                        newPath = newPath + currentPathArray[i];
                                    } else {
                                        newPath = newPath+'/'+currentPathArray[i];
                                    }
                                    if (currentContextType == 'object') {
                                        folderAllowed = false;
                                    }
                                    let condition = (newPath.toLowerCase().includes(folderPath.toLowerCase()));
                                    if(condition) {
                                        allowAll = false;
                                        if (currentContextType.toLowerCase()== key.parentType.toLowerCase()) {
                                            if (key.class.trim()!==record.data.className) {
                                                if (!empty(key.class.trim()) && !in_array(key.class.trim(), allowedClassArray)) {
                                                    allowedClassArray.push(key.class);
                                                    folderAllowed = key.allowFolder;
                                                }
                                            } else {
                                                folderAllowed = false;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    }
                    console.log(folderAllowed);
                    var $this = this;

                    object_types.sort([{property: 'translatedText', direction: 'ASC'}]);
                    object_types.each(function (classRecord) {

                        if ($this.config.allowedClasses && !in_array(classRecord.get("id"), $this.config.allowedClasses)) {
                            return;
                        }
                        
                        if (!user.admin) {
                            console.log(allowAll);
                            console.log(allowedClassArray);
                            if (!allowAll && !in_array(classRecord.get('text'), allowedClassArray)) {
                                return;
                            }
                        }

                        tmpMenuEntry = {
                            text: classRecord.get("translatedText"),
                            iconCls: "pimcore_icon_object pimcore_icon_overlay_add",
                            handler: $this.addObject.bind($this, classRecord.get("id"), classRecord.get("text"), tree, record)
                        };

                        // add special icon
                        if (classRecord.get("icon") != "/bundles/pimcoreadmin/img/flat-color-icons/class.svg") {
                            tmpMenuEntry.icon = classRecord.get("icon");
                            tmpMenuEntry.iconCls = "pimcore_class_icon";
                        }

                        tmpMenuEntryImport = {
                            text: classRecord.get("translatedText"),
                            iconCls: "pimcore_icon_object pimcore_icon_overlay_add",
                            handler: $this.importObjects.bind($this, classRecord.get("id"), classRecord.get("text"), tree, record)
                        };

                        // add special icon
                        if (classRecord.get("icon") != "/bundles/pimcoreadmin/img/flat-color-icons/class.svg") {
                            tmpMenuEntryImport.icon = classRecord.get("icon");
                            tmpMenuEntryImport.iconCls = "pimcore_class_icon";
                        }

                        // check if the class is within a group
                        if (classRecord.get("group")) {
                            if (!groups["objects"][classRecord.get("group")]) {
                                groups["objects"][classRecord.get("group")] = {
                                    text: classRecord.get("group"),
                                    iconCls: "pimcore_icon_folder",
                                    hideOnClick: false,
                                    menu: {
                                        items: []
                                    }
                                };
                                groups["importer"][classRecord.get("group")] = {
                                    text: classRecord.get("group"),
                                    iconCls: "pimcore_icon_folder",
                                    hideOnClick: false,
                                    menu: {
                                        items: []
                                    }
                                };
                                objectMenu["objects"].push(groups["objects"][classRecord.get("group")]);
                                objectMenu["importer"].push(groups["importer"][classRecord.get("group")]);
                            }

                            groups["objects"][classRecord.get("group")]["menu"]["items"].push(tmpMenuEntry);
                            groups["importer"][classRecord.get("group")]["menu"]["items"].push(tmpMenuEntryImport);
                        } else {
                            objectMenu["objects"].push(tmpMenuEntry);
                            objectMenu["importer"].push(tmpMenuEntryImport);
                        }
                    });


                    var isVariant = record.data.type == "variant";

                    if (record.data.permissions.create) {
                        if (!isVariant && (allowAll || allowedClassArray.length > 0)) {
                            if (perspectiveCfg.inTreeContextMenu("object.add")) {
                                menu.add(new Ext.menu.Item({
                                    text: t('add_object'),
                                    iconCls: "pimcore_icon_object pimcore_icon_overlay_add",
                                    hideOnClick: false,
                                    menu: objectMenu.objects
                                }));
                            }
                        }

                        if (record.data.allowVariants && perspectiveCfg.inTreeContextMenu("object.add")) {
                            menu.add(new Ext.menu.Item({
                                text: t("add_variant"),
                                iconCls: "pimcore_icon_variant",
                                handler: this.createVariant.bind(this, tree, record)
                            }));
                        }

                        if (!isVariant) {

                            if (perspectiveCfg.inTreeContextMenu("object.addFolder") && folderAllowed) {
                                menu.add(new Ext.menu.Item({
                                    text: t('create_folder'),
                                    iconCls: "pimcore_icon_folder pimcore_icon_overlay_add",
                                    handler: this.addFolder.bind(this, tree, record)
                                }));
                            }

                            if (perspectiveCfg.inTreeContextMenu("object.importCsv") && (allowAll || allowedClassArray.length > 0)) {
                                menu.add({
                                    text: t('import_csv'),
                                    hideOnClick: false,
                                    iconCls: "pimcore_icon_object pimcore_icon_overlay_upload",
                                    menu: objectMenu.importer
                                });
                            }

                            menu.add("-");

                            //paste
                            var pasteMenu = [];

                            if (perspectiveCfg.inTreeContextMenu("object.paste")) {
                                if (pimcore.cachedObjectId && record.data.permissions.create) {
                                    pasteMenu.push({
                                        text: t("paste_recursive_as_childs"),
                                        iconCls: "pimcore_icon_paste",
                                        handler: this.pasteInfo.bind(this, tree, record, "recursive")
                                    });
                                    pasteMenu.push({
                                        text: t("paste_recursive_updating_references"),
                                        iconCls: "pimcore_icon_paste",
                                        handler: this.pasteInfo.bind(this, tree, record, "recursive-update-references")
                                    });
                                    pasteMenu.push({
                                        text: t("paste_as_child"),
                                        iconCls: "pimcore_icon_paste",
                                        handler: this.pasteInfo.bind(this, tree, record, "child")
                                    });


                                    if (record.data.type != "folder") {
                                        pasteMenu.push({
                                            text: t("paste_contents"),
                                            iconCls: "pimcore_icon_paste",
                                            handler: this.pasteInfo.bind(this, tree, record, "replace")
                                        });
                                    }
                                }
                            }

                            if (!isVariant) {
                                if (pimcore.cutObject && record.data.permissions.create) {
                                    pasteMenu.push({
                                        text: t("paste_cut_element"),
                                        iconCls: "pimcore_icon_paste",
                                        handler: function () {
                                            this.pasteCutObject(pimcore.cutObject,
                                                pimcore.cutObjectParentNode, record, this.tree);
                                            pimcore.cutObjectParentNode = null;
                                            pimcore.cutObject = null;
                                        }.bind(this)
                                    });
                                }

                                if (pasteMenu.length > 0) {
                                    menu.add(new Ext.menu.Item({
                                        text: t('paste'),
                                        iconCls: "pimcore_icon_paste",
                                        hideOnClick: false,
                                        menu: pasteMenu
                                    }));
                                }
                            }
                        }
                    }

                    if (!isVariant) {
                        if (record.data.id != 1 && record.data.permissions.view && perspectiveCfg.inTreeContextMenu("object.copy")) {
                            menu.add(new Ext.menu.Item({
                                text: t('copy'),
                                iconCls: "pimcore_icon_copy",
                                handler: this.copy.bind(this, tree, record)
                            }));
                        }

                        //cut
                        if (record.data.id != 1 && !record.data.locked && record.data.permissions.rename && perspectiveCfg.inTreeContextMenu("object.cut")) {
                            menu.add(new Ext.menu.Item({
                                text: t('cut'),
                                iconCls: "pimcore_icon_cut",
                                handler: this.cut.bind(this, tree, record)
                            }));
                        }
                    }

                    //publish
                    if (record.data.type != "folder" && !record.data.locked) {
                        if (record.data.published && record.data.permissions.unpublish && perspectiveCfg.inTreeContextMenu("object.unpublish")) {
                            menu.add(new Ext.menu.Item({
                                text: t('unpublish'),
                                iconCls: "pimcore_icon_unpublish",
                                handler: this.publishObject.bind(this, tree, record, 'unpublish')
                            }));
                        } else if (!record.data.published && record.data.permissions.publish && perspectiveCfg.inTreeContextMenu("object.publish")) {
                            menu.add(new Ext.menu.Item({
                                text: t('publish'),
                                iconCls: "pimcore_icon_publish",
                                handler: this.publishObject.bind(this, tree, record, 'publish')
                            }));
                        }
                    }


                    if (record.data.permissions["delete"] && record.data.id != 1 && !record.data.locked && perspectiveCfg.inTreeContextMenu("object.delete")) {
                        menu.add(new Ext.menu.Item({
                            text: t('delete'),
                            iconCls: "pimcore_icon_delete",
                            handler: this.remove.bind(this, record.data.id)
                        }));
                    }

                    if (record.data.permissions.rename && record.data.id != 1 && !record.data.locked && perspectiveCfg.inTreeContextMenu("object.rename")) {
                        menu.add(new Ext.menu.Item({
                            text: t('rename'),
                            iconCls: "pimcore_icon_key pimcore_icon_overlay_go",
                            handler: this.editObjectKey.bind(this, tree, record)
                        }));
                    }


                    // advanced menu
                    var advancedMenuItems = [];
                    var user = pimcore.globalmanager.get("user");

                    if (record.data.permissions.create && perspectiveCfg.inTreeContextMenu("object.searchAndMove")) {
                        advancedMenuItems.push({
                            text: t('search_and_move'),
                            iconCls: "pimcore_icon_search pimcore_icon_overlay_go",
                            handler: this.searchAndMove.bind(this, tree, record)
                        });
                    }

                    if (record.data.id != 1 && user.admin) {
                        var lockMenu = [];
                        if (record.data.lockOwner && perspectiveCfg.inTreeContextMenu("object.unlock")) { // add unlock
                            lockMenu.push({
                                text: t('unlock'),
                                iconCls: "pimcore_icon_lock pimcore_icon_overlay_delete",
                                handler: function () {
                                    pimcore.elementservice.lockElement({
                                        elementType: "object",
                                        id: record.data.id,
                                        mode: "null"
                                    });
                                }.bind(this)
                            });
                        } else {
                            if (perspectiveCfg.inTreeContextMenu("object.lock")) {
                                lockMenu.push({
                                    text: t('lock'),
                                    iconCls: "pimcore_icon_lock pimcore_icon_overlay_add",
                                    handler: function () {
                                        pimcore.elementservice.lockElement({
                                            elementType: "object",
                                            id: record.data.id,
                                            mode: "self"
                                        });
                                    }.bind(this)
                                });
                            }

                            if (perspectiveCfg.inTreeContextMenu("object.lockAndPropagate")) {
                                lockMenu.push({
                                    text: t('lock_and_propagate_to_childs'),
                                    iconCls: "pimcore_icon_lock pimcore_icon_overlay_go",
                                    handler: function () {
                                        pimcore.elementservice.lockElement({
                                            elementType: "object",
                                            id: record.data.id,
                                            mode: "propagate"
                                        });
                                    }.bind(this)
                                });
                            }
                        }

                        if (record.data.locked) {
                            // add unlock and propagate to children functionality
                            if (perspectiveCfg.inTreeContextMenu("object.unlockAndPropagate")) {
                                lockMenu.push({
                                    text: t('unlock_and_propagate_to_children'),
                                    iconCls: "pimcore_icon_lock pimcore_icon_overlay_delete",
                                    handler: function () {
                                        pimcore.elementservice.unlockElement({
                                            elementType: "object",
                                            id: record.data.id
                                        });
                                    }.bind(this)
                                });
                            }
                        }

                        if (lockMenu.length > 0) {
                            advancedMenuItems.push({
                                text: t('lock'),
                                iconCls: "pimcore_icon_lock",
                                hideOnClick: false,
                                menu: lockMenu
                            });
                        }
                    }

                    menu.add("-");

                    if (advancedMenuItems.length) {
                        menu.add({
                            text: t('advanced'),
                            iconCls: "pimcore_icon_more",
                            hideOnClick: false,
                            menu: advancedMenuItems
                        });
                    }

                    // Sort Children By
                    var sortByItems = [];

                    if (record.data.permissions.settings && perspectiveCfg.inTreeContextMenu("object.changeChildrenSortBy")) {
                        sortByItems.push({
                            text: t('by_key'),
                            iconCls: "pimcore_icon_alphabetical_sorting_az",
                            handler: this.changeObjectChildrenSortBy.bind(this, tree, record, 'key')
                        });
                        sortByItems.push({
                            text: t('by_index'),
                            iconCls: "pimcore_icon_index_sorting",
                            handler: this.changeObjectChildrenSortBy.bind(this, tree, record, 'index')
                        });
                    }

                    if (sortByItems.length) {
                        menu.add("-");
                        menu.add({
                            text: t('sort_children_by'),
                            iconCls: "pimcore_icon_folder",
                            hideOnClick: false,
                            menu: sortByItems
                        });
                    }

                    if (perspectiveCfg.inTreeContextMenu("object.reload")) {
                        menu.add({
                            text: t('refresh'),
                            iconCls: "pimcore_icon_reload",
                            handler: this.reloadNode.bind(this, tree, record)
                        });
                    }
                }

                pimcore.helpers.hideRedundantSeparators(menu);

                pimcore.plugin.broker.fireEvent("prepareObjectTreeContextMenu", menu, this, record);

                menu.showAt(e.pageX+1, e.pageY+1);
            },
 
        });
        
    },
    pimcoreReady: function (params, broker) {
        
    }
});

var tree = new pimcore.plugin.tree();


