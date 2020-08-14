 
pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.conditionEntryPanel");
pimcore.bundle.distributionhub.filtersConfig.conditionEntryPanel = Class.create(pimcore.bundle.distributionhub.filtersConfig.conditionAbstractPanel,{

    getConditionPanel: function(panel, data, channelInfo) {
        var niceName = t("dHub_condition");

        if(typeof data == "undefined") {
            data = {};
        }
         
        this.channelInfo = channelInfo;
        
        var outerScope = this;
        if (!this.classId){
            Ext.Ajax.request({
                url: "/admin/distributionhub/filters/get-updated-channel-details",
                async:false,
                params: {
                    id: this.channelInfo ? this.channelInfo.id : null
                },
                method: "post",
                success: function (response) {
                    var resdata = Ext.decode(response.responseText); 
                    if (!resdata.success) {  
                        Ext.MessageBox.alert(t('dHub_class_not_selected'),t('dHub_class_not_available_error')); 
                        outerScope.newClass = this.classId; 
                    }  
                    if(resdata.success){  
                        outerScope.newClass = resdata.classId; 
                    }
                }
            }); 
        } 
 
        if(!this.classId){
            this.classId = this.newClass; 
        }
  
        var fieldStore = new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: true,
            proxy: {
                type: 'ajax',
                url: '/admin/distributionhub/filters/get-fields',
                reader: {
                    rootProperty: 'data',
                    idProperty: 'fieldName'
                },
                extraParams: {class_id: this.classId, type: 'class'}
            },
            fields: ['fieldName','fieldLabel', 'fieldType', 'context'],
            listeners: {
                load: function (store) { 
                    if(data.fieldname) { 
                        if(data.fieldname == "localizedfields") {
             
                            var language = Object.keys(data.filterEntryData)[0];
                            if(language) {
                                var fieldname = data.filterEntryData[language][0].fieldname;
                                if(fieldname) {
                                    this.fieldSelection.setValue(fieldname);
                                }
                            }

                        } else {
                            this.fieldSelection.setValue(data.fieldname);
                        }

                    }
                }.bind(this)
            }
        });

        this.fieldSelection = Ext.create('Ext.form.ComboBox',
            {

                fieldLabel: t("dHub_field"),
                name: "condition",
                store: fieldStore,
                queryMode: 'local',
                width: 250,
                labelWidth: 35,
                style: "margin-right: 35px",
                valueField: 'fieldName',
                displayField: 'fieldLabel',
                listeners: {
                    change: function( item, newValue, oldValue, eOpts ) {
                        var record = item.getStore().getAt(item.getStore().findExact('fieldName', newValue));
                        if(record) {
                            var fieldSelectionInformation = record.data;

                            this.fieldConditionPanel.removeAll(); 
                            if(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel[fieldSelectionInformation.fieldType]) {

                                this.fieldCondition = new pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel[fieldSelectionInformation.fieldType](fieldSelectionInformation, data, this.classId);
  
                                this.fieldConditionPanel.add(this.fieldCondition.getConditionPanel());
                            } else {
                                console.log("ERROR - no implementation for field condition panel for " + fieldSelectionInformation.fieldType);
                            }

                            //after first change, reset data
                            data = {};

                            // fire event that this condition is loaded fully
                            panel.getPanel().fireEvent("condition:loaded");
                        }

                    }.bind(this)
                }
            }
        );

        var padding = (this.mainPanelLayout == 'hbox' ? "padding-left: 20px" : "");
        this.fieldConditionPanel = Ext.create('Ext.panel.Panel', {
            flex: 1,
            style: padding
        });

        var myId = Ext.id();

        return Ext.create('Ext.panel.Panel', {
            id: myId,
            bodyStyle: "padding: 15px 10px;",
            tbar: this.getTopBar(niceName, myId, panel),
            layout: this.mainPanelLayout,
            scrollable: true,
            border: 1,
            panelInstance: this,
            items: [
                this.fieldSelection, this.fieldConditionPanel
            ]
        });

    },

    getFilterValues: function() {
        if(this.fieldCondition) {
            return this.fieldCondition.getFilterValues();
        }
        return null;
    }

});
