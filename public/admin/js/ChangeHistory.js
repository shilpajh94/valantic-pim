document.addEventListener(pimcore.events.postOpenObject, (e) => {
    const object = e.detail.object;
    
    if (object?.data?.general?.className === 'UniProductCategoryInternal') {
        const interval = setInterval(() => {
            if (object.tabbar && typeof object.tabbar.add === 'function') {
                try {
                    // Create instance of your history class
                    const historyInstance = new pimcore.element.history(object, 'object');
                    const historyLayout = historyInstance.getLayout();
                    
                    object.tabbar.add(historyLayout);
                    console.log('History Tab Added Successfully with Class');
                } catch (error) {
                    console.error('Error while adding History tab:', error);
                }
                clearInterval(interval);
            }
        }, 100);
    }
});

// Register namespace following Pimcore convention
pimcore.registerNS("pimcore.element.history");

pimcore.element.history = Class.create({
    initialize: function (element, elementType) {
        this.element = element;
        this.elementType = elementType;
        this.layout = null;
    },
    
    activate: function () {
        const tabPanel = Ext.getCmp("pimcore_panel_tabs");
        if (tabPanel) {
            try {
                const layout = this.getLayout();
                tabPanel.add(layout);
                tabPanel.setActiveTab(layout);
                pimcore.layout.refresh();
            } catch (error) {
                console.error('Error Adding Tab to Panel:', error);
            }
        } else {
            console.error("Tab Panel not found");
        }
    },
    
    getLayout: function () {
        if (this.layout === null) {
            try {
                // Create the main panel following Pimcore's pattern
                this.layout = new Ext.Panel({
                    title: 'History', // Using plain text for now
                    iconCls: 'pimcore_icon_time',
                    border: false,
                    layout: 'fit',
                   
                    items: [this.getGrid()],
                    listeners: {
                        activate: function() {
                            console.log('History tab activated!');
                            // This fires when tab becomes active
                            alert('History Tab Clicked!');
                        }.bind(this)
                    }
                });
                
                console.log('History Layout Initialized');
            } catch (err) {
                console.error("Failed to initialize History layout:", err);
                // Fallback simple panel that will definitely work
                this.layout = new Ext.Panel({
                    title: 'History',
                    border: false,
                    html: '<div style="padding: 20px;">' +
                          '<h2>History for: ' + (this.element.data.general.o_key || 'Object') + '</h2>' +
                          '<p><strong>Object ID:</strong> ' + this.element.data.general.id + '</p>' +
                          '<p><strong>Class:</strong> ' + this.element.data.general.className + '</p>' +
                          '<p><strong>Path:</strong> ' + this.element.data.general.fullpath + '</p>' +
                          '<hr>' +
                          '<p>History functionality loaded successfully!</p>' +
                          '<button onclick="alert(\'History action performed!\')" style="padding: 10px; background: #337ab7; color: white; border: none; border-radius: 3px; cursor: pointer;">Test Action</button>' +
                          '</div>',
                    closable: true,
                    listeners: {
                        activate: function() {
                            console.log('History tab activated for:', this.element.data.general.o_key);
                            alert('History Tab Clicked for: ' + (this.element.data.general.o_key || 'Object'));
                        }.bind(this),
                        render: function() {
                            console.log('History tab rendered');
                        }
                    }
                });
            }
        }
        return this.layout;
    },
    
    getGrid: function() {
        // Try to use existing Pimcore routes for history/versions
        let historyUrl;
        try {
            // Try different possible routes
            if (typeof Routing !== 'undefined') {
                // Try common Pimcore history routes
                const possibleRoutes = [
                    'pimcore_admin_dataobject_dataobject_getversions',
                    'pimcore_admin_element_get_versions',
                    'pimcore_admin_dataobject_getversions',
                    'pimcore_admin_element_getversions'
                ];
                
                for (let route of possibleRoutes) {
                    try {
                        historyUrl = Routing.generate(route);
                        console.log('Using route:', route);
                        break;
                    } catch (e) {
                        // Route doesn't exist, try next
                        continue;
                    }
                }
            }
            
            // Fallback URL if no route works
            if (!historyUrl) {
                historyUrl = '/admin/dataobject/dataobject/get-versions';
                console.log('Using fallback URL:', historyUrl);
            }
            
        } catch (e) {
            console.warn('Error generating history URL:', e);
            historyUrl = '/admin/dataobject/dataobject/get-versions';
        }

        // Create store for history data
        this.store = new Ext.data.JsonStore({
            url: historyUrl,
            baseParams: {
                id: this.element.data.general.id,
                type: this.elementType || 'object'
            },
            fields: [
                'id',
                'date',
                'user',
                'action',
                'description',
                'revision'
            ],
            autoLoad: false, // Don't auto load to prevent errors
            listeners: {
                load: function(store, records, successful) {
                    if (!successful) {
                        console.error("Failed to load history data");
                        // Show a message in the grid
                        this.showMessage('Failed to load history data');
                    }
                }.bind(this),
                loadexception: function(proxy, type, action, options, response, arg) {
                    console.warn('History data load failed:', response);
                    this.showMessage('History data unavailable - ' + (response.statusText || 'Unknown error'));
                }.bind(this)
            }
        });

        // Create grid panel following Pimcore's structure
        const grid = new Ext.grid.GridPanel({
            store: this.store,
            border: false,
            columns: [
                {
                    header: t('date'),
                    dataIndex: 'date',
                    width: 130,
                    renderer: function(d) {
                        if (d !== undefined) {
                            var date = new Date(d * 1000);
                            return Ext.util.Format.date(date, "Y-m-d H:i:s");
                        }
                        return "";
                    }
                },
                {
                    header: t('user'),
                    dataIndex: 'user',
                    width: 100
                },
                {
                    header: t('action'),
                    dataIndex: 'action',
                    width: 100
                },
                {
                    header: t('description'),
                    dataIndex: 'description',
                    flex: 1
                },
                {
                    header: t('revision'),
                    dataIndex: 'revision',
                    width: 80
                }
            ],
            stripeRows: true,
            autoExpandColumn: 'description',
            viewConfig: {
                forceFit: true
            },
            listeners: {
                rowclick: function(grid, rowIndex, e) {
                    // Handle row click
                    const record = grid.getStore().getAt(rowIndex);
                    console.log('History row clicked:', record.data);
                    alert('History row clicked: ' + record.data.action);
                }
            }
        });

        // Try to load data after grid is rendered
        grid.on('render', function() {
            try {
                this.store.load();
            } catch (e) {
                console.warn('Could not load store data:', e);
                this.showMessage('Unable to load history data');
            }
        }.bind(this));

        return grid;
    },
    
    showMessage: function(message) {
        // Update grid with message if store fails
        if (this.layout && this.layout.items && this.layout.items.items[0]) {
            const grid = this.layout.items.items[0];
            if (grid.getView()) {
                grid.getView().emptyText = message;
                grid.getView().refresh();
            }
        }
    },
    
    reload: function() {
        if (this.store) {
            this.store.reload();
        }
    }
});

// Alternative simpler version if the grid approach doesn't work
// Uncomment this and comment the above if you want a simpler approach
/*
pimcore.element.history = Class.create({
    initialize: function (element, elementType) {
        this.element = element;
        this.elementType = elementType;
        this.layout = null;
    },
    
    getLayout: function () {
        if (this.layout === null) {
            this.layout = new Ext.Panel({
                title: 'History',
                iconCls: 'pimcore_icon_tab_history',
                html: '<div style="padding: 20px;">' +
                      '<h2>History for: ' + this.element.data.general.o_key + '</h2>' +
                      '<p>Object ID: ' + this.element.data.general.id + '</p>' +
                      '<button onclick="alert(\'History action performed!\')">Perform Action</button>' +
                      '</div>',
                closable: true,
                listeners: {
                    activate: function() {
                        console.log('History tab activated for:', this.element.data.general.o_key);
                        alert('History Tab Clicked for: ' + this.element.data.general.o_key);
                    }.bind(this),
                    render: function() {
                        console.log('History tab rendered');
                    }
                }
            });
        }
        return this.layout;
    }
});
*/