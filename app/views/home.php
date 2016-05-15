{% extends 'templates/default.php' %}

{% block title %}Home{% endblock %}

{% block content %}

{% if auth %}
<div class="container">
    <div class="card card-container">
		<div class="global">Hello {{ auth.getFullNameOrUsername }}</div>
    </div><!-- /card-container -->
</div><!-- /container -->
{% endif %}


{% endblock %}