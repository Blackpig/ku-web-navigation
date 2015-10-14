<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<p>The following KU Navigator endpoint is due for review within the next two weeks:</p>

<p>Review Date: {{ $endpoint->review_date }}<br />
Display name: <a href="https://portal.kingston.ac.uk/ServiceDesk.WebAccess/ss/Query/List.rails?class_name=Config.ConfigItem&attributes=Guid&template=Edit%20Actions&hide_filters=True&query_changed=False&cns=Guid-e-0&c0={{ $endpoint->guid }}">{{ $endpoint->name }}</a>
</p>  
 
<p>You are receiving this email because you are named as the primary point of contact for the endpoint.</p>
 
<p>Please click on the above link to take one of the following actions:</p>
<ul>
	<li>Confirm that the endpoint is still required, and the URL it directs to is still relevant by extending the review date into the future</li>
	<li>Or, update, retire or reassign the endpoint.</li>
</ul>
 
 
<p>For more information on KU Navigator, <a href="https://mykingston.kingston.ac.uk/tools/KU-Navigator/Pages/default.aspx">click here</a></p>
</body>
</html>