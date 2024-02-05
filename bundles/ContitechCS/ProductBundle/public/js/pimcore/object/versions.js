pimcore.registerNS("pimcore.plugin.object.versions");

pimcore.plugin.object.versions = Class.create({
    getClassName: function () {
        return "pimcore.plugin.object.versions";
    },
    initialize: function () {
        Ext.override(pimcore.object.versions, {
            compareVersions: function (grid, rowIndex, event) {
                if (grid.getSelectionModel().getCount() < 3) {

                    var selections = grid.getSelectionModel().getSelection();
                    var dtoken = encodeURIComponent(window.btoa(Intl.DateTimeFormat().resolvedOptions().timeZone));
                    var url = "/admin/object/diff-versions/from/" + selections[0].data.id + "/to/" + selections[1].data.id + "?dtz=" + dtoken;
                    Ext.get(this.iframeId).dom.src = url;
                }
            },

            showVersionPreview: function (grid, rowIndex, event) {

                var store = grid.getStore();
                var data = store.getAt(rowIndex).data;
                var versionId = data.id;
                var dtoken = encodeURIComponent(window.btoa(Intl.DateTimeFormat().resolvedOptions().timeZone));
                var url = "/admin/object/preview-version?id=" + versionId+'&dtz='+dtoken;
                Ext.get(this.iframeId).dom.src = url;
            },
        });
    }
});
var versions = new pimcore.plugin.object.versions();