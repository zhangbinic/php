def zilian():
	bingo = 'xiaoshuaige'
	answer = input('please input a word:')

	while True:
		if answer == bingo:
			break;
		answer = input('sorry,please input a word again:')
	print 'beautiful'
	print 'you are right'

zilian()
