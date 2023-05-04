DROP DATABASE IF EXISTS Webbit;

CREATE DATABASE Webbit;

USE Webbit;

CREATE TABLE Roles (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  role VARCHAR(256) NOT NULL
); 

INSERT INTO `roles`(`id`, `role`) VALUES ('1','Member');

CREATE TABLE Users (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(16) NOT NULL UNIQUE,
  pwd VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  karmapoints INT NOT NULL DEFAULT 0,
  description VARCHAR(256) NULL,
  country VARCHAR(256) NULL,
  role_id INT NOT NULL DEFAULT 1,
  created_in DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES Roles(id)
); 

CREATE TABLE Category (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(16) NOT NULL,
  description VARCHAR(500) NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(id)
  
); 

CREATE TABLE Posts (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  text LONGTEXT NOT NULL,
  user_id INT NOT NULL,
  karmapoints INT NOT NULL DEFAULT 0,
  category_id INT NOT NULL,
  created_in DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(id),
  FOREIGN KEY (category_id) REFERENCES Category(id)
); 

CREATE TABLE Comments (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  text LONGTEXT NOT NULL,
  karmapoints INT NOT NULL DEFAULT 0,
  user_id INT NOT NULL,
  post_id INT NOT NULL,
  created_in DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(id),
  FOREIGN KEY (post_id) REFERENCES Posts(id)
); 

CREATE TABLE karmapoints(
  users_id INT NOT NULL,
  posts_id INT NOT NULL,
  vote_value INT NOT NULL DEFAULT 0,
  votestate VARCHAR(16) NOT NULL,
  FOREIGN KEY (users_id) REFERENCES Users(id),
  FOREIGN KEY (posts_id) REFERENCES Posts(id)
);

/* user: admin || password: admin123 */
INSERT INTO `users`(`id`, `username`, `pwd`, `email`) VALUES ('1','admin','$2y$10$IecB2KqGacpkVUTNVpiqv.Oue0uK/sRU1abbVEcgQ5tk3Sqbg9DPS','admin@webbit.com');

INSERT INTO `category`(`id`, `title`, `description`, `user_id`) VALUES ('1','welcome','The "Welcome" category is a space where users can introduce themselves and share a bit about who they are. This category is a great place to post when you are new to a community or platform, as it allows other members to get to know you and welcome you into Webbit.','1');


