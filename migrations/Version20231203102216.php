<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231203102216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE extra ADD relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE extra ADD CONSTRAINT FK_4D3F0D653256915B FOREIGN KEY (relation_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D3F0D653256915B ON extra (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE extra DROP FOREIGN KEY FK_4D3F0D653256915B');
        $this->addSql('DROP INDEX UNIQ_4D3F0D653256915B ON extra');
        $this->addSql('ALTER TABLE extra DROP relation_id');
    }
}
