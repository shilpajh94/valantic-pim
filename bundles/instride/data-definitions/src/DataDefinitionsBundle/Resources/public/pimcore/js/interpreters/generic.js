/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 instride AG (https://www.instride.ch)
 * @license
 * https://github.com/instride/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

pimcore.registerNS('pimcore.plugin.datadefinitions.interpreters.generic');

pimcore.plugin.datadefinitions.interpreters.generic = Class.create(pimcore.plugin.datadefinitions.interpreters.abstract, {

    getClassAttributes: function (className) {
        let listClassField = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/admin/data_definitions/import_definitions/listClassField',
                method: 'POST',
                extraParams: {
                    className: className,

                },
                reader: {
                    type: 'json',
                    rootProperty: 'data.'
                }
            },

            fields: ["name"],

            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });

        return listClassField.load();
    },

    getLayout: function (fromColumn, toColumn, record, config) {
        var classesStore = new Ext.data.JsonStore({
            autoDestroy: true,
            proxy: {
                type: 'ajax',
                url: '/admin/class/get-tree'
            },
            fields: ['text']
        });
        classesStore.load();

        var classesNameStore = new Ext.data.JsonStore({
            autoDestroy: true,
            proxy: {
                type: 'ajax',
                url: '/admin/data_definitions/import_definitions/listClassInterpreter',

                reader: {
                    type: 'json',
                    rootProperty: 'data',
                }
            },
            fields: ['name'],

            sorters: [{
                property: 'name',
                direction: 'ASC'
            }]
        });
        classesNameStore.load();

        return [
            {
                xtype: 'textfield',
                fieldLabel: t('data_definitions_interpreter_generic_separator'),
                name: 'separator',
                width: 500,
                maxLength: 1,
                value: config.separator ? config.separator : '|',
            },
            {
                xtype: 'combo',
                fieldLabel: t('class'),
                name: 'class',
                store: classesNameStore,
                queryMode: 'local',
                editable: true,
                // allowBlank: false,
                // blankText: 'Field is required',
                forceSelection: true,
                // msgTarget: 'under',
                displayField: 'name',
                valueField: 'name',
                width: 500,
                labelWidth: 200,
                value: config.class,
                listeners: {
                    change: function (data) {
                        Ext.getCmp('fieldName').setStore(this.getClassAttributes(data.value));
                        Ext.getCmp('fieldName').clearValue();
                    }.bind(this)
                },
            },
            {
                xtype: 'combo',
                fieldLabel: t('data_definitions_interpreter_generic_field'),
                name: 'field',
                id: 'fieldName',
                store: this.getClassAttributes(config.class),
                width: 500,
                displayField: 'name',
                valueField: 'name',
                value: config.field ? config.field : null,
            },
            {
                xtype: 'checkbox',
                fieldLabel: t('data_definitions_interpreter_generic_match_unpublished'),
                name: 'match_unpublished',
                value: Ext.isDefined(config.match_unpublished) ? config.match_unpublished : true,
                listeners: {
                    change: function (el, enabled) {
                        var matchUnpublishedDisabled = (enabled === false);
                        if (matchUnpublishedDisabled) {
                            createPublishedCheckbox.setValue(true);
                        }
                        createPublishedCheckbox.setDisabled(matchUnpublishedDisabled);
                    }
                }
            }
        ];
    }
});
