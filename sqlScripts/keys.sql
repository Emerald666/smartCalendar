CREATE TABLE  `calendar`.`keys` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`key` INT( 35 ) NOT NULL ,
`name` VARCHAR( 40 ) NOT NULL ,
UNIQUE (
`key` ,
`name`
)
) ENGINE = MYISAM ;
