<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405154333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gaz_dive DROP FOREIGN KEY FK_35C89C7B9DE39C66');
        $this->addSql('DROP TABLE gaz');
        $this->addSql('DROP TABLE gaz_dive');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gaz (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gaz_dive (gaz_id INT NOT NULL, dive_id INT NOT NULL, INDEX IDX_35C89C7B2E04E766 (dive_id), INDEX IDX_35C89C7B9DE39C66 (gaz_id), PRIMARY KEY(gaz_id, dive_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gaz_dive ADD CONSTRAINT FK_35C89C7B2E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gaz_dive ADD CONSTRAINT FK_35C89C7B9DE39C66 FOREIGN KEY (gaz_id) REFERENCES gaz (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
