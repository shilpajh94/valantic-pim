<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace CatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

abstract class AbstractController extends FrontendController implements EventSubscriberInterface
{
    public $region;
    public $language;
    public $imageQuality;
    public $imageWidth;

        /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER_ARGUMENTS => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerArgumentsEvent $event)
    {
        // p_r($event);
    //    $this->printermarks = $event->getRequest()->get('printermarks');

        // $sourceDoc = $_SESSION[PDF_GENERATION_REQUEST_SOURCE_DOC_SESSION_KEY];
        // $documentId = $event->document->getId();
        $sourceDoc = 1171;
      
        $imageRecompression = null;
        $imageWidth = null;
        // 
        $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($sourceDoc);
        if(file_exists($printConfigFile)){
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode( $printConfigFileContent,true);
            $imageRecompression = $printConfig['config']['Image Quality'];  
            $imageWidth = $printConfig['config']['Image Width'];   
        }

        $this->imageQuality = $imageRecompression;
        $this->imageWidth = $imageWidth;
    }
}
