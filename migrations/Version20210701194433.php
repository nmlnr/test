<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210701194433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD amount DOUBLE PRECISION DEFAULT NULL, ADD is_delivery_free TINYINT(1) DEFAULT NULL, ADD nb_uses INT DEFAULT NULL, ADD nb_products INT DEFAULT NULL, ADD start_date DATE DEFAULT NULL, ADD end_date DATE DEFAULT NULL, ADD type ENUM(\'amount\', \'products\', \'date\', \'uses\', \'football\') NOT NULL COMMENT \'(DC2Type:EnumPromotionType)\', DROP min_amount, DROP free_delivery, CHANGE reduction reduction DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD min_amount DOUBLE PRECISION NOT NULL, ADD free_delivery TINYINT(1) NOT NULL, DROP amount, DROP is_delivery_free, DROP nb_uses, DROP nb_products, DROP start_date, DROP end_date, DROP type, CHANGE reduction reduction DOUBLE PRECISION NOT NULL');
    }
}
