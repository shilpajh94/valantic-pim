pimcore.registerNS("pimcore.bundle.customreports.custom.definition.contextAwareSql");

/**
 * Context-aware SQL definition that extends the base SQL class
 * @private
 */
pimcore.bundle.customreports.custom.definition.contextAwareSql = Class.create(
    pimcore.bundle.customreports.custom.definition.sql,
    {
        getValues: function () {
            var values = this.element.getForm().getFieldValues();

            values.type = "contextAwareSql";
            delete values["sqlText"];

            return values;
        }
    }
);