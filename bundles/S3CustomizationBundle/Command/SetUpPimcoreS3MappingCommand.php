<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/2/20
 * Time: 3:31 PM
 */

namespace S3CustomizationBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SetUpPimcoreS3MappingCommand
 *
 * create the pimcore_s3_path_mapping table and insert the initial data
 *
 * @package S3CustomizationBundle\Command
 */
class SetUpPimcoreS3MappingCommand extends Command
{
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('pimcore-s3:setup-pimcore-s3-mapping')
            ->setDescription('Create the mapping table and populate with the initial data.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sqlFilePath = __DIR__."/../Resources/sql/setup_pimcore_s3_mapping.sql";

        $conn = \Pimcore\Db::get();

        $filePath = $sqlFilePath;

        $output->write(sprintf("Processing file '<info>%s</info>'... ", $filePath));
        $sql = file_get_contents($filePath);

        $stmt = $conn->prepare($sql);
        $rs = $stmt->execute();

        if ($rs) {
            $output->writeln('OK!' . PHP_EOL);
        } else {
            $error = $stmt->errorInfo();

            $output->write('error!' . PHP_EOL);

            throw new \RuntimeException($error[2], $error[0]);
        }

        $stmt->closeCursor();
    }

}