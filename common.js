//  type="javascript" 为什么加了这个，不显示内容了？
	
	// ********************第一章start********************

	$(function(){

		// checkimportiframe();

		// helloword('欢迎来到jQuery的世界!');

		// displaydiv();

	});

	// 1.检测是否引入了jQuery框架	
	function checkimportiframe()
	{
		alert($());
	}	

	/**
	 * 2.动态创建div，增加文本提示，颜色设置，字体大小设置，边框设置
	 * @param  {[type]} str [description]
	 * @return {[type]}     [description]
	 */
	function helloword(str)
	{
		// var div = $('<html><body><div></div></body></html>');
		$('body').append('<div id="Tmp"></div><div class="content"></div><div id="Out"></div>');
		// $('body').html('<div id="Tmp"></div><div class="content"></div><div id="Out"></div>');覆盖页面中的html代码
		// 设置文本为蓝色，24号，内外间距5px，边框为绿色，字体为微软雅黑
		var textStyle = 
		{
			'color':'blue',
			'fontSize':'24px',
			'border':'solid 2px',
			'margin':'5px',
			'padding':'5px',
			'borderColor':'green',
			'fontFamily':'微软雅黑',
			'display':'none',
			'width':'98%',
			'height':'40',
			'cursor':'pointer'
		};
		// alert(1);
		$('#Tmp,#Out,.content').html(str).css(textStyle).show(1000).hide(300000);
		$('.content').css({});
		
		//点击div后，给它下一个的内容增加“加粗”属性
		$('div').click(function(){
			// 单个css属性可以这么写，耿飞提示。
			$(this).addClass('curcol').next('.content').css('fontWeight','bold');
		});

		/*
		复习js的获取文本内容：
		<div id="Tmp">测试文本</div>
		<div id="Out"></div>
		*/
		getjscopytexttodiv();

		

	}

	/**
	 * js的文本内容赋值事例
	 * @return {[type]} [description]
	 */
	function getjscopytexttodiv()
	{
		var tDiv = document.getElementById('Tmp');
		var oDiv = document.getElementById('Out');
		var cDiv = tDiv.innerHTML;
		oDiv.innerHTML = cDiv;
		/*

		jquery版的内容赋值操作:

		var tDiv = $('#Tmp');
		var oDiv = $('#Out');
		var cDiv = tDiv.html();
		oDiv.html(cDiv);
		*/
	}

	/**
	 * 3.创建DIV
	 * @return {[type]} [description]
	 */
	function gaotwo()
	{
		var boarddiv = "<div style='background:white;width:100%;height:100%;z-index:999;position:absolute;top:0;margin-top:100px;'>加载中...</div>"; 
		$(window).load(function(){ 
			//window.alert("ok"); 
			$(document.body).append(boarddiv); 
		});
	}

	/**
	 * 4.循环json格式数据:each()的使用
	 * @return {[type]} [description]
	 */
	function gaoone()
	{
		$(function(){
			var div = $('<div></div>');
			// console.log(div);
			var a = {'a':[1,2,3,4,5],'b':[1,2,3,4]};
			$.each(a,function(index,val){
				$.each($(val),function(index1,val1){
					// alert(val1);
				});
			});
		});
	}

	/**
	 * 获取form表单的文本框，单选框，单个复选框的值
	 * @return {[type]} [description]
	 */
	function getjsformdata()
	{

		var oTxtValue = document.getElementById('Text1').value;
		// Radio1是id,Checkbox1也是id
		var oRdoValue = (Radio1.checked)?'男':'女';
		var oChkValue = (Checkbox1.checked)?'已婚':'未婚';
		document.getElementById('Tip').style.display = 'block';
		document.getElementById('Tip').innerHTML = oTxtValue+oRdoValue+oChkValue;

	}

	/**
	 * 通过jquery获取form表单数据
	 * @return {[type]} [description]
	 */
	function getjqueryformdata()
	{

		var oTxtValue = $('#Text1').val();
		var oRdoValue = $('#Radio1').is(':checked')?'男':'女';
		var oChkValue = $('#Checkbox1').is(':checked')?'已婚':'未婚';
		$('#Tip').css('display','block').html(oTxtValue+oRdoValue+oChkValue);

	}

	/**
	 * 点击时给它增加class属性
	 * @return {[type]} [description]
	 */
	function clickaddclass()
	{

		$('.defcol').click(function(){
			$(this).addClass('curcol');
			// $(this).toggleClass('curcol');
			// 2个是一样的点击效果
		});

	}

	// ********************第一章end********************




	// ********************第二章start********************

	/**
	 * 表格隔行换色
	 * @return {[type]} [description]
	 */
	function settabletrcolor()
	{
		/*
		window.onload = function(){
			var oTb = document.getElementById('tbStu');
			// 此处报错，不识别oTb.rows.length
			console.log(oTb);return;
			for(var i=0;i<oTb.rows.length-1;i++)
			{
				if(i%2==0)
				{
					oTb.rows[i].className = 'trOdd';
				}
			}
		}
		*/
	
		// jquery版的隔行变色
		$('#tdStu tr:nth-child(even)').addClass('trEven');
		$('#tdStu tr:nth-child(odd)').addClass('trOdd');

	}//settabletrcolor();

	function checkpage()
	{
		/*
		window.onload = function(){
			// IE11 已经不报错了，理解错了，不加if判断会报错的
			if(document.getElementById('divT')){
				var oDiv = document.getElementById('divT');
				oDiv.innerHTML = 'this is a checkpage';
			}
		}
		*/
		
		// jquery则不会报错，完善的检测机制
		$('#divT').html('this is a checkpage');

	}//checkpage();
	
	//看到此处时pdf提示需要付费购买，呵呵，13元的阅读费，暂时不考虑了。

	/**
	 * 四种基本选择器
	 * @return {[type]} [description]
	 */
	function displaydiv()
	{
		// alert(1);
		// $('#divOne').css('display','block');

		// 查找div中的所有span
		// $('div span').css({'display':'block','fontFamily':'微软雅黑'});

		// 查找div中的子span
		// $('#divMid > span').css({'display':'block','color':'blue'});

		// 查找id为divMid的下一个div的属性 经过测试
		// $('#divMid + div').css({'display':'block','color':'red'});

		// class为clsFrame中的div下的class为clsOne的属性
		// $('.clsFrame .clsOne').css('display','block');

		// id为divOne,所有的span标签都显示
		// $('#divOne,span').css('display','block');
		
		// 查找id为divMid之后的div和id为tdStu的table,字体颜色改为蓝色
		// $('#divMid~div,#tdStu').css('color','blue');

		// 查找此id之外的所有div和id为tdStu的字体颜色设置为红色
		// $('#divMid').siblings('div,#tdStu').css('color','red');

		// $('li:first').addClass('content');
		// $('li:last').addClass('content');
		// $('li:not(.NotClass)').addClass('content');
		// $('li:even').addClass('content');
		// $('li:odd').addClass('content');
		// $('li:eq(1)').addClass('content');
		// $('li:gt(1)').addClass('content');
		// $('li:lt(4)').addClass('content');
		// $('div h1').css('width','238');
		// $(':header').addClass('content');

		/*
		html代码：
		<div>
			<h1>基本过滤选择器</h1>
			<ul>
				<li class="DefClass">Item 1</li>
				<li class="DefClass">Item 2</li>
				<li class="NotClass">Item 3</li>
				<li class="DefClass">Item 4</li>
			</ul>
			<span id="spnMove">Span Move</span>
		</div>
		 */
		
		// 查找到此内容的增加样式
		// $("div:contains('A')").css('display','block');
		// 不含子元素或文本的增加样式
		// $('div:empty').css({'display':'block','background':'blue','width':'238','height':'40'});
		// 查找包含span的增加样式
		// $('div:has(span)').css({'display':'block','background':'green','width':'238','height':'40'});
		// 同级的div统一增加此样式
		// $('div:parent').css({'display':'block','background':'green','width':'238','height':'40','margin':'5px'});
		
		/*
		html code
		<span style="display:none;">Hidden</span>
		<div style="display:block;">Visible</div>
		*/
		
		// 显示隐藏的增加属性
		// $('span:hidden').show().addClass('content');
		// 给显示的增加属性
		// $('div:visible').css('display','block').addClass('content');

		// 属性选择器
		// $('div[id]').show(3000);
		// $("div[title='A']").show();
		// $("div[title!='A']").show();
		// $("div[title^='A']").show();
		// $("div[title$='C']").show();
		// $("div[title*='B']").show();
		// $("div[id='divAB'][title*='B']").css('color','red').show();
		

		// 子元素过滤器
		// 奇怪的是下标从1开始，其他多数都是从0开始的
		// $("li:nth-child(2)").addClass('content');

		// $('li:first-child').addClass('content');

		// $('li:last-child').addClass('content');
		// // 指的是只有一个li时才处理
		// $('li:only-child').addClass('content');

		// 表单对象属性过滤选择器
		// $('#divA').show(3000);
		// // $('#form1 input:enabled').addClass('content');
		// $('#form1 input:disabled').addClass('content');

		// $('#divB').show(3000);
		// $('#form1 input:checked').addClass('content');
		// //alert($('select option:selected').text());
		// //$(function(){
		// 	$('#divC').show(3000);
		// 	var selectedstr = $('select option:selected').text();
		// 	// 刚才出不来的原因是：span默认被隐藏了，没显示导致的。
		// 	$('#Span2').html('选中的项是：'+selectedstr).css('display','block');
		// //});
		
		
		// 奇怪的是：select被看作input的元素了，非常的诧异。
		// var a = $('#form1 :input').length;


	}//displaydiv();
		
	/**
	 * 文字上下移动
	 * @return {[type]} [description]
	 */
	function updowntext()
	{
		// 这个挺有意思，动起来了。
		// 文字上下移动,updowntext
		animateIt();
		$('#spnMove:animated').addClass('content');
		function animateIt()
		{
			//此处的slow可以更换为数字，毫秒单位，不用加单引号。
			$('#spnMove').slideToggle('slow',animateIt);
		}
	}


