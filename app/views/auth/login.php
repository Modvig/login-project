{% extends 'templates/default.php' %}

{% block title %}Login{% endblock %}

{% block content %}

<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form action="{{ urlFor('login.post') }}" method="post">

            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" name="identifier" id="identifier" class="form-control inputIdentifier" placeholder="Username or Email address" required autofocus>
            <input type="password" name="password" id="password" class="form-control inputPassword" placeholder="Password" required>
            <div class="form-group">
                {% if errors.first('identifier') %} {{ errors.first('identifier') }} {% endif %}
                {% if errors.first('password') %} {{ errors.first('password') }} {% endif %}
            </div>
            <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

{% endblock %}