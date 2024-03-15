CREATE Table users(
    id  int(6) AUTO_INCREMENT NOT NULL,
    username VARCHAR(20) UNIQUE,
    password VARCHAR(10),
    PRIMARY KEY(id)
);
CREATE TABLE tasks(
    id int(6) AUTO_INCREMENT NOT NULL,
    title VARCHAR(30),
    descriptions text,
    Type_s ENUM('group','solo'),
    Task_status enum('comleted','pending','processing'),
    img VARCHAR(100),
    due_date  DATETIME NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    initiator int(6),
    PRIMARY key(id),
    Foreign Key (initiator) REFERENCES users(id)
);
CREATE TABLE group_task(
    id int AUTO_INCREMENT not null,
    task int(6),
    task_users int(6),
    PRIMARY KEY (id),
    Foreign Key (task) REFERENCES tasks(id),
    Foreign Key (task_users) REFERENCES users(id)
);
INSERT INTO users (username,password) VALUES ("apple","weer");
ALTER TABLE users
    CHANGE `username` `username` VARCHAR(20) UNIQUE;
TRUNCATE users;