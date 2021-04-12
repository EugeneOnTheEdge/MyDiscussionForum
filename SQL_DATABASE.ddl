CREATE TABLE Users (
    userId      INT AUTO_INCREMENT,
    firstName   VARCHAR(40) NOT NULL,
    lastName    VARCHAR(40),
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(50) NOT NULL,
    password    VARCHAR(30) NOT NULL,
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
<<<<<<< HEAD
    commentTime        TIMESTAMP,
=======
    time        TIMESTAMP,
>>>>>>> 3eb9c8b5599497216fa257abab1862da073c5a02
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

INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('King','Thompson','KinThompson@gmail.com','KinThompson','ThompsonKing');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Anderson','Aria','AndAria@gmail.com','AndAria','AriaAnderson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Elizabeth','Charlotte','EliCharlotte@gmail.com','EliCharlotte','CharlotteElizabeth');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sofia','Noah','SofNoah@gmail.com','SofNoah','NoahSofia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Henry','Sebastian','HenSebastian@gmail.com','HenSebastian','SebastianHenry');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Garcia','William','GarWilliam@gmail.com','GarWilliam','WilliamGarcia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Hill','Oliver','HilOliver@gmail.com','HilOliver','OliverHill');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Elijah','Sofia','EliSofia@gmail.com','EliSofia','SofiaElijah');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('King','Smith','KinSmith@gmail.com','KinSmith','SmithKing');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Amelia','Olivia','AmeOlivia@gmail.com','AmeOlivia','OliviaAmelia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Olivia','Robinson','OliRobinson@gmail.com','OliRobinson','RobinsonOlivia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Lewis','Clark','LewClark@gmail.com','LewClark','ClarkLewis');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Martinez','Lewis','MarLewis@gmail.com','MarLewis','LewisMartinez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Wilson','Ella','WilElla@gmail.com','WilElla','EllaWilson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Daniel','Sebastian','DanSebastian@gmail.com','DanSebastian','SebastianDaniel');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Abigail','William','AbiWilliam@gmail.com','AbiWilliam','WilliamAbigail');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Wilson','Flores','WilFlores@gmail.com','WilFlores','FloresWilson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Flores','Williams','FloWilliams@gmail.com','FloWilliams','WilliamsFlores');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Noah','Mason','NoaMason@gmail.com','NoaMason','MasonNoah');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Jacob','Emma','JacEmma@gmail.com','JacEmma','EmmaJacob');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Mila','Harris','MilHarris@gmail.com','MilHarris','HarrisMila');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('King','Garcia','KinGarcia@gmail.com','KinGarcia','GarciaKing');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Harris','Abigail','HarAbigail@gmail.com','HarAbigail','AbigailHarris');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('James','William','JamWilliam@gmail.com','JamWilliam','WilliamJames');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Elizabeth','Smith','EliSmith@gmail.com','EliSmith','SmithElizabeth');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Jacob','Benjamin','JacBenjamin@gmail.com','JacBenjamin','BenjaminJacob');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Lee','Oliver','LeeOliver@gmail.com','LeeOliver','OliverLee');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Samuel','Alexander','SamAlexander@gmail.com','SamAlexander','AlexanderSamuel');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Ella','Mia','EllMia@gmail.com','EllMia','MiaElla');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('William','Allen','WilAllen@gmail.com','WilAllen','AllenWilliam');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Scott','Nguyen','ScoNguyen@gmail.com','ScoNguyen','NguyenScott');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Thomas','Harris','ThoHarris@gmail.com','ThoHarris','HarrisThomas');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Alexander','Taylor','AleTaylor@gmail.com','AleTaylor','TaylorAlexander');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Anderson','Wright','AndWright@gmail.com','AndWright','WrightAnderson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sofia','Amelia','SofAmelia@gmail.com','SofAmelia','AmeliaSofia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Flores','Lewis','FloLewis@gmail.com','FloLewis','LewisFlores');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Rodriguez','Aiden','RodAiden@gmail.com','RodAiden','AidenRodriguez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sofia','Clark','SofClark@gmail.com','SofClark','ClarkSofia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Gonzalez','Miller','GonMiller@gmail.com','GonMiller','MillerGonzalez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Perez','Mason','PerMason@gmail.com','PerMason','MasonPerez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Hernandez','Robinson','HerRobinson@gmail.com','HerRobinson','RobinsonHernandez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Benjamin','Elijah','BenElijah@gmail.com','BenElijah','ElijahBenjamin');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Lee','Robinson','LeeRobinson@gmail.com','LeeRobinson','RobinsonLee');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sebastian','Emma','SebEmma@gmail.com','SebEmma','EmmaSebastian');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Harris','Elijah','HarElijah@gmail.com','HarElijah','ElijahHarris');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('William','Miller','WilMiller@gmail.com','WilMiller','MillerWilliam');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Harris','William','HarWilliam@gmail.com','HarWilliam','WilliamHarris');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Ramirez','Nguyen','RamNguyen@gmail.com','RamNguyen','NguyenRamirez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Harper','Aiden','HarAiden@gmail.com','HarAiden','AidenHarper');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Hernandez','Moore','HerMoore@gmail.com','HerMoore','MooreHernandez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Martin','Liam','MarLiam@gmail.com','MarLiam','LiamMartin');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Anderson','James','AndJames@gmail.com','AndJames','JamesAnderson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sophia','Hill','SopHill@gmail.com','SopHill','HillSophia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Martinez','Martinez','MarMartinez@gmail.com','MarMartinez','MartinezMartinez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Lucas','Martin','LucMartin@gmail.com','LucMartin','MartinLucas');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Oliver','King','OliKing@gmail.com','OliKing','KingOliver');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Brown','Ella','BroElla@gmail.com','BroElla','EllaBrown');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Ava','Jones','AvaJones@gmail.com','AvaJones','JonesAva');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Henry','Nguyen','HenNguyen@gmail.com','HenNguyen','NguyenHenry');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Michael','Hernandez','MicHernandez@gmail.com','MicHernandez','HernandezMichael');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Michael','Jackson','MicJackson@gmail.com','MicJackson','JacksonMichael');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Elizabeth','Elijah','EliElijah@gmail.com','EliElijah','ElijahElizabeth');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Noah','Isabella','NoaIsabella@gmail.com','NoaIsabella','IsabellaNoah');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Aria','Gonzalez','AriGonzalez@gmail.com','AriGonzalez','GonzalezAria');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sebastian','Sofia','SebSofia@gmail.com','SebSofia','SofiaSebastian');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Hill','Lewis','HilLewis@gmail.com','HilLewis','LewisHill');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Torres','Amelia','TorAmelia@gmail.com','TorAmelia','AmeliaTorres');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Henry','Olivia','HenOlivia@gmail.com','HenOlivia','OliviaHenry');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Noah','William','NoaWilliam@gmail.com','NoaWilliam','WilliamNoah');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Johnson','King','JohKing@gmail.com','JohKing','KingJohnson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Anderson','Emily','AndEmily@gmail.com','AndEmily','EmilyAnderson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Mila','Jackson','MilJackson@gmail.com','MilJackson','JacksonMila');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sofia','Young','SofYoung@gmail.com','SofYoung','YoungSofia');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Wilson','Robinson','WilRobinson@gmail.com','WilRobinson','RobinsonWilson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Lopez','Wilson','LopWilson@gmail.com','LopWilson','WilsonLopez');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Mason','Emma','MasEmma@gmail.com','MasEmma','EmmaMason');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Wilson','Jackson','WilJackson@gmail.com','WilJackson','JacksonWilson');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Liam','Smith','LiaSmith@gmail.com','LiaSmith','SmithLiam');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Sebastian','Gonzalez','SebGonzalez@gmail.com','SebGonzalez','GonzalezSebastian');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Mason','Wright','MasWright@gmail.com','MasWright','WrightMason');
INSERT INTO Users(firstName, lastName, email, username, password) VALUES ('Ella','Sophia','EllSophia@gmail.com','EllSophia','SophiaElla');