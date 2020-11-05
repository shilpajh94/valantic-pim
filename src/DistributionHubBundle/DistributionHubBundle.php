<?php

namespace DistributionHubBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Model\User\Permission\Definition;
use DistributionHubBundle\Installer;

class DistributionHubBundle extends AbstractPimcoreBundle {

    /**
     * @return Installer
     */
    public function getInstaller()
    {
        return $this->container->get(Installer::class);
    }

    public function getJsPaths() {
        return [
            '/bundles/distributionhub/js/pimcore/startup.js',
            '/bundles/distributionhub/js/pimcore/toolbar.js',
            '/bundles/distributionhub/js/pimcore/mappingPanel.js',
            '/bundles/distributionhub/js/pimcore/mappingLeftPanel.js',
            '/bundles/distributionhub/js/pimcore/configItem.js',
            '/bundles/distributionhub/js/pimcore/globalConstants.js',
            '/bundles/distributionhub/js/pimcore/helpers/customPagingTreeStore.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/conditionPanelContainerBuilder.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/conditionPanel.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/resultAbstractPanel.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/resultExtension.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/conditionAbstractPanel.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/conditionEntryPanel.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/default.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/localizedfields.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/numeric.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/slider.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/manyToManyOne.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/manyToManyObjectRelation.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/manyToManyRelation.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/fieldcollections.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/objectbricks.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/advancedManyToManyObjectRelation.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/advancedManyToManyRelation.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/checkbox.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/booleanSelect.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/select.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/language.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/country.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/user.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/multiselect.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/countrymultiselect.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/languagemultiselect.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/datetime.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/date.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/time.js',
            '/bundles/distributionhub/js/pimcore/filtersConfig/fieldConditionPanel/quantityValue.js',
            '/bundles/distributionhub/js/pimcore/tabs/basicConfig.js',
            '/bundles/distributionhub/js/pimcore/tabs/filtersConfig.js',
            '/bundles/distributionhub/js/pimcore/tabs/preview.js',
            '/bundles/distributionhub/js/pimcore/helpers/customPagingTreeStore.js',
            '/bundles/distributionhub/js/pimcore/helpers/classAttributesStore.js',
            '/bundles/distributionhub/js/pimcore/tabs/scheduleConfig.js',
            '/bundles/distributionhub/js/pimcore/operator/MediaGetter.js',
            '/bundles/distributionhub/js/pimcore/tabs/columnConfiguration.js',
            '/bundles/distributionhub/js/pimcore/tabs/scheduleConfig.js',
            '/bundles/distributionhub/js/pimcore/helpers/classTree.js',
            '/bundles/distributionhub/js/pimcore/tabs/shareConfig.js',
            '/bundles/distributionhub/js/pimcore/operator/CollectionMediaGetter.js',
            '/bundles/distributionhub/js/pimcore/operator/ReverseManyToManyGetter.js',
            '/bundles/distributionhub/js/pimcore/operator/SelectTypeMasterGetter.js',

        ];
    }

    public function getCssPaths() {
        return [
            '/bundles/distributionhub/css/dHub.css'
        ];
    }

}
