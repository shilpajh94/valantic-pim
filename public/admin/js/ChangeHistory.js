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
            iconCls: 'pimcore_icon_time',
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
                },
            },
            fields: ['id', 'timestamp', 'user', 'changeFields'],
            autoLoad: true,
            listeners: {
                load: function (store, records) {
                    
                },
                exception: function (proxy, response, options) {
                    if (response.status === 404) {
                        
                    } else {
                       
                    }
                },
            },
        });

        return new Ext.grid.GridPanel({
            store: this.store,
            columns: [
                { header: 'Timestamp', dataIndex: 'timestamp', width: 150, sortable: true },
                { header: 'User', dataIndex: 'user', width: 100, sortable: true },
                {
                    header: 'Changed Fields',
                    dataIndex: 'changeFields',
                    flex: 1,
                    renderer: function (value) {
                        if (Array.isArray(value)) {
                            const list = value.join(', ');
                            return `<div title="${list}">${list}</div>`;
                        }
                        return 'No fields changed';
                    },
                },
            ],
            listeners: {
                rowclick: (grid, record) => this.onRowClick(grid, record),
            },
        });
    },

    onRowClick: function (grid, rowIndex) {
        const id = rowIndex.id;

        if (!id) {
         
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
                const data = Ext.decode(response.responseText).data;

                this.showDetailModal(data);
            },
            failure: (response) => {
                Ext.MessageBox.hide();
                if (response.status === 404) {
                  
                } else {
                   
                }
            },
        });
    },

    showDetailModal: function (data) {
        const rows = Object.keys(data.previousValues).map((key) => {
            const oldValue = data.previousValues[key] || 'null';
            const newValue = data.newValues[key] || 'null';
            const isChanged = JSON.stringify(oldValue) !== JSON.stringify(newValue);
            const rowStyle = isChanged ? 'background-color: #ffefef;' : '';

            return `
                <tr style="${rowStyle}">
                    <td style="padding: 10px; border: 1px solid #ccc;">${key}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${this.formatValue(oldValue)}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${this.formatValue(newValue)}</td>
                </tr>
            `;
        });

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

    formatValue: function (value) {
        if (value === null || value === undefined) return 'null';
        if (Array.isArray(value)) return JSON.stringify(value, null, 2);
        if (typeof value === 'object') return JSON.stringify(value, null, 2);
        return value;
    },
});