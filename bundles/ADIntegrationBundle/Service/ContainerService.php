<?php
namespace ADIntegrationBundle\Service;

use Pimcore\Log\ApplicationLogger;
use Psr\Log\LoggerInterface;
use SAML2\Compat\AbstractContainer;
use ADIntegrationBundle\Utils\{XML, HTTP};

class ContainerService extends AbstractContainer
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    
    /**
     * Create a new SimpleSAMLphp compatible container.
     * @param ApplicationLogger $logger
     */
    public function __construct(ApplicationLogger $logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * {@inheritdoc}
     */
    public function generateId(): string 
    {
        $idLength= 43;
        return '_'.bin2hex(openssl_random_pseudo_bytes((int)(($idLength - 1)/2)));
    }

    /**
     * {@inheritdoc}
     */
    public function debugMessage($message, $type): void
    {
        if (!(is_string($type) && (is_string($message) || $message instanceof \DOMElement))) {
            throw new \InvalidArgumentException('Invalid input parameters.');
        }

        $debug = false;
        if(!$debug) {
            return;
        }
        
        if ($message instanceof \DOMElement) {
            $message = $message->ownerDocument->saveXML($message);
        }

        switch ($type) {
            case 'in':
                $this->logger->debug('Received message:');
                break;
            case 'out':
                $this->logger->debug('Sending message:');
                break;
            case 'decrypt':
                $this->logger->debug('Decrypted message:');
                break;
            case 'encrypt':
                $this->logger->debug('Encrypted message:');
                break;
            default:
                assert(false);
        }

        $str = XML::formatXMLString($message);
        foreach (explode("\n", $str) as $line) {
            $this->logger->debug($line);
        }
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function redirect($url, $data = array()): void
    {
        // HTTP::redirectTrustedURL($url, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function postRedirect($url, $data = []): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getTempDir(): string
    {
    }

    /**
     * {@inheritdoc}
     */
    public function writeFile($filename, $data, $mode = null): void
    {
    }
}