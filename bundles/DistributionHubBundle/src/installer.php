<?php

namespace DistributionHubBundle;

use Doctrine\DBAL\Migrations\Version;
use Doctrine\DBAL\Schema\Schema;
// use Pimcore\Extension\Bundle\Installer\MigrationInstaller;
use Pimcore\Model\User\Permission\Definition;
use DistributionHubBundle\Lib\Utils;
use DistributionHubBundle\Lib\Constants;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Installer
{
    protected function beforeInstallMigration()
    {
        return true;
    }

    protected function afterInstallMigration()
    {
        $key = Constants::DHUB_PERMISSION_KEY;
        $definition = Definition::getByKey($key);

        if (! $definition) {
            $permission = new Definition();
            $permission->setKey($key);

            $res = new Definition\Dao();
            $res->configure();
            $res->setModel($permission);
            $res->save();
        }
    }

    public function migrateInstall(Schema $schema, Version $version)
    {
        if (! $schema->hasTable(Constants::DHUB_CLASS_CHANNEL)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_CHANNEL);
            $queueTable->addColumn('id', 'integer', ['length' => 11, 'autoincrement' => true, 'notnull' => true]);
            $queueTable->addColumn('name', 'string', ['length' => 100, 'notnull' => true]);
            $queueTable->addColumn('pimcoreClassId', 'string', ['length' => 50, 'notnull' => false]);
            $queueTable->addColumn('language', 'string', ['length' => 45, 'notnull' => false]);
            $queueTable->addColumn('headerMappingFileAssetId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('headerMappingFileType', 'string', ['length' => 20,  'notnull' => false]);
            $queueTable->addColumn('sheetNumberInMappingFile', 'integer', ['length' => 3, 'notnull' => false]);
            $queueTable->addColumn('headerRowNumberInMappingFile', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('mappingFileCSVDelimiter', 'string', ['length' => 1, 'notnull' => false]);
            $queueTable->addColumn('exportFileCSVDelimiter', 'string', ['length' => 1, 'notnull' => false]);
            $queueTable->addColumn('exportFilePath', 'string', ['length' => 1000, 'notnull' => false]);
            $queueTable->addColumn('columnAttributeMapping', 'text', ['notnull' => false]);
            $queueTable->addColumn('showInGridMapping', 'text', ['notnull' => false]);
            $queueTable->addColumn('description', 'text', ['notnull' => false]);
            $queueTable->addColumn('filterId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('userOwner', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('shareGlobally', 'smallint', ['length' => 1, 'notnull' => false]);
            $queueTable->addColumn('expiryDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('creationDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('modificationDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->setPrimaryKey(['id']);
            $queueTable->addIndex(["filterId"]);
            $queueTable->addIndex(["userOwner"]);
        }

        if (! $schema->hasTable(Constants::DHUB_CLASS_FTP)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_FTP);
            $queueTable->addColumn('id', 'integer', ['length' => 11, 'autoincrement' => true, 'notnull' => true]);
            $queueTable->addColumn('name', 'string', ['length' => 100, 'notnull' => false]);
            $queueTable->addColumn('serverAddress', 'string', ['length' => 190, 'notnull' => true]);
            $queueTable->addColumn('serverPort', 'integer', ['length' => 5, 'notnull' => true]);
            $queueTable->addColumn('userName', 'string', ['length' => 45, 'notnull' => false]);
            $queueTable->addColumn('password', 'string', ['length' => 45, 'notnull' => false]);
            $queueTable->setPrimaryKey(['id']);
        }

        if (! $schema->hasTable(Constants::DHUB_CLASS_SCHEDULE)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_SCHEDULE);
            $queueTable->addColumn('id', 'integer', ['length' => 11, 'autoincrement' => true, 'notnull' => true]);
            $queueTable->addColumn('name', 'string', ['length' => 100, 'notnull' => false]);
            $queueTable->addColumn('downloadFileName', 'string', ['length' => 100, 'notnull' => false]);
            $queueTable->addColumn('time', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('exportFormat', 'string', ['length' => 10, 'notnull' => false]);
            $queueTable->addColumn('exportLocation', 'string', ['length' => 10, 'notnull' => true]);
            $queueTable->addColumn('expiryTime', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('exportResource', 'string', ['length' => 20, 'notnull' => false]);
            $queueTable->addColumn('exportImageCols', 'string', ['length' => 20, 'notnull' => false]);
            $queueTable->addColumn('status', 'string', ['length' => 20, 'notnull' => false]);
            $queueTable->addColumn('exportFilePimcoreAssetId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('exportAssetFilePimcoreAssetId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('userOwner', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('exportProcessStartTime', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('exportProcessEndTime', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('channelId', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('creationDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('ftpDetailId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->setPrimaryKey(['id']);
            $queueTable->addIndex(["channelId"]);
            $queueTable->addIndex(["ftpDetailId"]);
        }

        if (! $schema->hasTable(Constants::DHUB_CLASS_FILTER)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_FILTER);
            $queueTable->addColumn('id', 'integer', ['length' => 11, 'autoincrement' => true, 'notnull' => true]);
            $queueTable->addColumn('objectType', 'string', ['length' => 10, 'notnull' => false]);
            $queueTable->addColumn('filterConfig', 'text', ['notnull' => false]);
            $queueTable->addColumn('filterByList', 'smallint', ['length' => 6, 'notnull' => false]);
            $queueTable->addColumn('filterByAttribute', 'string', ['length' => 50, 'notnull' => false]);
            $queueTable->addColumn('listFileAssetId', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('listFileSavePath', 'string', ['length' => 90, 'notnull' => false]);
            $queueTable->setPrimaryKey(['id']);
        }

        if (! $schema->hasTable(Constants::DHUB_CLASS_SHARE)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_SHARE);
            $queueTable->addColumn('channelId', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('sharedWithUserId', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('expiryDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->addColumn('creationDate', 'integer', ['length' => 11, 'notnull' => false]);
            $queueTable->setPrimaryKey(['channelId','sharedWithUserId']);
            $queueTable->addIndex(["sharedWithUserId"]);
        }

        if (! $schema->hasTable(Constants::DHUB_CLASS_FTP_MAP)) {
            $queueTable = $schema->createTable(Constants::DHUB_CLASS_FTP_MAP);
            $queueTable->addColumn('channelId', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->addColumn('ftpDetailId', 'integer', ['length' => 11, 'notnull' => true]);
            $queueTable->setPrimaryKey(['channelId','ftpDetailId']);
            $queueTable->addIndex(["ftpDetailId"]);
            $queueTable->addIndex(["channelId"]);
        }

        // write the Yaml configurations and add the system hostName
        $configFromPackage = Utils::getYmlConfig(Constants::PACKAGE_CONFIG_FILE);
        if ($configFromPackage) {
            // change the host name to current system hostname
            $hostName = $_SERVER['HTTP_ORIGIN'];
            $configFromPackage['host_name'] = $hostName;

            $dumper = new Dumper();
            $yaml = $dumper->dump($configFromPackage, 2);
            file_put_contents(Constants::CONFIG_FILE, $yaml);
        } else {
            throw new ParseException("Unable to parse the YAML string: %s ");
        }
    }

    public function migrateUninstall(Schema $schema, Version $version)
    {
        $tables = [
            Constants::DHUB_CLASS_CHANNEL,
            Constants::DHUB_CLASS_FTP,
            Constants::DHUB_CLASS_SCHEDULE,
            Constants::DHUB_CLASS_FILTER,
            Constants::DHUB_CLASS_SHARE,
            Constants::DHUB_CLASS_FTP_MAP
        ];

        foreach ($tables as $tableName) {
            if ($schema->hasTable($tableName)) {
                $schema->dropTable($tableName);
            }
        }

        $key = Constants::DHUB_PERMISSION_KEY;
        $this->connection->executeQuery("DELETE FROM users_permission_definitions WHERE `key` = '{$key}'");
    }

    public function needsReloadAfterInstall()
    {
        return true;
    }
}
