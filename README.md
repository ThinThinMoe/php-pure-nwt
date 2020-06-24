# php-pure-nwt

#### Establish Localhost 
- If you use apache, set up as follows in vhosts file:

  - Listen 1010
    <VirtualHost *:1010>
      DocumentRoot "D:\SampleProject(CURD)\php-pure-nwt"
      <Directory D:\SampleProject(CURD)\php-pure-nwt\>
            DirectoryIndex index.php
            AllowOverride All
            Require all granted
      </Directory>
    </VirtualHost>

#### Call http://localhost:1010

##### Establish Database 
- Connect Mysql with your server, username & password that we use in project
define('DB_SERVER', 'localhost'); <== server host
define('DB_USERNAME', 'root'); <== username
define('DB_PASSWORD', ''); <== password
define('DB_NAME', 'demodb'); <== database name

- Create a database
  - CREATE SCHEMA `demodb` ;

- Create a table
  - CREATE TABLE `users` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30) NOT NULL,
    `address` VARCHAR(30) NOT NULL,
    `phone` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);

- Insert data in table
  - INSERT INTO users (name, address, phone)
    VALUES ('John', 'Russia', '23456'),
    ('Mary', 'Myanmar', '521168'),
    ('Ruu', 'China', '484615'),
    ('Haru', 'Japan', '84765');


*After creating a database, you can test CRUD.*
:yum::hugs:	:smile:	