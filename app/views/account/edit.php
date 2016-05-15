{% extends 'templates/default.php' %}

{% block title %}Edit profile{% endblock %}

{% block content %}

{% if auth %}

<div class="container">
    <div class="card card-container">
         <legend><h2>Edit profile</h2></legend>

        <form action="{{ urlFor('account.edit.post') }}" method="post">

            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ request.post('email') ? request.post('email') : auth.email }}">
            {% if errors.has('email') %}{{ errors.first('email') }}{% endif %}
			<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="{{ request.post('first_name') ? request.post('first_name') : auth.first_name }}">
            {% if errors.has('first_name') %}{{ errors.first('first_name') }}{% endif %}
			<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="{{ request.post('last_name') ? request.post('last_name') : auth.last_name }}">
            {% if errors.has('last_name') %}{{ errors.first('last_name') }}{% endif %}

            <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Edit</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

{% endif %}


{% endblock %}