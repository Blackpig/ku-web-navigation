<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<p style="color:red">The review date for the following KU Navigator endpoint has passed, and the review is now overdue.</p>

<p>Review Date: {{ $endpoint->review_date }}<br />
Display name: <a href="">{{ $endpoint->name }}</a>
</p>  
 
<p>You are receiving this email because you are named as the primary point of contact for the endpoint.</p>
 
<p>Please click on the above link to take one of the following actions:</p>
<ul>
	<li>Confirm that the endpoint is still required, and the URL it directs to is still relevant by extending the review date into the future</li>
	<li>Or, update, retire or reassign the endpoint.</li>
</ul>
 
 
<p>For more information on KU Navigator, click here <a href=""></a></p>
</body>
</html>