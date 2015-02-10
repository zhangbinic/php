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

#p(1)

#print pow(1,0.5)

# print 2**8

# print 1+1