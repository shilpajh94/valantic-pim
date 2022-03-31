<?php

namespace PimDataPostBundle\Lib\FailureNotificationSender\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;

class B2BFailureNotificationSenderHelper
{

    private $updateWindow;

    public function __construct()
    {
        $this->updateWindow = UpdateWindow::getInstance();
    }

    public function getSfFailureRecords(): array
    {
        $endTime = $this->updateWindow->getEndTimestamp();

        $list = new B2BAPIRequestEntity\Listing();
        $list->setCondition("responseStatus IS NULL OR responseStatus NOT IN (200, 201)");
        $list->setCondition("responseTimestamp >=  {$endTime}");
        $list->load();
        
        $failedRecords = [];
        $failedRecords[] = array_keys(Constants::FAILURE_LOG_CSV_HEADERS);
        foreach($list as $obj){
            $data = [];
            foreach (Constants::FAILURE_LOG_CSV_HEADERS as $fieldKey) {
                $method = "get". \ucfirst($fieldKey);
                $data[] = strval($obj->$method());
            }
            
            $failedRecords[] = $data;
        }
        return $failedRecords;
    }

    public function getUsersEmailByRolesNameList(): array
    {
        $userEmailIds = [];

        $userRoleNames = Constants::FAILURE_NOTIFICATION_ROLES;
        $userRoleNamesString = implode("','", $userRoleNames);
        $list = new \Pimcore\Model\User\Role\Listing;
        $list->setCondition("name IN ('{$userRoleNamesString}')");
        $list->load();

        $userRoleIdsList = [];

        if($list)
        {
            foreach ($list as $role) 
            {
                $userRoleIdsList[] = $role->getId();
            }
        }

        $users = new \Pimcore\Model\DataObject\Users\Listing();

        if($userRoleIdsList)
        {
            foreach ($userRoleIdsList as $value) {
                $users->setCondition("userType LIKE ".$users->quote('%,'.$value.',%'));
            }
        }
        
        $users->load();
        
        if($users)
        {
            foreach ($users as $user) {
                $userEmailIds[] = $user->getEmail();
            }
        }

        return $userEmailIds;
    }
}