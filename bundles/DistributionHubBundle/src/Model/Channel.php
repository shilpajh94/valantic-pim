<?php

namespace DistributionHubBundle\Model;

class Channel extends AbstractModel
{

    public $name;

    public $pimcoreClassId;

    public $headerMappingFileAssetId;

    public $headerMappingFileType;

    public $sheetNumberInMappingFile;

    public $headerRowNumberInMappingFile;

    public $mappingFileCSVDelimiter;

    public $exportFileCSVDelimiter;

    public $exportFilePath;

    public $columnAttributeMapping;

    public $language;

    public $userOwner;

    public $shareGlobally;

    public $description;

    public $creationDate;

    public $modificationDate;

    public $filterId;

    public $ftpDetailIds = [];

    public $showInGridMapping;

    public $expiryDate;


    public function save()
    {
        parent::save();
    }

    public static function getByName(string $name)
    {
        try {
            $tag = new self();
            $tag->getDao()->getByName($name);

            return $tag;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function setFTPDetails(array $ftpDetails)
    {
        foreach ($ftpDetails as $ftp) {
            if (($ftp instanceof FTPDetail) && ( $ftp->getId() ) && ( !in_array($ftp->getId(), $this->ftpDetailIds) )) {
                $this->ftpDetailIds[] = $ftp->getId();
            }
        }
    }

    public function getFTPDetails()
    {
        return $this->getDao()->getFTPDetails();
    }

    public function getFilter(): ?Filter
    {
        $filter = null;
        if ($this->filterId) {
            $filter = Filter::getById($this->filterId);
        }
        return $filter;
    }

    public function setFilter(Filter $filter)
    {
        if ($filter->getId()) {
            $this->filterId = $filter->getId();
        }
    }

    /**
     * @return mixed
     */
    public function getShowInGridMapping()
    {
        return $this->showInGridMapping;
    }

    /**
     * @param mixed $showInGridMapping
     */
    public function setShowInGridMapping(?string $showInGridMapping): void
    {
        $this->showInGridMapping = $showInGridMapping;
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
    public function getPimcoreClassId()
    {
        return $this->pimcoreClassId;
    }

    /**
     * @param mixed $pimcoreClassId
     */
    public function setPimcoreClassId(?string $pimcoreClassId): void
    {
        $this->pimcoreClassId = $pimcoreClassId;
    }


    /**
     * @return mixed
     */
    public function getHeaderMappingFileAssetId()
    {
        return $this->headerMappingFileAssetId;
    }

    /**
     * @param mixed $headerMappingFileAssetId
     */
    public function setHeaderMappingFileAssetId(?int $headerMappingFileAssetId): void
    {
        $this->headerMappingFileAssetId = $headerMappingFileAssetId;
    }

    /**
     * @return mixed
     */
    public function getHeaderMappingFileType()
    {
        return $this->headerMappingFileType;
    }

    /**
     * @param mixed $headerMappingFileType
     */
    public function setHeaderMappingFileType(?string $headerMappingFileType): void
    {
        $this->headerMappingFileType = $headerMappingFileType;
    }

    /**
     * @return mixed
     */
    public function getSheetNumberInMappingFile()
    {
        return $this->sheetNumberInMappingFile;
    }

    /**
     * @param mixed $sheetNumberInMappingFile
     */
    public function setSheetNumberInMappingFile(?int $sheetNumberInMappingFile): void
    {
        $this->sheetNumberInMappingFile = $sheetNumberInMappingFile;
    }

    /**
     * @return mixed
     */
    public function getHeaderRowNumberInMappingFile()
    {
        return (int)$this->headerRowNumberInMappingFile;
    }

    /**
     * @param mixed $headerRowNumberInMappingFile
     */
    public function setHeaderRowNumberInMappingFile(?int $headerRowNumberInMappingFile): void
    {
        $this->headerRowNumberInMappingFile = $headerRowNumberInMappingFile;
    }

    /**
     * @return mixed
     */
    public function getMappingFileCSVDelimiter()
    {
        return $this->mappingFileCSVDelimiter;
    }

    /**
     * @param mixed $mappingFileCSVDelimiter
     */
    public function setMappingFileCSVDelimiter(?string $mappingFileCSVDelimiter): void
    {
        $this->mappingFileCSVDelimiter = $mappingFileCSVDelimiter;
    }

    public function getExportFileCSVDelimiter()
    {
        return $this->exportFileCSVDelimiter;
    }

    public function setExportFileCSVDelimiter(?string $exportFileCSVDelimiter): void
    {
        $this->exportFileCSVDelimiter = $exportFileCSVDelimiter;
    }

    /**
     * @return mixed
     */
    public function getExportFilePath()
    {
        return $this->exportFilePath;
    }

    /**
     * @param mixed $exportFilePath
     */
    public function setExportFilePath(?string $exportFilePath): void
    {
        $this->exportFilePath = $exportFilePath;
    }

    /**
     * @return mixed
     */
    public function getColumnAttributeMapping()
    {
        return $this->columnAttributeMapping;
    }

    /**
     * @param mixed $columnAttributeMapping
     */
    public function setColumnAttributeMapping(?string $columnAttributeMapping): void
    {
        $this->columnAttributeMapping = $columnAttributeMapping;
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
    public function getShareGlobally()
    {
        return $this->shareGlobally;
    }

    /**
     * @param mixed $shareGlobally
     */
    public function setShareGlobally(?bool $shareGlobally): void
    {
        $this->shareGlobally = $shareGlobally;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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

    /**
     * @return mixed
     */
    public function getModificationDate()
    {
        if ($this->modificationDate) {
            return $this->getDateFromTimestamp($this->modificationDate);
        }
        return $this->modificationDate;
    }

    /**
     * @param mixed $modificationDate
     */
    public function setModificationDate($modificationDate): void
    {
        if ($modificationDate instanceof \DateTime) {
            $modificationDate = $modificationDate->getTimestamp();
        }
        $this->modificationDate = $modificationDate;
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
    public function getExpiryDate()
    {
        if ($this->expiryDate) {
            return $this->getDateFromTimestamp($this->expiryDate);
        }
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate): void
    {
        if ($expiryDate instanceof \DateTime) {
            $expiryDate = $expiryDate->getTimestamp();
        }
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }
}
