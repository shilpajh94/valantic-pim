pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.resultAbstractPanel");
pimcore.bundle.distributionhub.filtersConfig.resultAbstractPanel = Class.create(pimcore.object.helpers.gridTabAbstract, {
    systemColumns: ["id", "fullpath", "type", "subtype", "filename", "classname", "creationDate", "modificationDate"],
    noBatchColumns: [],
    batchAppendColumns: [],
    batchRemoveColumns: [],

    getSaveDataCallback: null,
    gridConfigData: {},

    portletMode: false,

    fieldObject: {},

    getLayout: function (initialFilter) {
    },

    updateGrid: function (classId) {
    },

    createGrid: function (fromConfig, response, settings, save) {
    }
});
 
if (pimcore.object.helpers.gridcolumnconfig) {
    pimcore.bundle.distributionhub.filtersConfig.resultAbstractPanel.addMethods(pimcore.object.helpers.gridcolumnconfig);
} else {
    pimcore.bundle.distributionhub.filtersConfig.resultAbstractPanel.addMethods(pimcore.element.helpers.gridColumnConfig);
}
