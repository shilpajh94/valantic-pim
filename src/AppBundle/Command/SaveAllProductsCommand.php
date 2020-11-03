<?php


namespace AppBundle\Command;


use AppBundle\Services\AppService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SaveAllProductsCommand extends Command
{

    private $appService;

    public function __construct(AppService $appService)
    {
        $this->appService = $appService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:populate_completeness_percentage');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->appService->saveProductsWithArticleNumbers([],true);
    }

}
