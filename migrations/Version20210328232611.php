<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328232611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gaz_user (gaz_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2EE04E729DE39C66 (gaz_id), INDEX IDX_2EE04E72A76ED395 (user_id), PRIMARY KEY(gaz_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gaz_user ADD CONSTRAINT FK_2EE04E729DE39C66 FOREIGN KEY (gaz_id) REFERENCES gaz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gaz_user ADD CONSTRAINT FK_2EE04E72A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gaz_user');
    }
}
