document.addEventListener(pimcore.events.postOpenObject, (e) => {
    //print out the parameters of the event
    console.log('pimcore.plugin.IFSEUProductBundle postOpenObject')

    // e.detail.object.data.layout.childs[0].childs // all tab panel name
    //e.detail.object.edit.dataFields // showing rendred edit fields of current tab
    // e.detail.object.data.data // showing  all editable fields
    //e.detail.object.general.o_parentId // parend id
    // e.detail.object.edit.layout.query('[name=Fert]') //get tab by name
    //e.detail.object ,e.detail.object.data.childdata.data.general.o_key //tab name
    // e.detail.object.dependencies.element.data //all field
    //Ext.getCmp('productBrandName');//Ext.select('.highcharts-container');

    addMaskForClasses = ['.objectlayout_element_hoseBaseData', '.objectlayout_element_Temperatures'];
    var tabPanell = e.detail.object.edit.layout.items.items[0];
    if (e.detail.object.data.general.o_className == "IFSEUProduct") {
        productLevel = this.productAjax('/IFSEU/product/get/level/info', 'POST', { idPath: e.detail.object.data.idPath });
        if (productLevel.level == 'skeleton') {
            parms = { levelName: 'base' };
            baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes', 'POST', parms);
            this.disableAttributes(e, baseAttributes, addMaskForClasses);
        }
        if (productLevel.level == 'fert') {
            baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes', 'POST', { levelName: 'base' })
            skeletonAttributes = this.productAjax('/IFSEU/product/get/level/attributes', 'POST', { levelName: 'base' })
            baseAttributes.attributes.push('Skeleton');
            this.disableAttributes(e, baseAttributes, addMaskForClasses);
            this.disableAttributes(e, skeletonAttributes, addMaskForClasses);
        }
        tabPanell.on("tabchange", function (tabObject) {
            productLevel = this.productAjax('/IFSEU/product/get/level/info', 'POST', { idPath: e.detail.object.data.idPath });
            let tabName = tabObject.activeTab.config.name.toLowerCase();
            if (productLevel.level == 'fert') {
                baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes', 'POST', { levelName: 'base' })
                baseAttributes.attributes.push('Skeleton');
                this.disableAttributes(e, baseAttributes, addMaskForClasses);

            }
            if (productLevel.level == 'skeleton') {
                baseAttributes = this.productAjax('/IFSEU/product/get/level/attributes', 'POST', { levelName: 'base' })
                this.disableAttributes(e, baseAttributes, addMaskForClasses);
            }

        }.bind(this));
        setTimeout(function () {
            if (productLevel.level == 'skeleton') {
                tabPanell.setActiveTab(1);
            }
            if (productLevel.level == 'fert') {
                tabPanell.setActiveTab(2);
            }
        }, 1000);
    }

    e.preventDefault();
    e.stopPropagation();
});

document.addEventListener(pimcore.events.postSaveObject, (e) => {
    console.log('pimcore.plugin.IFSEUProductBundle postSaveObject')

    if (e.detail.object.data.general.o_className == "IFSEUProduct") {
        setTimeout(function () {
            e.detail.object.reload();
        }, 100);
    }

    e.preventDefault();
    e.stopPropagation();
});

function productAjax(url, method, parms) {
    var resp = '';
    Ext.Ajax.request({
        url: url,
        method: method,
        timeout: 60000,
        dataType: "json",
        async: false,
        params: parms,
        success: function (response) {
            var data = Ext.decode(response.responseText);
            if (data.success) {
                resp = data;
            } else {
                pimcore.helpers.showNotification(
                    "Error Occured !!",
                    data.msg,
                    "Error"
                );
            }
        }.bind(this),
    });
    return resp;
}
function disableAttributes(e, attributes, hideTabClassNames = null) {
    // class attributes take some time  to load so we use timeout function
    setTimeout(function () {
        for (attribute of attributes.attributes) {
            e.detail.object.edit.dataFields[attribute].component.setDisabled(true);
            if (attribute == 'localizedfields') {
                let panelId = e.detail.object.edit.dataFields[attribute].tabPanel.body.component.id;
                let PanelBodyId = panelId + '-body';
                Ext.get(PanelBodyId).setStyle('pointer-events', 'none');
                e.detail.object.edit.dataFields[attribute].component.setDisabled(false);
            }
            if (attribute == 'Base') {
                let panelBaseId = e.detail.object.edit.dataFields[attribute].component.id;
                Ext.get(panelBaseId).setStyle('pointer-events', 'none');
                e.detail.object.edit.dataFields[attribute].component.setDisabled(false);
            }
            if (attribute == 'Skeleton') {
                let panelBaseId = e.detail.object.edit.dataFields[attribute].component.id;
                Ext.get(panelBaseId).setStyle('pointer-events', 'none');
                e.detail.object.edit.dataFields[attribute].component.setDisabled(false);
            }
        }
    }, 200);
}