{% load php %}
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
		<title>School Report</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />



<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/layout.css" />
<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/splits.css" />
<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/modules.css" />
<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/tables.css" />
<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/forms.css" />
<link type="text/css" rel="stylesheet" href="/static/rapidsms/stylesheets/icons.css" />



<script type="text/javascript" src="/static/rapidsms/javascripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/static/rapidsms/javascripts/collapse.js"></script>

<style type="text/css">
	#inner {
		margin: 4em 25%;
	}

	div.module div {
		border: 1px solid #ddd;
		border-top-color: #636363;
		margin-top: -1px;
	}

	div.module p {
		padding-left: 1em;
		padding-right: 1em;
	}

	code, pre {
		background: #ffe;
	}

	pre {
		padding: 1em;
		margin: 0;
	}
#f {
		font-size: 12px;
		
	}
</style>



</head>
       <body>


<div id="wrapper">
	

			
			<div id="header">
				<div id="branding">
					<h1>
						<a title="welcome">
							<span>RapidSMS</span>
						</a>
					</h1>
				</div>

				
				<div id="auth">
					<a href="/account/logout/">Log out root</a>
				</div>
				
				<ul id="tabs">
					<li class="app- active">
						<a href="/SKD_app/Message_log"><span>Message  </span></a>
					</li>
					
				<li class="app-">
					<a href="/SKD_app/State_Report"><span>State Report</span></a>
					</li>
                                        
                                        <li class="app-">
					<a href="/SKD_app/Locality_Report"><span>Locality Report</span></a>
					</li> 
                                        
                                        <li class="app-">
					<a href="/SKD_app/School_Report"><span>School Report</span></a>
					</li>

								
			</div>
                                    
			

	


{% php $con = mysql_connect("localhost","root","romo"); mysql_select_db ("mydb6",$con);mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"); %}




<br>
<table width="100%" border="1px" ><tr><td colspan=5 style="background-color:#505050;color:white"><b>Message Log</b></td></tr>
<tr style="background-color:#F8F8F8" id=f><th>From</th><th>Direction</th><th> Date</th><th>Text</th></tr>
{% php  $list1 = mysql_query("select direction, identity ,date,text from messagelog_message,rapidsms_connection where  messagelog_message.connection_id = rapidsms_connection.id  ORDER BY date DESC"); %}

{% php  while($row_list1=mysql_fetch_array($list1) or $row_list2=mysql_fetch_array($list2)){ echo "<tr id=f><td>".$row_list1['identity']." </td><td>".$row_list1['direction']."</td><td>".$row_list1['date']."</td><td>".$row_list1['text']."</td></tr>";}  %}

</table>

<div id="footer">
<p class="rights">Copyright &copy; 2008 &#8211; 2010
<a href="http://unicef.org">UNICEF</a> et al.<br />
<a href="http://github.com/rapidsms/rapidsms">RapidSMS</a> is available under
<a href="http://github.com/rapidsms/rapidsms/raw/master/LICENSE">the BSD license</a>.
				</p>

				<div class="footer-region">&bull; <a href="/export/database" class="db-export">Export to SQL</a>
</div>
			</div>
			

			
		</div>
	</body>
</html>

