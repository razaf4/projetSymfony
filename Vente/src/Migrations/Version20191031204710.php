<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031204710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ligne_vente (id INT AUTO_INCREMENT NOT NULL, quantite_achat INT NOT NULL, date_achat DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_vente_client (ligne_vente_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_708EACA3225D063C (ligne_vente_id), INDEX IDX_708EACA319EB6921 (client_id), PRIMARY KEY(ligne_vente_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_vente_produite (ligne_vente_id INT NOT NULL, produite_id INT NOT NULL, INDEX IDX_D012B0F6225D063C (ligne_vente_id), INDEX IDX_D012B0F6B863AA8C (produite_id), PRIMARY KEY(ligne_vente_id, produite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_vente_client ADD CONSTRAINT FK_708EACA3225D063C FOREIGN KEY (ligne_vente_id) REFERENCES ligne_vente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_vente_client ADD CONSTRAINT FK_708EACA319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_vente_produite ADD CONSTRAINT FK_D012B0F6225D063C FOREIGN KEY (ligne_vente_id) REFERENCES ligne_vente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_vente_produite ADD CONSTRAINT FK_D012B0F6B863AA8C FOREIGN KEY (produite_id) REFERENCES produite (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE commande');
        $this->addSql('ALTER TABLE client DROP commande_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_vente_client DROP FOREIGN KEY FK_708EACA3225D063C');
        $this->addSql('ALTER TABLE ligne_vente_produite DROP FOREIGN KEY FK_D012B0F6225D063C');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, date_commande DATETIME NOT NULL, INDEX IDX_6EEAA67DAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DAB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('DROP TABLE ligne_vente');
        $this->addSql('DROP TABLE ligne_vente_client');
        $this->addSql('DROP TABLE ligne_vente_produite');
        $this->addSql('ALTER TABLE client ADD commande_id INT NOT NULL');
    }
}
