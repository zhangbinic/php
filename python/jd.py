#coding=utf-8

def find_sender():
	import fileinput,re
	pat = re.compile('From (.*) <.*?>$')
	a = ['From zhangbin <zhangbin@126.com>','From Yang <Yang@qq.com>']
	# for line in fileinput.input(): 读取文件的暂时略过
	for line in a:
		m = pat.match(line)
		# print m
		if m:
			print m.group(1)

# 查找指定字符串的指定值
# find_sender();

def get_email():
	import re
	pat = re.compile(r'[a-z\-\.]+@[a-z\-\.]+',re.IGNORECASE)
	addresses = set()
	a = ['From zhangbin <zhangbin@qq.com>','From Yang <Yang@qq.com>']
	for line in a:
		for address in pat.findall(line):
			# print address
			# 不知道怎么就过滤了第一个邮件地址，哈哈，是因为@后面正则的是字母，不包含数字而已。
			addresses.add(address)
	# print addresses
	for address in sorted(addresses):
		print address

# get_email()

# 取出这个网址的主域名
def cutstr():
	website = 'http://www.python.org'
	websitelist = website.split('.')
	cutstr = websitelist[len(websitelist)-2]
	print cutstr

# cutstr()

# 打开此文件，可惜的是没有定位到之前打开的位置，但是鼠标点击就可以定位到阅读的位置，很奇妙。
def pdf():
	import os
	# 好处是写好路径，直接命令行调用就可以了
	os.startfile(r"D:\Python.pdf")

# pdf()


def hello():
	print 'Hello,World'

# 弹出一个hello的窗口
def hellowindow():
	import wx
	app = wx.App()
	win = wx.Frame(None,title='hello,world',size=(200,80))
	button = wx.Button(win,label='Hello')
	button.Bind(wx.EVT_BUTTON,hello)
	win.Show()
	app.MainLoop()

# hellowindow()



# www.ars.usda.gov/nutrientdata
# Navicat Premium 
# http://www.liangchan.net/soft/softdown.asp?softid=6005

def convert(value):
	if not value:
		value = '0'
	return value;

def sqlitedemo():
	
	import sqlite3

	conn = sqlite3.connect('People.db')
	conn.text_factory = str
	curs = conn.cursor()

	curs.execute('''

		CREATE TABLE person(
			email TEXT,
			password TEXT,
			username TEXT,
			card TEXT,
			userid TEXT,
			tel TEXT,
			address TEXT
		)
		
	''')

	query = 'INSERT INTO person VALUES(?,?,?,?,?,?,?)'

	for line in open('12306.txt'):
		# print line
		fields = line.split('----')
		vals = [convert(f) for f in fields[:len(fields)]]
		print vals
		# vals = []
		# for f in fields:
		# 	vals.append(f)
		# # print vals
		curs.execute(query,vals)
		vals = []
		
	conn.commit()
	conn.close()

# sqlitedemo()


def sqlite3select():
	import sqlite3

	conn = sqlite3.connect('People.db')
	# 转换中文字符
	conn.text_factory = str
	curs = conn.cursor()

	# sql语法走的是mysql
	query = 'select * from person limit 1'
	curs.execute(query);
	data = curs.fetchall()

	# 查询表结构:$keys
	names = [f[0] for f in curs.description]
	# print names

	# print curs.fetchall()
	for row in data:
		# 通俗的讲：类似array_combine($keys,$values)
		for pair in zip(names,row):
			print '%s : %s' % pair
		print

# http://archive.apache.org/dist/httpd/modpython/win/ 这是下载地址，书上的地址是老的。

# *********************************socket事例start**************************
def socketsample():
	import socket

	s = socket.socket()

	host = socket.gethostname()
	port = 1234
	s.bind((host,port))

	s.listen(5)
	while True:
		# 这里是逗号，不是点号，用print s.accept()打印出来得到的结果
		c,addr = s.accept()
		print 'Got connection form ',addr
		c.send('Thank you for connecting')
		c.close()

# socketsample()

def client():
	import socket

	s = socket.socket()

	host = socket.gethostname()
	port = 1234
	s.connect((host,port))
	print s.recv(1024)

# client()
# *********************************socket事例end**************************

def webpagecontent():
	
	from urllib import urlopen
	webpage = urlopen('http://www.python.org')
	
	import re
	text = webpage.read()
	# print text

	# 奇了怪了，就是正则不出来
	m = re.search('<a href="([^"]+)" .*?>About</a>',text,re.IGNORECASE)
	m.group(1)

webpagecontent()