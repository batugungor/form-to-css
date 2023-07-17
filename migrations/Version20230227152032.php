<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227152032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE component_property ADD component_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE component_property ADD CONSTRAINT FK_C9F08833E2ABAFFF FOREIGN KEY (component_id) REFERENCES component (id)');
        $this->addSql('CREATE INDEX IDX_C9F08833E2ABAFFF ON component_property (component_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE component_property DROP FOREIGN KEY FK_C9F08833E2ABAFFF');
        $this->addSql('DROP INDEX IDX_C9F08833E2ABAFFF ON component_property');
        $this->addSql('ALTER TABLE component_property DROP component_id');
    }
}
