<?php

namespace DistributionHubBundle\Controller;

use DateTime;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\ChannelConfigShare;
use Exception;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @package DistributionHubBundle\Controller
 * @Route("/admin/distributionhub/share")
 */
class ShareController extends AdminController
{
    public const CONFIG_NAME = 'plugin_distribution_hub';
    protected const SUCCESS = 'success';
    protected const ERROR = 'error';
    protected const LIMIT = 'limit';
    protected const MESSAGE = 'message';

    /**
     * @Route("/save")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function saveAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        $description = $request->get('description');
        $expiryDate = $request->get('expiryDate');
        $shared_users = array_filter($request->get('shared_users'));
        $share_globally = $request->get('share_globally');
        $shared_roles = array_filter($request->get('shared_roles'));
        $channelId = $request->get('channelId');
        if (!$channelId) {
            DHubLogger::log("Requested channel ($channelId) not found in ShareController saveAction .", DHubLogger::INFO);
            $msg = $this->trans('dHub_channel_not_found_relaod_admin');
            return $this->json([self::SUCCESS => false, self::MESSAGE => $msg]);
        }
        $channel = Channel::getById($channelId);
        $userIds = (count($shared_roles)>0) ? array_merge($shared_users, $shared_roles) : $shared_users;
        $expiryDateFormat = DateTime::createFromFormat('m/d/y', $expiryDate);
        try {
            if (count($shared_users) < 1 && count($shared_roles) < 1 && empty($share_globally)) {
                ChannelConfigShare::deleteShareConfig($channelId);
                $channel->setShareGlobally(false);
                $channel->setExpiryDate(null);
                $channel->setDescription($description);
                $channel->save();
            } else {
                $share_globally = ($share_globally) ? 1 : 0;
                ChannelConfigShare::deleteShareConfig($channelId);
                if ($share_globally) {
                    $channel->setShareGlobally($share_globally);
                } else {
                    $channel->setShareGlobally($share_globally);
                    $this->saveShareChannel($userIds, $channelId);
                }
                $channel->setExpiryDate($expiryDateFormat);
                $channel->setDescription($description);
                $channel->save();
            }
        } catch (Exception $exception) {
            DHubLogger::log("Error saving share: " . $exception->getMessage(), DHubLogger::CRITICAL);
            return $this->json([self::SUCCESS => false, self::MESSAGE => $exception->getMessage()]);
        }
        return $this->json([self::SUCCESS => true]);
    }

    private function saveShareChannel($sharedUsers, $channelId)
    {
        foreach ($sharedUsers as $userId) :
            $share = new ChannelConfigShare();
            $share->setChannelId($channelId);
            $share->setSharedWithUserId($userId);
            $share->setCreationDate(new DateTime());
            $share->save();
        endforeach;
    }

    /**
     * @Route("/get-users")
     *
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function getUsersAction(Request $request)
    {

        $users = [];

        // condition for users with groups having permission
        $condition = [];
        $rolesList = new \Pimcore\Model\User\Role\Listing();
        $rolesList->addConditionParam("CONCAT(',', permissions, ',') LIKE ?", '%,bundle_distribution_hub,%');
        $rolesList->load();
        $roles = $rolesList->getRoles();

        foreach ($roles as $role) {
            $condition[] = "CONCAT(',', roles, ',') LIKE '%," . $role->getId() . ",%'";
        }

        // get available user
        $list = new \Pimcore\Model\User\Listing();

        $condition[] = "admin = 1";
        $list->addConditionParam("((CONCAT(',', permissions, ',') LIKE ? ) OR " . implode(" OR ", $condition) . ")", '%,plugin_distribution_hub,%');
        $list->addConditionParam('id != ?', $this->getAdminUser()->getId());
        $list->load();
        $userList = $list->getUsers();

        foreach ($userList as $user) {
            $users[] = [
                'id' => $user->getId(),
                'label' => $user->getUsername()
            ];
        }

        return $this->adminJson(['success' => true, 'total' => count($users), 'data' => $users]);
    }


    /**
     * @Route("/get-roles")
     *
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function getRolesAction()
    {

        $users = [];

        $rolesList = new \Pimcore\Model\User\Role\Listing();
        $rolesList->setCondition('type = "role"');
        $rolesList->addConditionParam("CONCAT(',', permissions, ',') LIKE ?", '%,plugin_distribution_hub,%');
        $rolesList->load();

        $roles = [];
        foreach ($rolesList->getRoles() as $role) {
            $roles[] = [
                'id' => $role->getId(),
                'label' => $role->getName()
            ];
        }

        return $this->adminJson(['success' => true, 'total' => count($users), 'data' => $roles]);
    }
}
