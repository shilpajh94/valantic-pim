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
        // Fetch the settings using SettingsStore
        $settingsObject = SettingsStore::get('system_settings', 'pimcore_system_settings');

        if ($settingsObject instanceof SettingsStore) {
            $data = json_decode($settingsObject->getData(), true);

            // Add ja and ko to valid_languages if not present
            if (!in_array('ja', $data['general']['valid_languages'] ?? [], true)) {
                $data['general']['valid_languages'][] = 'ja';
            }

            if (!in_array('ko', $data['general']['valid_languages'] ?? [], true)) {
                $data['general']['valid_languages'][] = 'ko';
            }

            // Add ja and ko to fallback_languages
            $data['general']['fallback_languages']['ja'] = '';
            $data['general']['fallback_languages']['ko'] = '';

            // Add ja and ko to documents.error_pages.localized
            $data['documents']['error_pages']['localized']['ja'] = '';
            $data['documents']['error_pages']['localized']['ko'] = '';

            // Save the updated settings
            SettingsStore::set('system_settings', json_encode($data, JSON_PRETTY_PRINT), 'string', 'pimcore_system_settings');
        }
    }

    public function down(Schema $schema): void
    {
        // Fetch the settings using SettingsStore
        $settingsObject = SettingsStore::get('system_settings', 'pimcore_system_settings');

        if ($settingsObject instanceof SettingsStore) {
            $data = json_decode($settingsObject->getData(), true);

            // Remove ja and ko from valid_languages
            $data['general']['valid_languages'] = array_filter(
                $data['general']['valid_languages'] ?? [],
                fn ($lang): bool => !in_array($lang, ['ja', 'ko'], true),
                ARRAY_FILTER_USE_BOTH,
            );
            $data['general']['valid_languages'] = array_values($data['general']['valid_languages']);

            // Remove ja and ko from fallback_languages
            unset($data['general']['fallback_languages']['ja'], $data['general']['fallback_languages']['ko']);

            // Remove ja and ko from error_pages.localized
            unset($data['documents']['error_pages']['localized']['ja'], $data['documents']['error_pages']['localized']['ko']);

            // Save the updated settings
            SettingsStore::set('system_settings', json_encode($data, JSON_PRETTY_PRINT), 'string', 'pimcore_system_settings');
        }
    }
}
