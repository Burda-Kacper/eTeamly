<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710074644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lolprofile (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, verified TINYINT(1) NOT NULL, summoner_name VARCHAR(255) DEFAULT NULL, ikp VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_30F402787E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lolprofile ADD CONSTRAINT FK_30F402787E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lo_lconnect CHANGE paired verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lolprofile');
        $this->addSql('ALTER TABLE lo_lconnect CHANGE verified paired TINYINT(1) NOT NULL');
    }
}
