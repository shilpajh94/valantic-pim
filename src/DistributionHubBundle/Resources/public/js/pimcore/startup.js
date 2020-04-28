pimcore.registerNS("pimcore.plugin.DistributionHubBundle");

pimcore.plugin.DistributionHubBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.DistributionHubBundle";
    },
    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },
    pimcoreReady: function (params, broker) {
        if (pimcore.globalmanager.get("user").isAllowed("plugin_DistributionHub_access")) {
            var channelsToolbar = new pimcore.plugin.channelstoolbar();
            channelsToolbar.leftNavigation();
        }
    },
    postOpenObject: function (object, type) {

//        if (object.data.general.o_className == "Product") {
//            console.log(object);
//            var workflowName = object.data.workflowManagement.workflowName;
//            var workflowStatus = object.data.workflowManagement.status.name;
//            var currentuser = pimcore.currentuser;
//            console.log(object.data.workflowManagement);
//
//
//
//            if (!(currentuser.admin)) {
//                var userRoles = currentuser.roles;
//                var permissionArray = [];
//                permissionArray["date"] = [];
//                permissionArray["price"] = [];
//                permissionArray ["date"]["open" ] = [74, 75, 76];
//                permissionArray ["date"]["in_approval" ] = [74, 75, 76];
//                permissionArray ["date"]["approved"] = [];
//                permissionArray ["date"]["rejected"] = [];
//                if (workflowStatus == "open" ||workflowStatus == "todo" ) {
//                    permissionArray ["price"] = [60, "61", "62", "74", "75", "76"];
//                } else if (workflowStatus == "in_approval") {
//                    permissionArray ["price"] = ["74", "75", "76"];
//
//                } else if (workflowStatus == "approved") {
//                    permissionArray ["price"] = [];
//
//                } else if (workflowStatus == "rejected") {
//                    permissionArray ["price"] = ["60", "61", "62", "74", "75", "76"];
//                }
//            }
//
//            Ext.Array.each(userRoles, function (userRole) {
//           
//                console.log(permissionArray["price"].indexOf(userRole));
//                if(permissionArray["price"].indexOf(userRole) < 0){
//                    var price  = object.edit.dataFields.price1.component.setEditable(false);
//                }else{
//                    
//                }
//            });
//            if (workflowName == "Price Workflow") {
//
//            }
//
//
//        }

//        if (type == 'folder') {
//            if (object.data.properties.product_folder && object.data.properties.product_folder.data == true) {
//                object.toolbar.insert(7,
//                        new Ext.Button({
//                            text: 'Create Object',
//                            iconCls: "pimcore_icon_object pimcore_icon_overlay_add",
//                            scale: "medium",
//                            handler: this.createObjectWindow.bind(this, object.id, 'object')
//                        })
//                        );
//            }
//        }
    },

    createObjectWindow: function (id, elementType) {
        Ext.MessageBox.prompt(sprintf(t('add_object_mbx_title'), 'Product'), t('please_enter_the_name_of_the_new_object'),
                this.createObject.bind(this, id, elementType));

    },

    createObject: function (parentId, elementType, button, value, object) {

        if (value) {
            Ext.Ajax.request({
                url: '/admin/object/add',
                params: {
                    elementType: 'object',
                    parentId: parentId,
                    className: 'Product',
                    classId: 1,
                    key: value
                },
                success: function (response) {
                    response = Ext.decode(response.responseText);
                    console.log(response.id);

                    if (response.success == true) {
                        pimcore.helpers.openObject(response.id, 'object');
                    } else {
                        Ext.MessageBox.alert('Alert.', response.message);
                    }

                }.bind(this)
            });
        }


    }
});

var DistributionHubBundlePlugin = new pimcore.plugin.DistributionHubBundle();
