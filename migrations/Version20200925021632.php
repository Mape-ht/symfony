<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925021632 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_moral (id INT AUTO_INCREMENT NOT NULL, raisonsocial VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_physique (id INT AUTO_INCREMENT NOT NULL, clientmoral_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, statut VARCHAR(50) NOT NULL, salaire VARCHAR(255) DEFAULT NULL, INDEX IDX_B11F18227F0F55A1 (clientmoral_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, client_moral_id INT DEFAULT NULL, client_physique_id INT DEFAULT NULL, numero VARCHAR(255) NOT NULL, clerib VARCHAR(255) NOT NULL, solde NUMERIC(50, 2) NOT NULL, type_frais VARCHAR(255) NOT NULL, type_compte VARCHAR(255) NOT NULL, date_ouverture DATE NOT NULL, INDEX IDX_CFF65260779CC064 (client_moral_id), INDEX IDX_CFF65260529BC2A3 (client_physique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_physique ADD CONSTRAINT FK_B11F18227F0F55A1 FOREIGN KEY (clientmoral_id) REFERENCES client_moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260779CC064 FOREIGN KEY (client_moral_id) REFERENCES client_moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260529BC2A3 FOREIGN KEY (client_physique_id) REFERENCES client_physique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_physique DROP FOREIGN KEY FK_B11F18227F0F55A1');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260779CC064');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260529BC2A3');
        $this->addSql('DROP TABLE client_moral');
        $this->addSql('DROP TABLE client_physique');
        $this->addSql('DROP TABLE compte');
    }
}
