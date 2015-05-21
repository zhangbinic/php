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

hellowindow()













