<?php

namespace EmailNotificationBundle\Controller;

use Exception;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;

use function PHPUnit\Framework\throwException;

class DefaultController extends FrontendController
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Route("/email_notification")
     */
    public function indexAction(Request $request)
    {
        
        //$templateName = 'EmailNotificationBundle:default:template.html.php';

        /* Example for sending mail */
        $email = $this->container->get('email.email_notification_service');
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
        p_r('');
    }

    public function newProductsEmailAction(Request $request)
    {
        return $this->render("email_notification/default/NewProductsEmail.html.twig");
    }

    public function newProductTableContentAction(Request $request)
    {
        return $this->render("email_notification/default/NewProductTableContent.html.twig");
    }

    public function templateAction(Request $request)
    {
        return $this->render("email_notification/default/template.html.twig");
    }
}
