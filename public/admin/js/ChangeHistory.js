document.addEventListener(pimcore.events.postOpenObject, (e) => {
    const object = e.detail.object;

    if (!['UniProductCategoryInternal', 'UniProductBase'].includes(object?.data?.general?.className)) {
        return;
    }

    const interval = setInterval(() => {
        if (!object.tabbar || typeof object.tabbar.add !== 'function') {
            return;
        }

        clearInterval(interval);
        try {
            const historyInstance = new pimcore.element.history(object, 'object');
            const historyLayout = historyInstance.getLayout();

            object.tabbar.add(historyLayout);
        } catch (error) {
            throw new Error('Failed to add change history tab');
        }
    }, 100);
});

pimcore.registerNS("pimcore.element.history");

pimcore.element.history = Class.create({
    initialize: function (element, elementType) {
        this.element = element;
        this.elementType = elementType;
        this.layout = null;
        this.objectId = element.id;
        this.objectClassName = element.data.general.className;
        this.showDetailModal = this.showDetailModal.bind(this);
    },

    getLayout: function () {
        if (this.layout !== null) {
            return this.layout;
        }

        this.layout = new Ext.Panel({
            title: 'Change History',
            iconCls: 'pimcore_icon_versions',
            layout: 'fit',
            items: [this.getGrid()],
        });

        return this.layout;
    },

    getGrid: function () {
        if (!this.objectId || !this.objectClassName) {
            return new Ext.Panel({
                html: '<p>No history data available for this object.</p>',
            });
        }

        this.store = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/admin/change-history',
                extraParams: {
                    objectId: this.objectId,
                    className: this.objectClassName,
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data',
                    totalProperty: 'total'
                },
            },
            fields: [
                { name: 'id', type: 'int' },
                { name: 'timestamp', type: 'string' },
                { name: 'user', type: 'string' },
                { name: 'changedFields', type: 'auto' },
                { name: 'previousValue', type: 'auto' },
                { name: 'newValue', type: 'auto' }
            ],
            autoLoad: true,
            listeners: {
                exception: function (proxy, response, options) {
                    let errorMessage = 'Failed to load change history';

                    if (response.status === 404) {
                        errorMessage = 'Change history endpoint not found';
                    } else if (response.status === 500) {
                        errorMessage = 'Server error while loading change history';
                    } else if (response.statusText) {
                        errorMessage += ': ' + response.statusText;
                    }



                    Ext.MessageBox.alert('Error', errorMessage);
                },
            },
        });

        return new Ext.grid.GridPanel({
            store: this.store,
            columns: [
                {
                    header: 'Timestamp',
                    dataIndex: 'timestamp',
                    width: 150,
                    sortable: true,
                    renderer: function (value) {
                        if (!value) return '';
                        const date = new Date(value);
                        return Ext.Date.format(date, 'Y-m-d H:i:s');
                    }
                },
                {
                    header: 'User',
                    dataIndex: 'user',
                    width: 250,
                    sortable: true,
                    renderer: function (value, metaData, record) {
                        if (!value) {
                            return 'Unknown User';
                        }
                        return Ext.util.Format.htmlEncode(value);
                    }
                },
                {
                    header: 'Changed Fields',
                    dataIndex: 'changedFields',
                    flex: 1,
                    renderer: function (value) {
                        if (!value || !Array.isArray(value) || value.length === 0) {
                            return 'No fields changed';
                        }

                        const list = value.join(', ');
                        return `<div title="${list}">${list}</div>`;
                    },
                },
            ],
            listeners: {
                rowclick: (grid, record) => this.onRowClick(grid, record),
            },
            viewConfig: {
                emptyText: 'No change history records found for this object',
                forceFit: false
            }
        });
    },

    onRowClick: function (grid, rowIndex) {
        const id = rowIndex.id;

        if (!id) {
            return 'No record ID found for row click';

        }

        this.loadDetailView(id);
    },

    loadDetailView: function (id) {
        const endpoint = `/admin/change-history/${id}`;

        Ext.MessageBox.show({
            msg: 'Loading details...',
            progressText: 'Fetching data...',
            width: 300,
            wait: true,
            waitConfig: { interval: 200 },
        });

        Ext.Ajax.request({
            url: endpoint,
            success: (response) => {
                Ext.MessageBox.hide();

                try {
                    const result = Ext.decode(response.responseText);

                    if (!result.data) {
                        throw new Error('Invalid response format: missing data property');
                    }

                    this.showDetailModal(result.data);
                } catch (error) {

                    Ext.MessageBox.alert('Error', 'Failed to load change history details');
                }
            },
            failure: (response) => {
                Ext.MessageBox.hide();

                let errorMessage = 'Failed to load change history details';

                if (response.status === 404) {
                    errorMessage = 'Change history record not found';
                } else if (response.status === 500) {
                    errorMessage = 'Server error while loading details';
                } else if (response.statusText) {
                    errorMessage += ': ' + response.statusText;
                }

                Ext.MessageBox.alert('Error', errorMessage);
            },
        });
    },

    showDetailModal: function (data) {
        if (!data.previousValues || !data.newValues) {
            Ext.MessageBox.alert('Error', 'Invalid change history data');
            return;
        }

        const rows = Object.keys(data.previousValues)
            .filter((key) => {
                const oldValue = data.previousValues[key];
                const newValue = data.newValues[key];
                return oldValue !== newValue;
            })
            .map((key) => {
                const oldValue = data.previousValues[key] || 'null';
                const newValue = data.newValues[key] || 'null';

                const encodedKey = Ext.util.Format.htmlEncode(key);
                const encodedOldValue = Ext.util.Format.htmlEncode(String(oldValue));
                const encodedNewValue = Ext.util.Format.htmlEncode(String(newValue));

                return `
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">${encodedKey}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${encodedOldValue}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${encodedNewValue}</td>
                </tr>
            `;
            });

        if (rows.length === 0) {
            Ext.MessageBox.alert('Info', 'No changed fields found');
            return;
        }

        const modal = new Ext.Window({
            title: 'Change History Details',
            width: 800,
            height: 600,
            layout: 'fit',
            modal: true,
            html: `
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Field</th>
                        <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Old Value</th>
                        <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">New Value</th>
                    </tr>
                </thead>
                <tbody>${rows.join('')}</tbody>
            </table>
        `,
            buttons: [{
                text: 'Close',
                handler: function () {
                    modal.close();
                },
            }],
        });

        modal.show();
    },
});