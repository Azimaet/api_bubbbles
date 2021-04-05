<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405155214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gaz (id INT AUTO_INCREMENT NOT NULL, dive_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, start_pressure INT NOT NULL, end_pressure INT NOT NULL, oxygen INT NOT NULL, nitrogen INT DEFAULT NULL, helium INT DEFAULT NULL, hydrogen INT DEFAULT NULL, INDEX IDX_7EEFC6732E04E766 (dive_id), INDEX IDX_7EEFC673A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gaz ADD CONSTRAINT FK_7EEFC6732E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id)');
        $this->addSql('ALTER TABLE gaz ADD CONSTRAINT FK_7EEFC673A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gaz');
    }
}
