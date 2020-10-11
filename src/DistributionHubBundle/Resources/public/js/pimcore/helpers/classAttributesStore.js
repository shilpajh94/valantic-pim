pimcore.registerNS("pimcore.plugin.distributionhub.helpers.classAttributesStore");
pimcore.plugin.distributionhub.helpers.classAttributesStore= Class.create(
    {

        initialize: function (name, index) {
            this. rootConfig =  {
                id: "0",
                root: true,
                iconCls:'pimcore_icon_classificationstore',
                text: t(name),
                typePool:true,
                parentType:"ClassStoreAttribute"+index,
                //leaf: true,
                isTarget: true,
                expanded: false,
                collapsed:true
            };
        },
        getStore: function(name, classStoreId){


            let itemsPerPage = pimcore.settings['object_tree_paging_limit'];

            let store = Ext.create('pimcore.plugin.distributionhub.helpers.customPagingTreeStore', {
                autoLoad: true,
                autoSync: false,
                proxy: {
                    type: 'ajax',
                    url: '/admin/distributionhub/channel/getGroupKeys',
                    reader: {
                        type: 'json',
                        totalProperty : 'total',
                        rootProperty: 'nodes'
                    },
                    extraParams: {
                        limit: itemsPerPage,
                        storeId: classStoreId,
                        name: name,
                        // view: this.config.customViewId
                    }
                },
                pageSize: itemsPerPage,
                root: this.rootConfig
            });
            return  store;
        },
        getClassificationStorePanel:function(name, classStoreId){
            if(!this.classDefinitionTreePanelClass){
                this.classDefinitionTreePanelClass = new Ext.tree.TreePanel({
                region: "center",
                autoScroll: true,
                rootVisible: true,
                bufferedRenderer: false,
                animate: false,
                width: 500,
                viewConfig: {
                    plugins: {
                        ptype: 'treeviewdragdrop',
                        enableDrag: true,
                        enableDrop: false,
                        ddGroup: "columnconfigelement"
                    },
                    listeners: {
                        // nodedragover: this.onTreeNodeOver.bind(this)
                    },
                    xtype: 'custompimcoretreeview'
                },
                store: this.getStore(name, classStoreId),
                root:this.rootConfig,
                //renderTo: Ext.getBody()
            });
             }
            return this.classDefinitionTreePanelClass;
        }
    }
);