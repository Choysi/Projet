<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629124603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_culturel (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, intro LONGTEXT NOT NULL, contenu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_oeuvre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, adresse_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, contenu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(128) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_D34A04ADC53D045F (image), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_culturel');
        $this->addSql('DROP TABLE categorie_oeuvre');
        $this->addSql('DROP TABLE categorie_prestation');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE oeuvre');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE product');
    }
}
