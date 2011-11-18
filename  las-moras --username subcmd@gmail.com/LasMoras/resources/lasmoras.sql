CREATE  TABLE `SYSTEMUSER` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(255) NULL ,
  `apellido` VARCHAR(255) NULL ,
  `documento` VARCHAR(100) NULL ,
  `email` VARCHAR(150) NULL ,
  `usuario` VARCHAR(100) NULL ,
  `password` VARCHAR(4000) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `UNAME` (`usuario` ASC) );
  
CREATE  TABLE `TICKETS` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `systemuserID` INT NOT NULL ,
  `ticket` VARCHAR(255) NULL ,
  `ganador` INT NULL ,
  PRIMARY KEY (`id`) );
  
// hace falta guardar los logins?
CREATE  TABLE `INSTANT_WIN` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ticketID` INT NOT NULL ,
  `description` VARCHAR(400) NULL ,
  `horaInicio` INT NULL ,
  `horaFin` INT NULL ,
  PRIMARY KEY (`id`) );