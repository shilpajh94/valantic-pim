<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Model;

class DataDefinitionImport extends AbstractModel
{
    public $name;

    public $logFileName;

    public $importFileName;

    public $status;

    public $importFilePimcoreAssetId;

    public $logFilePimcoreAssetId;

    public $userOwner;

    public $exportProcessStartTime;

    public $exportProcessEndTime;

    public $creationDate;

    public $importDefinitionId;

    public $totalReocrds;

    public $processedRecords;

     /**
     * @return mixed
     */
    public function setImportDefinitionId(?int $importDefinitionId): void
    {
        $this->importDefinitionId = $importDefinitionId;
    }

    /**
     * @return mixed
     */
    public function getImportDefinitionId()
    {
        return $this->importDefinitionId;
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
    public function getImportFileName()
    {
        return $this->importFileName;
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
    public function getLogFileName()
    {
        return $this->logFileName;
    }

    /**
     * @param mixed $logFileName
     */
    public function setLogFileName(?string $logFileName): void
    {
        $this->logFileName = $logFileName;
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

    /**
     * @return mixed
     */
    public function getImportFilePimcoreAssetId()
    {
        return $this->importFilePimcoreAssetId;
    }

    /**
     * @param mixed $importFilePimcoreAssetId
     */
    public function setImportFilePimcoreAssetId(?int $importFilePimcoreAssetId): void
    {
        $this->importFilePimcoreAssetId = $importFilePimcoreAssetId;
    }

    /**
     * @return mixed
     */
    public function getLogFilePimcoreAssetId()
    {
        return $this->logFilePimcoreAssetId;
    }

    /**
     * @param mixed $logFilePimcoreAssetId
     */
    public function setLogFilePimcoreAssetId(?int $logFilePimcoreAssetId): void
    {
        $this->logFilePimcoreAssetId = $logFilePimcoreAssetId;
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

    /**
     * @return mixed
     */
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    /**
     * @param mixed $totalRecords
     */
    public function setTotalRecords(?int $totalRecords): void
    {
        $this->totalRecords = $totalRecords;
    }

    /**
     * @return mixed
     */
    public function getProcessedRecords()
    {
        return $this->processedRecords;
    }

    /**
     * @param mixed $processedRecords
     */
    public function setProcessedRecords(?int $processedRecords): void
    {
        $this->processedRecords = $processedRecords;
    }
}
