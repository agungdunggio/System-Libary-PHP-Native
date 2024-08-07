CREATE TABLE users (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) not NULL,
    password VARCHAR(255) not NULL 
) engine = innodb;