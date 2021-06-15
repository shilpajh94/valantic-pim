<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EmailCommand
 *
 * Email send for new products
 *
 * @package AppBundle\Command
 */
class EmailCommand extends AbstractCommand
{
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this
            ->setName('conti:sample-importreport')
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
                        $this->db = \Pimcore\Db::get();
                        $value = $siopValue->getLevel();
                        $siopName = $siopValue->getDescription();
                        $siopid = $siopValue->getId();
                        $SIOPLevelToQuery = 'SIOPLevel' . strval($value);
                        $sql = "select oo_id,articleNumber from object_1 WHERE date(FROM_UNIXTIME(o_creationDate)) >= now() - INTERVAL ".SIOP_NEW_PRODUCT_IMPORT_DATE." DAY AND ProductType = 'fert' AND {$SIOPLevelToQuery} LIKE '%" . $siopid . "%'";
                        $records = $this->db->fetchAll($sql);
                        if ($records)
                            $siopNewProducts[$siopid] = ['siopName' => $siopName, 'newProducts' => $records];
                    }
                    if ($siopNewProducts) {
                        // Render records to a template
                        $engine = \Pimcore::getContainer()->get('templating');
                        $content = $engine->render('/Email/NewProductTableContent.html.php', ['content' => $siopNewProducts]);

                        $params = array('firstName' => $firstName, 'lastName' => $lastName, 'tableContent' => $content);
                        //sending the email
                        if($userEmail)
                        {$mail = new \Pimcore\Mail();
                            $mail->addto($userEmail);
                            $mail->setSubject("New Products Report");
                            $mail->setDocument("".NEW_PRODUCT_EMAIL_TEMPLATE);
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
