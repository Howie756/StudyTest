<?php include 'commons/commons_ul.php'; ?>
<html>
<head>
  <title>HOUSTON CHINESE GOLF ASSOCIATION</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" type="text/css" href="style/float_content.css" />
  <link rel="stylesheet" type="text/css" href="style/xcConfirm.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
            <!-- class="logo_colour", allows you to change the colour of the text -->
			<h1><a href="index.html">HOUSTON CHINESE <span class="logo_colour"> GOLF </span>ASSOCIATION </a></h1>
            <!-- <<h2>Read. Discuss. Reward.</h2> -->
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
		  <li ><a href="index.html">HOME</a></li>  
          <li class="selected"><a href="tournaments.php">TOURNAMENTS</a></li>
		  <li><a href="players.html">PLAYERS</a></li>
		  <li><a href="scores.php">SCORES</a></li>
          <li><a href="ABOUT.html">ABOUT</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div class="main_content">
      <div class="data_content">
        <!-- insert the page content here -->
		<TABLE id="datas" align="center" border="0">
			<thead>
				<TR>
					<td>PARENTID</td> 
					<td>TITLE</td>
					<td>ALIAS</td>
					<td>URL</td> 
					<td>SPONSORS</td>
					<td>ARRANGED</td>
					<td>DESCRIBE</td>
					<td>CREATEDATE</td>
					<td>UPDATEDATE</td>
					<td>REMARK</td>
					<td>OPTION</td>
				</TR>
			</thead>
			<tbody>
				<tr>
					<td><input type="hidden" name="id" /><input type="text" name="parent_id" class="short_input" /></td>
					<td><input type="text" name="title" class="short_input" /></td>
					<td><input type="text" name="alias" class="short_input" /></td>
					<td><input type="text" name="url" class="short_input" /></td>
					<td><input type="text" name="sponsors" class="short_input" /></td>
					<td><input type="text" name="arranged" class="short_input" /></td>
					<td><input type="text" name="describe_" class="short_input" /></td>
					<td><input type="text" name="create_date" class="date_input" /></td>
					<td><input type="text" name="update_date" class="date_input" /></td>
					<td><input type="text" name="remark" class="date_input" /></td>
					<td><input type="button" value="Upt" />&nbsp;&nbsp;<input type="button" value="Del" /></td>
				</tr>
			</tbody>
		</TABLE>
      </div>
	  <div class="sidebar_container_ad">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
			<ul id="">
				<li>aaaaaaaaaa</li>
            </ul>
          </div>
		  <div class="sidebar_base"></div>
        </div>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
		<p>
			<a href="index.html">HOME</a> | 
			<a href="tournaments.php">TOURNAMENTS </a> |
			<a href="players.html">PLAYERS</a> | 
			<a href="scores.php">SCORES</a> | 
			<a href="about.html">ABOUT</a>
		</p>
		<p>Copyright &copy; HCGA | <a href="https://www.w3.org/TR/html5/">HTML5</a> | 
		<a href="https://www.w3schools.com/html/html_css.asp">CSS</a> | 
    </div>
  </div>
</body>
<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/xcConfirm.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		serachAll();
	});
	
	function serachAll(){
		$.ajax({
			url:"controller/NavigatorController-GetAll.php",
			type:"GET",
			dataType:"JSON",
			success:function(result){
				console.log(result);
				$("#datas tbody").empty();
				$.each(result, function(index, element){
					addTr();
					var curTr = $("#datas tbody").find("tr:last");
					curTr.attr("id", index);
					curTr.find("input[name='id']").val(element.id);
					curTr.find("input[name='parent_id']").val(element.parentId);
					curTr.find("input[name='title']").val(element.title);
					curTr.find("input[name='alias']").val(element.alias);
					curTr.find("input[name='url']").val(element.url);
					curTr.find("input[name='sponsors']").val(element.sponsors);
					curTr.find("input[name='arranged']").val(element.arranged);
					curTr.find("input[name='describe_']").val(element.describe);
					curTr.find("input[name='create_date']").val(element.createDate);
					curTr.find("input[name='update_date']").val(element.updateDate);
					curTr.find("input[name='remark']").val(element.remark);
					if(element.parentId == 0){
						curTr.find("td:last").empty();
					}
				});
			}
		});
	}
	
	function addTr(){
		var trHtml = '<tr>'
					+ '<td><input type="hidden" name="id" /><input type="text" name="parent_id" class="short_input" /></td>'
					+ '<td><input type="text" name="title" class="short_input" /></td>'
					+ '<td><input type="text" name="alias" class="short_input" /></td>'
					+ '<td><input type="text" name="url" class="short_input" /></td>'
					+ '<td><input type="text" name="sponsors" class="short_input" /></td>'
					+ '<td><input type="text" name="arranged" class="short_input" /></td>'
					+ '<td><input type="text" name="describe_" class="short_input" /></td>'
					+ '<td><input type="text" name="create_date" class="date_input" /></td>'
					+ '<td><input type="text" name="update_date" class="date_input" /></td>'
					+ '<td><input type="text" name="remark" class="date_input" /></td>'
					+ '<td><input type="button" value="Upt" onclick="update(this)" />&nbsp;&nbsp;<input type="button" value="Del" onclick="del(this)"/></td>'
					+ '</tr>';
		$("#datas tbody").append(trHtml);
	}
	
	function update(obj){
		var tr = $(obj).parent().parent();
		var txt = "PARENTID : " + tr.find("input[name='parent_id']").val() + "<br />" + "TITLE : " +  tr.find("input[name='title']").val() + "<br />" 
			+ "ALIAS : " + tr.find("input[name='alias']").val() + "<br/>" + "URL : " + tr.find("input[name='url']").val() + "<br />"
			+ "SPONSORS : " + tr.find("input[name='sponsors']").val() + "<br/>" + "ARRANGED : " + tr.find("input[name='arranged']").val() + "<br />"
			+ "DESCRIBE : " + tr.find("input[name='describe_']").val() + "<br/>" + "CREATEDATE : " + tr.find("input[name='create_date']").val() + "<br />"
			+ "UPDATEDATE : " + tr.find("input[name='update_date']").val() + "<br/>" + "REMARK : " + tr.find("input[name='remark']").val() + "<br />";
		var option = {
			title: "CONFIRM INFO",
			btn: parseInt("0011",2),
			onOk: function(){
				$.ajax({
					url:"controller/NavigatorController-Update.php",
					type:"POST",
					data:{
						id:tr.find("input[name='id']").val(),
						parentId:tr.find("input[name='parent_id']").val(),
						title:tr.find("input[name='title']").val(),
						alias:tr.find("input[name='alias']").val(),
						url:tr.find("input[name='url']").val(),
						sponsors:tr.find("input[name='sponsors']").val(),
						arranged:tr.find("input[name='arranged']").val(),
						describe_:tr.find("input[name='describe_']").val(),
						createDate:tr.find("input[name='create_date']").val(),
						updateDate:tr.find("input[name='update_date']").val(),
						remark:tr.find("input[name='remark']").val()
					},
					dataType:"JSON",
					success:function(result){
						var txt=  "Data modified successfully!";
						window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
					}
				});
			}
		}
		window.wxc.xcConfirm(txt, "confirm", option);
	}
	
	function del(obj){
		var tr = $(obj).parent().parent();
		var txt = "Are you sure you want to delete this piece of data with PARENTID : " + tr.find("input[name='parent_id']").val(); 
		var option = {
			title: "CONFIRM INFO",
			btn: parseInt("0011",2),
			onOk: function(){
				$.ajax({
					url:"controller/NavigatorController-Delete.php",
					type:"POST",
					data:{
						id:tr.find("input[name='id']").val()
					},
					dataType:"JSON",
					success:function(result){
						
					}
				});
			}
		}
		window.wxc.xcConfirm(txt, "warning", option);
	}
</script>
</html>
