<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241109140304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app__conversation ADD conversation_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE app__conversation_member DROP conversation_name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app__conversation_member ADD conversation_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE app__conversation DROP conversation_name');
    }
}
