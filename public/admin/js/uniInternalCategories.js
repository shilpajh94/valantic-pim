pimcore.registerNS('pimcore.bundle.customreports.custom.definition.uniInternalCategories');

pimcore.bundle.customreports.custom.definition.uniInternalCategories = Class.create({
    element: null,
    sourceDefinitionData: null,
    columnSettingsCallback: null,
    fieldsToCheck: [
        {
            name: 'filter',
            label: 'Categories Filter',
        },
    ],

    initialize: function (sourceDefinitionData, key, deleteControl, columnSettingsCallback) {
        this.sourceDefinitionData = sourceDefinitionData;
        this.columnSettingsCallback = columnSettingsCallback;

        this.element = new Ext.form.FormPanel({
            key: key,
            bodyStyle: 'padding:10px;',
            autoHeight: true,
            border: false,
            tbar: deleteControl,
            items: [
                {
                    xtype: 'combo',
                    name: 'filter',
                    fieldLabel: 'Categories Filter',
                    queryMode: 'local',
                    store: ['NEWLY_CREATED_INTERNAL_CATEGORIES', 'INTERNAL_CATEGORIES_TO_ENRICH', 'PENDING_APPROVAL', 'REJECTED_INTERNAL_CATEGORIES', 'INTERNAL_CATEGORIES_USERS_NOT_ASSIGNED'],
                    value: (sourceDefinitionData ? sourceDefinitionData.filter : 'INTERNAL_CATEGORIES_TO_ENRICH'),
                    enableKeyEvents: true,
                    minWidth: 400
                }
            ]
        });

        this.element.updateLayout();
    },

    getElement: function () {
        return this.element;
    },

    getValues: function () {
        var values = this.element.getForm().getFieldValues();
        values.type = 'uniInternalCategories';

        return values;
    },
});
