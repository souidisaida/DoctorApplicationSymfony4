<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514003850 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vetementfemme ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE vetementfemme ADD CONSTRAINT FK_15B2FD57A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_15B2FD57A76ED395 ON vetementfemme (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vetementfemme DROP FOREIGN KEY FK_15B2FD57A76ED395');
        $this->addSql('DROP INDEX IDX_15B2FD57A76ED395 ON vetementfemme');
        $this->addSql('ALTER TABLE vetementfemme DROP user_id');
    }
}
