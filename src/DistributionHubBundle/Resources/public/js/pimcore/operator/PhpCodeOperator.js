pimcore.registerNS("pimcore.plugin.DistributionHubBundle.PhpCodeOperator");

pimcore.plugin.DistributionHubBundle.PhpCodeOperator = Class.create({

    phpCodeOperatorPath_Label_Modification: function(){

        Ext.override(pimcore.object.gridcolumn.operator.phpcode, {

            getConfigDialog: function (node, params) {
                this.node = node;
        
                this.textField = new Ext.form.TextField({
                    fieldLabel: t('label'),
                    length: 255,
                    width: 400,
                    value: this.node.data.configAttributes.label
                });
        
                this.phpClassField = new Ext.form.TextField({
                    fieldLabel: t('php_class'),
                    width: 400,
                    value: 'DistributionHubBundle\\Model\\DataObject\\GridColumnConfig\\Operator\\ProductBrickDataOperator'
                    // value: this.node.data.configAttributes.phpClass
                });
        
                this.additionalDataField = new Ext.form.TextArea({
                    fieldLabel: t('Brick Attribute Name'),
                    width: 400,
                    value: this.node.data.configAttributes.additionalData
                });
        
        
                this.configPanel = new Ext.Panel({
                    layout: "form",
                    bodyStyle: "padding: 10px;",
                    items: [this.textField, this.phpClassField, this.additionalDataField],
                    buttons: [{
                        text: t("apply"),
                        iconCls: "pimcore_icon_apply",
                        handler: function () {
                            this.commitData(params);
                        }.bind(this)
                    }]
                });
        
                this.window = new Ext.Window({
                    width: 600,
                    height: 300,
                    modal: true,
                    title: t('settings'),
                    layout: "fit",
                    items: [this.configPanel]
                });
        
                this.window.show();
                return this.window;
            },
        
        });
    }
 });
 