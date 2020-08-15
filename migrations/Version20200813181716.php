<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813181716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO category (name, description) VALUES ('Hombre', 'Toda la ropa de hombre')");
        $this->addSql("INSERT INTO category (name, description) VALUES ('Mujer', 'Ropa y complementos para ella')");
        $this->addSql("INSERT INTO category (name, description) VALUES ('Niños', 'Todo para los peques de la casa')");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql("DELETE FROM category WHERE name like 'Hombre'");
        $this->addSql("DELETE FROM category WHERE name like 'Mujer'");
        $this->addSql("DELETE FROM category WHERE name like 'Niños'");
    }
}
