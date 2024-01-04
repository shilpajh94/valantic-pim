<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Admin\UserController as ParentUserController;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Config;
use Pimcore\Controller\EventedControllerInterface;
use Pimcore\Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element;
use Pimcore\Model\User;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Description of UserController
 *
 */
/**
 * @Route("/admin/user")
 */
class UserController extends ParentUserController {
    
    /**
     * @Route("/tree-get-childs-by-id", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function treeGetChildsByIdAction(Request $request)
    {
        $list = new User\Listing();
        $list->setCondition('parentId = ?', intval($request->get('node')));
        $list->setOrder('ASC');
        $list->setOrderKey('name');
        $list->load();

        $users = [];
        if (is_array($list->getUsers())) {
            foreach ($list->getUsers() as $user) {
                if ($user->getId() && $user->getName() != 'system') {
                    $users[] = $this->getTreeNodeConfig($user);
                }
            }
        }

        return $this->adminJson($users);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @Route("/get-users-for-sharing", methods={"GET"})
     */
    public function getUsersForSharingAction(Request $request)
    {
        $this->checkPermission('share_configurations');

        return $this->getUsersAction($request);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @Route("/get-roles-for-sharing", methods={"GET"}))
     */
    public function getRolesForSharingAction(Request $request)
    {
        $this->checkPermission('share_configurations');

        return $this->getRolesAction($request);
    }

    /**
     * @Route("/role-tree-get-childs-by-id", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function roleTreeGetChildsByIdAction(Request $request)
    {
        $list = new User\Role\Listing();
        $list->setCondition('parentId = ?', (int)$request->get('node'));
        $list->load();

        $roles = [];
        if (is_array($list->getItems())) {
            foreach ($list->getItems() as $role) {
                $roles[] = $this->getRoleTreeNodeConfig($role);
            }
        }

        return $this->adminJson($roles);
    }

     /**
     * @Route("/add", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        try {
            $type = $request->get('type');

            $className = User\Service::getClassNameForType($type);
            $user = $className::create([
                'parentId' => (int)$request->get('parentId'),
                'name' => trim($request->get('name')),
                'password' => '',
                'active' => $request->get('active'),
            ]);

            if ($request->get('rid')) {
                $rid = $request->get('rid');
                $rObject = $className::getById($rid);
                if ($rObject) {
                    if ($type == 'user' || $type == 'role') {
                        $user->setParentId($rObject->getParentId());
                        if ($rObject->getClasses()) {
                            $user->setClasses(implode(',', $rObject->getClasses()));
                        }
                        if ($rObject->getDocTypes()) {
                            $user->setDocTypes(implode(',', $rObject->getDocTypes()));
                        }

                        $keys = ['asset', 'document', 'object'];
                        foreach ($keys as $key) {
                            $getter = 'getWorkspaces' . ucfirst($key);
                            $setter = 'setWorkspaces' . ucfirst($key);
                            $workspaces = $rObject->$getter();
                            $clonedWorkspaces = [];
                            if (is_array($workspaces)) {
                                /** @var User\Workspace\AbstractWorkspace $workspace */
                                foreach ($workspaces as $workspace) {
                                    $vars = $workspace->getObjectVars();
                                    if ($key == 'object') {
                                        $workspaceClass = '\\Pimcore\\Model\\User\\Workspace\\DataObject';
                                    } else {
                                        $workspaceClass = '\\Pimcore\\Model\\User\\Workspace\\' . ucfirst($key);
                                    }
                                    $newWorkspace = new $workspaceClass();
                                    foreach ($vars as $varKey => $varValue) {
                                        $newWorkspace->setObjectVar($varKey, $varValue);
                                    }
                                    $newWorkspace->setUserId($user->getId());
                                    $clonedWorkspaces[] = $newWorkspace;
                                }
                            }

                            $user->$setter($clonedWorkspaces);
                        }

                        $user->setPerspectives($rObject->getPerspectives());
                        $user->setPermissions($rObject->getPermissions());

                        if ($type == 'user') {
                            $user->setAdmin(false);
                            if ($this->getAdminUser()->isAdmin()) {
                                $user->setAdmin($rObject->getAdmin());
                            }
                            $user->setActive($rObject->getActive());
                            $user->setRoles($rObject->getRoles());
                            $user->setWelcomeScreen($rObject->getWelcomescreen());
                            $user->setMemorizeTabs($rObject->getMemorizeTabs());
                            $user->setCloseWarning($rObject->getCloseWarning());
                        }

                        $user->setWebsiteTranslationLanguagesView($rObject->getWebsiteTranslationLanguagesView());
                        $user->setWebsiteTranslationLanguagesEdit($rObject->getWebsiteTranslationLanguagesEdit());

                        $user->save();
                    }
                }
            }

            return $this->adminJson([
                'success' => true,
                'id' => $user->getId(),
            ]);
        } catch (\Exception $e) {
            return $this->adminJson(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @Route("/delete", methods={"DELETE"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function deleteAction(Request $request)
    {
        $user = User\AbstractUser::getById((int)$request->get('id'));

        // only admins are allowed to delete admins and folders
        // because a folder might contain an admin user, so it is simply not allowed for users with the "users" permission
        if (($user instanceof User\Folder && !$this->getAdminUser()->isAdmin()) || ($user instanceof User && $user->isAdmin() && !$this->getAdminUser()->isAdmin())) {
            throw new \Exception('You are not allowed to delete this user');
        } else {
            if ($user instanceof User\Role\Folder) {
                $list = [$user];
                $this->populateChildNodes($user, $list, $user instanceof User\Role\Folder);
                $listCount = count($list);
                for ($i = $listCount - 1; $i >= 0; $i--) {
                    // iterate over the list from the so that nothing can get "lost"
                    $user = $list[$i];
                    $user->delete();
                }
            } else {
                if ($user->getId()) {
                    $user->delete();
                }
            }
        }

        return $this->adminJson(['success' => true]);
    }

    /**
     * @Route("/role-get", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function roleGetAction(Request $request)
    {
        $role = User\Role::getById((int)$request->get('id'));

        if (!$role) {
            throw $this->createNotFoundException();
        }

        // workspaces
        $types = ['asset', 'document', 'object'];
        foreach ($types as $type) {
            $workspaces = $role->{'getWorkspaces' . ucfirst($type)}();
            foreach ($workspaces as $wKey => $workspace) {
                $el = Element\Service::getElementById($type, $workspace->getCid());
                if ($el) {
                    // direct injection => not nice but in this case ok ;-)
                    $workspace->path = $el->getRealFullPath();
                    $workspaces[$wKey] = $workspace->getObjectVars();
                }
            }
            $role->{'setWorkspaces' . ucfirst($type)}($workspaces);
        }

        $replaceFn = function ($value) {
            return $value->getObjectVars();
        };

        // get available permissions
        $availableUserPermissionsList = new User\Permission\Definition\Listing();
        $availableUserPermissions = $availableUserPermissionsList->load();
        $availableUserPermissions = array_map($replaceFn, $availableUserPermissions);

        $availablePerspectives = \Pimcore\Perspective\Config::getAvailablePerspectives(null);

        return $this->adminJson([
            'success' => true,
            'role' => $role->getObjectVars(),
            'permissions' => $role->generatePermissionList(),
            'classes' => $role->getClasses(),
            'docTypes' => $role->getDocTypes(),
            'availablePermissions' => $availableUserPermissions,
            'availablePerspectives' => $availablePerspectives,
            'validLanguages' => Tool::getValidLanguages(),
        ]);
    }

    /**
     * @param User $user
     *
     * @return array
     */
    protected function getTreeNodeConfig($user)
    {
        $name = $user->getName();
        if (!($user instanceof \Pimcore\Model\User\Folder )) {
            $nameArray = [];
            if (!empty($user->getFirstname())) {
                $nameArray[] = $user->getFirstname();
            }
            if (!empty($user->getLastname())) {
                $nameArray[] = $user->getLastname();
            }
            if (!empty($nameArray)) {
                $name .= ' ('.implode(" ", $nameArray).')';
            }
        }
        $tmpUser = [
            'id' => $user->getId(),
            'text' => $name,
            'elementType' => 'user',
            'type' => $user->getType(),
            'qtipCfg' => [
                'title' => 'ID: ' . $user->getId()
            ]
        ];

        // set type specific settings
        if ($user instanceof User\Folder) {
            $tmpUser['leaf'] = false;
            $tmpUser['iconCls'] = 'pimcore_icon_folder';
            $tmpUser['expanded'] = true;
            $tmpUser['allowChildren'] = true;

            if ($user->hasChildren()) {
                $tmpUser['expanded'] = false;
            } else {
                $tmpUser['loaded'] = true;
            }
        } else {
            $tmpUser['leaf'] = true;
            $tmpUser['iconCls'] = 'pimcore_icon_user';
            if (!$user->getActive()) {
                $tmpUser['cls'] = ' pimcore_unpublished';
            }
            $tmpUser['allowChildren'] = false;
            $tmpUser['admin'] = $user->isAdmin();
        }

        return $tmpUser;
    }

    /**
     * @Route("/get", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function getAction(Request $request)
    {
        $userId = (int)$request->get('id');
        if ($userId < 1) {
            throw $this->createNotFoundException();
        }

        $user = User::getById($userId);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        if ($user->isAdmin() && !$this->getAdminUser()->isAdmin()) {
            throw $this->createAccessDeniedHttpException('Only admin users are allowed to modify admin users');
        }

        // workspaces
        $types = ['asset', 'document', 'object'];
        foreach ($types as $type) {
            $workspaces = $user->{'getWorkspaces' . ucfirst($type)}();
            foreach ($workspaces as $wKey => $workspace) {
                $el = Element\Service::getElementById($type, $workspace->getCid());
                if ($el) {
                    // direct injection => not nice but in this case ok ;-)
                    $workspace->path = $el->getRealFullPath();
                    $workspaces[$wKey] = $workspace->getObjectVars();
                }
            }
            $user->{'setWorkspaces' . ucfirst($type)}($workspaces);
        }

        // object <=> user dependencies
        $userObjects = DataObject\Service::getObjectsReferencingUser($user->getId());
        $userObjectData = [];
        $hasHidden = false;

        foreach ($userObjects as $o) {
            if ($o->isAllowed('list')) {
                $userObjectData[] = [
                    'path' => $o->getRealFullPath(),
                    'id' => $o->getId(),
                    'subtype' => $o->getClass()->getName(),
                ];
            } else {
                $hasHidden = true;
            }
        }

        // get available permissions
        $availableUserPermissionsList = new User\Permission\Definition\Listing();
        $availableUserPermissions = $availableUserPermissionsList->load();

        $availableUserPermissionsData = [];
        if (is_array($availableUserPermissions)) {
            foreach ($availableUserPermissions as $availableUserPermission) {
                $availableUserPermissionsData[] = $availableUserPermission->getObjectVars();
            }
        }

        // get available roles
        $list = new User\Role\Listing();
        $list->setCondition('`type` = ?', ['role']);
        $list->load();

        $roles = [];
        if (is_array($list->getItems())) {
            foreach ($list->getItems() as $role) {
                $roles[] = [$role->getId(), $role->getName()];
            }
        }

        // unset confidential informations
        $userData = $user->getObjectVars();
        $userData['roles'] =  array_map('intval', $user->getRoles());
        $userData['docTypes'] =  $user->getDocTypes();
        $contentLanguages = Tool\Admin::reorderWebsiteLanguages($user, Tool::getValidLanguages());
        $userData['contentLanguages'] = $contentLanguages;
        $userData['twoFactorAuthentication']['isActive'] = ($user->getTwoFactorAuthentication('enabled') || $user->getTwoFactorAuthentication('secret'));
        unset($userData['password']);
        unset($userData['twoFactorAuthentication']['secret']);
        $userData['hasImage'] = $user->hasImage();

        $availablePerspectives = \Pimcore\Perspective\Config::getAvailablePerspectives(null);

        return $this->adminJson([
            'success' => true,
            'user' => $userData,
            'roles' => $roles,
            'permissions' => $user->generatePermissionList(),
            'availablePermissions' => $availableUserPermissionsData,
            'availablePerspectives' => $availablePerspectives,
            'validLanguages' => Tool::getValidLanguages(),
            'objectDependencies' => [
                'hasHidden' => $hasHidden,
                'dependencies' => $userObjectData,
            ],
        ]);
    }

    /**
     * @Route("/get-image", methods={"GET"})
     *
     * @param Request $request
     *
     * @return StreamedResponse
     */
    public function getImageAction(Request $request)
    {
        $userObj = User::getById($this->getUserId($request));
        if (!$userObj) {
            throw $this->createNotFoundException();
        }
        $stream = $userObj->getImage();

        return new StreamedResponse(function () use ($stream) {
            fpassthru($stream);
        }, 200, [
            'Content-Type' => 'image/png',
        ]);
    }

     /**
     * @Route("/search", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function searchAction(Request $request)
    {
        $q = '%' . $request->get('query') . '%';

        $list = new User\Listing();
        $list->setCondition('name LIKE ? OR firstname LIKE ? OR lastname LIKE ? OR email LIKE ? OR id = ?', [$q, $q, $q, $q, (int)$request->get('query')]);
        $list->setOrder('ASC');
        $list->setOrderKey('name');
        $list->load();

        $users = [];
        if (is_array($list->getUsers())) {
            foreach ($list->getUsers() as $user) {
                if ($user instanceof User && $user->getId() && $user->getName() != 'system') {
                    $users[] = [
                        'id' => $user->getId(),
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'firstname' => $user->getFirstname(),
                        'lastname' => $user->getLastname(),
                    ];
                }
            }
        }

        return $this->adminJson([
            'success' => true,
            'users' => $users,
        ]);
    }

    /**
     * @Route("/get-token-login-link", methods={"GET"})
     *
     * @param Request $request
     * @param TranslatorInterface $translator
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function getTokenLoginLinkAction(Request $request, TranslatorInterface $translator)
    {
        $user = User::getById((int) $request->get('id'));

        if (!$user) {
            return $this->adminJson([
                'success' => false,
                'message' => $translator->trans('login_token_invalid_user_error', [], 'admin'),
            ], Response::HTTP_NOT_FOUND);
        }

        if ($user->isAdmin() && !$this->getAdminUser()->isAdmin()) {
            return $this->adminJson([
                'success' => false,
                'message' => $translator->trans('login_token_as_admin_non_admin_user_error', [], 'admin'),
            ], Response::HTTP_FORBIDDEN);
        }

        if (empty($user->getPassword())) {
            return $this->adminJson([
                'success' => false,
                'message' => $translator->trans('login_token_no_password_error', [], 'admin'),
            ], Response::HTTP_FORBIDDEN);
        }

        $token = Tool\Authentication::generateToken($user->getName());
        $link = $this->generateCustomUrl([
            'token' => $token,
        ]);

        return $this->adminJson([
            'success' => true,
            'link' => $link,
        ]);
    }

    /**
     * @Route("/update", methods={"PUT"})
     *
     * @param Request $request
     * @param TranslatorInterface $translator
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function updateAction(Request $request, TranslatorInterface $translator)
    {
        $user = User\UserRole::getById((int)$request->get('id'));
        $currentUserIsAdmin = $this->getAdminUser()->isAdmin();

        if (!$user) {
            throw $this->createNotFoundException();
        }

        if ($user instanceof User && $user->isAdmin() && !$currentUserIsAdmin) {
            throw $this->createAccessDeniedHttpException('Only admin users are allowed to modify admin users');
        }

        if ($request->get('data')) {
            $values = $this->decodeJson($request->get('data'), true);

            if (!empty($values['password'])) {
                if (strlen($values['password']) < 10) {
                    throw new \Exception('Passwords have to be at least 10 characters long');
                }
                $values['password'] = Tool\Authentication::getPasswordHash($user->getName(), $values['password']);
            }

            // check if there are permissions transmitted, if so reset them all to false (they will be set later)
            foreach ($values as $key => $value) {
                if (strpos($key, 'permission_') === 0) {
                    if (method_exists($user, 'setAllAclToFalse')) {
                        $user->setAllAclToFalse();
                    }

                    break;
                }
            }

            if ($user instanceof User && isset($values['2fa_required'])) {
                $user->setTwoFactorAuthentication('required', (bool) $values['2fa_required']);
            }

            $user->setValues($values);

            // only admins are allowed to create admin users
            // if the logged in user isn't an admin, set admin always to false
            if ($user instanceof User && !$currentUserIsAdmin) {
                $user->setAdmin(false);
            }

            // check for permissions
            $availableUserPermissionsList = new User\Permission\Definition\Listing();
            $availableUserPermissions = $availableUserPermissionsList->load();

            foreach ($availableUserPermissions as $permission) {
                if (isset($values['permission_' . $permission->getKey()])) {
                    $user->setPermission($permission->getKey(), (bool) $values['permission_' . $permission->getKey()]);
                }
            }

            // check for workspaces
            if ($request->get('workspaces')) {
                $processedPaths = ['object' => [], 'asset' => [], 'document' => []]; //array to find if there are multiple entries for a path
                $workspaces = $this->decodeJson($request->get('workspaces'), true);
                foreach ($workspaces as $type => $spaces) {
                    $newWorkspaces = [];
                    foreach ($spaces as $space) {
                        if (in_array($space['path'], $processedPaths[$type])) {
                            throw new \Exception('Error saving workspaces as multiple entries found for path "' . $space['path'] .'" in '.$translator->trans((string)$type, [], 'admin') . 's');
                        }

                        $element = Element\Service::getElementByPath($type, $space['path']);
                        if ($element) {
                            $className = '\\Pimcore\\Model\\User\\Workspace\\' . Element\Service::getBaseClassNameForElement($type);
                            $workspace = new $className();
                            $workspace->setValues($space);

                            $workspace->setCid($element->getId());
                            $workspace->setCpath($element->getRealFullPath());
                            $workspace->setUserId($user->getId());

                            $newWorkspaces[] = $workspace;
                            $processedPaths[$type][] = $space['path'];
                        }
                    }
                    $user->{'setWorkspaces' . ucfirst($type)}($newWorkspaces);
                }
            }
        }

        if ($user instanceof User && $request->get('keyBindings')) {
            $keyBindings = json_decode($request->get('keyBindings'), true);
            $tmpArray = [];
            foreach ($keyBindings as $action => $item) {
                $tmpArray[] = json_decode($item, true);
            }
            $tmpArray = array_values(array_filter($tmpArray));
            $tmpArray = User::strictKeybinds($tmpArray);
            $tmpArray = json_encode($tmpArray);

            $user->setKeyBindings($tmpArray);
        }

        $user->save();

        return $this->adminJson(['success' => true]);
    }

    /**
     *
     * @param array $params
     * @param string $fallbackUrl
     * @param int $referenceType //UrlGeneratorInterface::ABSOLUTE_URL, ABSOLUTE_PATH, RELATIVE_PATH, NETWORK_PATH
     *
     * @return string The generated URL
     */
    private function generateCustomUrl(array $params, $fallbackUrl = 'pimcore_admin_login_check', $referenceType = UrlGeneratorInterface::ABSOLUTE_URL): string
    {
        try {
            $adminEntryPointRoute = $this->getParameter('pimcore_admin.custom_admin_route_name');

            //try to generate invitation link for custom admin point
            $loginUrl = $this->generateUrl($adminEntryPointRoute, $params, $referenceType);
        } catch (\Exception $e) {
            //use default login check for invitation link
            $loginUrl = $this->generateUrl($fallbackUrl, $params, $referenceType);
        }

        return $loginUrl;
    }
}
