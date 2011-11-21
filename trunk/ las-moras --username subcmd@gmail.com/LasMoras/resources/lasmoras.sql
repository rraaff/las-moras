CREATE  TABLE `BOUSER` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(255) NULL ,
  `apellido` VARCHAR(255) NULL ,
  `email` VARCHAR(150) NULL ,
  `usuario` VARCHAR(100) NULL ,
  `password` VARCHAR(4000) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `BOUNAME` (`usuario` ASC) );

INSERT INTO BOUSER(nombre, apellido, email, usuario, password)
VALUES ('marcos rafael', 'godoy', 'aas@ssdd.com', 'godoy', 'godoy'); 

INSERT INTO BOUSER(nombre, apellido, email, usuario, password)
VALUES ('pablo', 'mendoza', 'aas@ssdd.com', 'mendoza', 'mendoza'); 

CREATE  TABLE `SYSTEMUSER` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(255) NULL ,
  `apellido` VARCHAR(255) NULL ,
  `documento` VARCHAR(100) NULL ,
  `email` VARCHAR(150) NULL ,
  `usuario` VARCHAR(100) NULL ,
  `password` VARCHAR(4000) NULL ,
  `fechaCreacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`) ,
  INDEX `UNAME` (`usuario` ASC) );
  
CREATE  TABLE `TICKETS` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `systemuserID` INT NOT NULL ,
  `ticket` VARCHAR(255) NULL ,
  `fechaCarga` DATETIME NOT NULL,
  `ganador` INT NULL ,
  PRIMARY KEY (`id`) );
  
CREATE  TABLE `INSTANT_WIN` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ticketID` INT NULL ,
  `descripcion` VARCHAR(400) NOT NULL ,
  `inicio` DATETIME NOT NULL,
  `fin` DATETIME NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `type` VARCHAR(30) NOT NULL,
  `size` INT NOT NULL,
  `content` MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`id`) );
  
ALTER TABLE `SYSTEMUSER` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `TICKETS` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `INSTANT_WIN` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;