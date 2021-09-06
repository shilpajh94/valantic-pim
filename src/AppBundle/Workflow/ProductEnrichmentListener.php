<?php

namespace AppBundle\Workflow;

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;


class ProductEnrichmentListener 
{
    CONST CONTITECH_FROM_EMAIL ="tehreemperevz959@gmail.com";
    
    public function SentForReview()
    {
        $assignedRole = 'MARCOMCS';
        $emailDocument = Document\Email::getByPath('/Email/ReviewProductReportEmail');
        return $this->SendMail($emailDocument, $assignedRole);   
    }


    public function RejectedProduct()
    {
        $assignedRole = 'PRODUCTMANAGERCS';
        $emailDocument = Document\Email::getByPath('/Email/RejectedProductReportEmail');
        return $this->SendMail($emailDocument, $assignedRole);
    }


    public function ApprovedProduct()
    {
        $assignedRole = 'PRODUCTMANAGERCS';
        $emailDocument = Document\Email::getByPath('/Email/ApprovedProductReportEmail');
        return $this->SendMail($emailDocument, $assignedRole);
    }


    public function PublishedProduct()
    {
        $assignedRole = 'PRODUCTMANAGERCS';
        $emailDocument = Document\Email::getByPath('/Email/PublishedProductReportEamil');
        return $this->SendMail($emailDocument, $assignedRole);
    }

    

    public function PausedProduct()
    {
        $assignedRole = 'MARCOMCS';
        $emailDocument = Document\Email::getByPath('/Email/PauseProductReportEmail');
        return $this->SendMail($emailDocument, $assignedRole);
    }


    public function ArchivedProduct()
    {
        $assignedRole = 'MARCOMCS';
        $emailDocument = Document\Email::getByPath('/Email/ARchivedProductReportEmail');
        return $this->SendMail($emailDocument, $assignedRole);
    }


    private function SendMail($emailDocument, $assignedRole)
    {
        $currentuser = \Pimcore\Tool\Admin::getCurrentUser();
        $RoleClass = new \Pimcore\Model\User\Role\Listing();
        $userRole = $RoleClass->getRoles(); 
        $assignedRoleId = 0;
        
        foreach($userRole as $role) {      
         if($role->getName()==$assignedRole) {         
            $assignedRoleId =array(0 =>$role->getId());    
            }
        }
        $list = new \Pimcore\Model\User\Listing();
        $list->addConditionParam('roles = ?', $assignedRoleId);
        $list->load();
        $userList = $list->getUsers();

        $toEmails=array();
        foreach ($userList as $user) {
        array_push($toEmails,$user->getEmail());
        }

        $mail = new \Pimcore\Mail();
        $mail->setFrom(SELF::CONTITECH_FROM_EMAIL);
        $mail->addTo($toEmails);
        $mail->setSubject($emailDocument->getSubject());
        $mail->setDocument($emailDocument);

        if ($mail->send()) {
            return true;
        }
        
        return false;
    }
}