<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Project - {% block title %}{% endblock %}</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/template.css" rel="stylesheet">

	</head>
	<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
	    	<div class="navbar-header">
	      		<a class="navbar-brand" href="#">Project</a>
	    	</div>
	    	{% include 'templates/partials/navigation.php' %}
	  </div>
	</nav>

	

	<div class="row">
		<div class="col-md-12">
			{% include 'templates/partials/messages.php' %}

			{% block content %}{% endblock %}
		</div>
	</div>

	 <script src="js/bootstrap.min.js"></script>
	</body>
</html>