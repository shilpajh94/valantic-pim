<?php
/**
 *
 * @Project Name:        Fb Brands
 * @Class Name:            LdapAuthenticate
 * @TechInfo:            This class will be used to user authentication with ldap server
 *
 * @package:            LdapAuthenticate
 *
 */
namespace ADAuthBundle\EventListner;

use Symfony\Component\Ldap\Ldap;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;
//use AppBundle\Logger\FBBLogger;

/**
 * LdapAuthenticate class for AD Implementation
 * Authorize user from LDAP
 */
class LdapAuthenticate
{

    protected $ldapObj;

    protected $logger;

    protected $ldapHost = array();

    protected $ldapUser;

    protected $ldapPass;

    protected $ldapDn;

    protected $ldapUserFilter;

    protected $ldapDnGroup;

    protected $ldapUserGroup;

    protected $ldapConnTimeOut = 1;

    protected $ldapNoDomainHost = "No domain host is available at present, please try again later!";

    protected $ldapNoUser = "No user found";

    /**
     * @Functional Description: This function is used to initialise variable using constructor.
     */
    public function __construct()
    {
        $container = new ContainerBuilder();
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('config.yml');
        $this->setLdapConfig($container);
    }

    /**
     * @Functional Description: This function is used to assign variable.
     *
     * @param
     *            :$container
     */
    public function setLdapConfig($container)
    {
        $ldapLogger = $container->getParameter('ldap_logger');
        //$logLevel = FBBLogger::$logLevels[$ldapLogger['log_level']];
        $logConfig = [
            'rotate_file' => $ldapLogger['rotate_file'],
            'max_files' => $ldapLogger['max_files']
        ];
        //$this->logger = FBBLogger::getMonoLogger($ldapLogger['log_name'], $logLevel, $logConfig);
        $ldapConfig = $container->getParameter('ldap_config');
        $this->ldapHost = $ldapConfig['ldap_host'];
        $this->ldapUser = $ldapConfig['ldap_user'];
        $this->ldapPass = $ldapConfig['ldap_pass'];
        $this->ldapPort = $ldapConfig['ldap_port'];
        $this->ldapDn = $ldapConfig['ldap_dn'];
        $this->ldapUserFilter = $ldapConfig['ldap_user_filter'];
        $this->ldapUserGroup = $ldapConfig['ldap_filter_group'];
    }

    /**
     * @Functional Description: This function is used to check host is active or valid host connection
     *
     * @param
     *            :$host
     * @param
     *            :$port
     * @param
     *            :$timeout
     */
    public function checkHostService($host, $port = 389, $timeout)
    {
        try {
            $socOpen = fsockopen($host, $port, $errno, $errstr, $timeout);
            if ($socOpen) {
                fclose($socOpen);
                return TRUE;
            }
            return FALSE;
        } catch (\Exception $e) {
            //$this->logger->addError($e->getMessage());
            return FALSE;
        }
    }

    /**
     * @Functional Description: This function is used to authenticate connection with ldap server
     *
     * @param
     *            :$userName
     * @param
     *            :$password
     */
    public function getLdapAuthenticate($userName = '', $password = '')
    {
        try {

            foreach ($this->ldapHost as $host) {
                if ($this->checkHostService($host, $this->ldapPort, $this->ldapConnTimeOut) == true)
                    break;
                else
                    $host = 0;
            }
            if ($host) {
                $this->ldapCreateConnection($host, $this->ldapPort);
                //$filter = "(&(memberOf=" . $this->ldapUserGroup . ")(" . $this->ldapUserFilter . "=$userName))";
                $filter = "(" . $this->ldapUserFilter . "=$userName)";
                $resultRes = $this->ldapQuery($this->ldapDn, $filter);
                if (! empty($resultRes)) {
                    $entry = $resultRes[0];
                    $bindUserPass = $this->ldapUserBind($entry->getDn(), $password);
                    if ($bindUserPass['success']) {
                        return array(
                            'success' => true,
                            'data' => $resultRes,
                            'message' => 'success ok'
                        );
                    } else {
                        //$this->logger->error("Failed to bind " . $userName . "with password");
                        return array(
                            'success' => false,
                            'message' => "Failed to bind " . $userName . "with password"
                        );
                    }
                } else {
                    //$this->logger->error($this->ldapNoUser);
                    return array(
                        'success' => false,
                        'message' => $this->ldapNoUser
                    );
                }
            } else {
                //$this->logger->error($this->ldapNoDomainHost);
                return array(
                    'success' => false,
                    'message' => $this->ldapNoDomainHost
                );
            }
        } catch (\Exception $e) {
            //$this->logger->addError($e->getMessage());
            return array(
                'success' => false,
                'errorCode' => $e->getCode(),
                'message' => $e->getMessage()
            );
        }
    }

    /**
     * @Functional Description: This function is used to create connection with ldap server
     *
     * @param
     *            :$userName
     * @param
     *            :$host
     * @param
     *            :$port
     * @param
     *            :$version
     * @param
     *            :$useSsl
     * @param
     *            :$useStartTls
     * @param
     *            :$optReferrals
     */
    public function ldapCreateConnection($host = null, $port = 389, $version = 3, $useSsl = false, $useStartTls = false, $optReferrals = false)
    {
        $config = $this->normalizeConfig($host, $port, $version, $useSsl, $useStartTls, $optReferrals);

        try {
            $this->ldapObj = Ldap::create('ext_ldap', $config);
            return $this->ldapBindConnection($this->ldapUser, $this->ldapPass);
        } catch (\Exception $e) {
            //$this->logger->addError($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @Functional Description: This function is used to bind connection with ldap server
     *
     * @param
     *            :$ldapUser
     * @param
     *            :$ldapPass
     */
    public function ldapBindConnection($ldapUser = '', $ldapPass = '')
    {
        try {
            $this->ldapObj->bind($ldapUser, $ldapPass);
            return array(
                'success' => true
            );
        } catch (\Exception $e) {

            //$this->logger->addError($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @Functional Description: This function is used to bind connection for user with ldap server
     *
     * @param
     *            :$user
     * @param
     *            :$pass
     */
    public function ldapUserBind($user = '', $pass = '')
    {
        try {
            $this->ldapObj->bind($user, $pass);
            return array(
                'success' => true
            );
        } catch (\Exception $e) {
            //$this->logger->addError("Failed to bind user=" . $user . "--" . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @Functional Description: This function is used to filter data based on query with ldap server
     *
     * @param
     *            :$rdns
     * @param
     *            :$filter
     */
    public function ldapQuery($rdns, $filter)
    {
        try {
            $query = $this->ldapObj->query($rdns, $filter);
            $results = $query->execute()->toArray();
            return $results;
        } catch (\Exception $e) {
            //$this->logger->addError($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @Functional Description: This function is used to normalize config data for ldap server
     *
     * @param
     *            :$host
     * @param
     *            :$port,
     * @param
     *            :$version,
     * @param
     *            :$useSsl,
     * @param
     *            :$useStartTls,
     * @param
     *            :$optReferrals
     */
    private function normalizeConfig($host, $port, $version, $useSsl, $useStartTls, $optReferrals)
    {
        if ((bool) $useSsl) {
            $encryption = 'ssl';
        } elseif ((bool) $useStartTls) {
            $encryption = 'tls';
        } else {
            $encryption = 'none';
        }

        return array(
            'host' => $host,
            'port' => $port,
            'encryption' => $encryption,
            'options' => array(
                'protocol_version' => $version,
                'referrals' => (bool) $optReferrals
            )
        );
    }
}