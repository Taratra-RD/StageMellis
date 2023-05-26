<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230516113157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alimentation (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, puissance VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8E65DFA04827B9B2 (marque_id), UNIQUE INDEX UNIQ_8E65DFA044DE6F7C (boitier_id), UNIQUE INDEX UNIQ_8E65DFA0D5E86FF (etat_id), UNIQUE INDEX UNIQ_8E65DFA0B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boitier (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E91F6297FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cable (id INT AUTO_INCREMENT NOT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, longueur INT DEFAULT NULL, UNIQUE INDEX UNIQ_24E9C4D4D5E86FF (etat_id), UNIQUE INDEX UNIQ_24E9C4D4B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_mere (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, type_mb VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_21EB4E724827B9B2 (marque_id), UNIQUE INDEX UNIQ_21EB4E7244DE6F7C (boitier_id), UNIQUE INDEX UNIQ_21EB4E72D5E86FF (etat_id), UNIQUE INDEX UNIQ_21EB4E72B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clavier (id INT AUTO_INCREMENT NOT NULL, interface_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, sn VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_538598C7AB0BE982 (interface_id), INDEX IDX_538598C7FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_538598C7D5E86FF (etat_id), UNIQUE INDEX UNIQ_538598C7B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cpu (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_BA80502E4827B9B2 (marque_id), INDEX IDX_BA80502E44DE6F7C (boitier_id), UNIQUE INDEX UNIQ_BA80502ED5E86FF (etat_id), UNIQUE INDEX UNIQ_BA80502EB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date_mis_ajour (id INT AUTO_INCREMENT NOT NULL, date_id INT DEFAULT NULL, type_date VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_C4AED2C9B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecran (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, dimension VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, INDEX IDX_3FFAFD4AFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, ecran_id INT DEFAULT NULL, designation_etat VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_55CAF762E73649EB (ecran_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hdd (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, capacite VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F2CB48684827B9B2 (marque_id), INDEX IDX_F2CB486844DE6F7C (boitier_id), UNIQUE INDEX UNIQ_F2CB4868D5E86FF (etat_id), UNIQUE INDEX UNIQ_F2CB4868B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interface_port (id INT AUTO_INCREMENT NOT NULL, souris_id INT DEFAULT NULL, type_interface VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FA9F4044AAFE0C83 (souris_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lecteur (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, type_lecteur VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_11D3C9384827B9B2 (marque_id), UNIQUE INDEX UNIQ_11D3C93844DE6F7C (boitier_id), UNIQUE INDEX UNIQ_11D3C938D5E86FF (etat_id), UNIQUE INDEX UNIQ_11D3C938B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, clavier_id INT DEFAULT NULL, ecran_id INT DEFAULT NULL, souris_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5A6F91CED6EB321B (clavier_id), UNIQUE INDEX UNIQ_5A6F91CEE73649EB (ecran_id), UNIQUE INDEX UNIQ_5A6F91CEAAFE0C83 (souris_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onduleur (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, autonomie VARCHAR(255) NOT NULL, INDEX IDX_C698A4E6FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_C698A4E6D5E86FF (etat_id), UNIQUE INDEX UNIQ_C698A4E6B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, ecran_id INT DEFAULT NULL, designation_port VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_43915DCCE73649EB (ecran_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ram (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, frequence VARCHAR(255) NOT NULL, capacite VARCHAR(255) NOT NULL, sn VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E7D1222F4827B9B2 (marque_id), INDEX IDX_E7D1222F44DE6F7C (boitier_id), UNIQUE INDEX UNIQ_E7D1222FD5E86FF (etat_id), UNIQUE INDEX UNIQ_E7D1222FB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reference (id INT AUTO_INCREMENT NOT NULL, cpu_id INT DEFAULT NULL, designation_cpu_ref VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AEA349133917014 (cpu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reference_mb (id INT AUTO_INCREMENT NOT NULL, cartemere_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9B4ABE98D60943BC (cartemere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, society_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_19653DBDFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE souris (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_id INT DEFAULT NULL, nbr_bouton INT NOT NULL, sn VARCHAR(255) NOT NULL, INDEX IDX_51B122A8FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_51B122A8D5E86FF (etat_id), UNIQUE INDEX UNIQ_51B122A8B897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, hdd_id INT DEFAULT NULL, designation_taille_hdd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_76508B381493816F (hdd_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_cable (id INT AUTO_INCREMENT NOT NULL, cable_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, designation_type_cable VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2AE543239A81106E (cable_id), UNIQUE INDEX UNIQ_2AE54323FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_clavier (id INT AUTO_INCREMENT NOT NULL, clavier_id INT DEFAULT NULL, designation_type_clavier VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7BA4F732D6EB321B (clavier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_cpu (id INT AUTO_INCREMENT NOT NULL, cpu_id INT DEFAULT NULL, designation_type_cpu VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B897B6CF3917014 (cpu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_ecran (id INT AUTO_INCREMENT NOT NULL, ecran_id INT DEFAULT NULL, designation_type_ecran VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_31F67ABDE73649EB (ecran_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_hdd (id INT AUTO_INCREMENT NOT NULL, hdd_id INT DEFAULT NULL, designation_type_hdd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F0DCAE891493816F (hdd_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_ram (id INT AUTO_INCREMENT NOT NULL, ram_id INT DEFAULT NULL, designation_type_ram VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E5C6C4CE3366068 (ram_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ip VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA04827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA044DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA0D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA0B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE boitier ADD CONSTRAINT FK_E91F6297FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE cable ADD CONSTRAINT FK_24E9C4D4D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE cable ADD CONSTRAINT FK_24E9C4D4B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E724827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E7244DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E72D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E72B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE clavier ADD CONSTRAINT FK_538598C7AB0BE982 FOREIGN KEY (interface_id) REFERENCES interface_port (id)');
        $this->addSql('ALTER TABLE clavier ADD CONSTRAINT FK_538598C7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE clavier ADD CONSTRAINT FK_538598C7D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE clavier ADD CONSTRAINT FK_538598C7B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE cpu ADD CONSTRAINT FK_BA80502E4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE cpu ADD CONSTRAINT FK_BA80502E44DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE cpu ADD CONSTRAINT FK_BA80502ED5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE cpu ADD CONSTRAINT FK_BA80502EB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE date_mis_ajour ADD CONSTRAINT FK_C4AED2C9B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE ecran ADD CONSTRAINT FK_3FFAFD4AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE etat ADD CONSTRAINT FK_55CAF762E73649EB FOREIGN KEY (ecran_id) REFERENCES ecran (id)');
        $this->addSql('ALTER TABLE hdd ADD CONSTRAINT FK_F2CB48684827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE hdd ADD CONSTRAINT FK_F2CB486844DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE hdd ADD CONSTRAINT FK_F2CB4868D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE hdd ADD CONSTRAINT FK_F2CB4868B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE interface_port ADD CONSTRAINT FK_FA9F4044AAFE0C83 FOREIGN KEY (souris_id) REFERENCES souris (id)');
        $this->addSql('ALTER TABLE lecteur ADD CONSTRAINT FK_11D3C9384827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE lecteur ADD CONSTRAINT FK_11D3C93844DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE lecteur ADD CONSTRAINT FK_11D3C938D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE lecteur ADD CONSTRAINT FK_11D3C938B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CED6EB321B FOREIGN KEY (clavier_id) REFERENCES clavier (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CEE73649EB FOREIGN KEY (ecran_id) REFERENCES ecran (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CEAAFE0C83 FOREIGN KEY (souris_id) REFERENCES souris (id)');
        $this->addSql('ALTER TABLE onduleur ADD CONSTRAINT FK_C698A4E6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE onduleur ADD CONSTRAINT FK_C698A4E6D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE onduleur ADD CONSTRAINT FK_C698A4E6B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE port ADD CONSTRAINT FK_43915DCCE73649EB FOREIGN KEY (ecran_id) REFERENCES ecran (id)');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222F4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222F44DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222FD5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222FB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE reference ADD CONSTRAINT FK_AEA349133917014 FOREIGN KEY (cpu_id) REFERENCES cpu (id)');
        $this->addSql('ALTER TABLE reference_mb ADD CONSTRAINT FK_9B4ABE98D60943BC FOREIGN KEY (cartemere_id) REFERENCES carte_mere (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE souris ADD CONSTRAINT FK_51B122A8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE souris ADD CONSTRAINT FK_51B122A8D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE souris ADD CONSTRAINT FK_51B122A8B897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE taille ADD CONSTRAINT FK_76508B381493816F FOREIGN KEY (hdd_id) REFERENCES hdd (id)');
        $this->addSql('ALTER TABLE type_cable ADD CONSTRAINT FK_2AE543239A81106E FOREIGN KEY (cable_id) REFERENCES cable (id)');
        $this->addSql('ALTER TABLE type_cable ADD CONSTRAINT FK_2AE54323FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE type_clavier ADD CONSTRAINT FK_7BA4F732D6EB321B FOREIGN KEY (clavier_id) REFERENCES clavier (id)');
        $this->addSql('ALTER TABLE type_cpu ADD CONSTRAINT FK_B897B6CF3917014 FOREIGN KEY (cpu_id) REFERENCES cpu (id)');
        $this->addSql('ALTER TABLE type_ecran ADD CONSTRAINT FK_31F67ABDE73649EB FOREIGN KEY (ecran_id) REFERENCES ecran (id)');
        $this->addSql('ALTER TABLE type_hdd ADD CONSTRAINT FK_F0DCAE891493816F FOREIGN KEY (hdd_id) REFERENCES hdd (id)');
        $this->addSql('ALTER TABLE type_ram ADD CONSTRAINT FK_E5C6C4CE3366068 FOREIGN KEY (ram_id) REFERENCES ram (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA04827B9B2');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA044DE6F7C');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA0D5E86FF');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA0B897366B');
        $this->addSql('ALTER TABLE boitier DROP FOREIGN KEY FK_E91F6297FB88E14F');
        $this->addSql('ALTER TABLE cable DROP FOREIGN KEY FK_24E9C4D4D5E86FF');
        $this->addSql('ALTER TABLE cable DROP FOREIGN KEY FK_24E9C4D4B897366B');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E724827B9B2');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E7244DE6F7C');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E72D5E86FF');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E72B897366B');
        $this->addSql('ALTER TABLE clavier DROP FOREIGN KEY FK_538598C7AB0BE982');
        $this->addSql('ALTER TABLE clavier DROP FOREIGN KEY FK_538598C7FB88E14F');
        $this->addSql('ALTER TABLE clavier DROP FOREIGN KEY FK_538598C7D5E86FF');
        $this->addSql('ALTER TABLE clavier DROP FOREIGN KEY FK_538598C7B897366B');
        $this->addSql('ALTER TABLE cpu DROP FOREIGN KEY FK_BA80502E4827B9B2');
        $this->addSql('ALTER TABLE cpu DROP FOREIGN KEY FK_BA80502E44DE6F7C');
        $this->addSql('ALTER TABLE cpu DROP FOREIGN KEY FK_BA80502ED5E86FF');
        $this->addSql('ALTER TABLE cpu DROP FOREIGN KEY FK_BA80502EB897366B');
        $this->addSql('ALTER TABLE date_mis_ajour DROP FOREIGN KEY FK_C4AED2C9B897366B');
        $this->addSql('ALTER TABLE ecran DROP FOREIGN KEY FK_3FFAFD4AFB88E14F');
        $this->addSql('ALTER TABLE etat DROP FOREIGN KEY FK_55CAF762E73649EB');
        $this->addSql('ALTER TABLE hdd DROP FOREIGN KEY FK_F2CB48684827B9B2');
        $this->addSql('ALTER TABLE hdd DROP FOREIGN KEY FK_F2CB486844DE6F7C');
        $this->addSql('ALTER TABLE hdd DROP FOREIGN KEY FK_F2CB4868D5E86FF');
        $this->addSql('ALTER TABLE hdd DROP FOREIGN KEY FK_F2CB4868B897366B');
        $this->addSql('ALTER TABLE interface_port DROP FOREIGN KEY FK_FA9F4044AAFE0C83');
        $this->addSql('ALTER TABLE lecteur DROP FOREIGN KEY FK_11D3C9384827B9B2');
        $this->addSql('ALTER TABLE lecteur DROP FOREIGN KEY FK_11D3C93844DE6F7C');
        $this->addSql('ALTER TABLE lecteur DROP FOREIGN KEY FK_11D3C938D5E86FF');
        $this->addSql('ALTER TABLE lecteur DROP FOREIGN KEY FK_11D3C938B897366B');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CED6EB321B');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CEE73649EB');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CEAAFE0C83');
        $this->addSql('ALTER TABLE onduleur DROP FOREIGN KEY FK_C698A4E6FB88E14F');
        $this->addSql('ALTER TABLE onduleur DROP FOREIGN KEY FK_C698A4E6D5E86FF');
        $this->addSql('ALTER TABLE onduleur DROP FOREIGN KEY FK_C698A4E6B897366B');
        $this->addSql('ALTER TABLE port DROP FOREIGN KEY FK_43915DCCE73649EB');
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222F4827B9B2');
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222F44DE6F7C');
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222FD5E86FF');
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222FB897366B');
        $this->addSql('ALTER TABLE reference DROP FOREIGN KEY FK_AEA349133917014');
        $this->addSql('ALTER TABLE reference_mb DROP FOREIGN KEY FK_9B4ABE98D60943BC');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDFB88E14F');
        $this->addSql('ALTER TABLE souris DROP FOREIGN KEY FK_51B122A8FB88E14F');
        $this->addSql('ALTER TABLE souris DROP FOREIGN KEY FK_51B122A8D5E86FF');
        $this->addSql('ALTER TABLE souris DROP FOREIGN KEY FK_51B122A8B897366B');
        $this->addSql('ALTER TABLE taille DROP FOREIGN KEY FK_76508B381493816F');
        $this->addSql('ALTER TABLE type_cable DROP FOREIGN KEY FK_2AE543239A81106E');
        $this->addSql('ALTER TABLE type_cable DROP FOREIGN KEY FK_2AE54323FB88E14F');
        $this->addSql('ALTER TABLE type_clavier DROP FOREIGN KEY FK_7BA4F732D6EB321B');
        $this->addSql('ALTER TABLE type_cpu DROP FOREIGN KEY FK_B897B6CF3917014');
        $this->addSql('ALTER TABLE type_ecran DROP FOREIGN KEY FK_31F67ABDE73649EB');
        $this->addSql('ALTER TABLE type_hdd DROP FOREIGN KEY FK_F0DCAE891493816F');
        $this->addSql('ALTER TABLE type_ram DROP FOREIGN KEY FK_E5C6C4CE3366068');
        $this->addSql('DROP TABLE alimentation');
        $this->addSql('DROP TABLE boitier');
        $this->addSql('DROP TABLE cable');
        $this->addSql('DROP TABLE carte_mere');
        $this->addSql('DROP TABLE clavier');
        $this->addSql('DROP TABLE cpu');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE date_mis_ajour');
        $this->addSql('DROP TABLE ecran');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE hdd');
        $this->addSql('DROP TABLE interface_port');
        $this->addSql('DROP TABLE lecteur');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE onduleur');
        $this->addSql('DROP TABLE port');
        $this->addSql('DROP TABLE ram');
        $this->addSql('DROP TABLE reference');
        $this->addSql('DROP TABLE reference_mb');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE souris');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP TABLE type_cable');
        $this->addSql('DROP TABLE type_clavier');
        $this->addSql('DROP TABLE type_cpu');
        $this->addSql('DROP TABLE type_ecran');
        $this->addSql('DROP TABLE type_hdd');
        $this->addSql('DROP TABLE type_ram');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
