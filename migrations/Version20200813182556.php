<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813182556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO product (name, price, currency, featured) VALUES ('Sombrero', 15, 'EUR', 0)");
        $this->addSql("INSERT INTO product (name, price, currency, featured) VALUES ('Bufanda', 9.99, 'USD', 1)");
        $this->addSql("INSERT INTO product (name, price, currency, featured) VALUES ('Guantes', 6.5, 'EUR', 1)");
        $this->addSql("INSERT INTO product (name, price, currency, featured) VALUES ('Calcetines', 5.99, 'USD', 0)");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql("DELETE FROM product WHERE name like 'Sombrero'");
        $this->addSql("DELETE FROM product WHERE name like 'Bufanda'");
        $this->addSql("DELETE FROM product WHERE name like 'Guantes'");
        $this->addSql("DELETE FROM product WHERE name like 'Calcetines'");
    }
}
