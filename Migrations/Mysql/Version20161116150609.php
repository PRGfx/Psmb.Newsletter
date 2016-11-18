<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20161116150609 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE psmb_newsletter_domain_model_subscriber CHANGE subscriptions subscriptions LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX flow_identity_psmb_newsletter_domain_model_subscriber ON psmb_newsletter_domain_model_subscriber (email)');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('DROP INDEX flow_identity_psmb_newsletter_domain_model_subscriber ON psmb_newsletter_domain_model_subscriber');
        $this->addSql('ALTER TABLE psmb_newsletter_domain_model_subscriber CHANGE subscriptions subscriptions VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}