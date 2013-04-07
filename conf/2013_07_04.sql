CREATE USER `estate` IDENTIFIED BY 'real';
CREATE USER 'estate'@'localhost' IDENTIFIED BY '***';

GRANT USAGE ON * . * TO 'estate'@'localhost' IDENTIFIED BY '***' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON `sk` . * TO 'estate'@'localhost';

CREATE TABLE album (
  id int(11) NOT NULL AUTO_INCREMENT,
  artist varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO album (artist, title)
    VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO album (artist, title)
    VALUES  ('Adele',  '21');
INSERT INTO album (artist, title)
    VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO album (artist, title)
    VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO album (artist, title)
    VALUES  ('Gotye',  'Making  Mirrors');