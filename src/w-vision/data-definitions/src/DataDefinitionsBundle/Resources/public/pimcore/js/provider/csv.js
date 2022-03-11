/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

pimcore.registerNS('pimcore.plugin.datadefinitions.provider.csv');

pimcore.plugin.datadefinitions.provider.csv = Class.create(pimcore.plugin.datadefinitions.provider.abstractprovider, {
    getItems: function () {
        return [{
            xtype: 'textfield',
            name: 'delimiter',
            fieldLabel: t('data_definitions_csv_delimiter'),
            anchor: '100%',
            value: this.data['delimiter'] ? this.data.delimiter : ','
        }, {
            xtype: 'textfield',
            name: 'enclosure',
            fieldLabel: t('data_definitions_csv_enclosure'),
            anchor: '100%',
            value: this.data['enclosure'] ? this.data.enclosure : '"'
        },
        // {
        //     xtype: 'filefield',
        //     fieldLabel: t('data_definitions_csv_example'),
        //     name: 'csvExample',
        //     anchor: '100%',
        //     value: this.data['csvExample'] ? this.data.csvExample : ''
        // },
        {
            xtype: 'container',
            html: '<strong>' + t('data_definitions_csv_headers_note') + '</strong>',
            padding: '0 0 5 205px'
        },
        this.getFileUploadForm(),
        this.getFooterInfoMsg()
            // {
            //     xtype: 'container',
            //     html: t('data_definitions_csv_footer_note'),
            //     padding: '0 0 5 205px'
            // },
            // {
            //     xtype: 'container',
            //     html: '<strong>' + t('data_definitions_csv_headers_description') + '</strong>',
            //     padding: '0 0 0 200px'
            // }, {
            //     xtype: 'textarea',
            //     fieldLabel: t('data_definitions_csv_headers'),
            //     name: 'csvHeaders',
            //     grow: true,
            //     anchor: '100%',
            //     minHeight: 300,
            //     value: this.data['csvHeaders'] ? this.data.csvHeaders : ''
            // }
        ];
    },

    /**
     * return file upload field
     *
     * @returns {*}
     */
    getFileUploadForm: function () {
        let definitionName = this.parentItemPanel.data.name;
        let fileAlreadyImported = this.headerMappingFileAssetId ? true : false;

        let outerScope = this;

        this.openAssetButton = Ext.create('Ext.Button', {
            // text: 'Open uploaded document',
            iconCls: 'pimcore_icon_open',
            hidden: !fileAlreadyImported,
            tooltip: t('data_open_saved_mapping_file'),
            style: {
                marginLeft: '20px'
            },
            handler: function () {
                outerScope.openUploadedAsset();

            }
        });

        this.fileUploadField = new Ext.create('Ext.form.field.File', {
            name: 'csvFile',
            fieldLabel: t('data_file_csv_label') + ' <span style="color:red;">*</span>',
            labelWidth: 200,
            width: 750,
            regex: /^.*\.(csv|CSV|Csv)$/,
            regexText: t('data_csv_allowed_only'),
            msgTarget: 'under',
            buttonText: t('data_upload_file_csv'),
            labelStyle: "color: black !important",
            listeners: {
                change: function (fileField, value) {
                    var rowValue = fileField.getRawValue();
                    console.log(rowValue);
                    rowValue = rowValue.replace(/C:\\fakepath\\/g, '');

                    var form = this.up('form').getForm();
                    if (form.isValid()) {

                        form.submit({
                            url: '/admin/data_definitions/import_definitions/read-uploaded-file',
                            waitMsg: t('data_uploading_file'),
                            params: {
                                csrfToken: pimcore.settings['csrfToken'],
                                definitionName: definitionName
                            },
                            success: function (fp, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText);
                                console.log(response);
                                // if (response.fileType == 'Csv') {
                                //     outerScope.addImportConfigFieldSet('Csv');

                                // }
                                fileField.setRawValue(rowValue);
                                outerScope.openAssetButton.setHidden(true);
                                // to send it in the save request
                                outerScope.newlyUploadedFileName = response.fileName;
                            },
                            failure: function (form, response) {
                                response = response.response;
                                response = Ext.decode(response.responseText);
                                // fileField.setRawValue(rowValue);
                                Ext.MessageBox.alert(t('data_failure'), response.msg);
                            }
                        });
                    } else {
                        fileField.setRawValue(rowValue.replace(/C:\\fakepath\\/g, ''));
                    }
                },
            }
        });

        // set saved value in file upload field
        if (this.data.csvFile) {
            this.fileUploadField.setRawValue(this.data.csvFile);
        }

        this.fileUploadForm = Ext.create('Ext.form.Panel', {
            layout: 'hbox',
            items: [this.fileUploadField, this.openAssetButton],

        });

        return this.fileUploadForm;
    },

    getFooterInfoMsg: function () {
        let importName = this.parentItemPanel.data.name;
        let infoImage = "/bundles/pimcoreadmin/img/flat-color-icons/info.svg";
        let infoMsg = "<img src='" + infoImage + "' style='vertical-align: middle' > " + "<span><i>" + t('data_definitions_csv_footer_note_1') + "'" + importName + "'" + t('data_definitions_csv_footer_note_2') + "</i></span>";

        let infoPanel = new Ext.create('Ext.panel.Panel', {
            style: {
                paddingLeft: '200px',
                marginTop: '5px',
            },
            html: infoMsg,
        });

        this.footerInfoMsg = Ext.create('Ext.form.Panel', {
            layout: 'hbox',
            items: [infoPanel],
        });
        return this.footerInfoMsg;
    },

    openUploadedAsset: function () {
        pimcore.helpers.openElement(this.headerMappingFileAssetId, 'asset');
    }
});
