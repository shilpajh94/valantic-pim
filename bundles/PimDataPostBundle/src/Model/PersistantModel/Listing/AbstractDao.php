<?php

namespace PimDataPostBundle\Model\PersistantModel\Listing;

abstract class AbstractDao extends \Pimcore\Model\Listing\Dao\AbstractDao
{
    public function load()
    {
//        $searchIds = $this->db->fetchFirstColumn("SELECT id FROM " . $this->db->quoteIdentifier(Channel\Dao::TABLE_NAME) . " " . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        $searchIds = $this->loadIdList();
        $searches = array();
        foreach ($searchIds as $id) {
            $className = static::CLASS_NAME;
            if ($savedSearch = $className::getById($id)) {
                $searches[] = $savedSearch;
            }
        }

        $this->model->setData($searches);
        return $searches;
    }


    public function loadIdList()
    {
        $searchIds = $this->db->fetchFirstColumn("SELECT id FROM " . $this->db->quoteIdentifier(static::TABLE_NAME) . " " . $this->getCondition() . $this->getGroupBy() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());
        return $searchIds;
    }

    public function getTotalCount()
    {
        try {
            $amount = (int) $this->db->fetchOne("SELECT COUNT(*) as amount FROM " . $this->db->quoteIdentifier(static::TABLE_NAME) . " " . $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
        }

        return $amount;
    }
}