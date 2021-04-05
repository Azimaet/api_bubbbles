<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328225147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gaz_dive');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gaz_dive (id INT AUTO_INCREMENT NOT NULL, dive_id INT NOT NULL, user_id INT NOT NULL, oxygen INT DEFAULT NULL, nitrogen INT DEFAULT NULL, helium INT DEFAULT NULL, hydrogen INT DEFAULT NULL, start_pressure INT NOT NULL, stop_pressure INT NOT NULL, INDEX IDX_35C89C7B2E04E766 (dive_id), INDEX IDX_35C89C7BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gaz_dive ADD CONSTRAINT FK_35C89C7B2E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE gaz_dive ADD CONSTRAINT FK_35C89C7BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
