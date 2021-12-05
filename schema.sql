CREATE DATABASE IF NOT EXISTS bugme;

USE bugme;

CREATE TABLE Users(
    id INTEGER AUTO_INCREMENT,
    firstName VARCHAR(100),
    lastName VARCHAR(100),
    userPassword VARCHAR(255),
    email VARCHAR(100),
    date_joined DATETIME,
    PRIMARY KEY(id));

CREATE TABLE Issues (
    id INTEGER AUTO_INCREMENT,
    title VARCHAR(100),
    description TEXT,
    type VARCHAR(100),
    priority VARCHAR(100),
    status VARCHAR(100),
    assigned_to INTEGER,
    created_by INTEGER,
    created DATETIME,
    updated DATETIME,
    PRIMARY KEY(id));

INSERT into Users(firstname,lastname,userPassword,email,date_joined)
VALUES ("Zoey","Duncan",'$2y$10$212bfn3kPURo380mx65phOALkQu9Zhjq/lyj22kii1vuJH1sIPzre',"admin@project2.com",NOW());