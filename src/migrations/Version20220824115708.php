<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824115708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234E104C1D3 ON city (created_user_id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234BB649746 ON city (updated_user_id)');
        $this->addSql('ALTER TABLE drug_warehouse ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE drug_warehouse ADD CONSTRAINT FK_19C187F2E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE drug_warehouse ADD CONSTRAINT FK_19C187F2BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_19C187F2E104C1D3 ON drug_warehouse (created_user_id)');
        $this->addSql('CREATE INDEX IDX_19C187F2BB649746 ON drug_warehouse (updated_user_id)');
        $this->addSql('ALTER TABLE inventory ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B12D4A36E104C1D3 ON inventory (created_user_id)');
        $this->addSql('CREATE INDEX IDX_B12D4A36BB649746 ON inventory (updated_user_id)');
        $this->addSql('ALTER TABLE medicine ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE medicine ADD CONSTRAINT FK_58362A8DE104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE medicine ADD CONSTRAINT FK_58362A8DBB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_58362A8DE104C1D3 ON medicine (created_user_id)');
        $this->addSql('CREATE INDEX IDX_58362A8DBB649746 ON medicine (updated_user_id)');
        $this->addSql('ALTER TABLE medicine_type ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE medicine_type ADD CONSTRAINT FK_5865235E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE medicine_type ADD CONSTRAINT FK_5865235BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5865235E104C1D3 ON medicine_type (created_user_id)');
        $this->addSql('CREATE INDEX IDX_5865235BB649746 ON medicine_type (updated_user_id)');
        $this->addSql('ALTER TABLE message ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FBB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FE104C1D3 ON message (created_user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FBB649746 ON message (updated_user_id)');
        $this->addSql('ALTER TABLE pharmacy ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1EE104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1EBB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D6C15C1EE104C1D3 ON pharmacy (created_user_id)');
        $this->addSql('CREATE INDEX IDX_D6C15C1EBB649746 ON pharmacy (updated_user_id)');
        $this->addSql('ALTER TABLE pharmacy_type ADD created_user_id INT DEFAULT NULL, ADD updated_user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE pharmacy_type ADD CONSTRAINT FK_C8FF2025E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pharmacy_type ADD CONSTRAINT FK_C8FF2025BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C8FF2025E104C1D3 ON pharmacy_type (created_user_id)');
        $this->addSql('CREATE INDEX IDX_C8FF2025BB649746 ON pharmacy_type (updated_user_id)');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234E104C1D3');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234BB649746');
        $this->addSql('DROP INDEX IDX_2D5B0234E104C1D3 ON city');
        $this->addSql('DROP INDEX IDX_2D5B0234BB649746 ON city');
        $this->addSql('ALTER TABLE city DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE drug_warehouse DROP FOREIGN KEY FK_19C187F2E104C1D3');
        $this->addSql('ALTER TABLE drug_warehouse DROP FOREIGN KEY FK_19C187F2BB649746');
        $this->addSql('DROP INDEX IDX_19C187F2E104C1D3 ON drug_warehouse');
        $this->addSql('DROP INDEX IDX_19C187F2BB649746 ON drug_warehouse');
        $this->addSql('ALTER TABLE drug_warehouse DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A36E104C1D3');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A36BB649746');
        $this->addSql('DROP INDEX IDX_B12D4A36E104C1D3 ON inventory');
        $this->addSql('DROP INDEX IDX_B12D4A36BB649746 ON inventory');
        $this->addSql('ALTER TABLE inventory DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE medicine DROP FOREIGN KEY FK_58362A8DE104C1D3');
        $this->addSql('ALTER TABLE medicine DROP FOREIGN KEY FK_58362A8DBB649746');
        $this->addSql('DROP INDEX IDX_58362A8DE104C1D3 ON medicine');
        $this->addSql('DROP INDEX IDX_58362A8DBB649746 ON medicine');
        $this->addSql('ALTER TABLE medicine DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE medicine_type DROP FOREIGN KEY FK_5865235E104C1D3');
        $this->addSql('ALTER TABLE medicine_type DROP FOREIGN KEY FK_5865235BB649746');
        $this->addSql('DROP INDEX IDX_5865235E104C1D3 ON medicine_type');
        $this->addSql('DROP INDEX IDX_5865235BB649746 ON medicine_type');
        $this->addSql('ALTER TABLE medicine_type DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE104C1D3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FBB649746');
        $this->addSql('DROP INDEX IDX_B6BD307FE104C1D3 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FBB649746 ON message');
        $this->addSql('ALTER TABLE message DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1EE104C1D3');
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1EBB649746');
        $this->addSql('DROP INDEX IDX_D6C15C1EE104C1D3 ON pharmacy');
        $this->addSql('DROP INDEX IDX_D6C15C1EBB649746 ON pharmacy');
        $this->addSql('ALTER TABLE pharmacy DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE pharmacy_type DROP FOREIGN KEY FK_C8FF2025E104C1D3');
        $this->addSql('ALTER TABLE pharmacy_type DROP FOREIGN KEY FK_C8FF2025BB649746');
        $this->addSql('DROP INDEX IDX_C8FF2025E104C1D3 ON pharmacy_type');
        $this->addSql('DROP INDEX IDX_C8FF2025BB649746 ON pharmacy_type');
        $this->addSql('ALTER TABLE pharmacy_type DROP created_user_id, DROP updated_user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user DROP created_at, DROP updated_at');
    }
}
