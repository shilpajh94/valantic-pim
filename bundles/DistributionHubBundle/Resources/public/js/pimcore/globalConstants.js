Ext.define('pimcore.plugin.dHub', {
    alternateClassName: 'globalConstants',
    singleton: true,

    // One common place to declare the constants
    // Usage : simply call - globalConstants.< constant_name > or globalConstants.< method_name() >

    DHUB_VARIANT: 'variant',
    DHUB_OBJECT: 'object',
    DHUB_FOLDER: 'folder',
    DHUB_FILTER_BY_CONDITIONS: 'Filter Conditions',
    DHUB_FILTER_BY_LIST: 'Upload List of Selected SKUs',

    // collective way for using constants
    getAllObjectTypes: function () {
        return [this.DHUB_VARIANT, this.DHUB_OBJECT, this.DHUB_FOLDER];
    }

});