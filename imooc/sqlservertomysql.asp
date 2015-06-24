<%
'response.write "111":response.end 
'16:26 DELETE FROM app;
'MyISAM InnoDB今天是领教了这2个表引擎的插入速度了。
'DbPath = SERVER.MapPath(DbPath)
'Set conn = Server.CreateObject("ADODB.Connection")
'conn.open "driver={microsoft access driver (*.mdb)};uid=;pwd="& DbPass &";dbq=" & DbPath
'conn.open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&DbPath
'(local)
'connstr="Provider=sqloledb;" & "Data Source=182.92.228.65;Initial Catalog=hccaw;User Id=sa;Password=t3s7d4h6t5;"
'mysql
Server.ScriptTimeOut = 9999
'Response.Write Server.ScriptTimeOut:response.end 2.7h
Dim conn,connStrs
connStrs="Driver={MySQL ODBC 5.3 Unicode Driver};server=127.0.0.1;port=3310;database=test;user=root;password=bhxz"
Set conn=Server.CreateObject("ADODB.Connection")
conn.open connStrs

'sqlserver
connstr="Provider=sqloledb;" & "Data Source=124.193.172.26;Initial Catalog=SBO_AKYC;User Id=sa;Password=ak2003.com.cn;"
set DataConn=server.createobject("ADODB.CONNECTION")
DataConn.open connstr






'产品名称，产品条码，产品个体码=，产品型号，产品系列，产品大类，物料编码，物料组名称,批次号=
'ItemName ,CodeBars ,DistNumber ,Spec ,xl ,dl ,ItemCode ,ItmsGrpNam ,LotNumber
'goods_name,goods_bc,goods_model,goods_series,goods_class,goods_number,goods_group


' `goods_name` varchar(255) DEFAULT NULL COMMENT '产品名称',
' `goods_model` varchar(255) DEFAULT NULL COMMENT '型号',
' `goods_number` varchar(255) DEFAULT NULL COMMENT '物料编码',
' `goods_bc` varchar(255) DEFAULT NULL COMMENT '添加条码',
' `goods_series` varchar(255) DEFAULT NULL COMMENT '产品系列',
' `goods_group` varchar(255) DEFAULT NULL COMMENT '物料组名称',
' `goods_class` varchar(255) DEFAULT NULL COMMENT '产品大类',
' `goods_geti`




set rs = DataConn.execute("select top 1000000 ItemName,CodeBars,DistNumber,Spec,xl,dl,ItemCode,ItmsGrpNam,LotNumber from AVA_APP")
if not rs.eof then

set rsnewa=server.createobject("adodb.recordset")
sql="select * from dm_goods"
rsnewa.open sql,conn,1,3

do while not rs.eof
'response.write rs("ItemCode") & "<br>"
	'sql = "insert into dm_goods('goods_name','goods_bc','goods_model','goods_series','goods_class','goods_number','goods_group') values('"&rs("ItemName")&"','"&rs("CodeBars")&"','"&rs("Spec")&"','"&rs("xl")&"','"&rs("dl")&"','"&rs("ItemCode")&"','"&rs("ItmsGrpNam")&"')"
	'response.write sql & "<br>"
	'Set rsnewa=conn.Execute(sql)


	


	rsnewa.addnew()

	rsnewa("goods_geti") = rs("DistNumber")
	rsnewa("goods_name") = rs("ItemName")
	rsnewa("goods_bc") = rs("CodeBars")
	rsnewa("goods_model") = rs("Spec")
	rsnewa("goods_series") = rs("xl")
	rsnewa("goods_class") = rs("dl")
	rsnewa("goods_number") = rs("ItemCode")
	rsnewa("goods_group") = rs("ItmsGrpNam")


	rsnewa.update
rs.movenext
loop


rsnewa.close
set rsnewa=nothing

end if
rs.close
response.write "success"

'asp+mysql
'mysql-connector-odbc-5.5.20-win32

'MySQL Connector/ODBC(MyODBC) v5.3.4 x86/x64
'http://www.veryhuo.com/down/html/64619.html#download_area

'MySQL ODBC 配置
'http://wenku.baidu.com/view/8a768e04e87101f69e319533.html









'Conn.Open "DRIVER={MySQL ODBC 5.3 Unicode Driver};SERVER=127.0.0.1;PORT=3310;DATABASE=haiyou;USER=root;PASSWORD=bhxz;"
'conn.execute("set names 'utf-8'")
set rsnewa=server.createobject("adodb.recordset")
sql="select * from dm_admin"
Set rsnewa=conn.Execute(sql)
  'response.Write  rsnewa("admin_unit")
rsnewa.close
set rsnewa=nothing


















%>