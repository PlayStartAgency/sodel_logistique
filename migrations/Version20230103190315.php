<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103190315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, name_sct VARCHAR(255) NOT NULL, rcs VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cp VARCHAR(8) NOT NULL, tel VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, numero_commande VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_fournisseurs (orders_id INT NOT NULL, fournisseurs_id INT NOT NULL, INDEX IDX_C346C3CFCFFE9AD6 (orders_id), INDEX IDX_C346C3CF27ACDDFD (fournisseurs_id), PRIMARY KEY(orders_id, fournisseurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_rcp (id INT AUTO_INCREMENT NOT NULL, site_conf SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_sdl (id INT AUTO_INCREMENT NOT NULL, status_sdl SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders_fournisseurs ADD CONSTRAINT FK_C346C3CFCFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orders_fournisseurs ADD CONSTRAINT FK_C346C3CF27ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_fournisseurs DROP FOREIGN KEY FK_C346C3CFCFFE9AD6');
        $this->addSql('ALTER TABLE orders_fournisseurs DROP FOREIGN KEY FK_C346C3CF27ACDDFD');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_fournisseurs');
        $this->addSql('DROP TABLE site_rcp');
        $this->addSql('DROP TABLE status_sdl');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
