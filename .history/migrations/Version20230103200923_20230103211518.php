<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103200923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD date_cmd DATETIME NOT NULL(2023-01-03 00:00:00), ADD date_rcp DATETIME NOT NULL(now), ADD article VARCHAR(255) NOT NULL, ADD designation VARCHAR(255) NOT NULL, ADD qte_cmd_uom VARCHAR(255) NOT NULL, ADD unite_cmd VARCHAR(255) NOT NULL, CHANGE numero_commande numero_cmd VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD numero_commande VARCHAR(255) NOT NULL, DROP numero_cmd, DROP date_cmd, DROP date_rcp, DROP article, DROP designation, DROP qte_cmd_uom, DROP unite_cmd');
    }
}
