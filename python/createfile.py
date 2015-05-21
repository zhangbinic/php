#coding=utf-8

def load(event):
	file = open(filename.GetValue())
	contents.SetValue(file.read())
	file.close()

def save(event):
	file = open(filename.GetValue(),'w')
	file.write(contents.GetValue())
	file.close()

# 需要安装wxPython3.0-win64-3.0.2.0-py27.exe模块，才能使用。
import wx

app = wx.App()

# 1.初始化模版
win = wx.Frame(None,title='Simple Editor',size=(410,335))

bkg = wx.Panel(win)

# 2.给按钮初始化同时，绑定事件
loadButton = wx.Button(bkg,label='Open')
loadButton.Bind(wx.EVT_BUTTON,load)

saveButton = wx.Button(bkg,label='Save')
saveButton.Bind(wx.EVT_BUTTON,save)

# 3.文件名文本框和输入内容区域
filename = wx.TextCtrl(bkg)
contents = wx.TextCtrl(bkg,style=wx.TE_MULTILINE|wx.HSCROLL)

# 4.窗体大小自适应
hbox = wx.BoxSizer()
hbox.Add(filename,proportion=1,flag=wx.EXPAND)
hbox.Add(loadButton,proportion=0,flag=wx.LEFT,border=5)
hbox.Add(saveButton,proportion=0,flag=wx.LEFT,border=5)

vbox = wx.BoxSizer(wx.VERTICAL)
vbox.Add(hbox,proportion=0,flag=wx.EXPAND|wx.ALL,border=5)
vbox.Add(contents,proportion=1,flag=wx.EXPAND|wx.LEFT|wx.BOTTOM|wx.RIGHT,border=5)

bkg.SetSizer(vbox)

# 5.显示执行程序
win.Show()
app.MainLoop()