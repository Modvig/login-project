{% extends 'templates/default.php' %}

{% block title %}Register{% endblock %}

{% block content %}
<div class="container">
    <div class="card card-container">
        <legend><h2>Create account</h2></legend>
        <form action="{{ urlFor('register.post') }}" method="post">

            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" name="email" id="email" class="form-control" {% if request.post('email') %} value="{{ request.post('email') }}"{% endif %} placeholder="Email" required>
            {% if errors.first('email') %}{{ errors.first('email') }}{% endif %}


            <input type="text" name="username" id="username" class="form-control" {% if request.post('username') %} value="{{ request.post('username') }}"{% endif %} placeholder="Username" required>
			{% if errors.first('username') %}{{ errors.first('username') }}{% endif %}

			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
			{% if errors.first('password') %}{{ errors.first('password') }}{% endif %}

			<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Password again" required>
			{% if errors.first('password') %}{{ errors.first('password') }}{% endif %}
            <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
{% endblock %}