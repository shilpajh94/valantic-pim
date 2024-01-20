<?php

namespace EmailNotificationBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class NewProductImportEmailCommand
 *
 * Email send for new products
 *
 * @package EmailNotificationBundle\Command
 */
class NewProductImportEmailCommand extends AbstractCommand
{
    private $db;
    const LOGGER_MODULE = "New_Created_Product_Email";

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this
            ->setName('conti:newproducts-importreport')
            ->setDescription('This command is responsible for sending mail
             to the product managers for the newly imported products within given number of days');
    }

    /**
     * Execute Function
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @var \Pimcore\Templating\PhpEngine $this
     *
     * @return void
     *
     * @throws \Exception
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = \Pimcore\Db::get();
        $engine = \Pimcore::getContainer()->get('pimcore.templating.engine.twig');
        $userRole =  \Pimcore\Model\User\Role::getByName("ProductManager");
        $users = new \Pimcore\Model\DataObject\Users\Listing();
        $users->setCondition("userType LIKE '%" . $userRole->getId() . "%'");
        $users->load();
        $siopAccess = [];
        if ($users) {
            //get Siop Access for each user
            foreach ($users as $user) {
                $siopNewProducts = [];
                $siopAccess = $user->getSIOPAccess();
                $firstName = $user->getFirstname();
                $lastName = $user->getLastname();
                $userEmail = $user->getEmail();
                if ($siopAccess) {
                    foreach ($siopAccess as $siopValue) {
                        //get products alloted to each Siop Access
                        $siopLevel = $siopValue->getLevel();
                        $siopName = $siopValue->getDescription();
                        $siopId = $siopValue->getId();
                        $siopLevelToQuery = 'SIOPLevel' . strval($siopLevel);

                        $records = $this->getNewProducts($siopLevelToQuery,$siopId);

                        if ( is_array($records) && count($records) > 0 ) {
                            $siopNewProducts[$siopId] = ['siopName' => $siopName, 'newProducts' => $records];
                        }
                    }
                    if ($siopNewProducts) {
                        // Render records to a template
                        $noofdays = SIOP_NEW_PRODUCT_IMPORT_NUMBER_OF_DAYS;
                        $content = $engine->render(
                            '@EmailNotification/default/NewProductTableContent.html.twig',
                            ['content' => $siopNewProducts]);
                        $params = array('firstName' => $firstName, 'lastName' => $lastName,
                            'tableContent' => $content, 'numberofdays' => $noofdays);
                        //sending the email
                        if ($userEmail) {
                            $mail = new \Pimcore\Mail();
                            $mail->addto($userEmail);
                            $mail->subject("New Products Report");
                            $mail->setDocument(NEW_PRODUCT_EMAIL_DOCUMENT);
                            $mail->setParams($params);
                            try{
                                $mail->send();
                            }catch(\Exception $exception){
                                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->
                                    error("Exception sending mail: " . $exception->getMessage());
                            }
                        }
                    }
                }
            }
        }
        return 1;
    }

    private function getNewProducts(string $siopLevelToQuery, int $siopId)
    {
        $records = [];

        $queryString = "
                    SELECT product.ooo_id productId,
                    articleNumber articleNumber,
                    sapDescription sapDescription,
                    cat3.description SIOP3Description,
                    cat4.description SIOP4Description,
                    brand.name brandName,
                    product.CompletenessPercentage CompletenessPercentage
                FROM
                    object_localized_1_en product
                        LEFT JOIN
                    object_localized_query_2_en cat3 ON cat3.`ooo_id` = SUBSTRING(product.`SIOPLevel3`,
                        2,
                        (LENGTH(product.`SIOPLevel3`) - 2))
                        LEFT JOIN
                    object_localized_query_2_en cat4 ON cat4.`ooo_id` = SUBSTRING(product.`SIOPLevel4`,
                        2,
                        (LENGTH(product.`SIOPLevel4`) - 2))
                        LEFT JOIN
                    object_3 brand ON brand.o_id = product.brandName
                WHERE
                    DATE(FROM_UNIXTIME(product.o_creationDate)) >= NOW() - INTERVAL " .
                    SIOP_NEW_PRODUCT_IMPORT_NUMBER_OF_DAYS . " DAY
                        AND ProductType = 'fert'
                        AND " . $siopLevelToQuery . " LIKE '%," . $siopId . ",%'
        ";

        try{
            $records = $this->db->fetchAll($queryString);
        }catch(\Exception $exception){
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->
                error("Exception fetching data for mail: " . $exception->getMessage());
        }
        return $records;
    }
}
