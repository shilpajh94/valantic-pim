<?php


namespace EmailNotificationBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Mail;
use Pimcore\Model\Element;
use Twig\Markup;

class FailedPimcoreSaveEmailCommand extends AbstractCommand
{
    private $db;

    protected function configure()
    {
        $this->setName('conti:failed-pimcore-save-products-email-notification')
            ->setDescription('Send email for products failed while executing pimcore save in regular import scripts');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        
        $this->db = Db::get();

        $sql = "SELECT businessUnit, COUNT(*) AS total_records
                FROM pimcore_save
                WHERE status = 0
                GROUP BY businessUnit;";

        $failedProductsWhilePimcoreSave = $this->db->fetchAllAssociative($sql);

        if(count($failedProductsWhilePimcoreSave) > 0){
            
            // Start with the header line
            $htmlTable = '<table border="1" cellpadding="4" cellspacing="0">';
            $htmlTable .= '<tr><th>Business Unit</th><th>Total Records</th></tr>';

            foreach ($failedProductsWhilePimcoreSave as $row) {
                $htmlTable .= '<tr>';
                $htmlTable .= '<td>' . htmlspecialchars($row['businessUnit']) . '</td>';
                $htmlTable .= '<td>' . htmlspecialchars($row['total_records']) . '</td>';
                $htmlTable .= '</tr>';
            }

            $htmlTable .= '</table>';

            // wrap in Markup so Twig treats it as safe
            $params = [
                'totalCount' => new Markup($htmlTable, 'UTF-8'),
            ];      

            $this->sendNotificationsEmail($params);
        }
        
        return 1;
    }


    public function sendNotificationsEmail($params)
    {
      
        $email_Id = array(
            'rajesh.kumar4@happiestminds.com',
            'susmita.mallick@happiestminds.com'
        );
        $mail = new \Pimcore\Mail();
        try {
            foreach ($email_Id as $eachBccEmailID) {
                $mail->addBcc($eachBccEmailID);
            }
            $mail->Subject('Pimcore Save - Regular Import Products Left To Be Saved');
            $mail->setDocument('/Email/FailedPimcoreSaveEmail');
            $mail->setIgnoreDebugMode(true);
            $mail->setParams($params);
            $mailSent = $mail->send();
            return $mailSent !== null;

        } catch (\Exception $ex) {
            p_r($ex);
        }
    }
}