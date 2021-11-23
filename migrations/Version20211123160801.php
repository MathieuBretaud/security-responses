<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123160801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91CFA846217');
        $this->addSql('DROP INDEX IDX_4DB9D91CFA846217 ON announcement');
        $this->addSql('ALTER TABLE announcement DROP specialization_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announcement ADD specialization_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91CFA846217 FOREIGN KEY (specialization_id) REFERENCES specialization (id)');
        $this->addSql('CREATE INDEX IDX_4DB9D91CFA846217 ON announcement (specialization_id)');
    }
}
