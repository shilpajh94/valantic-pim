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
    const LOGGER_MODULE = "New_Created_Product_Email";

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this
            ->setName('conti:newproducts-importreport')
            ->setDescription('This command is responsible for sending mail to the product managers for the newly imported products within given number of days');
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
        $engine = \Pimcore::getContainer()->get('templating');
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
                        $sql = "select oo_id,articleNumber from object_1 WHERE date(FROM_UNIXTIME(o_creationDate)) >= now() - INTERVAL " . SIOP_NEW_PRODUCT_IMPORT_NUMBER_OF_DAYS . " DAY AND ProductType = 'fert' AND {$siopLevelToQuery} LIKE '%" . $siopId . "%'";
                        $records = $this->db->fetchAll($sql);
                        if ($records)
                            $siopNewProducts[$siopId] = ['siopName' => $siopName, 'newProducts' => $records];
                    }
                    if ($siopNewProducts) {
                        // Render records to a template
                        $noofdays = SIOP_NEW_PRODUCT_IMPORT_NUMBER_OF_DAYS;
                        $content = $engine->render('EmailNotificationBundle::default/NewProductTableContent.html.php', ['content' => $siopNewProducts]);
                        $params = array('firstName' => $firstName, 'lastName' => $lastName, 'tableContent' => $content, 'numberofdays' => $noofdays);
                        //sending the email
                        if ($userEmail) {
                            $mail = new \Pimcore\Mail();
                            $mail->addto($userEmail);
                            $mail->setSubject("New Products Report");
                            $mail->setDocument(NEW_PRODUCT_EMAIL_DOCUMENT);
                            $mail->setParams($params);
                            try{
                                $mail->send();
                            }catch(\Exception $exception){
                                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error("Exception sending mail: " . $exception->getMessage());
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
}
