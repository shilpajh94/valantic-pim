pimcore.registerNS("pimcore.plugin.distributionhub.helpers.classAttributesStore");
pimcore.plugin.distributionhub.helpers.classAttributesStore= Class.create(
    {

        initialize: function () {
            this. rootConfig =  {
                id: "0",
                root: true,
                iconCls:'pimcore_icon_object',
                text: t("Pool Of Attribute"),
                typePool:true,
                parentType:"PoolOfAttribute",
                leaf: true,
                isTarget: true,
                expanded: true,
            };
        },
        getStore: function(){


            var itemsPerPage = pimcore.settings['object_tree_paging_limit'];

            var store = Ext.create('pimcore.data.CustomPagingTreeStore', {
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
                        // view: this.config.customViewId
                    }
                },
                pageSize: itemsPerPage,
                root: this.rootConfig
            });
            return  store;
        },
        getClassificationStorePanel:function(){
            //if(!this.classDefinitionTreePanelClass){
            var classDefinitionTreePanelClass = Ext.create('Ext.tree.Panel', {
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
                store: this.getStore(),
                rootVisible: true,
                root:this.rootConfig,
                //renderTo: Ext.getBody()
            });
            // }
            return classDefinitionTreePanelClass;
        }
    }
);