<?php

namespace DistributionHubBundle\Model;


class ChannelConfigShare extends AbstractModel
{

    public $channelId;

    /**
     * @var int
     */
    public $sharedWithUserId;

    /**
     * @var bool
     */
    public $shareGlobally;

    /**
     * @var string
     */
    public $description;

    public $creationDate;

    public $expiryDate;

    /**
     * @param int $sharedWithUserId
     *
     * @return ChannelConfigShare
     */
    public static function getChannelBySharedWithId($sharedWithUserId)
    {
        $share = new self();
        return $share->getDao()->getChannelBySharedWithId($sharedWithUserId);
    }
    /**
     * @param int $channelId
     *
     * @return ChannelConfigShare
     */
    public static function getUserByChannelId($channelId)
    {
        $share = new self();
        return $share->getDao()->getUserByChannelId($channelId);
    }

    /**
     * @throws \Exception
     */
    public function save()
    {
        $this->getDao()->save();
    }

    /**
     * Delete this share
     */
    public function delete()
    {
        $this->getDao()->delete();
    }

    /**
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     */
    public function setChannelId(int $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return int
     */
    public function getSharedWithUserId(): int
    {
        return $this->sharedWithUserId;
    }

    /**
     * @param int $sharedWithUserId
     */
    public function setSharedWithUserId(int $sharedWithUserId)
    {
        $this->sharedWithUserId = $sharedWithUserId;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        if($this->expiryDate){
            return $this->getDateFromTimestamp($this->expiryDate);
        }
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate): void
    {
        if($expiryDate instanceof \DateTime){
            $expiryDate = $expiryDate->getTimestamp();
        }
        $this->expiryDate = $expiryDate;
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

    /**
     * @return bool
     */
    public function isShareGlobally(): bool
    {
        return $this->shareGlobally;
    }

    /**
     * @param bool $shareGlobally
     */
    public function setShareGlobally(?bool $shareGlobally): void
    {
        $this->shareGlobally = $shareGlobally;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param $timestamp
     * @return \Carbon\Carbon
     */
    protected function getDateFromTimestamp($timestamp)
    {
        $date = new \Carbon\Carbon();
        $date->setTimestamp($timestamp);

        return $date;
    }

    /**
     * Delete this share
     * @param $configId
     */
    public static function deleteShareConfig($configId)
    {
        try {
            $tag = new self();
            $tag->getDao()->deleteShareConfig($configId);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
