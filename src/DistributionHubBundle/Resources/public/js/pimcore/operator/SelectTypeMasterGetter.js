pimcore.registerNS("pimcore.object.gridcolumn.operator.selecttypemastergetter");

pimcore.object.gridcolumn.operator.selecttypemastergetter = Class.create(pimcore.object.gridcolumn.Abstract, {
    operatorGroup: "extractor",
    type: "operator",
    class: "SelectTypeMasterGetter",
    iconCls: "pimcore_icon_image",
    defaultText: "Select Type Master Getter",
    group: "getter",

    getConfigTreeNode: function(configAttributes) {
        if(configAttributes) {
            var nodeLabel = this.getNodeLabel(configAttributes);
            var node = {
                draggable: true,
                iconCls: this.iconCls,
                text: nodeLabel,
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

        this.multiselectSeparatortextField = new Ext.form.TextField({
            fieldLabel: t('Separator For Multiselect'),
            labelWidth: 200,
            value: this.node.data.configAttributes.multiselectSeparatortextField
        });

        this.configPanel = new Ext.Panel({
            layout: "form",
            bodyStyle: "padding: 10px;",
            items: [this.textField,this.multiselectSeparatortextField],
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
        this.node.data.configAttributes.multiselectSeparatortextField = this.multiselectSeparatortextField.getValue();


        var nodeLabel = this.getNodeLabel(this.node.data.configAttributes);
        this.node.set('text', nodeLabel);

        this.window.close();

        if (params && params.callback) {
            params.callback();
        }
    },


    getNodeLabel: function (configAttributes) {
        var nodeLabel = configAttributes.label ? configAttributes.label : this.getDefaultText();
        if (configAttributes.attribute) {
            var attr = configAttributes.attribute;
            if (configAttributes.param1) {
                attr += " " + configAttributes.param1;
            }
            nodeLabel += '<span class="pimcore_gridnode_hint"> (' + attr + ')</span>';
        }

        return nodeLabel;
    },

    allowChild: function (targetNode, dropNode) {
        if (targetNode.childNodes.length > 0) {
            return false;
        }
        return true;
    },
});
