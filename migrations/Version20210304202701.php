<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304202701 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dive_user DROP FOREIGN KEY FK_E9375521A76ED395');
        $this->addSql('ALTER TABLE user_level DROP FOREIGN KEY FK_7828374BA76ED395');
        $this->addSql('DROP TABLE dive_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_level');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dive_user (dive_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E93755212E04E766 (dive_id), INDEX IDX_E9375521A76ED395 (user_id), PRIMARY KEY(dive_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, registration_date DATETIME NOT NULL, uid VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nationality VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_public_name TINYINT(1) NOT NULL, is_public_profile TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_level (user_id INT NOT NULL, level_id INT NOT NULL, INDEX IDX_7828374B5FB14BA7 (level_id), INDEX IDX_7828374BA76ED395 (user_id), PRIMARY KEY(user_id, level_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dive_user ADD CONSTRAINT FK_E93755212E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dive_user ADD CONSTRAINT FK_E9375521A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_level ADD CONSTRAINT FK_7828374B5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_level ADD CONSTRAINT FK_7828374BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
