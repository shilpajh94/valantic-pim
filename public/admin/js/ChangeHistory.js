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
            console.error('Failed to add change history tab:', error);
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
            icon: '/bundles/pimcoreadmin/img/flat-white-icons/calendar.svg',
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
            ],
            autoLoad: true,
            listeners: {
                exception: function (proxy, response, options) {
                    Ext.MessageBox.alert('Error', 'Failed to load change history');
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

                        const displayText = value.join(', ');
                        const escapedText = Ext.util.Format.htmlEncode(displayText);

                        return `<div title="${escapedText}">${escapedText}</div>`;
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
            console.warn('No record ID found for row click');
            return;
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

                    if (result && result.data) {
                        this.showDetailModal(result.data);
                    } else {
                        Ext.MessageBox.alert('Error', 'Invalid response format');
                    }
                } catch (e) {
                    console.error('Failed to parse response:', e);
                    Ext.MessageBox.alert('Error', 'Failed to parse change history details');
                }
            },
            failure: (response) => {
                Ext.MessageBox.hide();
                console.error('Failed to load change history details:', response);
                Ext.MessageBox.alert('Error', 'Failed to load change history details');
            },
        });
    },

    showDetailModal: function (data) {
        if (!data.previousValues || !data.newValues) {
            Ext.MessageBox.alert('Error', 'Invalid change history data');
            return;
        }

        const fieldLabels = data.fieldLabels || {};

        const rows = Object.keys(data.previousValues)
            .filter((fieldName) => {
                const oldValue = data.previousValues[fieldName];
                const newValue = data.newValues[fieldName];
                return oldValue !== newValue;
            })
            .map((fieldName) => {
                const oldValue = data.previousValues[fieldName];
                const newValue = data.newValues[fieldName];
                const fieldLabel = fieldLabels[fieldName] || fieldName;

                const displayOldValue = (oldValue === null || oldValue === undefined || oldValue === '')
                    ? '(Empty)'
                    : String(oldValue);

                const displayNewValue = (newValue === null || newValue === undefined || newValue === '')
                    ? '(Empty)'
                    : String(newValue);

                const encodedLabel = Ext.util.Format.htmlEncode(fieldLabel);
                const encodedOldValue = Ext.util.Format.htmlEncode(displayOldValue);
                const encodedNewValue = Ext.util.Format.htmlEncode(displayNewValue);

                return `
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc; font-weight: bold;">${encodedLabel}</td>
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
            title: `Change History Details - ${data.user || 'Unknown User'} at ${data.timestamp || ''}`,
            width: 900,
            height: 600,
            layout: 'fit',
            modal: true,
            autoScroll: true,
            html: `
            <div style="padding: 10px; overflow: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="padding: 10px; border: 1px solid #ccc; text-align: left; width: 25%;">Field</th>
                            <th style="padding: 10px; border: 1px solid #ccc; text-align: left; width: 37.5%;">Previous Value</th>
                            <th style="padding: 10px; border: 1px solid #ccc; text-align: left; width: 37.5%;">New Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${rows.join('')}
                    </tbody>
                </table>
            </div>
        `,
            buttons: [
                {
                    text: 'Close',
                    handler: function () {
                        modal.close();
                    },
                }
            ],
        });

        modal.show();
    },
});