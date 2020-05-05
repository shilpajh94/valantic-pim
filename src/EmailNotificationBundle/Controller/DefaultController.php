<?php

namespace EmailNotificationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/email_notification")
     */
    public function indexAction(Request $request)
    {
        
        //$templateName = 'EmailNotificationBundle:default:template.html.php';

        /* Example for sending mail */
        $email = \Pimcore::getContainer()->get('email.email_notification_service');
        $array = array(
            'templateName' => '/email/myemaildocument',
            'toEmails' => array('mahesh.lakher@syncrasytech.com' => 'Mahesh Lakher Ofc'),
            'ccEmails' => array('testtwo@test.com' => 'Test Two'),
            'attachment' => ['/home/syncrasy/Downloads/timesheet april-124 template.xlsx'],
            'dataParams' => ['firstname'=>'Mahesh', 'lastname'=>'Lakher', 'companyName'=>"Team ContiTech India"]
        );
        $email->sendNotificationsEmail($array);
        die;
    }

    public function defaultAction(Request $request)
    {

    }
}
