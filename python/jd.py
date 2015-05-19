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

get_email()
















