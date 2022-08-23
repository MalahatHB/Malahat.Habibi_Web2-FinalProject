<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823205146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE drug_warehouse (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(512) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventory (id INT AUTO_INCREMENT NOT NULL, medicine_id INT DEFAULT NULL, pharmacy_id INT DEFAULT NULL, drug_warehouse_id INT DEFAULT NULL, total INT NOT NULL, INDEX IDX_B12D4A362F7D140A (medicine_id), INDEX IDX_B12D4A368A94ABE2 (pharmacy_id), INDEX IDX_B12D4A3648A09E3D (drug_warehouse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A362F7D140A FOREIGN KEY (medicine_id) REFERENCES medicine (id)');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A368A94ABE2 FOREIGN KEY (pharmacy_id) REFERENCES pharmacy (id)');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A3648A09E3D FOREIGN KEY (drug_warehouse_id) REFERENCES drug_warehouse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A362F7D140A');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A368A94ABE2');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A3648A09E3D');
        $this->addSql('DROP TABLE drug_warehouse');
        $this->addSql('DROP TABLE inventory');
    }
}
