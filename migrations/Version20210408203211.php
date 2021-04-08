<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408203211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_dive (theme_id INT NOT NULL, dive_id INT NOT NULL, INDEX IDX_DC7CF07D59027487 (theme_id), INDEX IDX_DC7CF07D2E04E766 (dive_id), PRIMARY KEY(theme_id, dive_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE theme_dive ADD CONSTRAINT FK_DC7CF07D59027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_dive ADD CONSTRAINT FK_DC7CF07D2E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE theme_dive DROP FOREIGN KEY FK_DC7CF07D59027487');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_dive');
    }
}
