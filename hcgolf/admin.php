<html>
	<head>
		<title>Management Interface</title>
		<meta name="description" content="website description" />
		<meta name="keywords" content="website keywords, website keywords" />
		<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link rel="stylesheet" type="text/css" href="style/float_content.css" />
	</head>

	<body>
		<div id="hiddenDatas" class="hidden_div">
		</div>
		<div id="main">
			<div id="header">
				<div id="logo">
					<div id="logo_text">
						<h1><a href="index.html">HOUSTON CHINESE <span class="logo_colour"> GOLF </span>ASSOCIATION </a></h1>
					</div>
				</div>
				<div id="menubar">
					<ul id="menu">
						<li class="selected">
							<a href="admin.php">MANAGEMENT</a>
						</li>
						<li>
							<a href="index.html">HOME</a>
						</li>
						<li>
							<a href="tournaments.php">TOURNAMENTS</a>
						</li>
						<li>
							<a href="players.html">PLAYERS</a>
						</li>
						<li>
							<a href="scores.php">SCORES</a>
						</li>
						<li>
							<a href="about.html">ABOUT</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="edit_area" class="edit_content">
				<form id="datas_form" action="controller/ScoreController.php" method="POST">
					<br/>
					<span class="span_show">Select The Module : </span><br/>
					<select name="parentId">
						<!--
						<option value="1">HCGA OPEN</option>
						<option value="2">Lon Lon Cup</option>
						-->
						<option value="3" selected="selected">Scores</option>
					</select><br/>
					<br/>
					<span class="span_show">Add The Title(Date) : </span><br/>
					<input type="text" name="title" /><br/>
					<div class="score_module">
						 <table id="datas"  border="0" class="data_table">
						 	<thead>
						 		<tr>
						 			<td>Name</td>
									<td>Strokes</td>
									<td>HCP</td>
									<td>Option</td>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		<tr>
						 			<td><input type="text" name="name[]" /></td>
						 			<td><input type="text" name="strokes[]" class="short_input" /></td>
						 			<td><input type="text" name="hcp[]" class="short_input" /></td>
						 			<td>
										<input type="button" class="add_button" value="+" />&nbsp;&nbsp;<input type="button" class="minus_button" value="-" onclick="deleteTr(this)" />
									</td>
						 		</tr>
						 	</tbody>
						 </table>
						 
					</div>
					<input type="submit" value="&nbsp;Submint&nbsp;" class="data_submit" />
				</form>
			</div>
			
			<div class="admin_sidebar_container">
				<div class="sidebar">
				  <div class="sidebar_top"></div>
				  <div class="sidebar_item">
					<ul id="navigator">
					  <li> <a href="admin-hcga.php">HCGA OPEN Manage</a></li> 
					  <li> <a href="admin-lon.php">Lon Lon Cup Manage</a></li>
					  <li> <a href="admin-snapshots.php">SNAPSHOTS Manage</a></li>
					</ul>
				  </div>
				  <div class="sidebar_base"></div>
				</div>
			</div>
			
			<!--sign in div-->
			<div id="float_content" class="float_main">
				<div class="float_main_title">
					<span class="tilte_span">Sign&nbsp;&nbsp;In</span> <br/>
					<span id="error" class="error_msg">Incorrect username or password</span>
				</div>
				<br />
				<br />
				<form id="login_form" action="controller/LoginController.php" method="POST">
					<span class="component_span">Username:</span> <br/>
					<input type="text" name="username" class="component_input" /><br/>
					<span class="component_span">Password:</span> <br/>
					<input type="password" name="password" class="component_input" /><br/>
					<input type="submit" value="Submit" class="component_sumit"/>
				</form>
			</div>
			
			<!--mask layer-->
			<div id="mask" class="mask_div"></div>
			
			<div id="content_footer"></div>
			<div id="footer">
				<p>
					<a href="index.html">HOME</a> |
					<a href="tournaments.php">TOURNAMENTS </a> |
					<a href="players.html">PLAYERS</a> |
					<a href="scores.php">SCORES</a> |
					<a href="about.html">ABOUT</a>
				</p>
				<p>Copyright &copy; HCGA |
					<a href="https://www.w3.org/TR/html5/">HTML5</a> |
					<a href="https://www.w3schools.com/html/html_css.asp">CSS</a> |
				</p>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript" >
		
			function addDataTr(){
				var html = '<tr>'
							+ '<td><input type="text" name="name[]" /></td>'
							+ '<td><input type="text" name="strokes[]" class="short_input" /></td>'
							+ '<td><input type="text" name="hcp[]" class="short_input" /></td>'
							+ '<td>'
							+ '<input type="button" class="add_button" value="+" onclick="addDataTr()" />&nbsp;&nbsp;'
							+ '<input type="button" class="minus_button" value="-" onclick="deleteTr(this)" />'
							+ '</td>'
							+ '</tr>';
				$("#datas").append(html);
				//clear add-button from trs except the last one.
				clearOtherAddBtn();
			}
			
			function clearOtherAddBtn(){
				var trs = $('#datas tbody').find("tr");
				//console.log(trs.length);
				var lastIndex = trs.length - 1;
				trs.each(function(index, element){
						if(index != lastIndex){
							$(element).find("td:last-child").find("input:first").hide();
						}
				});
			}
			
			function deleteTr(obj){
				var trs = $('#datas tbody').find("tr");
				if(trs.length > 1){
					$(obj).parent().parent().remove();
				}else {
					alert("This is the last line and cannot be deleted");
				}
			}
			
			function validateLogin(){
				var username = $.cookie("username");
				var password = $.cookie("password");
				$.ajax({
					url:"controller/LoginController.php",
					type:"POST",
					data:{
						username:function(){
							return username == undefined ? "username" : username;
						},
						password:function(){
							return password == undefined ? "password" : password;
						}
					},
					dataType:"json",
					success:function(result){
						console.log(result);
						if(result.id != 'undefined' && result.id != ""){
							$("#float_content").hide();
							$("#mask").hide();
							console.log(result);
						}
					}
				});
			}
		
			$(document).ready(function(){
				validateLogin();
			 	$('.add_button').on("click", function(){
			 		 addDataTr();
			 	});
				//submit form data for login.
				$("#login_form").submit(function(e){
					e.preventDefault();
					$.ajax({
						//url:function(){return $("#login_form").attr("action");},
						url:"controller/LoginController.php",
						//type:function(){return $("#login_form").attr("method");},
						type:"POST",
						data:$("#login_form").serialize(),
						dataType:"json",
						success:function(result){
							//console.log(result.id);
							if(result.id != 'undefined' && result.id != ""){
								$("#float_content").hide();
								$("#mask").hide();
								console.log(result);
							}else {
								$("#error").show();
							}
						}
					});
				});
				
				$("#datas_form").submit(function(e){
					e.preventDefault();
					$.ajax({
						url:"controller/ScoreController.php",
						type:"POST",
						data:$("#datas_form").serialize(),
						dataType:"json",
						success:function(result){
							$('#datas tbody').empty();
							addDataTr();
							alert(result.numbers + " pieces of data " + result.msg);
						}
					});
				});
				
			});
			 
		</script>
	</body>

</html>