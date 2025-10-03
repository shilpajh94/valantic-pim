document.addEventListener(pimcore.events.postOpenObject, (e) => {
    const object = e.detail.object;

    if (object.data.general.className !== 'UniProductDataOutputConfiguration') return;

    enhanceEditBarWithConfigurator(object);
    setupConditionalFields(object);
    pimcore.layout.refresh();
});

function enhanceEditBarWithConfigurator(object) {
    const exportTypeField = findFormField(object.edit, 'exportType');
    if (!exportTypeField) return;

    const buttonId = 'exportDataConfiguratorButton';

    const addButton = () => {
        const existingButton = object.toolbar.items.findBy((item) => item.itemId === buttonId);
        if (existingButton) return;

        object.toolbar.add(new Ext.Button({
            itemId: buttonId,
            text: t('Export Data Output Configurator'),
            iconCls: 'pimcore_icon_download',
            cls: 'pimcore_button_hilight',
            tooltip: t('Click to export the configured data'),
            handler: function () {
                const objectId = object.data.general.id;
                const exportUrl = Routing.generate('admin_output_configurator_export', {
                    id: objectId,
                    format: 'xlsx',
                });
                window.open(exportUrl, '_blank');
            },
        }));
    };

    addButton();
}

function setupConditionalFields(object) {
    const maxAttempts = 10;
    let attempts = 0;

    function trySetupFields() {
        attempts++;
        const editPanel = object.edit;

        if (!editPanel || !editPanel.dataFields) {
            if (attempts < maxAttempts) {
                setTimeout(trySetupFields, 500 * attempts);
            }
            return;
        }

        const { exportType, frequency, weekday, dayOfMonth } = editPanel.dataFields;
        const timeOfDayField = resolveDynamicFieldByName(object, 'timefield');
        const lastRunField = resolveFieldByName(object, 'datefield');
        const exportDirectoryField = resolveFieldByName(object, ['exportDirectory', 'scheduled_export_directory']);

        if (exportType && frequency) {
            const currentExportType = exportType.data;

            toggleFrequencyField(currentExportType, frequency);
            toggleWeekdayField(currentExportType, weekday, object, frequency.data);
            toggleDayOfMonthField(currentExportType, dayOfMonth, object, frequency.data);
            toggleTimeOfDayField(currentExportType, timeOfDayField, object);
            toggleScheduledExportDirectoryField(currentExportType, exportDirectoryField, object);
            toggleLastRunField(currentExportType, lastRunField, object);

            setupFieldListeners(
                object,
                exportType,
                frequency,
                lastRunField,
                weekday,
                dayOfMonth,
                timeOfDayField,
                exportDirectoryField
            );


            setupSaveValidation(object, exportType, frequency);
        } else if (attempts < maxAttempts) {
            setTimeout(trySetupFields, 500 * attempts);
        }
    }

    setTimeout(trySetupFields, 500);
}

function toggleFrequencyField(exportTypeValue, frequencyField) {
    const isScheduled = exportTypeValue === 'scheduled';
    const field = findFormField(frequencyField?.object?.edit, 'frequency');
    if (!field) {
        return;
    }

    field.setVisible(isScheduled);
    field.setDisabled(!isScheduled);
    field.allowBlank = !isScheduled;
    field.setFieldLabel(
        isScheduled
            ? `${field.fieldLabel.replace(/\s*<span.*<\/span>$/, '')} <span style="color: red;">*</span>`
            : field.fieldLabel.replace(/ <span.*<\/span>$/, '')
    );
    if (!isScheduled) field.setValue('');
}

function toggleWeekdayField(exportTypeValue, weekdayField, object, frequencyValue) {
    const isScheduled = exportTypeValue === 'scheduled';
    const isDaily = frequencyValue === 'daily';
    const isMonthly = frequencyValue === 'monthly';
    const field = resolveFieldByName(object, ['weekday', 'week_day', 'dayOfWeek', 'weekDay']);
    if (!field) return;

    field.setVisible(isScheduled && !isDaily && !isMonthly);
    field.setDisabled(!isScheduled || isDaily || isMonthly);
    if (!isScheduled || isDaily) field.setValue('');
}

function toggleDayOfMonthField(exportTypeValue, dayOfMonthField, object, frequencyValue) {
    const isScheduled = exportTypeValue === 'scheduled';
    const isDailyOrWeekly = frequencyValue === 'daily' || frequencyValue === 'weekly';
    const field = resolveFieldByName(object, ['dayOfMonth', 'day_of_month']);
    if (!field) return;

    field.setVisible(isScheduled && !isDailyOrWeekly);
    field.setDisabled(!isScheduled || isDailyOrWeekly);
    if (!isScheduled || isDailyOrWeekly) field.setValue('');
}

function toggleTimeOfDayField(exportTypeValue, timeOfDayField, object) {
    const isScheduled = exportTypeValue === 'scheduled';
    if (!timeOfDayField) {
        return;
    }

    timeOfDayField.setVisible(isScheduled);
    timeOfDayField.setDisabled(!isScheduled);
    if (!isScheduled) timeOfDayField.setValue('');
}

function toggleScheduledExportDirectoryField(exportTypeValue, exportDirectoryField, object) {
    const isScheduled = exportTypeValue === 'scheduled';
    if (!exportDirectoryField) {
        return;
    }

    exportDirectoryField.setVisible(isScheduled);
    exportDirectoryField.setDisabled(!isScheduled);

    exportDirectoryField.allowBlank = !isScheduled;

    exportDirectoryField.setFieldLabel(
        isScheduled
            ? `${exportDirectoryField.fieldLabel.replace(/\s*<span.*<\/span>?$/, '')} <span style="color: red;">*</span>`
            : exportDirectoryField.fieldLabel.replace(/ <span.*<\/span>/, '')
    );

    pimcore.layout.refresh();

    if (!isScheduled) {
        exportDirectoryField.setValue('');
    }
}

function toggleLastRunField(exportTypeValue, lastRunField, object) {
    const isScheduled = exportTypeValue === 'scheduled';
    if (!lastRunField) {
        return;
    }

    lastRunField.setVisible(isScheduled);
    lastRunField.setDisabled(!isScheduled);
    lastRunField.setReadOnly(isScheduled);
    lastRunField.allowBlank = true;

    if (!isScheduled) {
        lastRunField.setValue('');
    }

    if (isScheduled && lastRunField.fieldLabel && !lastRunField.fieldLabel.includes('(Auto)')) {
        lastRunField.setFieldLabel(`${lastRunField.fieldLabel} (Auto)`);
    } else if (!isScheduled && lastRunField.fieldLabel) {
        lastRunField.setFieldLabel(lastRunField.fieldLabel.replace(' (Auto)', ''));
    }
}

function setupFieldListeners(
    object,
    exportTypeField,
    frequencyField,
    lastRunField,
    weekdayField,
    dayOfMonthField,
    timeOfDayField,
    exportDirectoryField
) {
    const editPanel = object.edit;
    const exportTypeFormField = findFormField(editPanel, 'exportType');
    const frequencyFormField = findFormField(editPanel, 'frequency');

    if (!exportTypeFormField || !frequencyFormField) return;

    const onExportTypeChange = (newValue) => {
        exportTypeField.data = newValue;
        toggleFrequencyField(newValue, frequencyField);
        toggleWeekdayField(newValue, weekdayField, object, frequencyField.data);
        toggleDayOfMonthField(newValue, dayOfMonthField, object, frequencyField.data);
        toggleTimeOfDayField(newValue, timeOfDayField, object);
        toggleScheduledExportDirectoryField(newValue, exportDirectoryField, object);
        toggleLastRunField(newValue, lastRunField, object);
    };

    const onFrequencyChange = (newValue) => {
        toggleWeekdayField(exportTypeField.data, weekdayField, object, newValue);
        toggleDayOfMonthField(exportTypeField.data, dayOfMonthField, object, newValue);
    };

    exportTypeFormField.on('change', (_, val) => onExportTypeChange(val));
    exportTypeFormField.on('select', (_, record) =>
        onExportTypeChange(record?.get('value') || exportTypeFormField.getValue())
    );

    frequencyFormField.on('change', (_, val) => onFrequencyChange(val));
    frequencyFormField.on('select', (_, record) =>
        onFrequencyChange(record?.get('value') || frequencyFormField.getValue())
    );
}

function setupSaveValidation(object, exportTypeField, frequencyField) {
    const originalSave = object.save;

    object.save = function (...args) {
        const exportTypeValue = exportTypeField.getValue ? exportTypeField.getValue() : exportTypeField.data;
        const frequencyValue = frequencyField.getValue ? frequencyField.getValue() : frequencyField.data;
        const exportDirectoryField = findFormField(object.edit, 'exportDirectory');
        const exportDirectoryValue = exportDirectoryField ? exportDirectoryField.getValue() : null;

        if (exportTypeValue === 'scheduled') {
            if (!frequencyValue || frequencyValue.trim() === '') {
                Ext.Msg.alert(
                    t('Validation Error'),
                    t('Frequency is required when Export Type is set to Scheduled.'),
                    () => {
                        const freqField = findFormField(object.edit, 'frequency');
                        if (freqField) freqField.focus();
                    }
                );
                return false;
            }
        }

        return originalSave.apply(this, args);
    };
}

function resolveDynamicFieldByName(object, fieldPrefix) {
    const layoutQuery = object?.edit?.layout?.query;
    if (!layoutQuery) return null;
    const matches = layoutQuery.call(object.edit.layout, `[name^=${fieldPrefix}]`);
    return matches.length ? matches[0] : null;
}

function resolveFieldByName(object, names = []) {
    const layoutQuery = object?.edit?.layout?.query;
    if (!layoutQuery) return null;

    for (const name of names) {
        const matches = layoutQuery.call(object.edit.layout, `[name=${name}]`);
        if (matches.length > 0) return matches[0];
    }
    return null;
}

function findFormField(editPanel, fieldName) {
    const layoutQuery = editPanel?.layout?.query;
    if (!layoutQuery) return null;

    const matches = layoutQuery.call(editPanel.layout, `[name=${fieldName}]`);
    return matches.length ? matches[0] : null;
}