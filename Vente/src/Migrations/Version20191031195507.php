<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031195507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, quantite_commande INT NOT NULL, date_commande DATETIME NOT NULL, INDEX IDX_3170B74B99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande_produite (ligne_commande_id INT NOT NULL, produite_id INT NOT NULL, INDEX IDX_C78369FAE10FEE63 (ligne_commande_id), INDEX IDX_C78369FAB863AA8C (produite_id), PRIMARY KEY(ligne_commande_id, produite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE ligne_commande_produite ADD CONSTRAINT FK_C78369FAE10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_produite ADD CONSTRAINT FK_C78369FAB863AA8C FOREIGN KEY (produite_id) REFERENCES produite (id) ON DELETE CASCADE');
        //$this->addSql('DROP TABLE commande');
        //$this->addSql('ALTER TABLE client DROP commande_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_commande_produite DROP FOREIGN KEY FK_C78369FAE10FEE63');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, date_commande DATETIME NOT NULL, INDEX IDX_6EEAA67DAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DAB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE ligne_commande_produite');
        $this->addSql('ALTER TABLE client ADD commande_id INT NOT NULL');
    }
}
