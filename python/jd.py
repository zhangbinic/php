#coding=utf-8

def find_sender():
	import fileinput,re
	pat = re.compile('From (.*) <.*?>$')
	a = ['From zhangbin <zhangbin@162.com>','From Yang <Yang@qq.com>']
	# for line in fileinput.input(): 读取文件的暂时略过
	for line in a:
		m = pat.match(line)
		# print m
		if m:
			print m.group(1)

# 查找指定字符串的指定值
find_sender();