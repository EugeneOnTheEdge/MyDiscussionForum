CREATE TABLE Users (
    userId      INT AUTO_INCREMENT,
    firstName   VARCHAR(40) NOT NULL,
    lastName    VARCHAR(40),
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(50) NOT NULL,
    password    VARCHAR(255) NOT NULL,
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
    commentDeleted  VARCHAR(10), -- <EMPTY> means comment is not deleted; "USER" means comment has been deleted by user; same applies with "ADMIN"
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

INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('ADMIN','COSC360-Group5','admin@cosc360group5.com','admin','$2y$10$bnrUznhxnWFhtNMPi8QbmujL4wGLmpU0E9YRWWslziKyHS2U2JQF.', 1, "ACTIVE"); -- PWD: cosc360group5
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('King','Thompson','KinThompson@gmail.com','KinThompson','$2y$10$By66YrgdJbS1QgP9cZ5am.6vqqnhEMYZWV2ewrvMkT4tcQ0.3fMkK', 0, "ACTIVE"); -- PWD: ThompsonKing
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Anderson','Aria','AndAria@gmail.com','AndAria','$2y$10$Ym80VJL5eBOEx73MhVTrp.me0BFmXm4lkVFHtLyZPVMnQ/d4EBFZC', 0, "ACTIVE"); -- PWD: AriaAnderson
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Elizabeth','Charlotte','EliCharlotte@gmail.com','EliCharlotte','$2y$10$r1L.gN7h8948ZD1MyTkB9.BFU5X44faMOcQJoOTgT8TfkK.Er/v/m', 0, "ACTIVE"); -- PWD: CharlotteElizabeth
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Sofia','Noah','SofNoah@gmail.com','SofNoah','$2y$10$acNeJ2qtTnm6qDYzGo11b.mzR6PtbJBo/O7j5QSyrbnbsDUdJ/4pq', 0, "ACTIVE"); -- PWD: NoahSofia
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Henry','Sebastian','HenSebastian@gmail.com','HenSebastian','$2y$10$iAL4j5f2AntwYWdIh9zbveeQImKt6IVYGMNlzjxuBhWVR7j/gfcUi', 0, "ACTIVE"); -- PWD: SebastianHenry
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Garcia','William','GarWilliam@gmail.com','GarWilliam','$2y$10$iI8yfEcCYCwk4H27pJzNROPDdaPa2IvB4aX9/C.PenArDM3.rDk1.', 0, "ACTIVE"); -- PWD: WilliamGarcia
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Hill','Oliver','HilOliver@gmail.com','HilOliver','$2y$10$i6o81Jkqbaj19Dv5Q8L3wOk.pHAZP.U5nqLyv922TnKkIU9TFE8nu', 0, "ACTIVE"); -- PWD: OliverHill
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Elijah','Sofia','EliSofia@gmail.com','EliSofia','$2y$10$dTMJdMCfaZpoGDkJt37SjOXz7YDOQ.fzuSHp0E4sxj8xpxNVfeVcq', 0, "ACTIVE"); -- PWD: SofiaElijah
INSERT INTO Users(firstName, lastName, email, username, password, admin, accountStatus) VALUES ('Amelia','Olivia','AmeOlivia@gmail.com','AmeOlivia','$2y$10$B3Pd9Q4v8kQERV2.uOf1huWp48lHOn8CCVIyuoXSyRqeL975mtWfq', 0, "ACTIVE"); -- PWD: OliviaAmelia