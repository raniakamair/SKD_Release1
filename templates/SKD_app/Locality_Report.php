{% load php %}
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
		<title>Locality Report</title>
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
					<li class="app-">
						<a href="/SKD_app/Message_log"><span>Message log </span></a>
					</li>
					
				<li class="app-">
					<a href="/SKD_app/State_Report"><span>State Report</span></a>
					</li>
                                        
                                        <li class="app- active">
					<a href="/SKD_app/Locality_Report"><span>Locality Report</span></a>
					</li> 
                                        
                                        <li class="app-">
					<a href="/SKD_app/School_Report"><span>School Report</span></a>
					</li>

				
				
			</div>
			<br> 

	


{% php $con = mysql_connect("localhost","root","romo"); mysql_select_db ("mydb6",$con);mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"); %}

<table width="100%"  ><tr><td colspan=8 style="background-color:#505050;color:white"><b>Locality Report</b></td></tr><tr style="background-color:#F8F8F8" id=f><th>Locality</th><th>Status</th><th>Time</th><th>From</th><th>Quality</th><th>Type</th><th>Quantity</th><th>Duration (Days)</th></tr>
{% php  $list1 = mysql_query("select distinct locality_MsgID,DATEDIFF(locality_ArvTime , state_ArvTime) 'Duration',locality_name,locality_MsgTime,state_name,locality_quality  from SKD_app_locality,SKD_app_index_locality,SKD_app_index_state,SKD_app_state where SKD_app_locality.locality_smsType='R' and SKD_app_locality.locality_locality_id = SKD_app_index_locality.locality_index and SKD_app_index_locality.state_index_id = SKD_app_index_state.state_index and SKD_app_locality.locality_locality_id = SKD_app_state.state_locality_id "); %}
{% php  while($row_list1=mysql_fetch_array($list1)){ %}
{% php if ($row_list1['locality_quality'] == 3){ $a ='Bad';} else if ($row_list1['locality_quality'] == 1){ $a ='Very Good';} else if ($row_list1['locality_quality'] == 2){ $a ='Good';}%} 
{% php echo "<tr><td>".$row_list1['locality_name']."</td><td>Delivered</td><td>".$row_list1['locality_MsgTime']."</td><td>".$row_list1['state_name']."</td><td>".$a."</td><td>"; %}

{% php $list3 = mysql_query("select distinct localityTypes_Type from SKD_app_localitytypes,SKD_app_locality where localityTypes_msgId_id = ".$row_list1['locality_MsgID']); while($row_list3=mysql_fetch_array($list3)){echo $row_list3['localityTypes_Type']."<br>";}   %}

{% php echo"</td><td>"; $list4 = mysql_query("select distinct localityTypes_quantity from SKD_app_localitytypes,SKD_app_locality where localityTypes_msgId_id =".$row_list1['locality_MsgID']); while($row_list4=mysql_fetch_array($list4)){echo $row_list4['localityTypes_quantity']."<br>";}   %}

{% php echo"</td><td>".$row_list1['Duration']."</td></tr>";}  %}


{% php  $list = mysql_query("SELECT locality_name FROM SKD_app_index_locality where locality_index NOT IN (select DISTINCT locality_id from SKD_app_locality)"); %}
{% php  while($row_list=mysql_fetch_array($list)){ echo "<tr><td>".$row_list['locality_name']."</td><td> Not Delivered </td><td> - </td><td> - </td><td> - </td><td> - </td></tr>";}  %}

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

