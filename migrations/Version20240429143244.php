<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429143244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_tag (article_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_919694F97294869C (article_id), INDEX IDX_919694F9BAD26311 (tag_id), PRIMARY KEY(article_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_files (article_id INT NOT NULL, files_id INT NOT NULL, INDEX IDX_718232487294869C (article_id), INDEX IDX_71823248A3E65B2F (files_id), PRIMARY KEY(article_id, files_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, send_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_659DF2AA9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, published_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_files (event_id INT NOT NULL, files_id INT NOT NULL, INDEX IDX_472EF17571F7E88B (event_id), INDEX IDX_472EF175A3E65B2F (files_id), PRIMARY KEY(event_id, files_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE files (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_tag ADD CONSTRAINT FK_919694F97294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_tag ADD CONSTRAINT FK_919694F9BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_files ADD CONSTRAINT FK_718232487294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_files ADD CONSTRAINT FK_71823248A3E65B2F FOREIGN KEY (files_id) REFERENCES files (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE event_files ADD CONSTRAINT FK_472EF17571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_files ADD CONSTRAINT FK_472EF175A3E65B2F FOREIGN KEY (files_id) REFERENCES files (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD author_id_id INT DEFAULT NULL, DROP author_id, DROP tag_id, DROP fiel_id');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6669CCBE9A FOREIGN KEY (author_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6669CCBE9A ON article (author_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_tag DROP FOREIGN KEY FK_919694F97294869C');
        $this->addSql('ALTER TABLE article_tag DROP FOREIGN KEY FK_919694F9BAD26311');
        $this->addSql('ALTER TABLE article_files DROP FOREIGN KEY FK_718232487294869C');
        $this->addSql('ALTER TABLE article_files DROP FOREIGN KEY FK_71823248A3E65B2F');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA9D86650F');
        $this->addSql('ALTER TABLE event_files DROP FOREIGN KEY FK_472EF17571F7E88B');
        $this->addSql('ALTER TABLE event_files DROP FOREIGN KEY FK_472EF175A3E65B2F');
        $this->addSql('DROP TABLE article_tag');
        $this->addSql('DROP TABLE article_files');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_files');
        $this->addSql('DROP TABLE files');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6669CCBE9A');
        $this->addSql('DROP INDEX IDX_23A0E6669CCBE9A ON article');
        $this->addSql('ALTER TABLE article ADD author_id INT NOT NULL, ADD tag_id INT NOT NULL, ADD fiel_id INT NOT NULL, DROP author_id_id');
    }
}
