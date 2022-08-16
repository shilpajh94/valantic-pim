<?php
/**
 *  This event is used to assign the highest priority permissions to the user if multiple roles are assigned to them
 */

namespace ContitechCS\ProductBundle\EventListener;

use Pimcore\Event\Model\ElementEvent;
use Pimcore\Logger;
use Pimcore\Model\Asset;
use Pimcore\Model\Document;

class UserRolesListener
{
    CONST SELECT = 'SELECT `';
    CONST AND_IN = 'AND userId IN';
    CONST ORDERBY = 'ORDER BY `';
    CONST DESC_LIMIT = '` DESC LIMIT 1';
    CONST AND_LIMIT ='AND list = 1 LIMIT 1';
    CONST WARN_MESSAGE ='Unable to get permission ';

    public function userPermission(ElementEvent $event){

        $this->db = \Pimcore\Db::get();

        $user = $event->getArgument('user');
        $type = $event->getArgument('permissionType');

        $element = $event->getElement();

        if($element instanceof Document){

            $isAllowed = $this->getPermissionForDocument($element, $user, $type);

        }elseif($element instanceof Asset){

            $isAllowed = $this->getPermissionForAssets($element, $user, $type);
        }
        else{
            $isAllowed = $this->getPermissionForDataObjects($element, $user, $type);
        }
        $event->setArgument('isAllowed',$isAllowed);
    }

    public function getPermissionForDocument($element, $user, $type){
        $parentIds = [1];

        $obj = $element->getParent();
        if ($obj) {
            while ($obj) {
                $parentIds[] = $obj->getId();
                $obj = $obj->getParent();
            }
        }
        $parentIds[] = $element->getId();

        $userIds = $user->getRoles();
        $userIds[] = $user->getId();

        try {
            $permissionsParent = $this->db->fetchOne(self::SELECT . $type . '` FROM users_workspaces_document WHERE cid IN (' . implode(',', $parentIds) . ')'.self::AND_IN.'(' . implode(',', $userIds) . ')'.self::ORDERBY. $type . self::DESC_LIMIT);

            if ($permissionsParent) {
                return true;
            }

            // exception for list permission
            if (empty($permissionsParent) && $type == 'list') {
                // check for children with permissions
                $path = $element->getRealFullPath() . '/';
                if ($element->getId() == 1) {
                    $path = '/';
                }

                $permissionsChildren = $this->db->fetchOne('SELECT list FROM users_workspaces_document WHERE cpath LIKE ? AND userId IN (' . implode(',', $userIds) . ') AND list = 1 LIMIT 1', $path . '%');
                if ($permissionsChildren) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            Logger::warn(self::WARN_MESSAGE . $type . ' for document ' . $element->getId());
        }  
        return false;  

    }

    public function getPermissionForAssets($element, $user, $type){

        $parentIds = [1];
        $parent = $element->getParent();
        if ($parent) {
            while ($parent) {
                $parentIds[] = $parent->getId();
                $parent = $parent->getParent();
            }
        }
        $parentIds[] = $element->getId();    

        $userIds = $user->getRoles();
        $userIds[] = $user->getId();

        try {
            $permissionsParent = $this->db->fetchOne(self::SELECT . $type . '` FROM users_workspaces_asset WHERE cid IN (' . implode(',', $parentIds) . ') '.self::AND_IN.' (' . implode(',', $userIds) . ') '.self::ORDERBY. $type . self::DESC_LIMIT);
            if ($permissionsParent) {
                return true;
            }

            // exception for list permission
            if (empty($permissionsParent) && $type == 'list') {
                // check for children with permissions
                $path = $element->getRealFullPath() . '/';
                if ($element->getId() == 1) {
                    $path = '/';
                }

                $permissionsChildren = $this->db->fetchOne('SELECT list FROM users_workspaces_asset WHERE cpath LIKE ? AND userId IN (' . implode(',', $userIds) . ') '.self::AND_LIMIT, $path . '%');
                if ($permissionsChildren) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            Logger::warn(self::WARN_MESSAGE . $type . ' for asset ' . $element->getId());
        }
        return false;
    }

    public function getPermissionForDataObjects($element, $user, $type){

        $parentIds = $element->getParentIds();
        $parentIds[] = $element->getId();    
   


        $userIds = $user->getRoles();
        $userIds[] = $user->getId();

        try {
            $permissionsParent = $this->db->fetchOne(self::SELECT . $type . '` FROM users_workspaces_object WHERE cid IN (' . implode(',', $parentIds) . ') '.self::AND_IN.' (' . implode(',', $userIds) . ') '.self::ORDERBY. $type . self::DESC_LIMIT);
            if ($permissionsParent) {
                return true;
            }

            // exception for list permission
            if (empty($permissionsParent) && $type === 'list') {
                // check for children with permissions
                $path = $element->getRealFullPath() . '/';
                if ($element->getId() == 1) {
                    $path = '/';
                }

                $permissionsChildren = $this->db->fetchOne('SELECT list FROM users_workspaces_object WHERE cpath LIKE ? AND userId IN (' . implode(',', $userIds) . ') AND list = 1 LIMIT 1', $path . '%');
                if ($permissionsChildren) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            Logger::warn(self::WARN_MESSAGE. $type . ' for object ' . $element->getId());
        }           
        return false;
    }

}