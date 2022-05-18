<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220406073149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE telecharger (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idfichier_id INT NOT NULL, nbtelechargement INT NOT NULL, INDEX IDX_E06A3C34786A81FB (iduser_id), INDEX IDX_E06A3C34C23841C4 (idfichier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE telecharger ADD CONSTRAINT FK_E06A3C34786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE telecharger ADD CONSTRAINT FK_E06A3C34C23841C4 FOREIGN KEY (idfichier_id) REFERENCES fichier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE telecharger');
    }
}
