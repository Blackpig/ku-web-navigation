<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<p style="color:red">The following endpoint is pointing to a link that is broken.</p>

<p>The specified link may have moved, been removed or you may have mis-typed it on entry.</p>

<p>Display name: <a href="https://portal.kingston.ac.uk/ServiceDesk.WebAccess/ss/Query/List.rails?class_name=Config.ConfigItem&attributes=Guid&template=Edit%20Actions&hide_filters=True&query_changed=False&cns=Guid-e-0&c0={{ $endpoint->guid }}">{{ $endpoint->name }}</a> <small>(Click to edit endpoint)</small><br />
	Link target: <a href="{{ $endpoint->url }}">{{ $endpoint->url }}</a> <small>(Click to visit the link)</small>
</p>  
 
<p>You are receiving this email because you are named as the primary point of contact for the endpoint.</p>
 
<p>Please click on the endpoint edit link above to correct the target link</p>
 
<p>For more information on KU Navigator, click here <a href="https://mykingston.kingston.ac.uk/tools/KU-Navigator/Pages/default.aspx"></a></p>
</body>
</html>