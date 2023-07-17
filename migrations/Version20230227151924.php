<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227151924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE component_property DROP FOREIGN KEY FK_C9F08833549213EC');
        $this->addSql('DROP TABLE property');
        $this->addSql('ALTER TABLE component_property DROP FOREIGN KEY FK_C9F08833E2ABAFFF');
        $this->addSql('DROP INDEX IDX_C9F08833E2ABAFFF ON component_property');
        $this->addSql('DROP INDEX IDX_C9F08833549213EC ON component_property');
        $this->addSql('ALTER TABLE component_property ADD meta_value VARCHAR(255) NOT NULL, DROP component_id, DROP property_id, CHANGE value meta_key VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, meta_key VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE component_property ADD component_id INT DEFAULT NULL, ADD property_id INT DEFAULT NULL, ADD value VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP meta_key, DROP meta_value');
        $this->addSql('ALTER TABLE component_property ADD CONSTRAINT FK_C9F08833549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE component_property ADD CONSTRAINT FK_C9F08833E2ABAFFF FOREIGN KEY (component_id) REFERENCES component (id)');
        $this->addSql('CREATE INDEX IDX_C9F08833E2ABAFFF ON component_property (component_id)');
        $this->addSql('CREATE INDEX IDX_C9F08833549213EC ON component_property (property_id)');
    }
}
