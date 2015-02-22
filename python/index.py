# -*- coding: cp936 -*-
# print 'Hello,World'
def print_99():
	for i in range(1,10):
		for j in range(1,10):
			#print j,'x',i,'=',j*i,'\t'
			#miss a ",",so effect shape
			print format(j*i,'3'),
		print
	#print '\n'
# print_99();
import math
#dir(math)
#help(math.log10)
#http://163.32.98.15/teacher/benme/python/Math.htm
#print math.e

def print_hello():
	print 'Hello World'

#print_hello();

def print_log10(num):
	print math.log10(num)

# print_log10(1)

def p(n):
	if(n-1==0):
		return True
	n = (n-1) * n
	print n,

# p(5)

#print pow(1,0.5)

# print 2**8

# print 1+1

#list

#clear windows line
import os
# os.system('cls')

score = [['zhang',80],['li',90],['zhao',70],['wang',50]]
# print len(score)
# print sum(score)
l = len(score)
psum = 0;
for i in range(0,l):
	# print score[i]
	persum=score[i]
	psum=psum+persum[1]
avg = psum/l
# print psum
# print avg

# $url = 'http://www.baidu.com/s?wd=cloga';
# $content = file_get_contents($url);
# $content = htmlspecialchars($content);
# echo $content;
# 3.3s

import urllib2
url = 'http://www.baidu.com/s?wd=cloga'
# content = urllib2.urlopen(url).read()
# print content
# 1.5s
# avg = sum(score)
# print avg


# study content
# http://www.liaoxuefeng.com/wiki/001374738125095c955c1e6d8bb493182103fac9270762a000/
# print 1./5.*100

# reformat code 
# ctrl+alt+l

oldstr = r'c:\news\windows\system32'
# print oldstr

prestr = """
hello,World
welcome to beijing
"""
# print prestr
def game():
	import random
	guess = random.randint(1,10)
	number = input("请输入你的幸运数字吧 : ")
	if(number == ''):
		number = input("你没有输入幸运数字哦 : ")
	# print guess
	# inputnumber = 5
	while(guess!=number):
		inputnumber = input("请继续输入您的幸运数字 : ")
		if isinstance(inputnumber,int):
			# print 'yes'
			if(inputnumber==guess):
				print '猜对啦'
			else:
				if(inputnumber>guess):
					print '大了'
				else:
					print '小了'
		else:
			print '输入的不是数字'

game()





















