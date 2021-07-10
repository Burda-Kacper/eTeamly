<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707200937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lo_lconnect ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE lo_lconnect ADD CONSTRAINT FK_D2A9F7DC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D2A9F7DC7E3C61F9 ON lo_lconnect (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lo_lconnect DROP FOREIGN KEY FK_D2A9F7DC7E3C61F9');
        $this->addSql('DROP INDEX IDX_D2A9F7DC7E3C61F9 ON lo_lconnect');
        $this->addSql('ALTER TABLE lo_lconnect DROP owner_id');
    }
}
