<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710075245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lo_lprofile (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, ikp VARCHAR(255) NOT NULL, verified TINYINT(1) NOT NULL, summoner_name VARCHAR(255) DEFAULT NULL, INDEX IDX_2731A4CC7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lo_lprofile ADD CONSTRAINT FK_2731A4CC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE lo_lconnect');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lo_lconnect (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, ikp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, verified TINYINT(1) NOT NULL, summoner_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D2A9F7DC7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lo_lconnect ADD CONSTRAINT FK_D2A9F7DC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE lo_lprofile');
    }
}
