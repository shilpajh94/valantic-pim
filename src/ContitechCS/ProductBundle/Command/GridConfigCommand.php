<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;

class GridConfigCommand extends AbstractCommand {
    //put your code here

    protected function configure()
    {
        $this->setName('cs:set-users-default-config')
            ->setDescription('This command will import tags in system. It will read csv file from website setting config.'); 
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $options = $input->getOptions();
        $configArray = [
            'Grid_CSApplications_Search' => 'CSApplications',
            'Grid_CSFeaturesAndBenefits_Search' => 'CSFeaturesAndBenefits',
            'Grid_CSCoverCompounds_Search' => 'CSProducts',
            'Grid_CSRelatedProducts_Search' => 'CSProducts',
            'Grid_CSProductIndustries_Search' => 'CSIndustries'
        ];
        $db = \Pimcore\Db::get();
        foreach ($configArray as $gridConfigName => $classId) {
            $sql = "SELECT `g`.`id`, GROUP_CONCAT(`s`.`sharedWithUserId`) as usersIds FROM gridconfigs g JOIN gridconfig_shares s ON g.id = s.gridConfigId WHERE `g`.`name` = '".$gridConfigName."' AND `g`.`searchType` = 'search' AND `g`.`classId` = '".$classId."' group by g.id "; 
            $result = $db->fetchAll($sql);
            if (!empty($result) && count($result)>0) {
                $userRoleIds = explode(",", $result[0]['usersIds']);
                $gridConfigId = $result[0]['id'];
                foreach ($userRoleIds as $roleId) {
                    $conditionArr[] = "( `roles` = '".$roleId."' OR `roles` like '%,". $roleId . "' OR `roles` like '". $roleId.",%' OR `roles` like '%,".$roleId.",%' )";
                }
                if (!empty($conditionArr)) {
                    $condition = implode(" OR ", $conditionArr);
                }
                $sql = "SELECT `id` FROM `users` WHERE `type` = 'user' AND (".$condition.") ";
                $usersData = $db->fetchAll($sql);
                if (!empty($usersData) && count($usersData)>0) {
                    $sql = " INSERT INTO `gridconfig_favourites` (`ownerId`,`classId`,`objectId`,`gridConfigId`,`searchType`,`type`) VALUES ";
                    $values = '';
                    foreach ($usersData as $user) {
                        $valueArray = [];
                        $valueArray[] = "'".$user['id']."'";
                        $valueArray[] = "'".$classId."'";
                        $valueArray[] = '0';
                        $valueArray[] =  "'".$gridConfigId."'";
                        $valueArray[] =  "'search'";
                        $valueArray[] =  "'object'";
                        $values .=  '('.implode(",", $valueArray).'),';
                        
                    }
                    if (!empty($values)) {
                        $updateColumns = "`ownerId`= VALUES(`ownerId`), `classId`= VALUES(`classId`), `objectId`= VALUES(`objectId`), `gridConfigId`= VALUES(`gridConfigId`), `searchType`= VALUES(`searchType`), `type`= VALUES(`type`)";
                        $update = " ON DUPLICATE KEY UPDATE ".$updateColumns;
                        $query = $sql.rtrim($values, ',') .$update;
                        $db->query($query);
                    }
                }
            }
            
        }
        
    }
    //put your code here
}
