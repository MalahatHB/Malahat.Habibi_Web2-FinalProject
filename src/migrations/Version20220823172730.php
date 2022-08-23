<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823172730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicine_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacy_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medicine ADD type_id INT DEFAULT NULL, ADD price INT NOT NULL');
        $this->addSql('ALTER TABLE medicine ADD CONSTRAINT FK_58362A8DC54C8C93 FOREIGN KEY (type_id) REFERENCES medicine_type (id)');
        $this->addSql('CREATE INDEX IDX_58362A8DC54C8C93 ON medicine (type_id)');
        $this->addSql('ALTER TABLE pharmacy ADD city_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1E8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1EC54C8C93 FOREIGN KEY (type_id) REFERENCES pharmacy_type (id)');
        $this->addSql('CREATE INDEX IDX_D6C15C1E8BAC62AF ON pharmacy (city_id)');
        $this->addSql('CREATE INDEX IDX_D6C15C1EC54C8C93 ON pharmacy (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1E8BAC62AF');
        $this->addSql('ALTER TABLE medicine DROP FOREIGN KEY FK_58362A8DC54C8C93');
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1EC54C8C93');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE medicine_type');
        $this->addSql('DROP TABLE pharmacy_type');
        $this->addSql('DROP INDEX IDX_58362A8DC54C8C93 ON medicine');
        $this->addSql('ALTER TABLE medicine DROP type_id, DROP price');
        $this->addSql('DROP INDEX IDX_D6C15C1E8BAC62AF ON pharmacy');
        $this->addSql('DROP INDEX IDX_D6C15C1EC54C8C93 ON pharmacy');
        $this->addSql('ALTER TABLE pharmacy DROP city_id, DROP type_id');
    }
}
