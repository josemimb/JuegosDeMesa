<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129200205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eventos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, descripcion LONGTEXT DEFAULT NULL, fecha_inicio DATETIME DEFAULT NULL, fecha_fin DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesa (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, ancho DOUBLE PRECISION NOT NULL, alto DOUBLE PRECISION NOT NULL, x DOUBLE PRECISION DEFAULT NULL, y DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, fecha_inicio DATETIME DEFAULT NULL, fecha_fin DATETIME DEFAULT NULL, fecha_cancelacion DATETIME DEFAULT NULL, presentado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE eventos');
        $this->addSql('DROP TABLE mesa');
        $this->addSql('DROP TABLE reservas');
    }
}
