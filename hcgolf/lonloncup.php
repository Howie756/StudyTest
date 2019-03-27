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
		<center> <a href="pictures\lonlon2017\lonlon.JPG"> <img id="lonlon"   src="pictures\lonlon2017\lonlon.jpg"  height="60" width="60"> </a> </center>
		Inspired by Ryder Cup and established in 2017, Lon Lon Cup competes annually in April between two local Chinese golf teams: Katy Cypress United (KCU) and Sugarland United (SLU) with the venue alternating 
		bewteen courses in Sugarland and Katy Houston Metro area. The tournament is sponsored by the couple of Jasmine Peng and Johnny. Lon Lon Cup is named after Dr. Peng's dearest pet as pictured above. 
		<BR />
		<BR />
		Li (Jasmine) Peng DDS, MS <BR />
		Specialist in Orthodontics <BR />
		Committed to beautiful, healthy smiles <BR /><BR />
		9889 Bellaire Blvd, C-315 <BR />
		(Dun Huang Plaza)<BR />
		Houston, TX  77036 <BR />
		Tel:713-981-1888 <BR />
		281-933-6228<BR /><BR />
		<h4>Attires sponsored by Lei Zheng at 
			<a href="http://www.harmoniacapital.com">Harmonia Capital</a>,and Robin Luo from
			<a href="http://www.idealoilgas.com/home.html">Ideal Oil and Gas </a>, as well as  Watson Yang
		</h4>
		<TABLE id="datas" class="fixed" style="font-size:6px;" align=center border="0">
			<col width="120px" />
            <col width="80px" />
            <col width="200px" />
            <col width="20px" />
			<col width="80px" /> 
            <col width="200px" />
			<thead>
				<TR> 
					<TD></TD>
					<TD>SLU</TD>
					<TD></TD>
					<TD></TD>
					<TD>KCU</TD>
					<TD></TD>
				</TR>
			</thead>
			<tbody>
			</tbody>
        </TABLE>
		<h4>Snapshots</h4>
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
		<p>Copyright &copy; HCGA |
			<a href="https://www.w3.org/TR/html5/">HTML5</a> |
			<a href="https://www.w3schools.com/html/html_css.asp">CSS</a> |
		</p>
	</div>
  </div>
</body>
<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		disableLiUrl($("#lon-navigator a"));
		showContent($("#lon-navigator li:first").find("a:first"))
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
		console.log("nId =======> " + nId);
		$.ajax({
			url:"controller/GetLonContent.php",
			type:"POST",
			data:{nId:nId},
			dataType:"JSON",
			success:function(result){
				showDatas(result);
				//Load snapshots.
				$.ajax({
					url:"controller/GetSnapshots.php",
					type:"POST",
					data:{nId:nId},
					dataType:"JSON",
					success:function(result1){
						//console.log(result);
						showSnapshots(result1)
					}
				});
			}
		});
	}
	
	function showDatas(datas){
		var html = '<TR>'
					+'<TD>'+ datas[0].datePlace +'</TD>'
					+'<TD>Captain</TD>'
					+'<TD>Players</TD>'
					+'<TD></TD>'
					+'<TD>Captain</TD>'
					+'<TD>Players</TD>'
				+'</TR>'
				+'<TR>'
					+'<TD></TD>'
					+'<TD>'+ datas[0].captain +'</TD>'
					+'<TD>'+ datas[0].players +'</TD>'
					+'<TD></TD>'
					+'<TD>'+ datas[1].captain +'</TD>'
					+'<TD>'+ datas[1].players +'</TD>'
				+'</TR>'
				+'<TR>'
					+'<TD>Winners</TD>'
					+'<TD>'+ datas[0].winners +'</TD>'
					+'<TD></TD>'
					+'<TD></TD>'
					+'<TD>'+ datas[1].winners +'</TD>'
					+'<TD></TD>'
				+'</TR>'
				+'<TR>'
					+'<TD>Group Pictures</TD>'
					+'<TD></TD>'
					+'<TD><a href="'+ datas[0].snapshot +'"><img id="slu1" src="'+ datas[0].snapshot +'" height="60" width="60"></a></TD>'
					+'<TD></TD>'
					+'<TD></TD>'
					+'<TD><a href="'+ datas[0].snapshot +'"><img id="kcu2" src="'+ datas[0].snapshot +'" height="60" width="60"></a></TD>'		   
				+'</TR>';
		$("#datas tbody").append(html);
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
