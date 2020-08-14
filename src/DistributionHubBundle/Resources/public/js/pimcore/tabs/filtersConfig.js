pimcore.registerNS("pimcore.plugin.distributionhub.tabs.filtersConfig");
pimcore.plugin.distributionhub.tabs.filtersConfig = Class.create(pimcore.element.abstract, {

    initialize: function (data, parentType) {
        this.data = data;
        this.parentType = parentType;
        if (!this.data) {
            this.data = {};
        }
        this.lang = this.data.data ? this.data.data['lang'] : null;
        this.channelInfo = this.data.data ? this.data.data['0'] : null;
        this.classSelection = this.channelInfo ? this.channelInfo.pimcoreClassId : null;
    },

    getSavedFilters: function () {
        var outerScope = this;
        Ext.Ajax.request({
            url: "/admin/distributionhub/filters/get_filter_config",
            async: false,
            method: "post",
            params: {
                channelId: this.data.general.o_id
            },
            success: function (response) {
                var resdata = Ext.decode(response.responseText);

                if (resdata.success) {
                    outerScope.savedfilterConfig = resdata.filterConfig;
                }
            }.bind(this)
        });
    },

    getFilters: function () {

        //get current set of saved filters
        this.getSavedFilters();
        var savedFilterData = this.savedfilterConfig;

        this.conditionPanelContainer = Ext.create('Ext.panel.Panel', {});

        var objectTypeStore = Ext.create('Ext.data.Store', {
            fields: ['name', 'value'],
            data: [{
                    "name": t('dHub_only_variants'),
                    "value": globalConstants.DHUB_VARIANT
                },
                {
                    "name": t('dHub_all_objects'),
                    "value": globalConstants.DHUB_OBJECT
                }
            ]
        });


        this.objectTypeCombo = Ext.create('Ext.form.ComboBox', {
            fieldLabel: t('dHub_object_type') + '<span style="color:red;">*</span>',
            style: "margin-left: 10px",
            labelWidth: 230,
            autoSelect: true,
            store: objectTypeStore,
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            queryMode: 'local',
            editable: false,
            displayField: 'name',
            valueField: 'value',
            width: 400,
            value: this.objectTypeValue
        });
        
        this.saveButton = {
            text: 'Save',
            iconCls: "pimcore_icon_apply",
            hidden:(typeof this.parentType != "undefined" && this.parentType == 'shared'),
            handler: this.save.bind(this)
        };

        this.resetButton = {
            text: 'Reset',
            iconCls: "pimcore_icon_clear_filters",
            hidden:(typeof this.parentType != "undefined" && this.parentType == 'shared'),
            handler: this.reset.bind(this)
        };

        this.clearButton = {
            text: 'Clear All',
            iconCls: "pimcore_icon_delete",
            hidden:(typeof this.parentType != "undefined" && this.parentType == 'shared'),
            handler: this.clear.bind(this)
        };


        if (savedFilterData.success === true) {
            this.objectTypeCombo.setValue(savedFilterData.type);
            this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(savedFilterData.classId, savedFilterData.conditions, this.channelInfo);
            this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
        } else {
            if (this.data) {
                this.objectTypeCombo.setValue(globalConstants.DHUB_VARIANT);
                this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(this.classSelection, this.data.conditions, this.channelInfo);
                this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
            }
        }

        return new Ext.Panel({
            scrollable: true,
            style: "padding: 10px",
            labelWidth: 400,
            title: t("dHub_apply_filters"),
            iconCls: "dHub_filter",
            items: [this.conditionPanelContainer],
            dockedItems: [{
                    xtype: 'toolbar',
                    dock: 'top',
                    items: [
                        this.objectTypeCombo
                    ]
                }],
            buttons: [
                this.resetButton,
                this.clearButton,
                this.saveButton
            ]
        });

    },

    getTabId: function () {
        if (!this.tabId) {
            if (this.data && this.data.id) {
                this.tabId = "dHub_" + this.data.id;
            } else {
                this.tabId = "dHub_" + uniqid();
            }
        }
        return this.tabId;
    },

    getResults: function () {
        this.resultPanel = new pimcore.plugin.distributionhub.tabs.preview(this.getSaveData.bind(this), this.data.data);
        return this.resultPanel.getLayout();
    },

    save: function () {
        var saveData = this.getSaveData(false, true);

        var getCurrentClass = Ext.decode(saveData);
        if (getCurrentClass.classId) {
            if (this.objectTypeCombo.isValid()) {
                //remote to update id in global manager later on
                // pimcore.globalmanager.remove(this.getTabId());

                Ext.Ajax.request({
                    url: "/admin/distributionhub/filters/save",
                    params: {
                        id: this.data ? this.data.general.o_id : null,
                        type: this.data ? this.objectTypeCombo.value : null,
                        data: saveData
                    },
                    method: "post",
                    success: function (response) {
                        var savedFilterData = Ext.decode(response.responseText);
                        if (savedFilterData && savedFilterData.success) {
                            pimcore.helpers.showNotification(t("success"), t("dHub_filter_save_success"), "success");
                            if (!this.data) {
                                this.data = {};
                            }
                            this.data.id = savedFilterData.id;
                        } else {
                            pimcore.helpers.showNotification(t("error"), t("dHub_filter_save_error"), "error", t(savedFilterData.message));
                        }
                    }.bind(this)
                });
            }
        } else {
            Ext.MessageBox.alert(t('dHub_class_not_selected'), t('dHub_class_not_availabe_save_error'));
            this.objectTypeCombo.reset();
        }

    },

    getSaveData: function (raw, save) {
        var saveData = {};
        var outerScope = this;
        if (this.channelInfo) {
            Ext.Ajax.request({
                url: "/admin/distributionhub/filters/get-updated-channel-details",
                async: false,
                params: {
                    id: this.channelInfo ? this.channelInfo.id : null
                },
                method: "post",
                success: function (response) {
                    var resdata = Ext.decode(response.responseText);
                    if (!resdata.success) {
                        outerScope.newCls = this.classSelection;
                        outerScope.updatedGrid = null;

                    }
                    if (resdata.success) {
                        outerScope.updatedLang = resdata.lang;
                        outerScope.newCls = resdata.classId;
                        outerScope.updatedGrid = resdata.showInGrid
                    }
                }
            });
        }

        saveData['classId'] = this.newCls;

        saveData['lang'] = empty(this.updatedLang) ? this.lang : this.updatedLang;

        saveData['type'] = this.objectTypeCombo.getValue();

        saveData["showInGrid"] = this.updatedGrid;

        if (this.conditionPanel) {
            saveData["conditions"] = this.conditionPanel.getSaveData();
        }

        if (this.settingsForm) {
            saveData["settings"] = this.settingsForm.getForm().getFieldValues();
        }

        if (raw) {
            return saveData;
        } else {
            return Ext.encode(saveData);
        }
    },

    clear: function () {
        this.objectTypeCombo.reset();
        this.conditionPanel.conditionsContainerInner.destroy();
        this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(this.classSelection, this.data.conditions);
        this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
    },

    reset: function () {
        var outerScope = this;
        Ext.Ajax.request({
            url: "/admin/distributionhub/filters/get_filter_config",
            async: false,
            params: {
                channelId: this.channelInfo ? this.channelInfo.id : null
            },
            method: "post",
            success: function (response) {
                var resdata = Ext.decode(response.responseText);

                if (resdata.success) {
                    let filterConfig = resdata.filterConfig;
                    outerScope.objectTypeCombo.setValue(filterConfig.type);
                    outerScope.conditionPanel.conditionsContainerInner.destroy();
                    outerScope.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(filterConfig.classId, filterConfig.conditions);
                    outerScope.conditionPanelContainer.add(outerScope.conditionPanel.getConditionPanel());
                }
            }
        });
    }
});