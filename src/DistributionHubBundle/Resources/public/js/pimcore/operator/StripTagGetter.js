pimcore.registerNS("pimcore.object.gridcolumn.operator.striptaggetter");

pimcore.object.gridcolumn.operator.striptaggetter = Class.create(pimcore.object.gridcolumn.Abstract, {
    operatorGroup: "transformer",
    type: "operator",
    class: "StripTagGetter",
    iconCls: "pimcore_icon_operator_stringreplace",
    defaultText: "Strip HTML Tag",
    group: "string",

    getConfigTreeNode: function(configAttributes) {
        if(configAttributes) {
            // var nodeLabel = this.getNodeLabel(configAttributes);
            var node = {
                draggable: true,
                iconCls: this.iconCls,
                text: configAttributes.label ? configAttributes.label : this.getDefaultText(),
                configAttributes: configAttributes,
                isTarget: true,
                maxChildCount: 1,
                expanded: true,
                leaf: false,
                expandable: false,
                isChildAllowed: this.allowChild
            };
        } else {

            //For building up operator list
            var configAttributes = { type: this.type, class: this.class, label: this.getDefaultText()};

            var node = {
                draggable: true,
                iconCls: this.iconCls,
                text: this.getDefaultText(),
                configAttributes: configAttributes,
                isTarget: true,
                maxChildCount: 1,
                leaf: true,
                isChildAllowed: this.allowChild
            };
        }
        node.isOperator = true;
        return node;
    },
    
    getCopyNode: function(source) {
        var copy = source.createNode({
            iconCls: this.iconCls,
            text: source.data.cssClass,
            isTarget: true,
            leaf: false,
            maxChildCount: 1,
            expanded: true,
            expandable: false,
            isOperator: true,
            isChildAllowed: this.allowChild,
            configAttributes: {
                label: source.data.text,
                type: this.type,
                class: this.class
            }
        });
        return copy;
    },


    getConfigDialog: function(node, params) {
        this.node = node;

        this.textField = new Ext.form.TextField({
            fieldLabel: t('label'),
            labelWidth: 200,
            value: this.node.data.configAttributes.label
        });

        // let availableThumbs =  new Ext.data.JsonStore({
        //     proxy: {
        //         type: 'ajax',
        //         url: '/admin/default/list_thumb',
        //         reader: {
        //             type: 'json',
        //             rootProperty: 'data'
        //         }
        //     },
        //     fields: ["id","name"],
        //     sorters: [{
        //         property: 'name',
        //         direction: 'ASC'
        //     }]
        // });
        // availableThumbs.load();

        // Create the combo box, attached to the states data store
        // this.thumbCombo = new Ext.create('Ext.form.ComboBox', {
        //     fieldLabel: t('dHub_select_thumbnail'),
        //     name: 'thumbCombo',
        //     store: availableThumbs,
        //     queryMode: 'local',
        //     forceSelection:true,
        //     displayField: 'name',
        //     valueField: 'id',
        //     value: this.node.data.configAttributes.thumbnail,
        // });

        this.configPanel = new Ext.Panel({
            layout: "form",
            bodyStyle: "padding: 10px;",
            items: [this.textField],
            buttons: [{
                text: t("apply"),
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    this.commitData(params);
                }.bind(this)
            }]
        });

        this.window = new Ext.Window({
            width: 500,
            height: 200,
            modal: true,
            title: t('settings'),
            layout: "fit",
            items: [this.configPanel]
        });

        this.window.show();
        return this.window;
    },

    commitData: function(params) {
        this.node.set('isOperator', true);

        this.node.data.configAttributes.label = this.textField.getValue();
        // this.node.data.configAttributes.thumbnail = this.thumbCombo.getValue();


        // var nodeLabel = this.getNodeLabel(this.node.data.configAttributes);
        this.node.set('text', this.textField.getValue());

        this.window.close();

        if (params && params.callback) {
            params.callback();
        }
    },

    
    // getNodeLabel: function (configAttributes) {
    //     var nodeLabel = configAttributes.label ? configAttributes.label : this.getDefaultText();
    //     if (configAttributes.attribute) {
    //         var attr = configAttributes.attribute;
    //         if (configAttributes.param1) {
    //             attr += " " + configAttributes.param1;
    //         }
    //         nodeLabel += '<span class="pimcore_gridnode_hint"> (' + attr + ')</span>';
    //     }

    //     return nodeLabel;
    // },
    
    // allowChild: function (targetNode, dropNode) {
    //     if (targetNode.childNodes.length > 0) {
    //         return false;
    //     }
    //     return true;
    // },
});
