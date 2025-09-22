<?php

namespace SSOIntegrationBundle\DependencyInjection;

use Pimcore\Model\WebsiteSetting;
use ProxyManager\FileLocator\FileLocator as FileLocatorFileLocator;
use Symfony\Component\Config\Util\XmlUtils;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SSOIntegrationExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        $container->setParameter('saml_sp_config', $config['default_sp']);
        $this->populateSAMLIDP($container);
    }

    /**
     * {@inheritdoc}
     * Loading saml-sp
     */
    public function prepend(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $envConfig = $_ENV['SAML_ENV'];
        if ($envConfig != "") {
            switch ($envConfig) {
                case 'prod':
                    $loader->load('saml-sp_prod.yml');
                    break;
				case 'stage':
                    $loader->load('saml-sp_stage.yml');
                    break;
                default:
                    $loader->load('saml-sp_qc.yml');
                    break;
            }
        }

        $thirdPartyBundlesViewFileLocator = (new FileLocator(__DIR__ . '/../Resources/views/bundles'));
        $container->loadFromExtension('twig', [
            'paths' => [
                $thirdPartyBundlesViewFileLocator->locate('TwigBundle') => 'Twig',
            ],
        ]);
    }

    /**
     * Populates the configuration for the service provider
     * form saml-idp.xml on the key saml_idp_config
     *
     * @param ContainerBuilder $container
     */
    private function populateSAMLIDP(ContainerBuilder $container)
    {
        $config = [];
        $dom = $this->loadIDPFile();
        $entityId = $dom->getElementsByTagName('EntityDescriptor')->item(0)
            ->attributes->getNamedItem('entityID')->value;
        $config['entityID'] = $entityId;
        $claimTypeNodes = $dom->getElementsByTagName('ClaimType');
        foreach ($claimTypeNodes as $claimTypeNode) {
            $cliamValue = $claimTypeNode->attributes->getNamedItem("Uri")->value;
            $claimKey = substr(strrchr($cliamValue, '/'), 1);
            $config['claimTypes'][$claimKey] = $cliamValue;
        }

        $IDPSSODescriptor = [];
        $IDPSSODescriptorNode = $dom->getElementsByTagName('IDPSSODescriptor');
        $IDPSSODescriptorNodes = $IDPSSODescriptorNode->item(0)->childNodes;

        foreach ($IDPSSODescriptorNodes as $childNode) {

            if (!isset($IDPSSODescriptor[$childNode->nodeName])) {
                $IDPSSODescriptor[$childNode->nodeName] = [];
            }

            array_push($IDPSSODescriptor[$childNode->nodeName], [
                'Binding' => @$childNode->attributes->getNamedItem('Binding')->value,
                'Location' => @$childNode->attributes->getNamedItem('Location')->value
            ]);
        }

        $config['IDPSSODescriptor'] = $IDPSSODescriptor;
        $container->setParameter('saml_idp_config', $config);
    }
    private function loadIDPFile(){
        $envConfig = $_ENV['SAML_ENV'];
        $idpFile='';
        if ($envConfig != "") {
            switch ($envConfig) {
                case 'prod':
                    $idpFile=XmlUtils::loadFile(__DIR__ . '/../Resources/config/saml-idp-prod.xml');
                    break;
				case 'stage':
					$idpFile=XmlUtils::loadFile(__DIR__ . '/../Resources/config/saml-idp-stage.xml');
                    break;
                default:
					$idpFile=XmlUtils::loadFile(__DIR__ . '/../Resources/config/saml-idp-qc.xml');
                    break;
            }
        }
        return $idpFile;
    }
}