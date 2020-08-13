<?php

namespace DistributionHubBundle\Model;


class Schedule extends AbstractModel
{
    public $time;

    public $name;

    public $downloadFileName;

    public $exportFormat;

    public $exportLocation;

    public $expiryTime;

    public $exportResource;

    public $exportImageCols;

    public $status;

    public $exportFilePimcoreAssetId;

    public $exportAssetFilePimcoreAssetId;

    public $userOwner;

    public $exportProcessStartTime;

    public $exportProcessEndTime;

    public $creationDate;

    public $ftpDetailId;

    public $channelId;

    /**
     * @param FTPDetail $ftpDetail
     */
    public function setFTPDetail(FTPDetail $ftpDetail)
    {
        if($ftpDetail->getId()){
            $this->ftpDetailId = $ftpDetail->getId();
        }

    }

    /**
     * @return FTPDetail|null
     */
    public function getFTPDetail(): ?FTPDetail
    {
        $ftp = null;
        if($this->ftpDetailId){
            $ftp = FTPDetail::getById($this->ftpDetailId);
        }
        return $ftp;
    }

    /**
     * @param Channel $channel
     */
    public function setChannel(Channel $channel)
    {
        if($channel->getId()){
            $this->channelId = $channel->getId();
        }
    }

    /**
     * @return Channel|null
     */
    public function getChannel(): ?Channel
    {
        $channel = null;
        if($this->channelId){
            $channel = Channel::getById($this->channelId);
        }
        return $channel;
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
    public function getTime()
    {
        if($this->time){
            return $this->getDateFromTimestamp($this->time);
        }
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        if($time instanceof \DateTime){
            $time = $time->getTimestamp();
        }
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getExportFormat()
    {
        return $this->exportFormat;
    }

    /**
     * @param mixed $exportFormat
     */
    public function setExportFormat(?string $exportFormat): void
    {
        $this->exportFormat = $exportFormat;
    }

    /**
     * @return mixed
     */
    public function getExportLocation()
    {
        return $this->exportLocation;
    }

    /**
     * @param mixed $exportLocation
     */
    public function setExportLocation(?string $exportLocation): void
    {
        $this->exportLocation = $exportLocation;
    }

    /**
     * @return mixed
     */
    public function getExpiryTime()
    {
        if($this->expiryTime){
            return $this->getDateFromTimestamp($this->expiryTime);
        }
        return $this->expiryTime;
    }

    /**
     * @param mixed $expiryTime
     */
    public function setExpiryTime($expiryTime): void
    {
        if($expiryTime instanceof \DateTime){
            $expiryTime = $expiryTime->getTimestamp();
        }
        $this->expiryTime = $expiryTime;
    }

    /**
     * @return mixed
     */
    public function getExportResource()
    {
        return $this->exportResource;
    }

    /**
     * @param mixed $exportResource
     */
    public function setExportResource(?string $exportResource): void
    {
        $this->exportResource = $exportResource;
    }

    /**
     * @return mixed
     */
    public function getExportImageCols()
    {
        return $this->exportImageCols;
    }

    /**
     * @param mixed $exportImageCols
     */
    public function setExportImageCols(?string $exportImageCols): void
    {
        $this->exportImageCols = $exportImageCols;
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

    public function getExportFilePimcoreAssetId()
    {
        return $this->exportFilePimcoreAssetId;
    }

    public function setExportFilePimcoreAssetId(?int $exportFilePimcoreAssetId): void
    {
        $this->exportFilePimcoreAssetId = $exportFilePimcoreAssetId;
    }


    /**
     * @return mixed
     */
    public function getExportAssetFilePimcoreAssetId()
    {
        return $this->exportAssetFilePimcoreAssetId;
    }

    /**
     * @param mixed $exportAssetFilePimcoreAssetId
     */
    public function setExportAssetFilePimcoreAssetId(?string $exportAssetFilePimcoreAssetId): void
    {
        $this->exportAssetFilePimcoreAssetId = $exportAssetFilePimcoreAssetId;
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
    public function getExportProcessStartTime()
    {
        if($this->exportProcessStartTime){
            return $this->getDateFromTimestamp($this->exportProcessStartTime);
        }
        return $this->exportProcessStartTime;
    }

    /**
     * @param mixed $exportProcessStartTime
     */
    public function setExportProcessStartTime($exportProcessStartTime): void
    {
        if($exportProcessStartTime instanceof \DateTime){
            $exportProcessStartTime = $exportProcessStartTime->getTimestamp();
        }
        $this->exportProcessStartTime = $exportProcessStartTime;
    }

    /**
     * @return mixed
     */
    public function getExportProcessEndTime()
    {
        if($this->exportProcessEndTime){
            return $this->getDateFromTimestamp($this->exportProcessEndTime);
        }
        return $this->exportProcessEndTime;
    }

    /**
     * @param mixed $exportProcessEndTime
     */
    public function setExportProcessEndTime($exportProcessEndTime): void
    {
        if($exportProcessEndTime instanceof \DateTime){
            $exportProcessEndTime = $exportProcessEndTime->getTimestamp();
        }
        $this->exportProcessEndTime = $exportProcessEndTime;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        if($this->creationDate){
            return $this->getDateFromTimestamp($this->creationDate);
        }
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        if($creationDate instanceof \DateTime){
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
