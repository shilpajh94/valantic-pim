<?php

namespace DistributionHubBundle\Model;

class Statistics extends AbstractModel
{
    public $scheduleOwnerUserId;

    public $exportTime;

    public $exportFormat;

    public $exportStatus;

    public $exportLocation;

    /**
     * @return mixed
     */
    public function getScheduleOwnerUserId()
    {
        return $this->scheduleOwnerUserId;
    }

    /**
     * @param mixed $scheduleOwnerUserId
     */
    public function setScheduleOwnerUserId(?int $scheduleOwnerUserId): void
    {
        $this->scheduleOwnerUserId = $scheduleOwnerUserId;
    }

    /**
     * @return mixed
     */
    public function getExportTime()
    {
        if ($this->exportTime) {
            return $this->getDateFromTimestamp($this->exportTime);
        }
        return $this->exportTime;
    }

    /**
     * @param mixed $exportTime
     */
    public function setExportTime($exportTime): void
    {
        if ($exportTime instanceof \DateTime) {
            $exportTime = $exportTime->getTimestamp();
        }
        $this->exportTime = $exportTime;
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
    public function getExportStatus()
    {
        return $this->exportStatus;
    }

    /**
     * @param mixed $exportStatus
     */
    public function setExportStatus(?string $exportStatus): void
    {
        $this->exportStatus = $exportStatus;
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
}
