# connect mysql
import MySQLdb

conn = MySQLdb.connect(host='localhost',user='root',passwd='111111',db='haiyou');

cursor = conn.cursor()

n = cursor.execute("select * from bh_basic_unitinfo limit 10")

r = cursor.fetchall()

print r,

cursor.close()
conn.close()
