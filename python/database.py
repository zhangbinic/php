# connect mysql
import MySQLdb

conn = MySQLdb.connect(host='localhost',user='root',passwd='111111',db='test');

cursor = conn.cursor()
# select data
n = cursor.execute("select * from pythontest limit 10")

r = cursor.fetchall()

#insert data
# sql = """insert into pythontest(id,title,addtime) values(2,"thirdtest,not me write chinese","2015-2-20")"""
#update data
# sql = """update pythontest set addtime = "2015-2-9" where id=1"""
# sql = """update pythontest set id = 3 where addtime="2015-2-20" """
#delete data
sql = """delete from pythontest where id=3"""
n = cursor.execute(sql)
conn.commit() #below mysql5.0 needed

print r,

cursor.close()
conn.close()
