pimcore.registerNS("pimcore.plugin.distributionhub.tabs.scheduleConfig");


pimcore.plugin.distributionhub.tabs.scheduleConfig = Class.create(pimcore.element.abstract, {

    initialize: function (data, channelId, parentPanel) {
        this.data = data.data;
        this.channelId = channelId;
        this.parentPanel = parentPanel;
        this.scheduleScreenRefreshTime = this.data[0].scheduleScreenRefreshTime;
        this.formDataUploaded = false;

    },

    /**
     * create and return the form
     *
     * @returns {Ext.form.FormPanel}
     */
    getGridPanel: function () {

        this.store = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/schedules/list',
                extraParams: {
                    channelId: this.channelId
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "name", "export_date", "export_format", "export_location", "expiry", "export_ftp", "export_status", "creation_date"],
           
        });

        this.store.load();

        this.grid = new Ext.grid.Panel({
            frame: false,
            autoScroll: true,
            store: this.store,
            columns: this.getGridColumns(),
            iconCls: 'dHub_schedule',
            trackMouseOver: true,
            columnLines: true,
            stripeRows: true,
            tbar: this.getGridToolbar(),
            viewConfig: {
                forceFit: true,
            },
            title: t("dHub_schedule_configuration"),
        });

        let refreshTime = this.scheduleScreenRefreshTime * 60 * 1000;
        Ext.TaskManager.start({
            run: function () {
                this.refreshGrid();
            },
            interval: refreshTime,
            scope: this,
        });

        return this.grid;
    },

    refreshGrid: function () {
        this.store.reload();
    },

    getGridToolbar: function () {

        var toolbar = Ext.create('Ext.Toolbar', {
            cls: 'pimcore_main_toolbar',
            items: [
                {
                    xtype: "button",
                    text: t('add'),
                    iconCls: "pimcore_icon_add",
                    handler: this.openWizard.bind(this),
                },
                {
                    xtype: "button",
                    text: t('refresh'),
                    iconCls: "pimcore_icon_refresh",
                    handler: this.refreshGrid.bind(this),
                }
            ]
        });

        return toolbar;
    },

    getGridColumns: function () {

        var typesColumns = [
            {
                text: t("dHub_id"),
                sortable: true,
                hidden: true,
                dataIndex: 'id'
            },
            {
                text: t("dHub_name"),
                width: 140,
                sortable: true,
                dataIndex: 'name'
            },
            {
                text: t("dHub_download_file_name"),
                width: 150,
                sortable: true,
                dataIndex: 'download_file_name'
            },
            {
                text: t("dHub_export_date"),
                width: 130,
                sortable: true,
                dataIndex: "export_date"
            },
            // {
            //     text: t("dHub_export_format"),
            //     width: 100,
            //     sortable: true,
            //     dataIndex: 'export_format'
            // },
            {
                text: t("dHub_export_location"),
                width: 100,
                sortable: true,
                dataIndex: 'export_location'
            },
            {
                text: t("dHub_expiry"),
                width: 130,
                sortable: true,
                dataIndex: "expiry"

            },
            {
                text: t("dHub_export_ftp"),
                width: 150,
                sortable: true,
                dataIndex: 'export_ftp'

            },
            {
                text: t("dHub_export_status"),
                width: 100,
                sortable: true,
                dataIndex: 'export_status'

            },
            {
                text: t("dHub_creation_date"),
                width: 130,
                sortable: true,
                dataIndex: "creation_date"

            },
            {
                text: t("dHub_process_start_time"),
                width: 130,
                sortable: true,
                dataIndex: "process_start_time"

            },
            {
                text: t("dHub_process_end_time"),
                width: 130,
                sortable: true,
                dataIndex: "process_end_time"

            },
            {
                text: t('dHub_file_download_column_header'),
                xtype: 'actioncolumn',
                dataIndex: 'exportFilePimcoreAssetId',
                width: 120,
                renderer: function (value, metadata, record, rowIndex, colIndex, store, view) {
                    if (record.get('exportFilePimcoreAssetId') == null) {
                        this.items[0].icon = "";
                        metadata.style = 'cursor: pointer;';
                    } else {
                        this.items[0].icon = "/bundles/pimcoreadmin/img/icon/download-medium.png";
                        this.items[0].disabled = false;
                    }
                    return '';
                },
                items: [{
                        icon: "/bundles/pimcoreadmin/img/icon/download-medium.png",
                        handler: function (grid, rowIndex, param, button, ) {
                            let exportFilePimcoreAssetId = grid.getStore().getAt(rowIndex).getData().exportFilePimcoreAssetId;
                            
                            if (exportFilePimcoreAssetId) {
                                pimcore.helpers.download("/admin/asset/download?id=" + exportFilePimcoreAssetId);
                            }
                        }.bind(this)
                    }]
            },
            {
                text: t('dHub_asset_download_column_header'),
                xtype: 'actioncolumn',
                dataIndex: 'exportAssetFilePimcoreAssetId',
                width: 120,
                renderer: function (value, metadata, record, rowIndex, colIndex, store, view) {
                    if (record.get('exportAssetFilePimcoreAssetId') == null) {
                        this.items[0].icon = "";
                        metadata.style = 'cursor: pointer;';
                    } else {
                        this.items[0].icon = "/bundles/pimcoreadmin/img/icon/download-medium.png";
                        this.items[0].disabled = false;
                    }
                    return '';
                },
                items: [{
                        icon: "/bundles/pimcoreadmin/img/icon/download-medium.png",
                        handler: function (grid, rowIndex, param, button, ) {
                            let exportAssetFilePimcoreAssetId = grid.getStore().getAt(rowIndex).getData().exportAssetFilePimcoreAssetId;

                            if (exportAssetFilePimcoreAssetId) {
                                pimcore.helpers.download("/admin/asset/download?id=" + exportAssetFilePimcoreAssetId);
                            }
                        }.bind(this)
                    }]
            },
            {
                xtype: 'actioncolumn',
                menuText: t('delete'),
                width: 40,
                items: [{
                        tooltip: t('delete'),
                        icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                        handler: function (grid, rowIndex) {

                            let data = grid.getStore().getAt(rowIndex);
                            let recordId = data.data.id;
                            let status = data.data.export_status;

                            if (status == "IN-PROGRESS") {
                                Ext.MessageBox.alert(t('dHub_can_not_delete_schedule'), t('dHub_in_progress_schedule_can_not_be_deleted'));
                                return;
                            }

                            Ext.Msg.confirm(t('dHub_delete_schedule'), t("dHub_delete_schedule_confirm"), function (btnText) {
                                if (btnText === "yes") {
                                    Ext.Ajax.request({
                                        url: "/admin/distributionhub/schedules/delete",
                                        params: {
                                            scheduleId: recordId
                                        },
                                        method: "post",
                                        success: function (response) {
                                            var rdata = Ext.decode(response.responseText);
                                            if (rdata && rdata.success) {
                                                grid.getStore().removeAt(rowIndex);
                                            } else {
                                                Ext.MessageBox.alert(t('dHub_failure'), rdata.msg);
                                            }
                                        }
                                    });
                                }
                            });

                        }.bind(this)
                    }]
            }
        ];

        return typesColumns;
    },

    openWizard: function () {

        var requiredConfigComplete = false;
        // fetching new value each time the Add button is pressed
        // to fetch the updated value of the FTP associated with channel
        let outerScope = this;
        Ext.Ajax.request({
            url: "/admin/distributionhub/schedules/form_data",
            params: {
                channelId: this.channelId,
            },
            method: "post",
            async: false,
            success: function (response) {
                var rdata = Ext.decode(response.responseText);
                if (rdata && rdata.success) {
                    if (rdata.requiredConfigComplete) {
                        outerScope.availableFtpNames = rdata.ftpNames;
                        outerScope.availableExportFormats = rdata.exportFormats;
                        outerScope.availableExportLocations = rdata.exportLocations;
                        requiredConfigComplete = true;
                    }
                } else {
                    Ext.MessageBox.alert(t('dHub_failure'), t(rdata.msg));
                }
            }.bind(this)
        });

        if (requiredConfigComplete) {
            this.wizardWindow = this.getWizardFormForValues(this.availableFtpNames, this.availableExportLocations)
            this.wizardWindow.show();
        } else {
            Ext.MessageBox.alert(t("dHub_channel_not_configured_completely"), t("dHub_please_enter_basic_config_column_mapping_filters"));
        }

    },

    getWizardFormForValues: function (ftpNames, exportLocaions) {

        let ftpNamesStore = this.getStoreFromArray(ftpNames, true);
        let exportLocationStore = this.getStoreFromArray(exportLocaions, true);

        let exportResourceStoreData = new Array();
        let resources = ['dHub_data_file', 'dHub_assets', 'dHub_both'];
        for (var i = 0; i < resources.length; i++) {
            let storeItem = {id: resources[i], name: t(resources[i])};
            exportResourceStoreData.push(storeItem);
        }

        let exportResourceStore = new Ext.data.JsonStore({
            data: exportResourceStoreData,
            fields: ["id", "name"],
        });
  
        var downloadTypes = new Array();
        exportResourceStore.data.items.forEach(function (item) {
            let downloadInfo = {
                boxLabel: item.data.name,
                xtype: 'radiofield',
                name: "exportResource",
                inputValue: item.data.id,
                id: item.data.id
            };
            if (item.data.id === "dHub_data_file") {
                downloadInfo.checked = true;
            }
            downloadTypes.push(downloadInfo);
        });
        
        let infoImage = "/bundles/pimcoreadmin/img/flat-color-icons/info.svg";
        let infoMsg = "<img src='"+ infoImage +"' style='vertical-align: middle' > " + "<span><i>" +t('dHub_channel_name_append_msg3') + "</i></span>";

        let infoPanel = new Ext.create('Ext.panel.Panel',{
            cls:'info_ftp',
            style:{
                clear:'left',
                float:'left',
                paddingLeft:'5px',
                paddingTop:'10px'
            },
            html: infoMsg
        });
        
         
        let infoTimezoneMsg = "<img src='"+ infoImage +"' style='height:60%;vertical-align: middle' > " + "<span><i>" +t('dHub_channel_name_append_msg4') + pimcore.settings.timezone + "</i></span>";

        let infoTimezonePanel = new Ext.create('Ext.panel.Panel',{
            style:{
                paddingLeft:'140px',
                marginBottom: '10px',
                float: 'left'
            },
            html: infoTimezoneMsg
        });
        
        this.wizardForm = new Ext.form.FormPanel({
            bodyStyle: "padding:10px;",
            defaults: {
                labelWidth: 150
            },
            items: [
                {
                    fieldLabel: t("dHub_name") + ' <span style="color:red;">*</span>',
                    xtype: 'textfield',
                    anchor: '100%',
                    name: 'name',
                    maxLength: 100,
                    maxLengthText: t('dHub_max_allowed_length_100'),
                    allowBlank: false,
                    blankText: t('dHub_field_is_required'),
                    msgTarget: 'under'
                },
                {
                    fieldLabel: t("dHub_download_file_name"),
                    xtype: 'textfield',
                    anchor: '100%',
                    name: 'downloadFileName',
                    maxLength: 100,
                    maxLengthText: t('dHub_max_allowed_length_100'),
                    regex: /^[A-Za-z0-9 _-]+$/,
                    regexText: t('dHub_only_alphanumeric_space_and_underscore-hyphen_allowed'),
                    msgTarget: 'under'
                },
                {
                    fieldLabel: t("dHub_export_date") + ' <span style="color:red;">*</span>',
                    xtype: 'datefield',
                    anchor: '60%',
                    name: 'exportDate',
                    minValue: new Date(),
                    allowBlank: false,
                    blankText: t('dHub_field_is_required'),
                    msgTarget: 'under',
                    editable: false,
                    formatText: '',
                    style: {
                        float: 'left',
                        marginRight: '20px',
                        clear: 'left'
                    }
                },
                {
                    xtype: 'timefield',
                    name: 'exportTime',
                    format: 'H:i',
                    formatText: '',
                    invalidText: t('dHub_invalid_time_format_use_HM'),
                    msgTarget: 'under',
                    allowBlank: false,
                    blankText: t('dHub_field_is_required'),
                    width: 120,
                    increment: 30,

                    style: {
                        float: 'left'
                    }
                },infoTimezonePanel,
                {
                    fieldLabel: t("dHub_export_to_ftp"),
                    xtype: 'checkboxfield',
                    items:
                        {
                            boxLabel: 'FTP',
                            name: 'exportLocation',
                            inputValue: 'FTP',
                            id: 'FTP'
                        },
                    anchor: '81%',
                    name: 'exportLocation',
                    displayField: 'name',
                    valueField: 'id',
                    editable: false,
                    allowBlank: false
                },
                {
                    fieldLabel: t("dHub_export_ftp"),
                    xtype: 'combo',
                    queryMode: 'local',
                    anchor: '100%',
                    name: 'exportFtp',
                    store: ftpNamesStore,
                    value: ftpNames[0],
                    displayField: 'name',
                    valueField: 'id',
                    hidden: true,
                    editable: false,
                    msgTarget: 'under'
                },
                {
                    fieldLabel: t("dHub_export_resource") + ' <span style="color:red;">*</span>',
                    xtype: 'radiogroup',

                    anchor: '100%',
                    name: 'exportResource',
                    displayField: 'name',
                    valueField: 'id',
                    editable: false,
                    allowBlank: false,
                    blankText: t('dHub_field_is_required'),
                    msgTarget: 'under',
                    defaults: {
                        flex: 1
                    },
                    items: downloadTypes,
                    onChange: function (newVal, oldVal) {
                        this.addFieldsInForm(this.wizardForm, newVal.exportResource, oldVal.exportResource);
                    }.bind(this)
                },
                this.getFormatSelectorCombo()
            ]
        });

        let wizardWindow = new Ext.Window({
            title: t('dHub_create_schedule'),
            width: 600,
            modal: true,
            items: [this.wizardForm],
            buttons: [{
                    text: t("save"),
                    iconCls: "pimcore_icon_accept",
                    handler: this.saveWizard.bind(this)
                }]
        });
        return wizardWindow;
    },

    addFieldsInForm: function (form, newResourceValue, oldResourceValue) {

        if (form.getForm().findField('exportFormat')) {
            form.getForm().findField('exportFormat').destroy();
        }

        if (this.assetSelectorCombo && form.getForm().findField('exportImageCols[]')) {
            form.getForm().findField('exportImageCols[]').destroy();
        }

        if (newResourceValue === "dHub_assets") {
            this.assetSelectorCombo = this.getAssetSelectorCombo();
            form.add(this.assetSelectorCombo);
        } else if (newResourceValue === "dHub_data_file") {
            this.formatSelectorCombo = this.getFormatSelectorCombo();
            form.add(this.formatSelectorCombo);
        } else if (newResourceValue === "dHub_both") {
            this.formatSelectorCombo = this.getFormatSelectorCombo();
            form.add(this.formatSelectorCombo);
            
            this.assetSelectorCombo = this.getAssetSelectorCombo();
            form.add(this.assetSelectorCombo);
        }
    },

    getFormatSelectorCombo: function () {

        let exportFormatsStore = this.getStoreFromArray(this.availableExportFormats, true);

        let exportFormatCombo = new Ext.create('Ext.form.field.ComboBox', {
            fieldLabel: t("dHub_export_format") + ' <span style="color:red;">*</span>',
            store: exportFormatsStore,
            queryMode: 'local',
            anchor: '81%',
            name: 'exportFormat',
            displayField: 'name',
            valueField: 'id',
            editable: false,
            // allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            hidden: true
        });

        return exportFormatCombo;
    },

    getAssetSelectorCombo: function () {
        let mediaGetterStore = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/schedules/export_image_columns?channelId=' + this.channelId,
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "name"]
        });
        mediaGetterStore.load();

        let mediaGetterCombo = new Ext.create('Ext.ux.form.MultiSelect', {
            fieldLabel: t("dHub_select_assets") + ' <span style="color:red;">*</span>',
            xtype: 'combo',
            anchor: '81%',
            height: 100,
            store: mediaGetterStore,
            queryMode: 'local',
            name: 'exportImageCols[]',
            displayField: 'name',
            valueField: 'id',
            editable: false,
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
        });

        return mediaGetterCombo;
    },

    saveWizard: function () {

        let form = this.wizardForm;
        let outerScope = this;
        let values = form.getForm().getFieldValues();
        let exportLocation = values.exportLocation ? "FTP" : "Pimcore";
        let exportFtp = values.exportFtp;

        if (form.isValid()) {

            let exportDate = values.exportDate;
            let exportTime = values.exportTime;

            let timeHours = exportTime.getHours();
            let timeMinutes = exportTime.getMinutes();

            let selectedDateTimeMillis = exportDate.getTime() + (timeHours * 60 * 60 * 1000) + (timeMinutes * 60 * 1000);
            let currDateTimeMillis = new Date().getTime();

            if (selectedDateTimeMillis < currDateTimeMillis) {
                Ext.MessageBox.alert(t('dHub_selected_datetime_is_past'), t('dHub_select_future_datetime'));
                return;
            }

            form.submit({
                url: '/admin/distributionhub/schedules/save',
                method: 'POST',
                params: {
                    channelId: this.channelId,
                    exportResource: values.exportResource
                },
                success: function (form, response) {
                    response = response.response;
                    response = Ext.decode(response.responseText);

                    outerScope.grid.store.insert(0, response);

                    if (exportLocation === "FTP" && (exportFtp == null)) {
                        Ext.MessageBox.show({
                            title: t('dHub_please_configure_ftp'),
                            message: t('dHub_no_ftp_configure_before_export_time'),
                            buttons: Ext.MessageBox.OK,
                            icon: 'pimcore_icon_warning'
                        });
                    }

                },
                failure: function (form, response) {
                    response = response.response;
                    response = Ext.decode(response.responseText);

                    Ext.MessageBox.alert(t('dHub_failure'), response.msg);
                }
            });
            
            if(form.getForm().findField('exportResource')){
                form.getForm().findField('exportResource').destroy();
            }
 
            this.wizardWindow.hide();
        }


    },

    getStoreFromArray: function (nameArray, useElementForId = false) {
        let storeData = [];

        for (var i = 0; i < nameArray.length; i++) {
            let storeItem = null;
            if (useElementForId == true) {
                storeItem = {id: nameArray[i], name: nameArray[i]};
            } else {
                storeItem = {id: i, name: nameArray[i]};
            }
            if (storeItem) {
                storeData.push(storeItem);
            }
        }

        let store = new Ext.data.JsonStore({
            data: storeData,
            fields: ["id", "name"]
        });

        return store;
    }
});
