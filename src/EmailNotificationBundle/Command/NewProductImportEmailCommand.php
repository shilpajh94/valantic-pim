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
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this
            ->setName('conti:newproducts-importreport')
            ->setDescription('This command is responsible for creating report of  Contitech product Data.');
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
        $time = time();
        p_r('<<<<<<<===================================>>>>>>>');
        p_r('New Products import script started: ' . date('h:i:s', $time));
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
                        $SIOPLevelToQuery = 'SIOPLevel' . strval($siopLevel);
                        $sql = "select oo_id,articleNumber from object_1 WHERE date(FROM_UNIXTIME(o_creationDate)) >= now() - INTERVAL " . SIOP_NEW_PRODUCT_IMPORT_NUMBER_OF_DAYS . " DAY AND ProductType = 'fert' AND {$SIOPLevelToQuery} LIKE '%" . $siopId . "%'";
                        $records = $this->db->fetchAll($sql);
                        if ($records)
                            $siopNewProducts[$siopId] = ['siopName' => $siopName, 'newProducts' => $records];
                    }
                    if ($siopNewProducts) {
                        // Render records to a template
                        $content = $engine->render('EmailNotificationBundle::default/NewProductTableContent.html.php', ['content' => $siopNewProducts]);
                        $params = array('firstName' => $firstName, 'lastName' => $lastName, 'tableContent' => $content);
                        //sending the email
                        if ($userEmail) {
                            $mail = new \Pimcore\Mail();
                            $mail->addto($userEmail);
                            $mail->setSubject("New Products Report");
                            $mail->setDocument(NEW_PRODUCT_EMAIL_DOCUMENT);
                            $mail->setParams($params);
                            $mail->send();
                        }
                    }
                }
            }
        }
        return false;
    }
}
