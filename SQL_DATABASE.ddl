CREATE TABLE Users (
    userId      INT AUTO_INCREMENT,
    firstName   VARCHAR(40) NOT NULL,
    lastName    VARCHAR(40),
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(50) NOT NULL,
    password    VARCHAR(30) NOT NULL,
    admin       BOOLEAN,
    accountStatus   VARCHAR(10),
    securityQuestion    VARCHAR(50),
    securityAnswer      VARCHAR(50),
    PRIMARY KEY (userId)
);

CREATE TABLE ProfilePics (
    picId       INT AUTO_INCREMENT,
    file        VARCHAR(10000),
    userId      INT,
    PRIMARY KEY (picId),
    FOREIGN KEY (userId) REFERENCES Users(userId)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Posts (
    postId      INT AUTO_INCREMENT,
    time        TIMESTAMP,
    title       VARCHAR(40),
    content     VARCHAR(10000),
    userId      INT,
    views       INT,
    allowAnonymousComments      BOOLEAN,
    PRIMARY KEY (postId),
    FOREIGN KEY (userId) REFERENCES Users(userId)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Comments (
    commentId   INT AUTO_INCREMENT,
    parentCommentId INT, -- parentCommentId refers to which commentId the comment is referring to --
    commentTime        TIMESTAMP,
    time        TIMESTAMP,
    postId      INT,
    userId      INT,
    comment     VARCHAR(500),
    PRIMARY KEY (commentId),
    FOREIGN KEY (postId) REFERENCES Posts(postId) 
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES Users(userId) 
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Upvotes (
    upvoteId    INT AUTO_INCREMENT,
    commentId   INT,
    userId      INT,

    PRIMARY KEY (upvoteId),
    FOREIGN KEY (commentId) REFERENCES Comments(commentId)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Downvotes (
    downvoteId    INT AUTO_INCREMENT,
    commentId   INT,
    userId      INT,

    PRIMARY KEY (downvoteId),
    FOREIGN KEY (commentId) REFERENCES Comments(commentId)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
        ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('ADMIN','COSC360-Group5','admin@cosc360group5.com','admin','cosc360group5', 1, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('King','Thompson','KinThompson@gmail.com','KinThompson','ThompsonKing', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Anderson','Aria','AndAria@gmail.com','AndAria','AriaAnderson', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Elizabeth','Charlotte','EliCharlotte@gmail.com','EliCharlotte','CharlotteElizabeth', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Sofia','Noah','SofNoah@gmail.com','SofNoah','NoahSofia', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Henry','Sebastian','HenSebastian@gmail.com','HenSebastian','SebastianHenry', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Garcia','William','GarWilliam@gmail.com','GarWilliam','WilliamGarcia', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Hill','Oliver','HilOliver@gmail.com','HilOliver','OliverHill', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Elijah','Sofia','EliSofia@gmail.com','EliSofia','SofiaElijah', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('King','Smith','KinSmith@gmail.com','KinSmith','SmithKing', 0, "ACTIVE");
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Amelia','Olivia','AmeOlivia@gmail.com','AmeOlivia','OliviaAmelia', 0, "ACTIVE");