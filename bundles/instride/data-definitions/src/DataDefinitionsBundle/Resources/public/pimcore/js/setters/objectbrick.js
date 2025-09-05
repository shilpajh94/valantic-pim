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

pimcore.registerNS('pimcore.plugin.datadefinitions.setters.objectbrick');

pimcore.plugin.datadefinitions.setters.objectbrick = Class.create(pimcore.plugin.datadefinitions.setters.abstract, {
    getLayout: function (fromColumn, toColumn, record, config, definitionConfig) {
        this.toColumn = toColumn;

        // var possibleFields = [];
        var fieldClass = toColumn.data.config.class;
        var brcikName = '';
        Ext.Object.each(definitionConfig.bricks, function (key, value) {
            if (value.indexOf(fieldClass) >= 0) {
                // possibleFields.push(key);
                brcikName = key;
            }
        });

        this.fieldCombo = Ext.create({
            xtype: 'textfield',
            fieldLabel: t('field'),
            name: 'brickField',
            id: 'brickName',
            value: config.brickField ? config.brickField : null,
            // store: possibleFields,
            triggerAction: 'all',
            typeAhead: false,
            editable: false,
            forceSelection: true,
            queryMode: 'local',
            allowBlank: false,
            blankText: 'Field is required',
            msgTarget: 'under',
            readOnly: true
        });
        var name = Ext.getCmp('brickName').setValue(brcikName);
        
        return [this.fieldCombo];
    },

    getSetterData: function () {
        return {
            'class': this.toColumn.data.config.class,
            'brickField': this.fieldCombo.getValue()
        };
    }
});
