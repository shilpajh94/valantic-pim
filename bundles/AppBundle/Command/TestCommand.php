<?php


namespace AppBundle\Command;


use AppBundle\Services\AppService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{

    private $appService;

    // public function __construct(AppService $appService)
    // {
    //     $this->appService = $appService;
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this->setName('testCommand');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $roleList = new \Pimcore\Model\User\Role\Listing;
        $roleList->load();
        $roles = array();
        $roleList = $roleList->getItems();
        if(!empty($roleList) && count($roleList)>0) {
            foreach($roleList as $role) {
                p_r($role->getName());die;
        //         $roles[] = array(
        //             'key'       =>  $role->name,
        //             'value'     =>  $role->id
        //         );
            }
        }
        // p_r($roles);
    }

}
