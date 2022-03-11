<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Model;

class DataDefinitionImport extends AbstractModel
{
    public $name;

    public $downloadFileName;

    public $importFileName;

    public $status;

    public $importFilePimcoreAssetId;

    public $userOwner;

    public $exportProcessStartTime;

    public $exportProcessEndTime;

    public $creationDate;

    public $importDefinitionId;

     /**
     * @param ImportDefinition $importDefinition
     */
    public function setImportDefinition(ImportDefinition $importDefinition)
    {
        if ($importDefinition->getId()) {
            $this->importDefinitionId = $importDefinition->getId();
        }
    }

    /**
     * @return ImportDefinition|null
     */
    public function getImportDefinition(): ? ImportDefinition
    {
        $importDefinition = null;
        if ($this->importDefinitionId) {
            $importDefinition = ImportDefinition::getById($this->importDefinitionId);
        }
        return $importDefinition;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImportedFileName()
    {
        return $this->importedFileName;
    }

    /**
     * @param mixed $importFileName
     */
    public function setImportFileName(?string $importFileName): void
    {
        $this->importFileName = $importFileName;
    }

    /**
     * @return mixed
     */
    public function getDownloadFileName()
    {
        return $this->downloadFileName;
    }

    /**
     * @param mixed $downloadFileName
     */
    public function setDownloadFileName(?string $downloadFileName): void
    {
        $this->downloadFileName = $downloadFileName;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getImportFilePimcoreAssetId()
    {
        return $this->importFilePimcoreAssetId;
    }

    public function setImportFilePimcoreAssetId(?int $importFilePimcoreAssetId): void
    {
        $this->importFilePimcoreAssetId = $importFilePimcoreAssetId;
    }

    /**
     * @return mixed
     */
    public function getUserOwner()
    {
        return $this->userOwner;
    }

    /**
     * @param mixed $userOwner
     */
    public function setUserOwner(?int $userOwner): void
    {
        $this->userOwner = $userOwner;
    }    

    /**
     * @return mixed
     */
    public function getImportProcessStartTime()
    {
        if ($this->importProcessStartTime) {
            return $this->getDateFromTimestamp($this->importProcessStartTime);
        }
        return $this->importProcessStartTime;
    }

    /**
     * @param mixed $importProcessStartTime
     */
    public function setImportProcessStartTime($importProcessStartTime): void
    {
        if ($importProcessStartTime instanceof \DateTime) {
            $importProcessStartTime = $importProcessStartTime->getTimestamp();
        }
        $this->importProcessStartTime = $importProcessStartTime;
    }

    /**
     * @return mixed
     */
    public function getImportProcessEndTime()
    {
        if ($this->importProcessEndTime) {
            return $this->getDateFromTimestamp($this->importProcessEndTime);
        }
        return $this->importProcessEndTime;
    }

    /**
     * @param mixed $importProcessEndTime
     */
    public function setImportProcessEndTime($importProcessEndTime): void
    {
        if ($importProcessEndTime instanceof \DateTime) {
            $importProcessEndTime = $importProcessEndTime->getTimestamp();
        }
        $this->importProcessEndTime = $importProcessEndTime;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        if ($this->creationDate) {
            return $this->getDateFromTimestamp($this->creationDate);
        }
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        if ($creationDate instanceof \DateTime) {
            $creationDate = $creationDate->getTimestamp();
        }
        $this->creationDate = $creationDate;
    }


    protected function getDateFromTimestamp($timestamp)
    {
        $date = new \Carbon\Carbon();
        $date->setTimestamp($timestamp);

        return $date;
    }
}
