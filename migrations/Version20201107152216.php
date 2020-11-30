<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107152216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(50) NOT NULL, nom_responsable VARCHAR(50) NOT NULL, responable_finance VARCHAR(50) NOT NULL, adresse_livr VARCHAR(50) NOT NULL, adresse_fact VARCHAR(50) NOT NULL, telephone VARCHAR(14) NOT NULL, email VARCHAR(50) NOT NULL, solde_init DOUBLE PRECISION NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, num_com INT NOT NULL, date_com DATE NOT NULL, observation VARCHAR(255) NOT NULL, total_ht DOUBLE PRECISION NOT NULL, total_tva DOUBLE PRECISION NOT NULL, total_ttc DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, INDEX IDX_6EEAA67D99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, id_commande_id INT NOT NULL, id_produit_id INT NOT NULL, quantite INT NOT NULL, prix_unit DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_3170B74B9AF8E3A3 (id_commande_id), INDEX IDX_3170B74BAABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_famille_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, prixa DOUBLE PRECISION NOT NULL, prixv DOUBLE PRECISION NOT NULL, tva INT NOT NULL, stock INT NOT NULL, stockinit INT NOT NULL, stockalert INT NOT NULL, INDEX IDX_29A5EC27322DFB53 (id_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27322DFB53 FOREIGN KEY (id_famille_id) REFERENCES famille (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D99DED506');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B9AF8E3A3');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27322DFB53');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BAABEFE2C');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE produit');
    }
}
