<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241109135321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app__conversation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app__conversation_member (id INT AUTO_INCREMENT NOT NULL, conversation_id INT NOT NULL, user_id INT NOT NULL, conversation_name VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, INDEX IDX_D504E19F9AC0396 (conversation_id), INDEX IDX_D504E19FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app__message (id INT AUTO_INCREMENT NOT NULL, conversation_id INT NOT NULL, sender_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, content TEXT NOT NULL, INDEX IDX_CA75B1AF9AC0396 (conversation_id), INDEX IDX_CA75B1AFF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user__user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_32745D0AF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app__conversation_member ADD CONSTRAINT FK_D504E19F9AC0396 FOREIGN KEY (conversation_id) REFERENCES app__conversation (id)');
        $this->addSql('ALTER TABLE app__conversation_member ADD CONSTRAINT FK_D504E19FA76ED395 FOREIGN KEY (user_id) REFERENCES user__user (id)');
        $this->addSql('ALTER TABLE app__message ADD CONSTRAINT FK_CA75B1AF9AC0396 FOREIGN KEY (conversation_id) REFERENCES app__conversation (id)');
        $this->addSql('ALTER TABLE app__message ADD CONSTRAINT FK_CA75B1AFF624B39D FOREIGN KEY (sender_id) REFERENCES app__conversation_member (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app__conversation_member DROP FOREIGN KEY FK_D504E19F9AC0396');
        $this->addSql('ALTER TABLE app__conversation_member DROP FOREIGN KEY FK_D504E19FA76ED395');
        $this->addSql('ALTER TABLE app__message DROP FOREIGN KEY FK_CA75B1AF9AC0396');
        $this->addSql('ALTER TABLE app__message DROP FOREIGN KEY FK_CA75B1AFF624B39D');
        $this->addSql('DROP TABLE app__conversation');
        $this->addSql('DROP TABLE app__conversation_member');
        $this->addSql('DROP TABLE app__message');
        $this->addSql('DROP TABLE user__user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
