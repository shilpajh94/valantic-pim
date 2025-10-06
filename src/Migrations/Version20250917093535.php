<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250917093535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ONE-239: Create UniProductChangeHistory table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE uni_product_change_history (
                id INT AUTO_INCREMENT NOT NULL,
                object_id INT NOT NULL,
                full_path VARCHAR(255) NOT NULL,
                object_class VARCHAR(255) NOT NULL,
                timestamp DATETIME NOT NULL,
                user VARCHAR(255) NOT NULL,
                previous_values JSON DEFAULT NULL,
                new_values JSON DEFAULT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE uni_product_change_history');
    }
}
