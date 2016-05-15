{% extends 'templates/default.php' %}

{% block title %}404{% endblock %}

{% block content %}

{% if auth %}
<div class="container">
    <div class="card card-container">
		<div class="global">This page can't be found.</div>
    </div><!-- /card-container -->
</div><!-- /container -->
{% endif %}


{% endblock %}