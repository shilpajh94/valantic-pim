<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Pimcore\Model\Tool\SettingsStore;

final class Version20250724103326 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $settingsObject = SettingsStore::get('system_settings', 'pimcore_system_settings');

        if (!$settingsObject instanceof SettingsStore) {
            return;
        }

        $data = json_decode($settingsObject->getData(), true) ?: [];

        // Define languages to add
        $languages = ['ja', 'ko'];

        $data['general']['valid_languages'] ??= [];

        foreach ($languages as $language) {
            if (!in_array($language, $data['general']['valid_languages'], true)) {
                $data['general']['valid_languages'][] = $language;
            }
            $data['general']['fallback_languages'][$language] = '';
            $data['documents']['error_pages']['localized'][$language] = '';
        }

        // Save the updated settings
        SettingsStore::set('system_settings', json_encode($data, JSON_PRETTY_PRINT), 'string', 'pimcore_system_settings');
    }

    public function down(Schema $schema): void
    {
        $settingsObject = SettingsStore::get('system_settings', 'pimcore_system_settings');

        if (!$settingsObject instanceof SettingsStore) {
            return;
        }

        $data = json_decode($settingsObject->getData(), true) ?: [];

        // Define languages to remove
        $languages = ['ja', 'ko'];

        $data['general']['valid_languages'] = array_filter(
            $data['general']['valid_languages'] ?? [],
            fn ($lang): bool => !in_array($lang, $languages, true),
            ARRAY_FILTER_USE_BOTH,
        );
        $data['general']['valid_languages'] = array_values($data['general']['valid_languages']);

        foreach ($languages as $language) {
            unset($data['general']['fallback_languages'][$language]);
            unset($data['documents']['error_pages']['localized'][$language]);
        }

        // Save the updated settings
        SettingsStore::set('system_settings', json_encode($data, JSON_PRETTY_PRINT), 'string', 'pimcore_system_settings');
    }
}
