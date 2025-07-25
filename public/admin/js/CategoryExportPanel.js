document.addEventListener(pimcore.events.postOpenObject, (e) => {
    console.log('Object editor opened:', e);

    // Check if the object class is 'UniProductCategoryExternal'
    if (e.detail.object.data.general.className === 'UniProductCategoryExternal') {
        console.log('Adding export buttons to the toolbar for UniProductCategoryExternal...');

        // Add the "Export as XLSX" button
        e.detail.object.toolbar.add({
            text: t('Export as XLSX'),
            iconCls: 'pimcore_icon_download',
            handler: function (obj) {
                const exportUrl = `/admin/export/preview?id=${obj.data.general.id}&format=xlsx`;
                window.open(exportUrl, '_blank');
            }.bind(this, e.detail.object)
        });

        // Add the "Export as CSV" button
        e.detail.object.toolbar.add({
            text: t('Export as CSV'),
            iconCls: 'pimcore_icon_csv',
            handler: function (obj) {
                const exportUrl = `/admin/export/preview?id=${obj.data.general.id}&format=csv`;
                window.open(exportUrl, '_blank');
            }.bind(this, e.detail.object)
        });

         // Add a "Show Preview" button to the toolbar
        e.detail.object.toolbar.add({
            text: t('Show Preview'),
            iconCls: 'pimcore_icon_table', // Icon for the button
            handler: function (obj) {
                const previewUrl = `/admin/export/preview?id=${obj.data.general.id}&format=html`;

                // Fetch the preview HTML from the backend
                fetch(previewUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Failed to fetch preview. Status: ${response.status}`);
                        }
                        return response.text();
                    })
                    .then(html => {
                        console.log('Preview HTML fetched successfully.');
                        showPreviewInTab(e.detail.object, html); // Show the preview in the tab
                    })
                    .catch(error => {
                        console.error('Error fetching preview:', error);
                        pimcore.helpers.showNotification(t('Error'), t('Failed to fetch preview'), 'error');
                    });
            }.bind(this, e.detail.object),
        });
        // Refresh the layout to ensure buttons are displayed
        pimcore.layout.refresh();// Add a "Show Preview" button to the toolbar
       

        console.log('Export buttons added to the toolbar.');
    }
});


function showPreviewInTab(object, html) {
    try {
        // Locate the main tab panel (ExtJS container for tabs)
        const mainTabPanel = object.tabPanel || object.tab; // Adjust depending on Pimcore's structure
        if (!mainTabPanel) {
            console.error('Main Tab Panel not found.');
            pimcore.helpers.showNotification(t('Error'), t('Main Tab Panel not found'), 'error');
            return;
        }

        // Locate the Preview Tab or create a new one
        let previewTab = mainTabPanel.items.findBy((tab) => tab.title === t('Preview')); // Use `findBy`

        if (!previewTab) {
            console.log('Preview Tab not found. Creating a new Preview Tab...');
            
            // Add a new Preview Tab
            previewTab = mainTabPanel.add({
                xtype: 'panel', // Proper ExtJS xtype
                title: t('Preview'),
                iconCls: 'pimcore_icon_table',
                html: html,
                closable: true, // Make the tab closable
                bodyPadding: 10,
                layout: 'fit',
                listeners: {
                    close: function () {
                        console.log('Preview Tab closed.');
                        // Optional: Perform cleanup tasks if needed
                    },
                },
            });
        } else {
            console.log('Updating existing Preview Tab...');
            
            // Update the content of the existing Preview Tab
            previewTab.update(html);
        }

        // Activate the Preview Tab
        mainTabPanel.setActiveTab(previewTab); // Correct method for ExtJS tab panels
        console.log('Preview Tab updated and activated successfully.');
    } catch (error) {
        console.error('Error showing Preview Tab:', error);
        pimcore.helpers.showNotification(t('Error'), t('Failed to show Preview Tab'), 'error');
    }
}