/**
 * Pimcore
 *
 * This source file is available under two different licenses: - GNU General
 * Public License version 3 (GPLv3) - Pimcore Enterprise License (PEL) Full
 * copyright and license information is available in LICENSE.md which is
 * distributed with this source code.
 *
 * @copyright Copyright (c) 2009-2016 pimcore GmbH ( http://www.pimcore.org)
 * @license http://www.pimcore.org/license GPLv3 and PEL
 *
 * @desc This file is used for Mapping view panel
 */

pimcore.registerNS("pimcore.plugin.mapitem");

pimcore.plugin.mapitem = Class
        .create({
            // Initialize item panel
            initialize: function (data, parentPanel) {
                this.parentPanel = parentPanel;
                this.data = data;
                this.mappingData = '';
                this.currentElements = [];
                this.currentElementCount = 0;
                this.addLayout();
                this.classnameUsed = null;
                this.mappingType = null;
            },
            // Add item layout
            addLayout: function () {

                var objectId = this.data.id;

                // Store config
                var availableClass = new Ext.data.JsonStore({
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/mapping/get-available-classes',
                        reader: {
                            type: 'json',
                            rootProperty: 'classes'
                        }
                    },
                    fields: ["name"],
                    sorters: [{
                            property: 'name',
                            direction: 'ASC'
                        }]
                });
                availableClass.load();

                Ext.Ajax.request({
                    url: '/admin/DistributionHub/mapping/get-class-name',
                    method: 'POST',
                    params: {
                        id: this.data.id
                    },
                    async: false,
                    success: function (response) {
                        successFlag = Ext.decode(response.responseText);
                        if (successFlag.success) {
                            this.classnameUsed = successFlag.classname;
                        } else {
                            pimcore.helpers.showNotification(
                                    t('error'),
                                    t('error_saving_msg'),
                                    'error');
                        }
                    }.bind(this),
                    failure: function (response) {
                    },
                    callback: function (options, success, response) {
                    }
                });

                var mappingStore = new Ext.data.JsonStore({
                    storeId: 'myStore',
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/mapping/get-table-data/' + this.data.id,
                        reader: {
                            type: 'json',
                            rootProperty: 'columnData'
                        }
                    },
                    fields: ["source", "firstRow", "target", "labelField", "groupNumber", "showInGrid"]

                });
                mappingStore.load();

                var targetFields = new Ext.data.JsonStore({
                    itemid: "targetFields_" + objectId,
                    async: false,
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/mapping/get-class-fields/' + this.classnameUsed,
                        reader: {
                            type: 'json',
                            rootProperty: 'fields'
                        }
                    },
                    fields: ["value", "text"],
                    sorters: [{
                            property: 'text',
                            direction: 'ASC'
                        }]
                });
                targetFields.load();

                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 1
                });


                // Grid config
                this.mappingGrid = new Ext.grid.Panel({
                    id: "mappingGrid_" + objectId,
                    store: mappingStore,
                    scrollable: true,
                    plugins: [this.cellEditing],
                    columns: [
                        {
                            header: "Input Fields",
                            sortable: false,
                            dataIndex: "source",
                            renderer: function (value, p, r) {
                                return r.data.firstRow;
                            }.bind(this),
                            flex: 1
                        },
                        {
                            header: "Pimcore Fields",
                            itemid: "targetFields_" + objectId,
                            sortable: false,
                            dataIndex: "target",
                            flex: 1,
                            editor: new Ext.form.ComboBox({
                                store: targetFields,
                                queryMode: 'local',
                                mode: "local",
                                listeners: {
                                    render: function (combo, record, index) {
                                        if (combo.getValue() === null) {
                                            combo.setValue("ignore");
                                        }
                                    }
                                },
                                triggerAction: "all",
                                valueField: 'value',
                                displayField: 'text'
                            })
                        },
                        {
                            header: "Pimcore Fields Label",
                            xtype: 'checkcolumn',
                            itemid: "labelField_" + objectId,
                            sortable: false,
                            dataIndex: "labelField",
                            hidden: true,
//                            flex: 1,
                            editor: {
                                xtype: 'checkbox',
                                allowBlank: true
                            }
                        },
                        {
                            header: "Group Number",
                            id: "groupNumber_" + objectId,
                            sortable: false,
                            dataIndex: "groupNumber",
                            flex: 1,
                            editor: {
                                xtype: 'numberfield',
                                allowBlank: true,
                                minValue: 1,
                                maxValue: 150000
                            }
                        },
                        {
                            header: "Show in Grid",
                            id: "showInGrid_" + objectId,
                            sortable: false,
                            dataIndex: "showInGrid",
                            xtype: 'checkcolumn',
                            flex: 1,

                            scope: this,

                            listeners: {
                                afterrender: function () {
                                    var menu = Ext.ComponentQuery.query('grid')[0].headerCt.getMenu();
                                    menu.add([{
                                            xtype: "checkboxfield",
                                            name: "Select All",
                                            text: "Select All1",
                                            value: this.value,
//                                            handler: function () {
//                                                
//                                                Ext.Ajax.request({
//                                                    url: '/admin/DistributionHub/mapping/set-show-in-grid',
//                                                    method: 'POST',
//                                                    params: {
//                                                        id: objectId,
//                                                        value: this.value
//                                                    },
//                                                    success: function (response) {
//                                                         this.reload();                            
//                                                    }.bind(this),
//                                                    failure: function (response) {
//                                                    },
//                                                    callback: function (options, success, response) {
//                                                    }
//                                                });
//                                            }
                                        }]);
                                }
                            },
                            editor: {
                                xtype: 'checkbox',
                            }
                        },
                    ],
                    forceFit: true
                });

                var mappingTypeStore = Ext.create('Ext.data.Store', {
                    fields: ['name', 'value'],
                    data: [
                        {"value": "default", "name": "Standard"},
                        {"value": "amazon", "name": "Amazon Category"},
                        {"value": "staple", "name": "Staple"},
                    ]
                });

                this.mappingTypeCombo = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Reseller',
                    store: mappingTypeStore,
                    queryMode: 'local',
                    labelWidth: 150,
                    displayField: 'name',
                    valueField: 'value',
//                    value: this.data.type,
                    value: "default",
                    hidden: true
                });

                // Add Form panel
                this.panel = new Ext.form.FormPanel({
                    region: "center",
                    id: "mapping_" + objectId,
                    title: this.data.key,
                    bodyStyle: "padding: 10px;",
                    closable: true,
                    scrollable: true,
                    labelWidth: 150,
                    name: "distribution_hub_panel",
                    items: [
                        {
                            xtype: 'textfield',
                            name: 'name',
                            fieldLabel: 'Name',
                            labelWidth: 150,
                            value: this.data.name
                        },
                        {
                            xtype: 'fileuploadfield',
                            name: 'file',
                            value: this.data.name,
                            defaults: {
                                anchor: '70%',
                                allowBlank: false,
                                msgTarget: 'side'
                            },
                            emptyText: 'Select a file to upload...',
                            // Allowing only xml and csv file to upload
                            regex: /^.*\.(csv|CSV|xls|XLS|xlsx|XLSX)$/,
                            regexText: 'Only csv , xls and xlsx files allowed',
                            fieldLabel: 'Select File',
                            labelWidth: 150,
                            msgTarget: 'side',
                            anchor: '70%',
                            buttonText: 'Upload File',
                            listeners: {
                                change: function (fld, value) {
                                    var newValue = value.replace(/C:\\fakepath\\/g, '');
                                    fld.setRawValue(newValue);
                                }
                            },

                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Select Class',
                            labelWidth: 150,
                            autoSelect: true,
                            store: availableClass,
                            value: this.classnameUsed,
                            queryMode: 'local',
                            editable: false,
                            displayField: 'name',
                            valueField: 'name'
                        },
                        this.mappingTypeCombo,
                        {
                            xtype: 'button',
                            text: "Go",
                            style: {
                                'margin-bottom': '8px'
                            },
                            handler: function () {
                                var form = this.up('form').getForm();
//                                console.log(form.getFields());

                                if (form.isValid() && (
                                        !Ext.isEmpty(form.getFields().items[1].lastValue) &&
                                        !Ext.isEmpty(form.getFields().items[2].value)
                                        ))
                                {
                                    var url = pimcore.helpers.addCsrfTokenToUrl('/admin/DistributionHub/mapping/upload-file');
                                    form.submit({
                                        url: url,
                                        waitMsg: 'Accessing file attributes...',
                                        method: "POST",
                                        params: {
                                            id: objectId,
                                            file: form.getFields().items[1].lastValue,
                                            classname: form.getFields().items[2].lastValue,
                                            mappingType: form.getFields().items[3].lastValue,
                                            csrfToken: pimcore.settings['csrfToken']
                                        },
                                        success: function (response, action) {
                                            var responseData = Ext.decode(action.response.responseText);
                                            var xmlFileCols = responseData.columns;
                                            var clsFields = responseData.clsFields;

                                            var array = [];
                                            for (var i = 0; i < xmlFileCols.length; i++) {
                                                var source = i;
                                                var firstRow = xmlFileCols[i];
                                                var target = xmlFileCols[i];
                                                array.push([source, firstRow, target]);
                                            }


                                            for (var i = 0; i < array.length; i++) {

                                                if (clsFields.hasOwnProperty(array[i][1].replace(" ", "").toLowerCase())) {
                                                    array[i][2] = clsFields[array[i][1].replace(" ", "").toLowerCase()];
                                                } else {
                                                    array[i][2] = '';
                                                }

                                            }

                                            var mappingStore = new Ext.data.ArrayStore({
                                                data: array,
                                                fields: ['source', 'firstRow', 'target', "showInGrid"]
                                            });
                                            var targetComboData = responseData.fields;
                                            var targetComboStore = new Ext.data.JsonStore({
                                                data: targetComboData,
                                                fields: ['value', 'key'],
                                                sorters: [{
                                                        property: 'key',
                                                        direction: 'ASC'
                                                    }]
                                            });
                                            var colForTargetCombo = [
                                                {
                                                    header: "Input Fields",
                                                    sortable: false,
                                                    dataIndex: "source",
                                                    renderer: function (value, p, r) {
                                                        return r.data.firstRow;
                                                    }.bind(this),
                                                    flex: 1
                                                },
                                                {
                                                    header: "Pimcore Fields",
                                                    sortable: false,
                                                    dataIndex: "target",
                                                    flex: 1,
                                                    value: 'aaa',
                                                    editor: new Ext.form.ComboBox({
                                                        id: "targetFields_" + objectId,
                                                        store: targetComboStore,
                                                        mode: "local",
                                                        queryMode: 'local',
                                                        triggerAction: "all",
                                                        valueField: 'value',
                                                        displayField: 'key'
                                                    })
                                                },
                                                {
                                                    header: "Pimcore Fields Label",
                                                    xtype: 'checkcolumn',
                                                    id: "labelField_" + objectId,
                                                    sortable: false,
                                                    dataIndex: "labelField",
                                                    flex: 1,
                                                    autoShow: true,
                                                    checked: 0,
                                                    hidden: true,
                                                    editor: {
                                                        xtype: 'checkbox',
                                                        allowBlank: true
                                                    }
                                                },
                                                {
                                                    header: "Group Number",
                                                    sortable: false,
                                                    dataIndex: "groupNumber",
                                                    flex: 1,
                                                    editor: {
                                                        xtype: 'numberfield',
                                                        allowBlank: true,
                                                        minValue: 1,
                                                        maxValue: 150000
                                                    }
                                                },
                                                {
                                                    header: "Show in Grid",
                                                    sortable: false,
                                                    dataIndex: "showInGrid",
                                                    flex: 1,
                                                    xtype: 'checkcolumn',
                                                    editor: {
                                                        xtype: 'checkbox',
                                                    }
                                                },
                                            ]

                                            Ext.getCmp('mappingGrid_' + responseData.gridId).reconfigure(mappingStore, colForTargetCombo);
                                        }
                                    });
                                } else {
                                    pimcore.helpers.showNotification('Error',
                                            'Upload a file and Select Class...',
                                            'error');
                                }
                            }
                        },
                        this.mappingGrid
                    ],
                    buttons: [{
                            text: 'Save',
                            iconCls: "pimcore_icon_apply",
                            handler: this.saveMapping.bind(this)
                        }]
                });

                this.parentPanel.getEditPanel().add(this.panel);
                this.parentPanel.getEditPanel().setActiveTab(this.panel);
                pimcore.layout.refresh();
            },
            // Save Mapping Object
            saveMapping: function () {

                // get mapping
                var data = this.mappingGrid.getStore().queryBy(function (record, id) {
                    return true;
                });
                var mappingHeaders = ["firstRow", "target", "labelField", "groupNumber", "showInGrid"]

                var fieldName = Ext.util.Format.trim(this.panel.items.items[0].value);
                var className = Ext.util.Format.trim(this.panel.items.items[2].value);

                if (Ext.isEmpty(fieldName) && Ext.isEmpty(className)) {
                    pimcore.helpers.showNotification('Error',
                            'Fill all the required fields.',
                            'error');
                } else {
                    var mappingData = [];
                    var tmData = [];
                    for (var i = 0; i < data.items.length; i++) {
                        tmData = [];
                        for (var u = 0; u < mappingHeaders.length; u++) {
                            tmData.push(data.items[i].data[mappingHeaders[u]]);
                        }
                        mappingData.push(tmData);
                    }
                    var mapping = Ext.encode(mappingData);
                    Ext.Ajax.request({
                        url: '/admin/DistributionHub/mapping/save-mapping',
                        method: 'POST',
                        params: {
                            mapping: mapping,
                            id: this.data.id,
                            name: fieldName,
                            classname: className
                        },
                        success: function (response) {
                            successFlag = Ext.decode(response.responseText);
                            if (successFlag.success) {
                                pimcore.helpers.showNotification(t("success"), "Mapping saved successfully",
                                        "success");
                            } else {
                                pimcore.helpers
                                        .showNotification(
                                                t('error'),
                                                t('error_saving_msg'),
                                                'error');
                            }
                        }.bind(this),
                        failure: function (response) {
                        },
                        callback: function (options, success, response) {
                        }
                    });
                }
            }

        });
