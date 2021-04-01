CREATE TABLE user{
    userId      INT IDENTITY,
    firstName   VARCHAR(40) NOT NULL,
    lastName    VARCHAR(40),
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(50) NOT NULL,
    password    VARCHAR(30),
    PRIMARY KEY (userId)
}

CREATE TABLE profilepic{
    picId       INT IDENTITY,
    file        VARCHAR(MAX),
    userId      INT,
    PRIMARY KEY (picId),
    FOREIGN KEY (userId) REFERENCES user(userId)
        ON UPDATE CASCADE ON DELETE CASCADE
}

CREATE TABLE post{
    postId      INT IDENTITY,
    time        TIMESTAMP,
    title       VARCHAR(40),
    content     VARCHAR(MAX),
    userId      INT,
    PRIMARY KEY (postId),
    FOREIGN KEY (userId) REFERENCES user(userId) 
        ON UPDATE CASCADE ON DELETE CASCADE
}

CREATE TABLE comment{
    commentId   INT IDENTITY,
    time        TIMESTAMP,
    postId      INT,
    userId      INT,
    PRIMARY KEY (commentId),
    FOREIGN KEY (postId) REFERENCES post(postId) 
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES user(userId) 
        ON UPDATE CASCADE ON DELETE CASCADE
}

-- Users (Random 40)----------------------------------------------------------------------------------------

INSERT user(firstName, lastName, email, username, password) VALUES ('King','Thompson','KinThompson@gmail.com','KinThompson','ThompsonKing');
INSERT user(firstName, lastName, email, username, password) VALUES ('Anderson','Aria','AndAria@gmail.com','AndAria','AriaAnderson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Elizabeth','Charlotte','EliCharlotte@gmail.com','EliCharlotte','CharlotteElizabeth');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sofia','Noah','SofNoah@gmail.com','SofNoah','NoahSofia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Henry','Sebastian','HenSebastian@gmail.com','HenSebastian','SebastianHenry');
INSERT user(firstName, lastName, email, username, password) VALUES ('Garcia','William','GarWilliam@gmail.com','GarWilliam','WilliamGarcia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Hill','Oliver','HilOliver@gmail.com','HilOliver','OliverHill');
INSERT user(firstName, lastName, email, username, password) VALUES ('Elijah','Sofia','EliSofia@gmail.com','EliSofia','SofiaElijah');
INSERT user(firstName, lastName, email, username, password) VALUES ('King','Smith','KinSmith@gmail.com','KinSmith','SmithKing');
INSERT user(firstName, lastName, email, username, password) VALUES ('Amelia','Olivia','AmeOlivia@gmail.com','AmeOlivia','OliviaAmelia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Olivia','Robinson','OliRobinson@gmail.com','OliRobinson','RobinsonOlivia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Lewis','Clark','LewClark@gmail.com','LewClark','ClarkLewis');
INSERT user(firstName, lastName, email, username, password) VALUES ('Martinez','Lewis','MarLewis@gmail.com','MarLewis','LewisMartinez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Wilson','Ella','WilElla@gmail.com','WilElla','EllaWilson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Daniel','Sebastian','DanSebastian@gmail.com','DanSebastian','SebastianDaniel');
INSERT user(firstName, lastName, email, username, password) VALUES ('Abigail','William','AbiWilliam@gmail.com','AbiWilliam','WilliamAbigail');
INSERT user(firstName, lastName, email, username, password) VALUES ('Wilson','Flores','WilFlores@gmail.com','WilFlores','FloresWilson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Flores','Williams','FloWilliams@gmail.com','FloWilliams','WilliamsFlores');
INSERT user(firstName, lastName, email, username, password) VALUES ('Noah','Mason','NoaMason@gmail.com','NoaMason','MasonNoah');
INSERT user(firstName, lastName, email, username, password) VALUES ('Jacob','Emma','JacEmma@gmail.com','JacEmma','EmmaJacob');
INSERT user(firstName, lastName, email, username, password) VALUES ('Mila','Harris','MilHarris@gmail.com','MilHarris','HarrisMila');
INSERT user(firstName, lastName, email, username, password) VALUES ('King','Garcia','KinGarcia@gmail.com','KinGarcia','GarciaKing');
INSERT user(firstName, lastName, email, username, password) VALUES ('Harris','Abigail','HarAbigail@gmail.com','HarAbigail','AbigailHarris');
INSERT user(firstName, lastName, email, username, password) VALUES ('James','William','JamWilliam@gmail.com','JamWilliam','WilliamJames');
INSERT user(firstName, lastName, email, username, password) VALUES ('Elizabeth','Smith','EliSmith@gmail.com','EliSmith','SmithElizabeth');
INSERT user(firstName, lastName, email, username, password) VALUES ('Jacob','Benjamin','JacBenjamin@gmail.com','JacBenjamin','BenjaminJacob');
INSERT user(firstName, lastName, email, username, password) VALUES ('Lee','Oliver','LeeOliver@gmail.com','LeeOliver','OliverLee');
INSERT user(firstName, lastName, email, username, password) VALUES ('Samuel','Alexander','SamAlexander@gmail.com','SamAlexander','AlexanderSamuel');
INSERT user(firstName, lastName, email, username, password) VALUES ('Ella','Mia','EllMia@gmail.com','EllMia','MiaElla');
INSERT user(firstName, lastName, email, username, password) VALUES ('William','Allen','WilAllen@gmail.com','WilAllen','AllenWilliam');
INSERT user(firstName, lastName, email, username, password) VALUES ('Scott','Nguyen','ScoNguyen@gmail.com','ScoNguyen','NguyenScott');
INSERT user(firstName, lastName, email, username, password) VALUES ('Thomas','Harris','ThoHarris@gmail.com','ThoHarris','HarrisThomas');
INSERT user(firstName, lastName, email, username, password) VALUES ('Alexander','Taylor','AleTaylor@gmail.com','AleTaylor','TaylorAlexander');
INSERT user(firstName, lastName, email, username, password) VALUES ('Anderson','Wright','AndWright@gmail.com','AndWright','WrightAnderson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sofia','Amelia','SofAmelia@gmail.com','SofAmelia','AmeliaSofia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Flores','Lewis','FloLewis@gmail.com','FloLewis','LewisFlores');
INSERT user(firstName, lastName, email, username, password) VALUES ('Rodriguez','Aiden','RodAiden@gmail.com','RodAiden','AidenRodriguez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sofia','Clark','SofClark@gmail.com','SofClark','ClarkSofia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Gonzalez','Miller','GonMiller@gmail.com','GonMiller','MillerGonzalez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Perez','Mason','PerMason@gmail.com','PerMason','MasonPerez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Hernandez','Robinson','HerRobinson@gmail.com','HerRobinson','RobinsonHernandez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Benjamin','Elijah','BenElijah@gmail.com','BenElijah','ElijahBenjamin');
INSERT user(firstName, lastName, email, username, password) VALUES ('Lee','Robinson','LeeRobinson@gmail.com','LeeRobinson','RobinsonLee');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sebastian','Emma','SebEmma@gmail.com','SebEmma','EmmaSebastian');
INSERT user(firstName, lastName, email, username, password) VALUES ('Harris','Elijah','HarElijah@gmail.com','HarElijah','ElijahHarris');
INSERT user(firstName, lastName, email, username, password) VALUES ('William','Miller','WilMiller@gmail.com','WilMiller','MillerWilliam');
INSERT user(firstName, lastName, email, username, password) VALUES ('Harris','William','HarWilliam@gmail.com','HarWilliam','WilliamHarris');
INSERT user(firstName, lastName, email, username, password) VALUES ('Ramirez','Nguyen','RamNguyen@gmail.com','RamNguyen','NguyenRamirez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Harper','Aiden','HarAiden@gmail.com','HarAiden','AidenHarper');
INSERT user(firstName, lastName, email, username, password) VALUES ('Hernandez','Moore','HerMoore@gmail.com','HerMoore','MooreHernandez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Martin','Liam','MarLiam@gmail.com','MarLiam','LiamMartin');
INSERT user(firstName, lastName, email, username, password) VALUES ('Anderson','James','AndJames@gmail.com','AndJames','JamesAnderson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sophia','Hill','SopHill@gmail.com','SopHill','HillSophia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Martinez','Martinez','MarMartinez@gmail.com','MarMartinez','MartinezMartinez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Lucas','Martin','LucMartin@gmail.com','LucMartin','MartinLucas');
INSERT user(firstName, lastName, email, username, password) VALUES ('Oliver','King','OliKing@gmail.com','OliKing','KingOliver');
INSERT user(firstName, lastName, email, username, password) VALUES ('Brown','Ella','BroElla@gmail.com','BroElla','EllaBrown');
INSERT user(firstName, lastName, email, username, password) VALUES ('Ava','Jones','AvaJones@gmail.com','AvaJones','JonesAva');
INSERT user(firstName, lastName, email, username, password) VALUES ('Henry','Nguyen','HenNguyen@gmail.com','HenNguyen','NguyenHenry');
INSERT user(firstName, lastName, email, username, password) VALUES ('Michael','Hernandez','MicHernandez@gmail.com','MicHernandez','HernandezMichael');
INSERT user(firstName, lastName, email, username, password) VALUES ('Michael','Jackson','MicJackson@gmail.com','MicJackson','JacksonMichael');
INSERT user(firstName, lastName, email, username, password) VALUES ('Elizabeth','Elijah','EliElijah@gmail.com','EliElijah','ElijahElizabeth');
INSERT user(firstName, lastName, email, username, password) VALUES ('Noah','Isabella','NoaIsabella@gmail.com','NoaIsabella','IsabellaNoah');
INSERT user(firstName, lastName, email, username, password) VALUES ('Aria','Gonzalez','AriGonzalez@gmail.com','AriGonzalez','GonzalezAria');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sebastian','Sofia','SebSofia@gmail.com','SebSofia','SofiaSebastian');
INSERT user(firstName, lastName, email, username, password) VALUES ('Hill','Lewis','HilLewis@gmail.com','HilLewis','LewisHill');
INSERT user(firstName, lastName, email, username, password) VALUES ('Torres','Amelia','TorAmelia@gmail.com','TorAmelia','AmeliaTorres');
INSERT user(firstName, lastName, email, username, password) VALUES ('Henry','Olivia','HenOlivia@gmail.com','HenOlivia','OliviaHenry');
INSERT user(firstName, lastName, email, username, password) VALUES ('Noah','William','NoaWilliam@gmail.com','NoaWilliam','WilliamNoah');
INSERT user(firstName, lastName, email, username, password) VALUES ('Johnson','King','JohKing@gmail.com','JohKing','KingJohnson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Anderson','Emily','AndEmily@gmail.com','AndEmily','EmilyAnderson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Mila','Jackson','MilJackson@gmail.com','MilJackson','JacksonMila');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sofia','Young','SofYoung@gmail.com','SofYoung','YoungSofia');
INSERT user(firstName, lastName, email, username, password) VALUES ('Wilson','Robinson','WilRobinson@gmail.com','WilRobinson','RobinsonWilson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Lopez','Wilson','LopWilson@gmail.com','LopWilson','WilsonLopez');
INSERT user(firstName, lastName, email, username, password) VALUES ('Mason','Emma','MasEmma@gmail.com','MasEmma','EmmaMason');
INSERT user(firstName, lastName, email, username, password) VALUES ('Wilson','Jackson','WilJackson@gmail.com','WilJackson','JacksonWilson');
INSERT user(firstName, lastName, email, username, password) VALUES ('Liam','Smith','LiaSmith@gmail.com','LiaSmith','SmithLiam');
INSERT user(firstName, lastName, email, username, password) VALUES ('Sebastian','Gonzalez','SebGonzalez@gmail.com','SebGonzalez','GonzalezSebastian');
INSERT user(firstName, lastName, email, username, password) VALUES ('Mason','Wright','MasWright@gmail.com','MasWright','WrightMason');
INSERT user(firstName, lastName, email, username, password) VALUES ('Ella','Sophia','EllSophia@gmail.com','EllSophia','SophiaElla');
