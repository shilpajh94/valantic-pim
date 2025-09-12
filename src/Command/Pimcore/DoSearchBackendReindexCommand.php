<?php

declare(strict_types=1);

namespace App\Command\Pimcore;

use Pimcore\Bundle\SimpleBackendSearchBundle\Model\Search;
use Pimcore\Console\AbstractCommand;
use Pimcore\Logger;
use Pimcore\Model\Asset;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:pimcore:do-search-backend-reindex')]
class DoSearchBackendReindexCommand extends AbstractCommand
{
    use SearchBackendReindexTrait;

    protected function configure(): void
    {
        $this
            ->addOption('type', mode: InputOption::VALUE_REQUIRED)
            ->addOption('limit', mode: InputOption::VALUE_REQUIRED)
            ->addOption('offset', mode: InputOption::VALUE_REQUIRED)
        ;
    }

    /**
     * @see \Pimcore\Bundle\SimpleBackendSearchBundle\Command\SearchBackendReindexCommand
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $type = $input->getOption('type');
        $list = $this->getList($type);

        $limit = $input->getOption('limit');
        $limit = $limit === '' ? null : (int) $limit;

        $offset = $input->getOption('offset');
        $offset = $offset === '' ? null : (int) $offset;

        $list->setLimit($limit);
        $list->setOffset($offset);

        // duplicated try-catch to catch deleted data object classes
        try {
            $elements = $list->load();

            foreach ($elements as $element) {
                try {
                    // process page count, if not exists
                    if (
                        $element instanceof Asset\Document
                        && !$element->getCustomSetting('document_page_count')
                        && $element->processPageCount()
                    ) {
                        $this->saveAsset($element);
                    }

                    $searchEntry = Search\Backend\Data::getForElement($element);

                    if ($searchEntry->getId() instanceof Search\Backend\Data\Id) {
                        $searchEntry->setDataFromElement($element);
                    } else {
                        $searchEntry = new Search\Backend\Data($element);
                    }

                    $searchEntry->save();
                } catch (\Exception $e) {
                    Logger::err((string) $e);
                    var_dump((string) $e);
                }
            }
            \Pimcore::collectGarbage();
        } catch (\Exception $e) {
            Logger::err((string) $e);
            var_dump((string) $e);
        }

        return Command::SUCCESS;
    }

    private function saveAsset(Asset $asset): void
    {
        Version::disable();
        $asset->markFieldDirty('modificationDate'); // prevent modificationDate from being changed
        $asset->save();
        Version::enable();
    }
}
