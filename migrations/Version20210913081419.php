<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913081419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, esport_id INT DEFAULT NULL, equipe_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, titre_article VARCHAR(255) NOT NULL, commentaire_article LONGTEXT NOT NULL, photo_article VARCHAR(255) NOT NULL, date_article DATE NOT NULL, INDEX IDX_23A0E6639A7B3D4 (esport_id), INDEX IDX_23A0E666D861B89 (equipe_id), INDEX IDX_23A0E66A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, esport_id INT DEFAULT NULL, nom_equipe VARCHAR(255) NOT NULL, photo_equipe VARCHAR(255) NOT NULL, INDEX IDX_2449BA1539A7B3D4 (esport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE esport (id INT AUTO_INCREMENT NOT NULL, nom_esport VARCHAR(255) NOT NULL, photo_esport VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, esport_id INT DEFAULT NULL, pseudo_joueur VARCHAR(255) NOT NULL, nom_joueur VARCHAR(255) NOT NULL, prenom_joueur VARCHAR(255) NOT NULL, photo_joueur VARCHAR(255) NOT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), INDEX IDX_FD71A9C539A7B3D4 (esport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6639A7B3D4 FOREIGN KEY (esport_id) REFERENCES esport (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1539A7B3D4 FOREIGN KEY (esport_id) REFERENCES esport (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C539A7B3D4 FOREIGN KEY (esport_id) REFERENCES esport (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666D861B89');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6639A7B3D4');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1539A7B3D4');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C539A7B3D4');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A9E2D76C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE esport');
        $this->addSql('DROP TABLE joueur');
    }
}
