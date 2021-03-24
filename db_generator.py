import random
import time

nameList =["Liam","Noah","William","James","Oliver","Benjamin","Elijah","Lucas","Mason","Logan",
"Alexander","Ethan","Jacob","Michael","Daniel","Henry","Jackson","Sebastian","Aiden","Matthew","Samuel",
"Emma","Olivia","Ava","Isabella","Sophia","Charlotte","Mia","Amelia","Harper","Evelyn","Abigail","Emily",
"Elizabeth","Mila","Ella","Avery","Sofia","Camila","Aria","Scarlett","Smith","Johnson","Williams","Brown","Jones","Garcia","Miller","Davis","Rodriguez","Martinez",
"Hernandez","Lopez","Gonzalez","Wilson","Anderson","Thomas","Taylor","Moore","Jackson","Martin","Lee",
"Perez","Thompson","White","Harris","Sanchez","Clark","Ramirez","Lewis","Robinson","Walker","Young","Allen",
"King","Wright","Scott","Torres","Nguyen","Hill","Flores"]

# Random 40: INSERT user(firstName, lastName, email, userName, password)------------------------------------

for i in nameList:
    firstName = str(random.choice(nameList))
    lastName = str(random.choice(nameList))
    email = firstName[0:3] + lastName + "@gmail.com"
    username = firstName[0:3] + lastName 
    password = lastName + firstName
    insertUserSql = "INSERT user(firstName, lastName, email, username, password) VALUES (" + "\'" + firstName + "\'," +"\'" +lastName + "\'," +"\'" + email + "\'," +"\'" + username + "\'," +"\'" + password + "\'" + ");\n"
    with open("/Applications/XAMPP/xamppfiles/htdocs/Project/db_sql.ddl", "a") as myfile:
        myfile.write(insertUserSql)
        myfile.close()

# Random 40: INSERT post(time, title, content, userId)-----------------------------------------------------------------------------------

# i = 0
# while i < 40:
#     # Generate random timestamp
#     def str_time_prop(start, end, format, prop):

#         stime = time.mktime(time.strptime(start, format))
#         etime = time.mktime(time.strptime(end, format))

#         ptime = stime + prop * (etime - stime)

#         return time.strftime(format, time.localtime(ptime))

    
#     def random_date(start, end, prop):
#         return str_time_prop(start, end, '%m/%d/%Y %I:%M %p', prop)

#     time = str(random_date("1/1/2016 1:30 PM", "1/1/2021 4:50 AM", random.random()))

    # Generate post title
    # nouns = [
    #     'people','history','way','art','world','information','map','two','family','government','health','system','computer','meat','year','thanks','music','person','reading','method',
    #     'data','food','understanding','theory','law','bird','literature','problem','software','control','knowledge','power','ability','economics','love','internet','television',
    #     'science','library','nature','fact','product','idea','temperature','investment','area','society','activity','story','industry','media','thing','oven','community','definition']

    # postTitle = (" ").join([nouns[random.randrange(0, len(nouns))] for i in range(4)])
    # title = postTitle.upper()

    # # Content
    # content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

    # # userId
    # userId = random.randint(1,40)

    # # Insertion
    # insertPostSql = "INSERT post(time, title, content, userId) VALUES (" + "\'" + time + "\'," +"\'" + title + "\'," +"\'" + content + "\'," +"\'" + str(userId) + "');\n"
    # print(insertPostSql)
    #  with open("/Applications/XAMPP/xamppfiles/htdocs/Project/db_sql.ddl", "a") as myfile:
    #     myfile.write(insertPostSql)
    #     myfile.close()
    # i += 1