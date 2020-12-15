<?php

namespace DistributionHubBundle\Model;

abstract class AbstractModel extends \Pimcore\Model\AbstractModel
{

    public $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public static function getById($id)
    {
        try {
            $model = new static();

            $model->getDao()->getById($id);

            return $model;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function save()
    {
        $this->getDao()->save();
    }
}
