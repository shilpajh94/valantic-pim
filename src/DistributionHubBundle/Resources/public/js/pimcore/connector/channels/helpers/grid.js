/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */


/**
 * NOTE: This helper-methods are added to the classes pimcore.object.edit, pimcore.object.fieldcollection,
 * pimcore.object.tags.localizedfields
 */

pimcore.registerNS("pimcore.plugin.channels.helpers.grid");

pimcore.plugin.channels.helpers.grid = Class.create({
    baseParams: {},
    showSubtype: true,
    showKey: true,
    enableEditor: false,
    initialize: function (selectedMapping, fields, url, baseParams, isSearch) {
        this.selectedMapping = selectedMapping;
        this.fields = fields;
        this.isSearch = isSearch;

        this.url = url;
        if (baseParams) {
            this.baseParams = baseParams;
        } else {
            this.baseParams = {};
        }

        if (!this.baseParams["mapping"]) {
            this.baseParams["mapping"] = this.selectedMapping;
        }

        var fieldParam = [];
        for (var i = 0; i < fields.length; i++) {
            fieldParam.push(fields[i].key);

        }

        this.baseParams['org[]'] = baseParams.org;
        this.baseParams['fields[]'] = fieldParam;
        this.baseParams['completeFieldData'] = JSON.stringify(this.fields);
    },
    getStore: function () {

        var readerFields = [];

        for (var i = 0; i < this.fields.length; i++) {
            readerFields.push({name: this.fields[i].key, allowBlank: true});
        }

        var fields = this.fields;

        var proxy = {
            type: 'ajax',
            url: this.url,
            reader: {
                type: 'json',
                totalProperty: 'total',
                successProperty: 'success',
                rootProperty: 'data'
            },
            api: {
                create: this.url + "?xaction=create",
                read: this.url + "?xaction=read",
                update: this.url + "?xaction=update",
                destroy: this.url + "?xaction=destroy"
            },
            actionMethods: {
                create: 'POST',
                read: 'POST',
                update: 'POST',
                destroy: 'POST'
            },
            extraParams: this.baseParams
        };

        this.store = new Ext.data.Store({
            remoteSort: true,
            remoteFilter: true,
            autoDestroy: true,
            fields: readerFields,
            proxy: proxy,
            autoSync: true
        });

        return this.store;

    },
    selectionColumn: null,
    getSelectionColumn: function () {
        if (this.selectionColumn == null) {
            this.selectionColumn = Ext.create('Ext.selection.CheckboxModel', {});
        }
        return this.selectionColumn;
    },
    getGridColumns: function () {

        var completeColumnData = this.baseParams['completeFieldData'];

        // init grid-columns
        var gridColumns = [];

        var gridFilters = this.getGridFilters();

        var fields = this.fields;

        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];

            if (field.key == "subtype") {
                gridColumns.push({header: t("type"), width: this.getColumnWidth(field, 40), sortable: true, dataIndex: 'subtype',
                    hidden: !this.showSubtype,
                    renderer: function (value, metaData, record, rowIndex, colIndex, store) {
                        return '<div style="height: 16px;" class="pimcore_icon_asset  pimcore_icon_'
                                + value + '" name="' + t(record.data.subtype) + '">&nbsp;</div>';
                    }});
            } else if (field.key == "id") {
                gridColumns.push({header: 'ID', width: this.getColumnWidth(field, this.getColumnWidth(field, 40)), sortable: true,
                    dataIndex: 'id'/*, hidden: !propertyVisibility.id*/});
            } else if (field.key == "published") {
                gridColumns.push(new Ext.grid.column.Check({
                    header: t("published"),
                    width: 40,
                    sortable: true,
                    dataIndex: "published"
                }));
            } else if (field.key == "fullpath") {
                gridColumns.push({header: t("path"), width: this.getColumnWidth(field, 200), sortable: true,
                    dataIndex: 'fullpath', filter: "string"});
            } else if (field.key == "filename") {
                gridColumns.push({header: "FILENAME", width: this.getColumnWidth(field, 200), sortable: true,
                    dataIndex: 'filename'});
            } else if (field.key == "classname") {
                gridColumns.push({header: t("class"), width: this.getColumnWidth(field, 200), sortable: true,
                    dataIndex: 'classname', renderer: function (v) {
                        return ts(v);
                    }/*, hidden: true*/});
            } else if (field.key == "creationDate") {
                gridColumns.push({header: t("creationdate") + " (System)", width: this.getColumnWidth(field, 200), sortable: true,
                    dataIndex: "creationDate", filter: 'date', editable: false, renderer: function (d) {
                        return Ext.Date.format(d, "Y-m-d H:i:s");
                    }/*, hidden: !propertyVisibility.creationDate*/});
            } else if (field.key == "modificationDate") {
                gridColumns.push({header: t("modificationdate") + " (System)", width: this.getColumnWidth(field, 200), sortable: true,
                    dataIndex: "modificationDate", filter: 'date', editable: false, renderer: function (d) {

                        return Ext.Date.format(d, "Y-m-d H:i:s");
                    }/*, hidden: !propertyVisibility.modificationDate*/});
            } 
//            else if(field.key == "categoryName") {
//                gridColumns.push({header: "Category", width: this.getColumnWidth(field, 200), sortable: true,
//                    dataIndex: 'categoryName',filter: 'string'});
//            }
            
            else if(field.key == "vendorName") {
                gridColumns.push({header: "Vendor", width: this.getColumnWidth(field, 150), sortable: true,
                    dataIndex: 'vendorName',filter: 'string'});
            } 
            else if(field.key == "modifiedDate") {
                gridColumns.push({header: "Modified Date", width:100, sortable: true,
                    dataIndex: 'modifiedDate', filter: 'date', editable: false, renderer: function (d) {
                        var dt = new Date(d*1000);
                        return Ext.Date.format(dt,'Y-m-d');
                    }
                    
                });    
            } else {
                var fieldType = fields[i].type;
                var tag = pimcore.object.tags[fieldType];
                if (tag) {
                    var fc = tag.prototype.getGridColumnConfig(field);
                    fc.width = this.getColumnWidth(field, 100);

                    if (typeof gridFilters[field.key] !== 'undefined' && field.showFilter) {
                        fc.filter = gridFilters[field.key];
                    }

                    if (this.isSearch) {
                        fc.sortable = false;
                    }

                    fc.header = field.xmlField;
                    if (field.type == "quantityValue") {
                        fc.sortable = false;
                    }

                    gridColumns.push(fc);
                    gridColumns[gridColumns.length - 1].hidden = false;
                    gridColumns[gridColumns.length - 1].layout = fields[i];
                } else {
                    console.log("could not resolve field type: " + fieldType);
                }
            }
        }

        return gridColumns;
    },
    getColumnWidth: function (field, defaultValue) {
        if (field.width) {
            return field.width;
        } else if (field.layout && field.layout.width) {
            return field.layout.width;
        } else {
            return defaultValue;
        }
    },
    getGridFilters: function () {
        var configuredFilters = {
            filter: "string",
            creationDate: "date",
            modificationDate: "date"
        };

        var fields = this.fields;
        for (var i = 0; i < fields.length; i++) {

            if (fields[i].key != "id" && fields[i].key != "published"
                    && fields[i].key != "filename" && fields[i].key != "classname"
                    && fields[i].key != "creationDate" && fields[i].key != "modificationDate") {

                if (fields[i].key == "fullpath") {
                    configuredFilters.fullpath = {
                        type: "string"
                    };
                } else {
                    var fieldType = fields[i].type;
                    var tag = pimcore.object.tags[fieldType];
                    if (tag) {
                        var filter = tag.prototype.getGridColumnFilter(fields[i]);
                        if (filter) {
                            configuredFilters[filter.dataIndex] = filter;
                        }
                    } else {
                        console.log("could not resolve fieldType: " + fieldType);

                    }
                }
            }

        }

        return configuredFilters;

    },
    applyGridEvents: function (grid) {
        var fields = this.fields;
        for (var i = 0; i < fields.length; i++) {

            if (fields[i].key != "id" && fields[i].key != "published" && fields[i].key != "fullpath"
                    && fields[i].key != "filename" && fields[i].key != "classname"
                    && fields[i].key != "creationDate" && fields[i].key != "modificationDate") {

                var fieldType = fields[i].type;
                var tag = pimcore.object.tags[fieldType];
                if (tag) {
                    tag.prototype.applyGridEvents(grid, fields[i]);
                } else {
                    console.log("could not resolve field type " + fieldType);
                }
            }

        }
    }

});
