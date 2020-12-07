pimcore.registerNS("pimcore.plugin.distributionhub.tabs.basicConfig");


pimcore.plugin.distributionhub.tabs.basicConfig = Class.create(pimcore.element.abstract, {

    initialize: function (data, channelId, parentPanel, parentType) {
        this.data = data.data;
        this.channelId = channelId;
        this.parentPanel = parentPanel;
        this.parentType = parentType;

        this.newlyUploadedFileName = null;
        this.deleteChannelData = false;

        this.pimcoreClassId = this.data[0].pimcoreClassId ? this.data[0].pimcoreClassId : null;
        this.headerMappingFileAssetId = this.data[0].headerMappingFileAssetId ? this.data[0].headerMappingFileAssetId : null;
        this.headerMappingFileType = this.data[0].headerMappingFileType ? this.data[0].headerMappingFileType : null;
        this.sheetNumberInMappingFile = this.data[0].sheetNumberInMappingFile ? this.data[0].sheetNumberInMappingFile : 0;
        this.headerRowNumberInMappingFile = this.data[0].headerRowNumberInMappingFile ? this.data[0].headerRowNumberInMappingFile : 1;
        this.mappingFileCsvDelimiter = this.data[0].mappingFileCsvDelimiter ? this.data[0].mappingFileCsvDelimiter : this.data[0].defaultMappingFileCSVDelimiter;
        this.exportFileCSVDelimiter = this.data[0].exportFileCSVDelimiter ? this.data[0].exportFileCSVDelimiter : this.data[0].defaultExportFileCSVDelimiter;
        this.exportFilePath = this.data[0].exportFilePath ? this.data[0].exportFilePath : null;

        this.extraConfigs = this.data.extraConfigs[0];

    },

    /**
     * create and return the form
     *
     * @returns {Ext.form.FormPanel}
     */
    getFormPanel: function () {

        let classCombo = this.getClassCombo();
        let fileUploadForm = this.getFileUploadForm();

        let channelName = this.data[0].key;
        let infoImage = "/bundles/pimcoreadmin/img/flat-color-icons/info.svg";
        let infoMsg = "<img src='"+ infoImage +"' style='vertical-align: middle' > " + "<span><i>" +t('dHub_channel_name_append_msg1')+ "'"+channelName+"'" +t('dHub_channel_name_append_msg2') + "</i></span>";

        let infoPanel = new Ext.create('Ext.panel.Panel',{
            style:{
                paddingLeft:'255px',
                marginTop: '5px',
            },
            html: infoMsg,
        });

        let exportConfigFieldSet = this.getExportConfigFieldSet();

        this.basicForm = new Ext.form.FormPanel({
            bodyStyle: "padding:10px;",
            autoScroll: true,
            defaults: {
                labelWidth: 150,
                // width: 600
            },
            waitTitle: t('please_wait'),
            border: false,
            iconCls: 'dHub_basic_config',
            title: t("dHub_basic_configuration"),
            items: [classCombo,fileUploadForm, infoPanel, exportConfigFieldSet],
            dockedItems: [
                {
                    xtype: 'toolbar',
                    flex: 1,
                    dock: 'bottom',
                    ui: 'footer',
                    layout: {
                        pack: 'end',
                        type: 'hbox'
                    },
                    items: [
                        {
                            xtype: 'button',
                            text: t('save'),
                            itemId: 'save',
                            cls: 'pimcore_save_button',
                            iconCls: 'pimcore_icon_apply',
                            hidden:(typeof this.parentType != "undefined" && this.parentType == 'shared'),
                            handler: this.saveCallBack.bind(this)
                        }
                    ]
                }
            ],
        });

        // Disable Class Combo once saved value is returned
        // if(!empty(this.pimcoreClassId)){
        //     classCombo.setReadOnly(true);
        // }


        // adding the import config fieldset
        if (this.headerMappingFileType == 'Excel') {
            this.addImportConfigFieldSet(this.headerMappingFileType, this.extraConfigs.headerMappingFileSheetNames);
        } else if (this.headerMappingFileType == 'Csv') {
            this.addImportConfigFieldSet(this.headerMappingFileType);
        }

        return this.basicForm;
    },

    /**
     * return class select combo
     *
     * @returns {Ext.create}
     */
    getClassCombo: function () {

        let availableClasses = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/basic_config/get_pimcore_classes',
                reader: {
                    type: 'json',
                    rootProperty: 'classes'
                }
            },
            fields: ["id", "name"],
            sorters: [{
                    property: 'name',
                    direction: 'ASC'
                }]
        });
        availableClasses.load();

        // Create the combo box, attached to the states data store
        let combo = new Ext.create('Ext.form.ComboBox', {
            fieldLabel: t('dHub_select_class') + ' <span style="color:red;">*</span>',
            name: 'pimcoreClassId',
            style: {
                marginLeft: '30px'
            },
            store: availableClasses,
            queryMode: 'local',
            editable: false,
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            width: 715,
            labelWidth: 220,
            value: this.pimcoreClassId,

        });

        return combo;
    },

    /**
     * return file upload field
     *
     * @returns {*}
     */
    getFileUploadForm: function () {

        let fileAlreadImported = this.headerMappingFileAssetId ? true : false;

        let outerScope = this;

        this.openAssetButton = Ext.create('Ext.Button', {
            // text: 'Open uploaded document',
            iconCls: 'pimcore_icon_open',
            hidden: !fileAlreadImported,
            tooltip: t('dHub_open_saved_mapping_file'),
            style: {
                marginLeft: '20px'
            },
            handler: function () {
                outerScope.openUploadedAsset();

            }
        });

        this.fileUploadField = new Ext.create('Ext.form.field.File', {
            name: 'file',
            fieldLabel: t('dHub_column_header_mapping_file_csv') + ' <span style="color:red;">*</span>',
            labelWidth: 220,
            width: 800,
            style: {
                marginLeft: '30px'
            },
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
                        form.submit({
                            url: '/admin/distributionhub/basic_config/read_uploaded_file',
                            waitMsg: t('dHub_uploading_file'),
                            params: {
                                csrfToken: pimcore.settings['csrfToken']
                            },
                            success: function (fp, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText);

                                if (response.fileType == 'Csv') {
                                    outerScope.addImportConfigFieldSet('Csv');

                                } else if (response.fileType == 'Excel') {
                                    outerScope.addImportConfigFieldSet('Excel', response.sheetNames);
                                }
                                fileField.setRawValue(rowValue);
                                outerScope.openAssetButton.setHidden(true);
                                // to send it in the save request
                                outerScope.newlyUploadedFileName = response.fileName;
                            },
                            failure: function (form, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText);
                                // fileField.setRawValue(rowValue);
                                Ext.MessageBox.alert(t('dHub_failure'), response.msg);
                            }
                        });
                    } else {
                        fileField.setRawValue(rowValue.replace(/C:\\fakepath\\/g, ''));
                    }
                },
            }
        });

        // set saved value in file upload field
        if (this.extraConfigs.headerMappingFileName) {
            this.fileUploadField.setRawValue(this.extraConfigs.headerMappingFileName);
        }

        this.fileUploadForm = Ext.create('Ext.form.Panel', {
            layout: 'hbox',
            items: [this.fileUploadField, this.openAssetButton],

        });

        return this.fileUploadForm;
    },

    addImportConfigFieldSet: function (type, sheetNames = []) {

        if (this.fieldset) {
            this.basicForm.remove(this.fieldset);
        }
        this.headerMappingFileType = type;

        if (type == 'Csv') {
            this.fieldset = this.getCSVImportConfigFieldSet();
        } else if (type == 'Excel') {
            this.fieldset = this.getExcelImportConfigFieldSet(sheetNames);
        }
        this.basicForm.insert(3,this.fieldset);
    },

    getExcelImportConfigFieldSet: function (sheetNames) {

        let sheetNamesStoreData = [];

        for (var i = 0; i < sheetNames.length; i++) {
            let storeItem = {id: i, name: sheetNames[i]};
            sheetNamesStoreData.push(storeItem);
        }

        let sheetNamesStore = new Ext.data.JsonStore({
            data: sheetNamesStoreData,
            fields: ["id", "name"],
        });


        let combo = new Ext.create('Ext.form.ComboBox', {
            fieldLabel: t('dHub_select_sheet_from_template') + ' <span style="color:red;">*</span>',
            name: 'sheetNumber',
            store: sheetNamesStore,
            style: {
                marginLeft: '15px'
            },
            queryMode: 'local',
            editable: false,
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            displayField: 'name',
            valueField: 'id',
            value: this.sheetNumberInMappingFile,
            labelWidth: 220,
            width: 715,
        });

        let field = new Ext.create('Ext.form.field.Number', {
            fieldLabel: t('dHub_enter_row_number_of_headers') + ' <span style="color:red;">*</span>',
            name: 'headerRowNumber',
            allowDecimal: false,
            style: {
                marginLeft: '15px'
            },
            minValue: 1,
            minText: t('dHub_less_than_1_not_allowed'),
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            value: this.headerRowNumberInMappingFile,
            labelWidth: 220,
            width: 400,
        });

        let fieldSet = new Ext.create('Ext.form.FieldSet', {
            title: t('dHub_import_config'),
            labelWidth: 100,
            items: [combo, field]

        });
        return fieldSet;
    },

    getCSVImportConfigFieldSet: function () {

        let field = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_csv_delimiter') + ' <span style="color:red;">*</span>',
            name: 'csvDelimiter',
            value: this.mappingFileCsvDelimiter,
            maxLength: 1,
            style: {
                marginLeft: '15px'
            },
            maxLengthText: t('dHub_max_length_1'),
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            labelWidth: 220,
            width: 300
        });

        let fieldSet = new Ext.create('Ext.form.FieldSet', {
            title: t('dHub_import_config'),
            labelWidth: 100,
            items: [field]

        });
        return fieldSet;
    },

    getExportConfigFieldSet: function () {

        var outerScope = this;


        let exportFilePathOpenButton = Ext.create('Ext.Button', {
            // text: 'Open uploaded document',
            iconCls: "pimcore_material_icon_locate pimcore_material_icon",
            tooltip: t('dHub_show_in_tree'),
            hidden: !this.exportFilePath,
            style: {
                marginLeft: '20px'
            },
            handler: function (btn) {
                try {
                    pimcore.treenodelocator.showInTree(outerScope.exportFolderId, "asset")
                } catch (e) {
                    console.log(e);
                }
            }
        });

        let exportFilePathRemoveButton = Ext.create('Ext.Button', {
            // text: 'Open uploaded document',
            iconCls: 'pimcore_icon_delete',
            hidden: !this.exportFilePath,
            tooltip: t('dHub_clear_value'),
            style: {
                marginLeft: '20px'
            },
            handler: function (btn) {
                exportFilePathField.setValue(null);
                btn.setHidden(true);
                exportFilePathOpenButton.setHidden(true);
            }
        });

        let exportFilePathField = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_export_file_upload_path'),
            name: 'exportFileUploadPath',
            enableKeyEvents: true,
            fieldCls: "pimcore_droptarget_input",
            value: this.exportFilePath,
            editable: false,
            labelWidth: 220,
            // allowBlank: false,
            // blankText: t('dHub_field_is_required'),
            // msgTarget: 'under',
            labelStyple: {
                color: 'black'
            },
            width: 715,
            listeners: {
                "render": function (el) {
                    new Ext.dd.DropZone(el.getEl(), {
                        //reference: this,
                        ddGroup: "element",
                        getTargetFromEvent: function (e) {
                            return this.getEl();
                        }.bind(el),

                        onNodeOver: function (target, dd, e, data) {
                            if (data.records.length === 1 && data.records[0].data.elementType === "asset" && data.records[0].data.type === "folder") {
                                return Ext.dd.DropZone.prototype.dropAllowed;
                            }
                        },

                        onNodeDrop: function (target, dd, e, data) {
                            if (!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
                                return false;
                            }

                            data = data.records[0].data;
                            if (data.elementType === "asset" && data.type === "folder") {
                                this.setValue(data.path);
                                outerScope.exportFolderId = data.id;
                                exportFilePathRemoveButton.setHidden(false);
                                exportFilePathOpenButton.setHidden(false);

                                return true;
                            }
                            return false;
                        }.bind(el)
                    });
                }
            }
        });



        let exportFilePathFieldSet = new Ext.create('Ext.form.FieldSet', {
            layout: 'hbox',
            style: 'border-top: none !important',
            border: false,
            items: [exportFilePathField, exportFilePathRemoveButton, exportFilePathOpenButton]
        });

        let exportCsvDelimiterfield = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_export_csv_delimiter') + ' <span style="color:red;">*</span>',
            name: 'exportCsvDelimiter',
            value: this.exportFileCSVDelimiter,
            maxLength: 1,
            style: {
                marginLeft: '15px'
            },
            maxLengthText: t('dHub_max_length_1'),
            allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',
            labelWidth: 220,
            width: 300
        });


        if (this.exportFilePath != null && this.exportFilePath !== '' && this.extraConfigs.exportFilePathFolderId) {

            this.exportFolderId = this.extraConfigs.exportFilePathFolderId;
            exportFilePathOpenButton.show();

        }

        let infoImage = "/bundles/pimcoreadmin/img/flat-color-icons/info.svg";
        let infoMsg = "<img src='" + infoImage + "' style='vertical-align: middle' > " + "<span><i>" + t('dHub_export_path_info_text') + "</i></span>";

        let infoPanel = new Ext.create('Ext.panel.Panel', {
            style: {
                paddingLeft: '240px',
                marginTop: '-15px',
            },
            html: infoMsg,
        });

        let exportConfigFieldSet = new Ext.create('Ext.form.FieldSet', {
            title: t('dHub_export_configuration'),

            defaults: {
                labelWidth: 200,
                // width: 300
            },
            items: [exportCsvDelimiterfield, exportFilePathFieldSet, infoPanel]
        });


        let ftpDetails = this.extraConfigs.ftpDetails;
        let ftpName = ftpDetails.ftpName
        let ftpServerAddress = ftpDetails.ftpServerAddress;
        let ftpPort = ftpDetails.ftpPort;
        let ftpUserName = ftpDetails.ftpUserName;
        let ftpPassword = ftpDetails.ftpPassword;

        this.ftpNameField = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_ftp_name'),
            name: 'ftpName',
            maxLength: 100,
            maxLengthText: t('dHub_max_allowed_length_100'),
            regex: /^[A-Za-z0-9 _]+$/,
            regexText: t('dHub_only_alphanumeric_space_hyphen_and_underscore_allowed'),
            msgTarget: 'under',
            labelWidth: 220,
            width: 715,
            value: ftpName
        });

        this.serverAddressField = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_server_address'),
            name: 'ftpServerAddress',
            // regex: /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/,
            // regexText: t('dHub_enter_valid_ip'),
            msgTarget: 'under',
            labelWidth: 220,
            width: 500,
            value: ftpServerAddress
        });

        this.serverPort = new Ext.create('Ext.form.field.Number', {
            fieldLabel: t('dHub_port'),
            name: 'ftpPort',
            allowDecimal: false,
            minValue: 0,
            maxValue: 65535,
            negativeText: t('dHub_negative_not_allowed'),
            msgTarget: 'under',
            maxText: t('dHub_max_port_exceded'),
            nanText: t('dHub_not_valid_number'),
            // minText: t('dHub_less_than_zero_not_allowed'),
            labelWidth: 220,
            width: 500,
            value: ftpPort
        });

        this.userNameField = new Ext.create('Ext.form.field.Text', {
            fieldLabel: t('dHub_user_name'),
            name: 'ftpUserName',
            labelWidth: 220,
            width: 500,
            value: ftpUserName
        });

        this.passwordField = new Ext.form.field.Text({
            fieldLabel: t('dHub_password'),
            name: "ftpPassword",
            inputType: "password",
            labelWidth: 220,
            width: 500,
            value: ftpPassword
        });


        let ftpFieldSet = new Ext.create('Ext.form.FieldSet', {
            title: t('dHub_ftp_details'),
            collapsible: true,
            collapsed: true,
            defaults: {
                labelWidth: 220
                        // width: 300
            },
            // labelWidth: 100,

            items: [this.ftpNameField, this.serverAddressField, this.serverPort, this.userNameField, this.passwordField]

        });

        exportConfigFieldSet.insert(3, ftpFieldSet);

        return exportConfigFieldSet;
    },

    saveCallBack: function (saveCall) {
        // console.log(this.newlyUploadedFileName);
        this.saveCall = saveCall;
        var outerScope = this;
        var condition1 = !empty(this.pimcoreClassId) && (this.pimcoreClassId != this.basicForm.getComponent(0).getValue());
        var condition2 = !empty(this.newlyUploadedFileName) && !empty(this.headerMappingFileAssetId);
        if ((condition1) || (condition2)) {
            Ext.Ajax.request({
                url: '/admin/distributionhub/basic_config/save-confirmation-response',
                async: false,
                params: {
                    channelId: this.channelId
                },
                success: function (response) {
                    var res = Ext.decode(response.responseText);
                },

                failure: function (response) {
                    console.log('server-side failure with status code ' + response.status);
                }
            });

            Ext.Msg.show({
                title: t('dHub_basic_change_detector_title'),
                msg: t('dHub_basic_change_detector_msg'),
                buttons: Ext.Msg.OKCANCEL,
                fn: this.save.bind(this, this.saveCall),
                animEl: 'elId'
            });
        } else {
            this.save(this.saveCall, "ok");
        }

    },
    save: function (saveButton, response) {
        
        // check response from user confirmtation
        if(response === 'ok'){
            // so that user can not hit save multiple times without previous save response
            saveButton.setDisabled(true);

            let outerScope = this;
            let form = saveButton.up('form').getForm();
            let uploadFileName = this.fileUploadField.getRawValue();

            if (form.isValid()) {

                if (!this.isFTPDataValid()) {
                    Ext.MessageBox.alert(t('dHub_enter_all_ftp_details'), t('dHub_please_enter_all_ftp_details'));
                    saveButton.setDisabled(false);
                    return;
                }

                if (this.headerMappingFileAssetId || this.newlyUploadedFileName) {
                    form.submit({
                        url: '/admin/distributionhub/basic_config/save',
                        // waitMsg: '',
                        params: {
                            channelId: this.channelId,
                            fileType: this.headerMappingFileType,
                            newlyUploadedFileName: this.newlyUploadedFileName,
                            csrfToken: pimcore.settings['csrfToken']
                        },
                        success: function (form, response) {
                            outerScope.newlyUploadedFileName = null;
                            response = response.response;
                            response = Ext.decode(response.responseText);

                            if (response.newAssetFileName) {
                                outerScope.fileUploadField.setRawValue(response.newAssetFileName);
                                outerScope.headerMappingFileAssetId = response.newAssetId;
                                outerScope.openAssetButton.show();

                            } else {
                                outerScope.fileUploadField.setRawValue(uploadFileName);
                            }
                            saveButton.setDisabled(false);

                            pimcore.helpers.showNotification(t('dHub_success'), t('dHub_basic_config_saved_successfully'), 'success');
                            // reload code
                            outerScope.reloadChannel(outerScope.channelId, 0); 
                        },
                        failure: function (form, response) {
                            response = response.response;
                            response = Ext.decode(response.responseText);
                            outerScope.fileUploadField.setRawValue(uploadFileName);
                            saveButton.setDisabled(false);
                            Ext.MessageBox.alert(t('dHub_failure'), t(response.msg));
                        }
                    });

                } else {
                    saveButton.setDisabled(false);
                    Ext.MessageBox.alert(t('dHub_please_upload_file'), t('dHub_template_file_mandatory'));
                }

            } else {
                saveButton.setDisabled(false);
            }
        }
    },

    reloadChannel: function (id, parentTypeId) { 
        const existingPanel = Ext.getCmp("distributionhub_mapping_panel_" + id); 

        if (existingPanel) {
            existingPanel.destroy();
        }
        
//        if (existingPanel) {
//            this.editPanel.setActiveTab(existingPanel);
//            return;
//        }
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

                var fieldPanel = new pimcore.plugin.distributionhub.configItem(data, id, this.parentPanel, parentTypeId);
            }.bind(this)
        });
    },
    
    
    isFTPDataValid: function () {
        // validating ftp fields, either all should be entered or none
        let ftpName = this.correctTextTypeValueForNull(this.ftpNameField.getValue());
        let serverAddress = this.correctTextTypeValueForNull(this.serverAddressField.getValue());
        let serverPort = this.correctTextTypeValueForNull(this.serverPort.getValue());
        let userName = this.correctTextTypeValueForNull(this.userNameField.getValue());
        let password = this.correctTextTypeValueForNull(this.passwordField.getValue());

        if ((ftpName === serverAddress) && (serverAddress === serverPort) && (serverPort === userName) && (userName === password)) {
            return true;
        }
        return false;
    },

    correctTextTypeValueForNull: function (value)
    {

        if (value === 0) {
            return true;
        }
        if (value === false) {
            return false;
        }

        if (value != null && trim(value) == '') {
            return false;
        }

        return !!value;
    },

    openUploadedAsset: function () {
        pimcore.helpers.openElement(this.headerMappingFileAssetId, 'asset');
    }
});
