<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303203331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, federation VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, score DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_level (user_id INT NOT NULL, level_id INT NOT NULL, INDEX IDX_7828374BA76ED395 (user_id), INDEX IDX_7828374B5FB14BA7 (level_id), PRIMARY KEY(user_id, level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_level ADD CONSTRAINT FK_7828374BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_level ADD CONSTRAINT FK_7828374B5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD uid VARCHAR(12) NOT NULL, ADD nationality VARCHAR(255) DEFAULT NULL, ADD is_public_name TINYINT(1) NOT NULL, ADD is_public_profile TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_level DROP FOREIGN KEY FK_7828374B5FB14BA7');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE user_level');
        $this->addSql('ALTER TABLE user DROP uid, DROP nationality, DROP is_public_name, DROP is_public_profile');
    }
}
