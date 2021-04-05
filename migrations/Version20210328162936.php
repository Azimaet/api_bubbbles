<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328162936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gaz_dive ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE gaz_dive ADD CONSTRAINT FK_35C89C7BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_35C89C7BA76ED395 ON gaz_dive (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gaz_dive DROP FOREIGN KEY FK_35C89C7BA76ED395');
        $this->addSql('DROP INDEX IDX_35C89C7BA76ED395 ON gaz_dive');
        $this->addSql('ALTER TABLE gaz_dive DROP user_id');
    }
}
