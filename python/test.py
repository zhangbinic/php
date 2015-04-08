#coding=utf-8

member = range(1,20)
# print member
member.remove(2)
# print member
member.pop()
# print member
# member.delete([1,3,4])
# print member
the_world_is_flat = 1
# if the_world_is_flat:
	# print 'Be careful not to fall off!'

def load_dict(filename):
	word_dict = set()
	max_len = 1
	f = open(filename)
	for line in f:
		word = unicode(line.strip(),'utf-8')
		word_dict.add(word)
		if len(word)>max_len:
			max_len = len(word)
	return max_len,word_dict


def fnm_word_seg(sent,max_len,word_dict):
	begin = 0
	words = []
	# sent = unicode(sent,'utf-8')
	while begin<len(sent):
		for end in range(begin+max_len,begin,-1):
			if sent[begin:end] in word_dict:
				words.append(sent[begin:end])
				break
		begin = end
	return words

max_len,word_dict = load_dict('lexicon.txt')
# print max_len,word_dict

# sent = raw_input('please input sentence:')
# print sent

# words = fnm_word_seg(sent,max_len,word_dict)
# for word in words:
# 	print word

# 2015-4-6 start
# 今天算是解决了文件中加入中文注释的困惑。文件头部加入一段代码就OK了。
# http://www.cnblogs.com/timeship/archive/2013/03/05/2945102.html
def findthispersonfromwhere(inputnum):
	aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"};
	inputnum = int(inputnum[:2])
	# print type(inputnum)

	for number in aCity:
		# print type(number)
		if inputnum == number:

			# 暂时未成功使用
			# wherefrom = '尊敬的用户，您好，您查找的身份证 ',inputnum,' 用户来自 ',aCity[number],'个城市'
			wherefrom = aCity[number]

	return wherefrom

# 使用方法:
inputnum = '610528198501083312'
returndata = findthispersonfromwhere(inputnum)
# print '这家伙来自咱家乡',returndata

# 功能描述:把下面相应的人员统计到对应的宿舍中去
def calpersoninrooms():
	classmatename = {
		'张斌':135,
		'何岩':135,
		'周宏斌':135,
		'王豪':135,
		'李浩鹏':135,
		'祝海涛':135,
		'王小刚':135,
		'张敏':135,
		'李锦宝':134,
		'刘锦旗':134,
		'张晓辉':134,
		'田伟':134,
		'党仲荣':134,
		'景海婷':134,
		'薛阳波':134,
		'韩静':211,  
		'刘娜':211,
		'付婷':211,
		'周英':211,
		'米娟':211,
		'刘媛':211
	}
	rooms = {}
	# print classmatename
	for name,room in classmatename.items():
		# print name,
		if room in rooms:
			rooms[room].append(name)
		else:
			rooms[room] = [name]
	# print rooms			
	for name,room in rooms.items():
		print name,room
	# 还是中文输出的问题

# print ord[97]
# 统计字母出现的频率
def calcharscount(str):
	lst = [0]*26
	for i in str:
		lst[ord[i]-97] +=1
	return lst

# print calcharscount('asdfghjkldsfkjkjkfd')

# 这种方式可行，字典的形式。
def calcharscount2(str):
	d = {}
	for i in str:
		if i in d:
			d[i] +=1
		else:
			d[i] = 1
	return d

# print calcharscount2('asdfghjkldsfkjkjkfd')

# 读取小说里的10个常见单词
def findstringcount(filename):
	f = open(filename)
	word_freq = {}
	for line in f:
		words = line.strip().split()
		for word in words:
			if word in word_freq:
				word_freq[word] +=1
			else:
				word_freq[word] = 1
	# print word_freq

	freq_word = {}
	for word,freq in word_freq.items():
		print word,freq
		# freq_word.append(freq,word)
	# freq_word.sort(reverse=True)
	for freq,word in freq_word:
		print word
# 疑问是：不能append()方法
# findstringcount('lexicon.txt')

# 2015-4-6 end