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
// use Symfony\Component\HttpKernel\Event\ControllerEvent;

abstract class AbstractController extends FrontendController
{
    // public $region;
    // public $language;
    // /**
    //  * @inheritDoc
    //  */
    // public function onKernelController(ControllerEvent $event)
    // {
    //     // $this->setViewAutoRender($event->getRequest(), true, 'php');
    //     $this->view->printermarks = $event->getRequest()->get('printermarks');

    //     $sourceDoc = $_SESSION[PDF_GENERATION_REQUEST_SOURCE_DOC_SESSION_KEY];
      
    //     $imageRecompression = null;
    //     $imageWidth = null;
    //     // $documentId = $this->document->getId();
    //     $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($sourceDoc);
    //     if(file_exists($printConfigFile)){
    //         $printConfigFileContent = file_get_contents($printConfigFile);
    //         $printConfig = json_decode( $printConfigFileContent,true);
    //         $imageRecompression = $printConfig['config']['Image Quality'];  
    //         $imageWidth = $printConfig['config']['Image Width'];            
    //     }

    //     $this->view->imageQuality = $imageRecompression;
    //     $this->view->imageWidth = $imageWidth;
    // }
}
