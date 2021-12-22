#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

#------------------------------------------------------------
#  Base de données : `critique_photo`
#------------------------------------------------------------
DROP DATABASE IF EXISTS `critique_photo`;
CREATE DATABASE IF NOT EXISTS `critique_photo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `critique_photo`;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user Int  Auto_increment  NOT NULL ,
        login   Varchar (255) NOT NULL ,
        psw     Varchar (255) NOT NULL ,
        pseudo  Varchar (255) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo
#------------------------------------------------------------

CREATE TABLE photo(
        id_photo    Int  Auto_increment  NOT NULL ,
        title_photo Varchar (50) NOT NULL ,
        name_file   Varchar (255) NOT NULL ,
        post_at     Date NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT photo_PK PRIMARY KEY (id_photo)

	,CONSTRAINT photo_user_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id_comment Int  Auto_increment  NOT NULL ,
        comment    Varchar (255) NOT NULL ,
        create_at  Date NOT NULL ,
        id_user    Int NOT NULL ,
        id_photo   Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id_comment)

	,CONSTRAINT comment_user_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
	,CONSTRAINT comment_photo0_FK FOREIGN KEY (id_photo) REFERENCES photo(id_photo)
)ENGINE=InnoDB;

COMMIT;
