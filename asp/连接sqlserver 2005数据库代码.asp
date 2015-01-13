<!-- #include file="#MdbInfo.rar" -->
<%
'DbPath = SERVER.MapPath(DbPath)
'Set conn = Server.CreateObject("ADODB.Connection")
'conn.open "driver={microsoft access driver (*.mdb)};uid=;pwd="& DbPass &";dbq=" & DbPath
'conn.open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&DbPath
'(local)
connstr="Provider=sqloledb;" & "Data Source=182.92.228.65;Initial Catalog=hccaw;User Id=sa;Password=t3s7d4h6t5;"
connstr="Provider=sqloledb;" & "Data Source=182.92.235.202;Initial Catalog=hccaw;User Id=sa;Password=Zj5v5x5j;"
set conn=server.createobject("ADODB.CONNECTION")
conn.open connstr 

%>