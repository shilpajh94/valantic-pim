<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosedata.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hose /home/praganosis/Working/CSV/hosedata.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RangeTemperatureF extends AbstractCommand
{
    private $container;
    private $db;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->db = \Pimcore\Db::get();
    }

    protected function configure()
    {
        $this->setName('conti:RangeTemperatureF')
            ->setDescription('handle Fert rangeTemperatureF field save and publish');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $sql =  "SELECT
                *
                FROM
                (
                SELECT  `oo_id` as id,
                 `minimumTemperatureF` as minimumTemperatureF,
                 `maximumTemperatureF` as maximumTemperatureF,
                 `rangeTemperatureF` as rangeTemperatureF,
                CONCAT(REPLACE(`minimumTemperatureF`, '.000', ''), '°F', ' to ',
                 REPLACE(`maximumTemperatureF`, '.000', ''),'°F') as correctdata
                FROM `object_1`
                WHERE `ProductType` = 'fert'
                OR `ProductType` = 'skeleton'
                    AND `rangeTemperatureF` != 'NULL'
                ) as a
                WHERE correctdata != rangeTemperatureF";

            $record = $this->db->fetchAllAssociative($sql);

            $result = [];
            foreach ($record as $key => $values) {
                $minTempF = $values['minimumTemperatureF'];
                $maxTempF = $values['maximumTemperatureF'];
                $rangeTemperatureF = $values['rangeTemperatureF'];
                $rangCust = explode('to', str_replace('°F', '', $rangeTemperatureF));
                if ($minTempF != $rangCust[0] || $maxTempF != $rangCust[1]) {
                    $result[] = $values['id'];
                }
            }

            foreach ($result as $key => $productId) {
                $obj = DataObject\Product::getById($productId);
                $obj->setPublished(true);
                $obj->save();
                p_r("Executed for this product Id ----- " . $productId);
            }
        } catch (\Exception $e) {
            p_r($e->getMessage());
        }

        return 1;
    }
}
