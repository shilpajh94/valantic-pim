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
                channelId: this.data.general.id
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
        this.objectTypeCombo = this.objectTypeCombo();
        
        this.filterpanels = this.filterConditionsPanel(savedFilterData, this.objectTypeCombo);
        this.listPanel = this.getFileUploadForm();
       

        let filterPanelsData = new Array();
        let filterPanels = [globalConstants.DHUB_FILTER_BY_CONDITIONS, globalConstants.DHUB_FILTER_BY_LIST];
        
        for (var i = 0; i < filterPanels.length; i++) {
            let storeItem = {id: filterPanels[i], name: filterPanels[i]};
            filterPanelsData.push(storeItem);
        }

        let filterPanelsStore = new Ext.data.JsonStore({
            data: filterPanelsData,
            fields: ["boxLabel", "name"]
        });
        let rand = Math.random() * (9999 - 1000) + 1000;
        var outerScope = this;
        var filterTypes = new Array();
        
        filterPanelsStore.data.items.forEach(function (item) {
            let filterPanelInfo = {
                boxLabel: item.data.id,
                xtype: 'radiofield',
                name: "filterBy",
                width: 300,
                inputValue: item.data.name
            };
            if (item.data.id === globalConstants.DHUB_FILTER_BY_CONDITIONS) {
                filterPanelInfo.checked = true;
                outerScope.filterpanels.show();
                
                if(savedFilterData.filterByList){
                    filterPanelInfo.checked = false;
                }
            }
            if (item.data.id === globalConstants.DHUB_FILTER_BY_LIST) {
                if(savedFilterData.filterByList){
                    filterPanelInfo.checked = true;
                    outerScope.filterpanels.hide();
                    outerScope.listPanel.show();
                }
            }
            filterTypes.push(filterPanelInfo);
        });
        
        this.filterPanelsRadio =  Ext.create('Ext.Panel', {
            scrollable: true,
            style: "padding: 10px",
            labelWidth: 400,
            title: t("dHub_apply_filters"),
            iconCls: "dHub_filter",
            dockedItems: [{
                xtype: 'toolbar',
                dock: 'top',
                items: [
                    this.objectTypeCombo
                ]
            }],
            items: [{
                xtype: 'radiogroup',
                fieldLabel: '<strong>Filter Objects By</strong>',
                blankText: t('dHub_field_is_required'),
                msgTarget: 'under',
                style: "margin-left: 20px;background-color:#e6e0e0;padding-left:20px",
                items: filterTypes,
                labelWidth: 230,
                width: 800,
                allowBlank: false,
                editable: true,
                onChange: function (newVal, oldVal) {
                        if (newVal.filterBy === globalConstants.DHUB_FILTER_BY_LIST) {
                            this.listPanel.show();
                            this.filterpanels.hide();
                        } else if (newVal.filterBy === globalConstants.DHUB_FILTER_BY_CONDITIONS) {
                            this.listPanel.hide();
                            this.filterpanels.show();
                        }
                    }.bind(this)
            }, this.filterpanels, this.listPanel],
            buttons: [
                this.resetButton,
                this.clearButton,
                this.saveButton
            ]
        });

        return this.filterPanelsRadio;
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
        var radioPanel = this.filterPanelsRadio.getComponent(0); 

        var getCurrentClass = Ext.decode(saveData);
        
        if (getCurrentClass.classId) {
            if (this.objectTypeCombo.isValid()) {
                //remote to update id in global manager later on
                // pimcore.globalmanager.remove(this.getTabId());
                if(radioPanel.getValue().filterBy === globalConstants.DHUB_FILTER_BY_LIST && !this.fileUploadForm.isValid()){
                    Ext.MessageBox.alert(t('dHub_failure'), "Select an attribute first.");
                } else {
                    Ext.Ajax.request({
                        url: "/admin/distributionhub/filters/save",
                        params: {
                            id: this.data ? this.data.general.id : null,
                            type: this.data ? this.objectTypeCombo.value : null,
                            filterByList: radioPanel.getValue().filterBy === globalConstants.DHUB_FILTER_BY_LIST ? true : false,
                            listFileAssetId: this.newlyUploadedAssetId,
                            filterByAttribute: this.fieldSelection.value,
                            listFileSavePath: this.uploadFileValue,
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
            }
        } else {
            Ext.MessageBox.alert(t('dHub_class_not_selected'), t('dHub_class_not_availabe_save_error'));
            // this.objectTypeCombo.reset();
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
        
        saveData['filterByList'] = this.filterPanelsRadio.getComponent(0).getValue().filterBy === globalConstants.DHUB_FILTER_BY_LIST ? true : false;
        
        saveData['listFileAssetId'] = this.newlyUploadedAssetId ? this.newlyUploadedAssetId : this.savedfilterConfig.listFileAssetId ;
        
        saveData['filterByAttribute'] = this.fieldSelection.getValue();

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
        // this.objectTypeCombo.reset();
        this.conditionPanel.conditionsContainerInner.destroy();
        this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(this.classSelection, this.data.conditions);
        this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
        this.fieldSelection.reset();
        this.fileUploadField.reset();
        this.openAssetButton.setHidden(true);
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
                    // outerScope.objectTypeCombo.setValue(filterConfig.type);
                    outerScope.conditionPanel.conditionsContainerInner.destroy();
                    outerScope.fieldSelection.setValue(filterConfig.filterByAttribute);
                    outerScope.fileUploadField.setRawValue(filterConfig.listFileSavePath);
                    outerScope.fileUploadField.setValue(filterConfig.listFileSavePath);
                    if(empty(filterConfig.listFileAssetId)){
                        outerScope.openAssetButton.setHidden(true);
                    }
                    
                    outerScope.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(filterConfig.classId, filterConfig.conditions);
                    outerScope.conditionPanelContainer.add(outerScope.conditionPanel.getConditionPanel());
                }
            }
        });
    },

    filterConditionsPanel: function (savedFilterData, objectCombo) {
        this.conditionPanelContainer = Ext.create('Ext.panel.Panel', {itemId: 'panel2',hidden: true});

        if (savedFilterData.success === true) {
            // objectCombo.setValue(savedFilterData.type);
            this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(savedFilterData.classId, savedFilterData.conditions, this.channelInfo);
            this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
        } else {
            if (this.data) {
                // objectCombo.setValue(globalConstants.DHUB_VARIANT);
                this.conditionPanel = new pimcore.bundle.distributionhub.filtersConfig.conditionPanel(this.classSelection, this.data.conditions, this.channelInfo);
                this.conditionPanelContainer.add(this.conditionPanel.getConditionPanel());
            }
        }
        return this.conditionPanelContainer;

    },

    objectTypeCombo: function () {

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

        return Ext.create('Ext.form.ComboBox', {
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
            value: "object",
            hidden: true
        });
    },

    openUploadedAsset: function () {
        pimcore.helpers.openElement(this.newlyUploadedAssetId, 'asset');
    },

    getFileUploadForm: function () {
        
        if(this.savedfilterConfig.listFileAssetId){
            this.newlyUploadedAssetId = this.savedfilterConfig.listFileAssetId;
        }
        
        var fieldStore = new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: true,
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/filters/get-fields',
                reader: {
                    rootProperty: 'data',
                    idProperty: 'fieldName'
                },
                extraParams: {class_id: this.classSelection, type: 'class', allowedFields : 'flat'}
            },
            fields: ['fieldName','fieldLabel', 'fieldType', 'context']
        });

        this.fieldSelection = Ext.create('Ext.form.ComboBox',
            {
                fieldLabel: t("dHub_field_filterList")+'<span style="color:red;">*</span>',
                name: "attributeListUpload",
                store: fieldStore,
                queryMode: 'local',
                style: "margin-left: 20px",
                labelWidth: 230,
                autoSelect: true,
                width: 400,
                valueField: 'fieldName',
                displayField: 'fieldLabel',
                allowBlank: false,
                msgTarget: 'under',
                blankText: t('dHub_field_is_required')
            }
        );
        
        if(this.savedfilterConfig.filterByAttribute){
            this.fieldSelection.setValue(this.savedfilterConfig.filterByAttribute);
        }

        this.openAssetButton = Ext.create('Ext.Button', {
            // text: 'Open uploaded document',
            iconCls: 'pimcore_icon_open',
            // hidden: !fileAlreadImported,
            tooltip: t('dHub_open_saved_csv_list'),
            style: "margin-left: 20px",
            handler: function () {
                outerScope.openUploadedAsset();
            }
        });
        if(empty(this.savedfilterConfig.listFileAssetId)){
            this.openAssetButton.setHidden(true);
        }


        let outerScope = this;
        this.fileUploadField = new Ext.create('Ext.form.field.File', {
            name: 'file',
            fieldLabel: t('dHub_upload_artical_list') + ' <span style="color:red;">*</span>',
            labelWidth: 230,
            width: 650,
            style: "margin-left: 20px",
            regex: /^.*\.(csv|CSV|Csv)$/,
            regexText: t('dHub_csv_allowed_only'),
            msgTarget: 'under',
            buttonText: t('dHub_upload_file_csv_excel'),
            labelStyle: "color: black !important",
            listeners: {
                change: function (fileField, value) {
                    var rowValue = fileField.getRawValue();
                    rowValue = rowValue.replace(/C:\\fakepath\\/g, '');

                    var form = this.up('form').getForm();
                    
                    if (form.isValid()) {
                        form.submit(
                        {
                            url: '/admin/distributionhub/basic_config/read_uploaded_list_file',
                            waitMsg: t('dHub_uploading_file'),
                            params: {
                                csrfToken: pimcore.settings['csrfToken'],
                                channelName : outerScope.channelInfo.key
                            },
                            success: function (fp, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText); 
                                fileField.setRawValue(rowValue);
                                outerScope.openAssetButton.setHidden(false);
                                outerScope.uploadFileValue = rowValue;
                                outerScope.newlyUploadedFileName = response.fileName;
                                outerScope.newlyUploadedAssetId = response.assetId;
                            },
                            failure: function (form, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText);
                                Ext.MessageBox.alert(t('dHub_failure'), response.msg);
                            }
                        } 
                        );
                     } else {
                        fileField.setRawValue(null);
                        fileField.setValue(null);
                        fileField.lastValue = "";
                        Ext.MessageBox.alert(t('dHub_failure'), "Select an attribute first.");
                    }
                }
            }
        });

        // set saved value in file upload field
         if(this.savedfilterConfig.listFileSavePath){
            this.fileUploadField.setRawValue(this.savedfilterConfig.listFileSavePath);
            this.fileUploadField.setValue(this.savedfilterConfig.listFileSavePath);
        }
        
        let infoImage = "/bundles/pimcoreadmin/img/flat-color-icons/info.svg";
        let infoMsg = "<img src='"+ infoImage +"' style='vertical-align: middle' > " + "<span><i>" +t('dHub_supported_upload_list') + "</i></span>";

        let infoPanel = new Ext.create('Ext.panel.Panel',{
            cls:'info_ftp',
            style:{
                clear:'left',
                float:'left',
                paddingLeft:'240px',
                paddingTop:'5px'
            },
            html: infoMsg
        });
        
        this.fileUploadForm = Ext.create('Ext.form.Panel', {
            itemId: 'panel1',
            hidden: true,
            items: [
                 
                this.fieldSelection,
                {
                xtype: 'panel',
                layout: 'hbox',
                items: [
                        this.fileUploadField,
                        this.openAssetButton
                    ]
                },
                infoPanel
                
            ]
        });
        return this.fileUploadForm; 
    }
});
