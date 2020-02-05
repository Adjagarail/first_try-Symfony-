<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204100548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apropos (id INT AUTO_INCREMENT NOT NULL, ouverture DATE NOT NULL, fermeture DATE NOT NULL, adresse VARCHAR(255) NOT NULL, apropos LONGTEXT NOT NULL, postere VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenant (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE programme (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, heure_demarrage TIME NOT NULL, heure_fin TIME NOT NULL, salle VARCHAR(255) NOT NULL, explicatif LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE programme_intervenant (programme_id INT NOT NULL, intervenant_id INT NOT NULL, INDEX IDX_A5E1DF8362BB7AEE (programme_id), INDEX IDX_A5E1DF83AB9A1716 (intervenant_id), PRIMARY KEY(programme_id, intervenant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsor (id INT AUTO_INCREMENT NOT NULL, sponsor VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE programme_intervenant ADD CONSTRAINT FK_A5E1DF8362BB7AEE FOREIGN KEY (programme_id) REFERENCES programme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE programme_intervenant ADD CONSTRAINT FK_A5E1DF83AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE programme_intervenant DROP FOREIGN KEY FK_A5E1DF83AB9A1716');
        $this->addSql('ALTER TABLE programme_intervenant DROP FOREIGN KEY FK_A5E1DF8362BB7AEE');
        $this->addSql('DROP TABLE apropos');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE programme');
        $this->addSql('DROP TABLE programme_intervenant');
        $this->addSql('DROP TABLE sponsor');
    }
}
