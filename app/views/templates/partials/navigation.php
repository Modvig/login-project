<ul class="nav navbar-nav">
	<li><a href="{{ urlFor('home')}}">Home</a></li>
  	
	{% if auth %}
  		<li><a href="{{ urlFor('account.all')}}">All profiles</a></li>
  		<li><a href="{{ urlFor('account.edit')}}">Edit profile</a></li>
  		<li><a href="{{ urlFor('logout')}}">Log out</a></li>
	{% else %}
  		<li><a href="{{ urlFor('register')}}">Register</a></li>
  		<li><a href="{{ urlFor('login')}}">Login</a></li> 
  	{% endif %}
</ul>