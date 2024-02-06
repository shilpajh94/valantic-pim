<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Workflow\Constants as WFConst;
use \Pimcore\Db;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WorkflowReminderCommand extends AbstractCommand
{
    private $db;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:workflow:reminder')
            ->setDescription('This command will send reminder to process the peding actions');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
        $this->sendReminder();
    }

    public function sendReminder()
    {
        $pendingActions = $this->getPendingAction();
        if ($pendingActions) {
            $data = array();
            foreach ($pendingActions as $action) {
                $data = array(
                    'user'  =>  $action['user'],
                    'subjectId' =>  $action['cid'],
                    'place' =>  $action['place'],
                    'title' =>  $action['title'],
                    'action_pending_day' => $action['action_pending_day'],
                    'workflow' =>   $action['workflow'],
                    'action_date' => $action['action_date']
                );
                $this->sendNotification($data);
            }
        }
    }

    private function sendNotification($data)
    {
        $receiver = '';
        $product = null;
        $productId = null;
        $deepLink = '';
        $articleNumber = '';

        $senderEmail = '';
        $senderFirstName = '';
        $senderLastName = '';
        $senderFullName = '';
        $actionRemarkInfo = '';
        $actionRemark = '';

        $wfHelper = $this->container->get('app.workflow_helper');

        if (isset($data['user']) && !empty($data['user'])) {
            $interval = $wfHelper->getReminderInterval($data['place']);
            $buadmin_reminder_interval = $wfHelper->getBUAdminReminderInterval($data['place']);

            /**
             * Send a reminder email to BU Admin if no action taken by [Editor/Product Manager]
             * after sending maximum time of reminder email
             */
            if (in_array($data['action_pending_day'], $buadmin_reminder_interval)) {
                $this->sendReminderToBUAdmin($data);
            }
            if (in_array($data['action_pending_day'], $interval)) {
                $subject = $wfHelper->getReminderSubject($data['place']);
                $key = array_search($data['action_pending_day'], $interval);
                $emailSubject = $subject . ' ' . $key;
                $sender = \Pimcore\Model\User::getById($data['user']);
                $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($data['user'], ['limit' => 1]);
                // p_r($sender->getFirstname());die;
                if (!empty($userInfo)) {
                    // p_r(array($userInfo->getUserType()));die;
                    $product = \Pimcore\Model\DataObject::getById($data['subjectId']);
                    $receiver = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));


                    $productId = $product->getId();
                    $deepLink = $wfHelper->getDeepLinkByCommandLine($productId);
                    $articleNumber = $product->getArticleNumber();

                    $senderEmail = $sender->getEmail();
                    $senderFirstName = $sender->getFirstname();
                    $senderLastName = $sender->getLastname();
                    $senderFullName = $senderFirstName . ' ' . $senderLastName;
                    $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
                    $actionRemark = $actionRemarkInfo['description'];
                    unset($user);
                    if ($receiver) {
                        foreach ($receiver as $k => $user) {
                            $array = array(
//                                'subject'       =>  $emailSubject,
                                'templateName'  =>  $wfHelper->getReminderTemplatePath($data['place']),
                                'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                                'ccEmails'      =>  array($senderEmail => $senderFullName),
                                'dataParams'    =>  array('receiverFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'senderFullName' => $senderFullName, 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                            );
                            // p_r($array);
                            $email = $this->container->get('email.email_notification_service');
                            $email->sendNotificationsEmail($array);
                            unset($array);
                        }
                    }
                }
            }
        } else {
            echo "No Matching interval";
        }
    }

    public function getProductSIOP($product) {
        $siopArray = [];
        if (!empty($product->getSIOPLevel4())) {
            $siopArray[] = $product->getSIOPLevel4()[0]->getId();
        }
        return $siopArray;
    }

    public function sendReminderToBUAdmin($data)
    {
        p_r('Sending email to BU Admin');

        $receiver = '';
        $product = null;
        $productId = null;
        $deepLink = '';
        $articleNumber = '';

        $senderEmail = '';
        $senderFirstName = '';
        $senderLastName = '';
        $senderFullName = '';
        $actionRemarkInfo = '';
        $actionRemark = '';
        $actionTitle = '';
        $actionDate = '';

        $wfHelper = $this->container->get('app.workflow_helper');
        $sender = \Pimcore\Model\User::getById($data['user']);
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($data['user'], ['limit' => 1]);
        if (!empty($userInfo)) {
            $receiver = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $userInfo->getMaterialGroupAccess());
            $product = \Pimcore\Model\DataObject::getById($data['subjectId']);
            $productId = $product->getId();
            $deepLink = $wfHelper->getDeepLinkByCommandLine($productId);
            $articleNumber = $product->getArticleNumber();

            $senderEmail = $sender->getEmail();
            $senderFirstName = $sender->getFirstname();
            $senderLastName = $sender->getLastname();
            $senderFullName = $senderFirstName . ' ' . $senderLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            $actionTitle = $data['title'];
            $actionDate = $data['action_date'];

            if ($receiver) {
                foreach ($receiver as $k => $user) {
                    $array = array(
                        'subject'   =>  'Pending Reminder',
                        'templateName'  =>  $wfHelper->getBUAdminTemplatePath(),
                        'toEmails'      =>  array("mr.amitransinha@zohomail.com" => 'Amit' . ' ' . 'Sinha'),
                        'dataParams'    =>  array(
                            'receiverFullName' => $user->getFirstname() . ' ' . $user->getLastname(),
                            'senderFullName' => $senderFullName,
                            'actionRemark' => $actionRemark,
                            'deepLink' => $deepLink,
                            'articleNumber' => $articleNumber,
                            'actionTitle'   =>  $actionTitle,
                            'actionDate'    =>  $actionDate
                        )
                    );

                    $email = $this->container->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
    }
    public function getPendingAction()
    {
        $sql = "SELECT n.*, e.place, FROM_UNIXTIME(n.`date`) action_date, DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) action_pending_day FROM notes n
        JOIN element_workflow_state e ON(e.cid=n.cid)
        WHERE e.place IN('enrich', 'review_content') AND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) < 10;
        ORDER BY n.id DESC";
        $results = $this->db->fetchAllAssociative($sql);

        $data = array();
        if (is_array($results) && !empty($results)) {
            /**
             * Using following to for sorting data, because sorting using query is working
            */
            $notes = array();
            foreach ($results as $result) {
                $notes[$result['id']] = $result;
            }
            krsort($notes, 1); // SORT_NUMERIC

            foreach ($notes as $row) {
                if (!array_key_exists($row['cid'], $data)) {
                    $data[$row['cid']] = $row;
                }
            }
            return $data;
        }
        return false;
    }
}