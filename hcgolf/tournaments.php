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
		  <li ><a href="index.html">HOME</a></li>  
          <li class="selected"><a href="tournaments.php">TOURNAMENTS</a></li>
		  <li><a href="players.html">PLAYERS</a></li>
		  <li><a href="scores.php">SCORES</a></li>
          <li><a href="ABOUT.html">ABOUT</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
			<ul id="hcga-navigator">
			  <?php
				showParentTitle(1);
				showUlNavigator(1);
			  ?>
            </ul>
			<br />
			<br /> 
            <ul id="lon-navigator">
			  <?php
				showParentTitle(2);
				showUlNavigator(2);
			  ?>
            </ul>
          </div>
		  <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
		<h4>Winners at Pearland Country Club, March 24, 2018</h4>
		<TABLE id="datas" class="fixed" style="font-size:6px;" align=center border="0">
			<col width="120px" />
            <col width="120px" />
            <col width="120px" />
		    <col width="120px" />
		    <col width="120px" /> 
            <col width="120px" />
			<thead>
				<TR>
					<TD>   </TD> 
					<TD> Gross Winners </TD>
					<TD>   </TD>
					<TD>   </TD> 
					<TD> Net Winners </TD>
					<TD>   </TD> 
				</TR>
			</thead>
			<tbody>
			</tbody>
		</TABLE>

		<h4> Snapshots photographed by BingG, Thanks, Bing!</h4>
    
        <TABLE id="snapshots" class="fixed" align="center" border="0">
			<col width="120px" />
            <col width="120px" />
            <col width="120px" />
            <col width="120px" /> 
			<col width="120px" /> 
            <col width="120px" />
			<tbody>	
			</tbody>
         </TABLE> 
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
<script type="text/javascript">
	$(document).ready(function(){
		disableLiUrl($("#hcga-navigator a"));
		showContent($("#hcga-navigator li:first").find("a:first"))
	});
	
	function disableLiUrl(liArray){
		$.each(liArray, function(index, element){
			$(element).attr("href", "javascript:void(0);");
			$(element).attr("onclick", "showContent(this)");
		});
	}
	function showContent(a){
		$("#datas tbody").empty();
		$("#snapshots tbody").empty();
		var nId = $(a).attr("id");
		//console.log("nId =======> " + nId);
		$.ajax({
			url:"controller/GetHCGAContent.php",
			type:"POST",
			data:{nId:nId},
			dataType:"JSON",
			success:function(result){
				//console.log(result);
				var average = result.length / 2;
				for(var i = 0; i < average; i++){
					var html = '<TR>'
								+'<TD>'+ result[i].ranking +'</TD>'
								+'<TD>'+ result[i].winner +'</TD>'
								+'<TD><a href="'+ result[i].snapshot +'"> <img id="champion"   src="'+ result[i].snapshot +'"  height="60" width="60"> </a></TD>'
								+'<TD>'+ result[i + average].ranking +'</TD>'
								+'<TD>'+ result[i + average].winner +'</TD>'
								+'<TD><a href="'+ result[i + average].snapshot +'"> <img id="gross3"   src="'+ result[i + average].snapshot +'"  height="60" width="60"> </a></TD>'
							  +'</TR>';
					$("#datas tbody").append(html);
				}
				//Load snapshots.
				$.ajax({
					url:"controller/GetSnapshots.php",
					type:"POST",
					data:{nId:nId},
					dataType:"JSON",
					success:function(result){
						//console.log(result);
						showSnapshots(result)
					}
				});
			}
		});
	}
	
	function showSnapshots(snapshots){
		var loopNum = Math.floor(snapshots.length / 6);
		//console.log(loopNum);
		for(var i = 0; i < loopNum; i++){
			var html = '<TR>' 
						+'<TD><a href="'+ snapshots[i + 0].url +'"> <img id="group2" src="'+ snapshots[i + 0].url +'" height="60" width="60"></a></TD>'
						+'<TD><a href="'+ snapshots[i + 1].url +'"> <img id="group2" src="'+ snapshots[i + 1].url +'" height="60" width="60"></a></TD>'
						+'<TD><a href="'+ snapshots[i + 2].url +'"> <img id="group2" src="'+ snapshots[i + 2].url +'" height="60" width="60"></a></TD>'
						+'<TD><a href="'+ snapshots[i + 3].url +'"> <img id="group2" src="'+ snapshots[i + 3].url +'" height="60" width="60"></a></TD>'
						+'<TD><a href="'+ snapshots[i + 4].url +'"> <img id="group2" src="'+ snapshots[i + 4].url +'" height="60" width="60"></a></TD>'
						+'<TD><a href="'+ snapshots[i + 5].url +'"> <img id="group2" src="'+ snapshots[i + 5].url +'" height="60" width="60"></a></TD>'
					  +'</TR>';
			$("#snapshots tbody").append(html);
		}
		if(snapshots.length % 6 != 0){
			$("#snapshots tbody").append("<tr></tr>");
			var restNum = (snapshots.length - (6 * loopNum));
			//console.log(restNum);
			for(var i = 0; i < restNum; i++){
				var html = '<TD><a href="'+ snapshots[i + (6 * loopNum)].url +'"> <img id="group2" src="'+ snapshots[i + (6 * loopNum)].url +'" height="60" width="60"></a></TD>';
				$("#snapshots tbody").find("tr:last").append(html);
			}
			
		}
	}
</script>
</html>
