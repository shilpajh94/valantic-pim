<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Admin\ElementControllerBase;
use Pimcore\Bundle\AdminBundle\Controller\Traits\AdminStyleTrait;
use Pimcore\Bundle\AdminBundle\Controller\Traits\ApplySchedulerDataTrait;
use Pimcore\Bundle\AdminBundle\Helper\GridHelperService;
use Pimcore\Controller\Configuration\TemplatePhp;
use Pimcore\Controller\EventedControllerInterface;
use Pimcore\Controller\Traits\ElementEditLockHelperTrait;
use Pimcore\Db;
use Pimcore\Event\Admin\ElementAdminStyleEvent;
use Pimcore\Event\AdminEvents;
use Pimcore\Logger;
use Pimcore\Model;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation;
use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation;
use Pimcore\Model\Element;
use Pimcore\Tool;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/object")
 */
class DataObjectController extends \Pimcore\Bundle\AdminBundle\Controller\Admin\DataObject\DataObjectController {
    /**
     * @Route("/preview-version", methods={"GET"})
     *
     * @param Request $request
     * @TemplatePhp()
     *
     * @throws \Exception
     *
     * @return array
     */
    public function previewVersionAction(Request $request)
    {
        DataObject\AbstractObject::setDoNotRestoreKeyAndPath(true);

        $id = intval($request->get('id'));
        $timezone = $request->get('dtz');
        $timeZoneObj = null;
        if (!empty($timezone)) {
            $timezone = base64_decode(urldecode($timezone));
            $timeZoneObj = new \DateTimeZone($timezone);
            if (!($timeZoneObj instanceof \DateTimeZone)) {
                $timeZoneObj = null;
            }
        }
        $version = Model\Version::getById($id);
        $object = $version->loadData();

        DataObject\AbstractObject::setDoNotRestoreKeyAndPath(false);

        if ($object) {
            if ($object->isAllowed('versions')) {
                return ['object' => $object, 'timezone' => $timeZoneObj];
            } else {
                throw $this->createAccessDeniedException('Permission denied, version id [' . $id . ']');
            }
        } else {
            throw $this->createNotFoundException('Version with id [' . $id . "] doesn't exist");
        }
    }

    /**
     * @Route("/diff-versions/from/{from}/to/{to}", methods={"GET"})
     * @TemplatePhp()
     *
     * @param Request $request
     * @param int $from
     * @param int $to
     *
     * @return array
     *
     * @throws \Exception
     */
    public function diffVersionsAction(Request $request, $from, $to)
    {
        $timezone = $request->get('dtz');
        $timeZoneObj = null;
        if (!empty($timezone)) {
            $timezone = base64_decode(urldecode($timezone));
            $timeZoneObj = new \DateTimeZone($timezone);
            if (!($timeZoneObj instanceof \DateTimeZone)) {
                $timeZoneObj = null;
            }
        }
        DataObject\AbstractObject::setDoNotRestoreKeyAndPath(true);

        $id1 = intval($from);
        $id2 = intval($to);

        $version1 = Model\Version::getById($id1);
        $object1 = $version1->loadData();

        $version2 = Model\Version::getById($id2);
        $object2 = $version2->loadData();

        DataObject\AbstractObject::setDoNotRestoreKeyAndPath(false);

        if ($object1 && $object2) {
            if ($object1->isAllowed('versions') && $object2->isAllowed('versions')) {
                return [
                    'object1' => $object1,
                    'object2' => $object2,
                    'timezone' => $timeZoneObj
                ];
            } else {
                throw $this->createAccessDeniedException('Permission denied, version ids [' . $id1 . ', ' . $id2 . ']');
            }
        } else {
            throw $this->createNotFoundException('Version with ids [' . $id1 . ', ' . $id2 . "] doesn't exist");
        }
    }
}
