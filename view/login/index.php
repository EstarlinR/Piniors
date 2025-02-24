<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/public/styles/login.css">
    <link rel="icon shortcut" href="/public/favicon.svg">
    
    <title>Login</title>
</head>
<body>
<div id="login">
      <div class="login-container">
          <div class="login-info-container">
            <h1 class="title">Log in with</h1>
            <div class="social-login">
                <div class="social-login-element">
                    <img src="/public/img/google.png" alt="google-image">
                    <span>Google</span>
                </div>
                <div class="social-login-element">
                    <img src="/public/img/facebook.png" alt="facebook-image">
                    <span>Facebook</span>
                </div>
            </div>
            <p>or</p>
            <form class="inputs-container" method="POST" action="<?php echo constant('URL');?>/login/login">
                <input class="input" type="text" name="username" placeholder="Username">
                <input class="input" type="text" name="password" placeholder="Password">
                <p>Forgot password? <span class="span">Click here</span></p>
                <button class="btn" id="btn-login" name="submit"  >login</button>
                <p>Don't have an account? <a href="registro"><span  class="span">Sign Up</span></p></a>
            </form>
          </div>
            <img class="image-container" src="/public/icons/login.svg" alt="">
      </div>
    </div>
    </div>

</body>
</html>