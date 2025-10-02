pimcore.registerNS('pimcore.bundle.customreports.custom.definition.uniFinishedGoods');

pimcore.bundle.customreports.custom.definition.uniFinishedGoods = Class.create({
    element: null,
    sourceDefinitionData: null,
    columnSettingsCallback: null,
    fieldsToCheck: [
        {
            name: 'filter',
            label: 'Products Filter',
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
                    fieldLabel: 'Products Filter',
                    queryMode: 'local',
                    store: ['FINISHED_GOODS_TO_ENRICH', 'NEWLY_CREATED_PRODUCTS', 'PENDING_APPROVAL', 'REJECTED_FINISHED_GOODS'],
                    value: (sourceDefinitionData ? sourceDefinitionData.filter : 'FINISHED_GOODS_TO_ENRICH'),
                    enableKeyEvents: true,
                    minWidth: 400
                }
            ]
        });

        this.element.updateLayout();
    },

    getElement: function() {
        return this.element;
    },

    getValues: function() {
        var values = this.element.getForm().getFieldValues();
        values.type = 'uniFinishedGoods';

        return values;
    },
});
