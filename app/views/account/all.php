{% extends 'templates/default.php' %}

{% block title %}All profile{% endblock %}

{% block content %}

{% if auth %}

<div class="container">
    <div class="col-md-8 col-centered card">
         <legend><h2>All profiles</h2></legend>
         {% if users is empty %}
         	No registered users.
         {% else %}
         <table class="table table-hover">
		  	<thead>
			    <tr>
					<th>Username</th>
				    <th>First name</th>
				    <th>Last name</th>
				    <th>Created at</th>
			    </tr>
			</thead>
			<tbody>
	         	{% for user in users %}
	        	<tr>
		        	<td>{{ user.username }}</td>
		        	<td>{{ user.first_name }}</td>
		        	<td>{{ user.last_name }}</td>
		        	<td>{{ user.created_at }}</td>
		        </tr>
	         	{% endfor %}
        	</tbody>
        </table>

         {% endif %}

         <table>
         <tr><td></td></tr>

         </table>

       
    </div><!-- /card-container -->
</div><!-- /container -->


{% endif %}


{% endblock %}