<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301185818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dive_user (dive_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E93755212E04E766 (dive_id), INDEX IDX_E9375521A76ED395 (user_id), PRIMARY KEY(dive_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dive_user ADD CONSTRAINT FK_E93755212E04E766 FOREIGN KEY (dive_id) REFERENCES dive (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dive_user ADD CONSTRAINT FK_E9375521A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dive_user DROP FOREIGN KEY FK_E9375521A76ED395');
        $this->addSql('DROP TABLE dive_user');
        $this->addSql('DROP TABLE user');
    }
}
