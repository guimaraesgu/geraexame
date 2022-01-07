SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `exame` ;
CREATE SCHEMA IF NOT EXISTS `exame` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `exame` ;

-- -----------------------------------------------------
-- Table `exame`.`Classificacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exame`.`Classificacao` ;

CREATE TABLE IF NOT EXISTS `exame`.`Classificacao` (
  `CodCla` INT NOT NULL,
  `NomCla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CodCla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exame`.`Tecnicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `exame`.`Tecnicas` ;

CREATE TABLE IF NOT EXISTS `exame`.`Tecnicas` (
  `CodTec` INT NOT NULL,
  `NomTec` VARCHAR(55) NOT NULL,
  `NivTec` INT NOT NULL,
  `CodCla` INT NOT NULL,
  PRIMARY KEY (`CodTec`),
  INDEX `fk_Tecnicas_Classificacao_idx` (`CodCla` ASC),
  CONSTRAINT `fk_Tecnicas_Classificacao`
    FOREIGN KEY (`CodCla`)
    REFERENCES `exame`.`Classificacao` (`CodCla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `exame`.`Classificacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `exame`;
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (1, 'Gokyo');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (2, 'Extra Gokyo');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (3, 'Kaeshi');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (4, 'Renraku');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (5, 'Renzoku');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (6, 'Ossae Komi');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (7, 'Shime');
INSERT INTO `exame`.`Classificacao` (`CodCla`, `NomCla`) VALUES (8, 'Kansetsu');

COMMIT;


-- -----------------------------------------------------
-- Data for table `exame`.`Tecnicas`
-- -----------------------------------------------------
START TRANSACTION;
USE `exame`;

-- -----------------
-- GOKYO
-- ----------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (1, 'De Ashi Barai', 1, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (2, 'Hiza Guruma', 3, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (3, 'Sassae Tsuri Komi Ashi', 2, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (4, 'O Goshi', 2, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (5, 'O Soto Gari', 1, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (6, 'Uki Goshi', 2, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (7, 'O Uchi Gari', 1, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (8, 'Ippon Seoi Nage', 2, 1);

INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (9, 'Ko Soto Gari', 2, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (10, 'Ko Uchi Gari', 3, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (11, 'Koshi Guruma', 4, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (12, 'Tsuri Komi Goshi', 3, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (13, 'Okuri Ashi Barai', 4, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (14, 'Tai Otoshi', 1, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (15, 'Harai Goshi', 3, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (16, 'Uchi Mata', 5, 1);

INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (17, 'Ko Soto Gake', 5, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (18, 'Tsuri Goshi', 4, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (19, 'Yoko Otoshi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (20, 'Ashi Guruma', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (21, 'Hane Goshi', 5, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (22, 'Harai Tsuri Komi Ashi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (23, 'Tomoe Nage', 5, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (24, 'Kata Guruma', 5, 1);

INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (25, 'Sumi Gaeshi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (26, 'Tani Otoshi', 4, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (27, 'Hane Makikomi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (28, 'Sukui Nage', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (29, 'Utsuri Goshi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (30, 'O Guruma', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (31, 'Soto Makikomi', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (32, 'Uki Otoshi', 6, 1);

INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (33, 'O Soto Guruma', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (34, 'Uki Waza', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (35, 'Yoko Wakare', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (36, 'Yoko Guruma', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (37, 'Ushiro Goshi', 6, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (38, 'Ura Nage', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (39, 'Sumi Otoshi', 7, 1);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (40, 'Yoko Gake', 7, 1);

-- -----------------
-- EXTRA GOKYO
-- -----------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (41, 'Obi Otoshi', 7, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (42, 'Seoi Otoshi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (43, 'Yama Arashi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (44, 'Morote Gari', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (45, 'Kuchiki Taoshi', 6, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (46, 'Kibisu Gaeshi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (47, 'Uchi Mata Sukashi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (48, 'Morote Seoi Nage', 3, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (49, 'Eri Seoi Nage', 3, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (50, 'Waki Otoshi', 4, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (51, 'Te Guruma', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (52, 'Sode Tsuri Komi Goshi', 4, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (53, 'O Soto Otoshi', 6, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (54, 'Tsubame Gaeshi', 5, 2);

INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (55, 'O Uchi Gaeshi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (60, 'Tawara Gaeshi', 6, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (61, 'Hikikomi Gaeshi', 6, 2);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (62, 'Obi Tori Gaeshi', 6, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (63, 'Daki Wakare', 6, 2);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (64, 'Harai Makikomi', 7, 2);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (65, 'O Soto Makikomi', 6, 2);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (66, 'Uchi Mata Makikomi', 7, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (67, 'Ko Uchi Makikomi', 5, 2);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (68, 'Ni Dan Ko Soto Gake', 7, 2);

-- ------------------
-- RENRAKU
-- ------------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (69, 'De Ashi Barai > Tai Otoshi', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (70, 'Morote Seoi Nage > Ko Uchi Gari', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (71, 'Ippon Seoi Nage > O Uchi Gari', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (72, 'Tai Otoshi > O Uchi Gari', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (73, 'Ko Uchi Gari > Morote Seoi Nage', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (74, 'Sassae Tsuri Komi Ashi > De Ashi Barai', 3, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (75, 'O Soto Gari > Harai Goshi', 4, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (76, 'Harai Goshi > O Soto Gari', 4, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (77, 'Harai Goshi > O Uchi Gari', 4, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (78, 'Ko Uchi Gari > De Ashi Barai', 4, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (79, 'Ippon Seoi Nage > Ko Uchi Makikomi', 5, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (80, 'Ippon Seoi Nage > Waki Otoshi', 5, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (81, 'Uchi Mata > Ko Uchi Gari', 5, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (82, 'Ko Soto Gari > Tai Otoshi', 5, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (83, 'Sassae Tsuri Komi Ashi > Okuri Ashi Barai', 6, 4);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (84, 'Sassae Tsuri Komi Ashi > Ko Soto Gake', 6, 4);

-- ------------------
-- RENZOKU
-- ------------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (85, 'De Ashi Barai > O Soto Gari', 3, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (86, 'O Soto Gari > Ko Soto Gari', 3, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (87, 'Ko Soto Gari > Tani Otoshi', 4, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (88, 'Ko Uchi Gari > O Uchi Gari', 4, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (89, 'O Goshi > Uki Goshi', 4, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (90, 'Uki Goshi > Koshi Guruma', 4, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (91, 'O Soto Gari > Ko Soto Gake', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (92, 'Hiza Guruma > Harai Goshi', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (93, 'Morote Seoi Nage > Seoi Otoshi', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (94, 'Tai Otoshi > Uchi Mata', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (95, 'Ko Uchi Gari > Ko Uchi Makikomi', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (96, 'Harai Goshi > Harai Makikomi', 5, 5);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (97, 'Uki Goshi> Uchi Mata', 5, 5);

-- ------------------
-- KAESHI
-- ------------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (98, 'O Soto Gari > O Soto Gari', 3, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (99, 'O Soto Gari > Harai Goshi', 3, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (100, 'De Ashi Barai > Tsubame Gaeshi', 4, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (101, 'De Ashi Barai > Sassae Tsuri Komi Ashi', 4, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (102, 'Sassae Tsuri Komi Ashi > Ko Uchi Gari', 4, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (103, 'Seoi Nage > Te Guruma', 4, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (104, 'Hiza Guruma > O Uchi Gari', 4, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (105, 'Ko Soto Gari > Tai Otoshi', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (106, 'O Soto Gari > Te Guruma', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (107, 'Hiza Guruma > Hiza Guruma', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (108, 'Ippon Seoi Nage > Tani Otoshi', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (109, 'Uchi Mata > Te Guruma', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (110, 'O Uchi Gari > Tomoe Nage', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (111, 'Uchi Mata > Tai Otoshi', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (112, 'Tomoe Nage > O Uchi Gari', 5, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (113, 'Hane Goshi > Ushiro Goshi', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (114, 'Ko Soto Gake > Uchi Mata', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (115, 'O Goshi > Ushiro Goshi', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (116, 'Ashi Guruma > Yoko Guruma', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (117, 'O Uchi Gari > Uki Waza', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (118, 'Koshi Guruma > Tani Otoshi', 6, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (119, 'Harai Tsuri Komi Ashi > Ko Soto Gake', 7, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (120, 'Kata Guruma > Hikikomi Gaeshi', 7, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (121, 'O Uchi Gari > Utsuri Goshi', 7, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (122, 'Koshi Guruma > Utsuri Goshi', 7, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (123, 'De Ashi Barai > Harai Tsuri Komi Ashi', 7, 3);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (124, 'De Ashi Barai > Yoko Wakare', 7, 3);

-- -----------------
-- OSSAE KOMI 
-- -----------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (125, 'Hon Kesa Gatame', 1, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (126, 'Kuzure Kesa Gatame', 2, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (127, 'Makura Kesa Gatame', 2, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (128, 'Ushiro Kesa Gatame', 3, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (129, 'Yoko Shiho Gatame', 1, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (130, 'Kuzure Yoko Shiho Gatame', 2, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (131, 'Kami Shiho Gatame', 1, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (132, 'Kuzure Kami Shiho Gatame', 2, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (133, 'Tate Shiho Gatame', 3, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (134, 'Kuzure Tate Shiho Gatame', 3, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (135, 'Kata Gatame', 3, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (136, 'Mune Gatame', 4, 6);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (137, 'Sankaku Gatame', 4, 6);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (138, 'Uki Gatame', 5, 6);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (139, 'Ura Gatame', 5, 6);

-- -----------------
-- SHIME
-- -----------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (140, 'Nami Juji Jime', 4, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (141, 'Gyaku Juji Jime', 4, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (142, 'Kata Juji Jime', 4, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (143, 'Tsukkomi Jime', 4, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (144, 'Hadaka Jime', 5, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (145, 'Okuri Eri Jime', 5, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (146, 'Kata Ha Jime', 6, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (147, 'Sode Guruma Jime', 6, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (148, 'Koshi Jime', 5, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (149, 'Ryo Te Jime', 5, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (150, 'Sankaku Jime', 6, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (151, 'Kata Te Jime', 6, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (152, 'Morote Jime', 7, 7);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (153, 'Jigoku Jime', 6, 7);


-- -----------------
-- KANSETSU
-- -----------------
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (154, 'Ude Hishigi Juji Gatame', 4, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (155, 'Ude Garame', 5, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (156, 'Ude Hishigi Ude Gatame', 5, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (157, 'Ude Hishigi Ashi Gatame', 6, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (158, 'Ude Hishigi Hiza Gatame', 5, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (159, 'Ude Hishigi Te Gatame', 5, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (160, 'Ude Hishigi Hara Gatame', 6, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (161, 'Ude Hishigi Waki Gatame', 6, 8);
INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (162, 'Ude Hishigi Sankaku Gatame', 6, 8);
-- INSERT INTO `exame`.`Tecnicas` (`CodTec`, `NomTec`, `NivTec`, `CodCla`) VALUES (163, 'Kanuki Gatame', 7, 8);


COMMIT;

