<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeploymentTestController extends AbstractController
{
    #[Route('/deployment-test', name: 'deployment_test')]
    public function deploymentCheck(): Response
    {
        return $this->render('default/deployment_test.html.twig');
    }
}
