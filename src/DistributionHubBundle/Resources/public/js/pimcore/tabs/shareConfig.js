pimcore.registerNS("pimcore.plugin.distributionhub.tabs.shareConfig");


pimcore.plugin.distributionhub.tabs.shareConfig = Class.create(pimcore.element.abstract, {

    initialize: function (data, channelId, parentPanel) {
        this.data = data.data[0];
        this.channelId = channelId;
        this.parentPanel = parentPanel;
    },

    /**
     * create and return the form
     *
     * @returns {Ext.form.FormPanel}
     */

    getSharePanel: function () {

        this.userStore = new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: true,
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/share/get-users',
                reader: {
                    rootProperty: 'data',
                    idProperty: 'id'
                }
            },
            fields: ['id', 'label']
        });

        this.rolesStore = new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: true,
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/share/get-roles',
                reader: {
                    rootProperty: 'data',
                    idProperty: 'id'
                }
            },
            fields: ['id', 'label']
        });

        this.nameField = Ext.create('Ext.form.field.Text', {
            fieldLabel: t("name"),
            name: "name",
            editable:false,
            readOnly:true,
            width: 500,
            value: this.data.text ? this.data.text : ""
        });

        this.sharingUserField = Ext.create('Ext.form.field.Tag', {
            name: "shared_users[]",
            id: "shared_users"+this.channelId,
            width: 500,
            fieldLabel: t("dHub_users"),
            queryDelay: 0,
            resizable: true,
            queryMode: 'local',
            minChars: 1,
            store: this.userStore,
            displayField: 'label',
            valueField: 'id',
            forceSelection: true,
            filterPickList: true,
            hidden:this.data.shareGlobally,
            /*allowBlank: false,
            blankText: t('dHub_field_is_required'),
            msgTarget: 'under',*/
            value: this.data.sharedUserIds ? this.data.sharedUserIds : ""
        });

        this.rolesSharingField = Ext.create('Ext.form.field.Tag', {
            name: "shared_roles[]",
            id: "shared_roles"+this.channelId,
            width: 500,
            fieldLabel: t("dHub_roles"),
            queryDelay: 0,
            resizable: true,
            queryMode: 'local',
            minChars: 1,
            store: this.rolesStore,
            displayField: 'label',
            valueField: 'id',
            forceSelection: true,
            filterPickList: true,
            hidden:this.data.shareGlobally,
            value: this.data.sharedUserIds ? this.data.sharedUserIds : ""
        });
        this.expiryDateField = Ext.create('Ext.form.field.Date', {
            name: "expiryDate",
            width: 500,
            fieldLabel: t("dHub_expiry_date"),
            minValue: new Date(),  // defaults to today
            //editable: false,
            formatText: '',
            value: this.data.expiryDate ? this.data.expiryDate : "",
        });
        let shareItems = [];

        let user = pimcore.globalmanager.get("user");
        if (user.admin) {
            var outerscope = this;
            this.shareGlobally = new Ext.form.field.Checkbox(
                {
                    fieldLabel: t("share_globally"),
                    inputValue: true,
                    name: "share_globally",
                    value: this.data.shareGlobally ? this.data.shareGlobally : false,
                    listeners: {
                        change: function (checkbox, newVal, oldVal) {
                            if (newVal == '1'){
                                Ext.getCmp('shared_users'+outerscope.channelId).hide();
                                Ext.getCmp('shared_roles'+outerscope.channelId).hide();
                            }else{
                                Ext.getCmp('shared_users'+outerscope.channelId).show();
                                Ext.getCmp('shared_roles'+outerscope.channelId).show();
                            }
                        }
                    }
                }
            );

            shareItems.push(this.shareGlobally);
        }
        shareItems.push(this.sharingUserField);
        shareItems.push(this.rolesSharingField);
        shareItems.push(this.expiryDateField);
        let buttons = [];
            buttons.push({
                text: t("save"),
                iconCls: "pimcore_icon_apply",
                handler: this.saveShareConfig.bind(this)
            });
        this.settingsForm = Ext.create('Ext.form.FormPanel', {
            title: t("dHub_share"),
            id:"distributionhub_share_panel_" + this.data.id,
            iconCls: "pimcore_icon_languagemultiselect",
            bodyStyle: "padding:10px;",
            autoScroll: true,
            border:false,
            items: [
                this.nameField, {
                    name: "description",
                    fieldLabel: t("dHub_description"),
                    xtype: "textarea",
                    width: 500,
                    height: 100,
                    value: this.data.description ? this.data.description : ""
                },
                {
                    xtype: "fieldset",
                    title: t("dHub_share"),
                    closeable: true,
                    items: shareItems
                }],
            buttons: buttons
        });

        return this.settingsForm;
    },
    saveShareConfig: function () {
        let form = this.settingsForm;
        let values = form.getForm().getFieldValues();
        let shared_users = Ext.getCmp('shared_users'+this.channelId).getValue();
        let shared_roles = Ext.getCmp('shared_roles'+this.channelId).getValue()
        let share_globally = values.share_globally;
       if (form.isValid()) {
          // if (shared_users.length > 0 || shared_roles.length > 0 || share_globally != false) {
               form.submit({
                   url: '/admin/distributionhub/share/save',
                   method: 'POST',
                   type:"json",
                   params: {
                       channelId: this.channelId,
                       shared_users: shared_users,
                       shared_roles: shared_roles,
                   },
                   waitMsg: "Wait...",
                   success: function (form, response) {
                       response = response.response;
                       response = Ext.decode(response.responseText);
                   },
                   failure: function (form, response) {
                       response = response.response;
                       response = Ext.decode(response.responseText);
                       Ext.MessageBox.alert(t('dHub_failure'), t(response.msg));
                   }
               });
          /* }else{
               Ext.MessageBox.alert(t('dHub_warning'), t('dHub_shared_mandatory_field'));
               return;
           }*/
        }
    },
});
