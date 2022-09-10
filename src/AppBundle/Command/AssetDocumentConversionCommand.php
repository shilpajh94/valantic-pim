<?php


namespace AppBundle\Command;


use Pimcore\Model\Asset;
use Pimcore\Model\Tool\Lock;
use Pimcore\Model\Tool\TmpStore;
use Pimcore\Model\Version;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to create the thumbnails of the asset documents
 * The code here is majorly taken from Pimcore\Maintenance\Tasks\AssetDocumentConversionTask
 * with a few modifications
 *
 * Class AssetDocumentConversionCommand
 * @package AppBundle\Command
 */
class AssetDocumentConversionCommand extends Command
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:asset_document_convert');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $lockKey = 'contitech-asset_document_convert';
        $isLocked = Lock::isLocked($lockKey, 86400);

        if ($isLocked) {
            $this->logger->info('Skipped contitech:asset_document_convert because it already being executed');
            return;
        }
        Lock::lock($lockKey);

        $ids = TmpStore::getIdsByTag('asset-document-conversion');

        // id = path of image relative to PIMCORE_TEMPORARY_DIRECTORY
        foreach ($ids as $id) {
            $item = TmpStore::get($id);
            if($item instanceof TmpStore){
                $asset = Asset::getById($item->getData());
                try {
                    if ($asset instanceof Asset\Document) {
                        $this->logger->debug(sprintf('Processing document with ID %s | Path: %s', $asset->getId(), $asset->getFullPath()));
                        $asset->processPageCount();
                        Version::disable();
                        $asset->save();
                        Version::enable();
                    }
                } catch (\Throwable $e) {
                    $this->logger->debug(sprintf('Processing document with ID %s failed', $asset->getId()));
                    $this->logger->debug($e);
                }
            }
            TmpStore::delete($id);
        }
        Lock::release($lockKey);
    }
}
