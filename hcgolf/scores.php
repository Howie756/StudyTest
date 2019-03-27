<?php include 'commons/commons_ul.php'; ?>
<html>
<head>
  <title>HOUSTON CHINESE GOLF ASSOCIATION</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
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
            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
		    <li ><a href="index.html">HOME</a></li>  
            <li ><a href="tournaments.php">TOURNAMENTS</a></li>
		    <li><a href="players.html">PLAYERS</a></li>
		    <li class="selected"><a href="scores.html">SCORES</a></li>
            <li><a href="about.html">ABOUT</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
	
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <ul id="navigator">
			  <!--
              <li> <a href="scores10212018.html">Oct. 21, 2018</a></li> 
              <li> <a href="scores05262018.html">May 26, 2018</a></li> 
			  <li> <a href="scores03242018.html">March 24, 2018</a></li> 
			  <li> <a href="scores.html#2017C1"> November. 12, 2017</a></li>
			  -->
			  <?php
				showParentTitle(3);
				showUlNavigator(3);
			  ?>
            </ul>
          </div>
		  <div class="sidebar_base"></div>
        </div>
      </div>
	  
      <div id="content">
        <!-- insert the page content here -->
		<h4>Tournament Scores at Pearland Country Club (Man's Gold, 6734, 73.5/134, Woman's Red, 5483, 74/130), November 12, 2017</h4>    		
	    Holes sponsored by<a href="http://www.pvisoftware.com/">  Pegasus Vertex, Inc </a>, Thanks to Tom Huang for the arrangement. 
		
		<TABLE id="content_table" class="fixed" style="font-size:6px;" align="center" border="0">
			<col width="70px" />
			<col width="70px" />
			<col width="70px" />
			<col width="70px" />
			<col width="50px" />
			<col width="70px" /> 
			<col width="70px" /> 
			<col width="70px" /> 
			<col width="70px" />
			<thead>
				<TR>
					<TD> Ranking </TD>
					<TD> Name </TD>
					<TD> Strokes </TD>
					<TD> HCP </TD>
					<TD>   </TD>
					<TD> Ranking </TD>
					<TD> Name </TD>
					<TD> Strokes </TD>
					<TD> HCP </TD>	   
				</TR>
			</thead>
			<tbody>
				<!--  -->
			</tbody>
         </TABLE>
		 
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
		<p>
			<a href="index.html">HOME</a> | 
			<a href="tournaments.html">TOURNAMENTS </a> |
			<a href="players.html">PLAYERS</a> | 
			<a href="scores.html">SCORES</a> | 
			<a href="about.html">ABOUT</a>
		</p>	   
      <p>Copyright &copy; HCGA | <a href="https://www.w3.org/TR/html5/">HTML5</a> | <a href="https://www.w3schools.com/html/html_css.asp">CSS</a> | </p>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-2.1.0.js"></script>
  <script type="text/javascript">
	
	function showContent(obj){
		var id = $(obj).attr("id");
		console.log("id ====> " + id);
		$.ajax({
			url: "controller/GetScoresByNavigator.php",
			type: "POST",
			data: {id:id},
			dataType: "json",
			success: function(result){
				console.log(result);
				//console.log("the size is ====> " + result.length);
				$("#content_table tbody").html("");
				var half = -1;
				if(result.length % 2 == 0){
					half = result.length / 2;
				}else {
					half = (result.length - 1) / 2;
				}
				
				for(var i = 0; i < half; i++){
					$("#content_table tbody").append('<TR id="col'+ i +'"><TD>'+ (i + 1) +'</TD><TD>'+ result[i].name +'</TD><TD>'+ result[i].strokes +'</TD><TD>'+ result[i].hcp +'</TD><TD></TD> ' 
					+ '<TD>'+ (half + i + 1) +'</TD><TD>'+ result[half + i].name +'</TD><TD>'+ result[half + i].strokes +'</TD><TD>'+ result[half + i].hcp +'</TD></TR>');
				}
				
			}
		});
	}
	
	$(document).ready(function(){
		showContent($("#navigator li:first").find("a:first"));
	});
	
  </script>
</body>
</html>
