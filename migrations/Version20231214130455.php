<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214130455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geste_tag (geste_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_35475A25729E37FA (geste_id), INDEX IDX_35475A25BAD26311 (tag_id), PRIMARY KEY(geste_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE geste_tag ADD CONSTRAINT FK_35475A25729E37FA FOREIGN KEY (geste_id) REFERENCES geste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE geste_tag ADD CONSTRAINT FK_35475A25BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geste_tag DROP FOREIGN KEY FK_35475A25729E37FA');
        $this->addSql('ALTER TABLE geste_tag DROP FOREIGN KEY FK_35475A25BAD26311');
        $this->addSql('DROP TABLE geste_tag');
    }
}
