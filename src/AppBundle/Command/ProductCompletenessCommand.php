<?php


namespace AppBundle\Command;


use AppBundle\Services\AppService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductCompletenessCommand extends Command
{

    private $appService;

    /**
     * ProductCompletenessCommand constructor.
     * @param AppService $appService
     */
    public function __construct(AppService $appService)
    {
        $this->appService = $appService;
        parent::__construct();
    }


    /**
     * configuring the command
     */
    protected function configure()
    {
        $this
            ->setName('contitech:product_completeness')
            ->setDescription('Get all modified base or skeleton products within-day and update their child products(fert) for data completeness.')
            ->addArgument('startDate', InputArgument::OPTIONAL, 'Enter Date(mm/dd/yyyy) if you want to execute command from specific date.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $date = $input->getArgument('startDate');
        $this->appService->updateProductDataCompleteness($date);
    }

}
