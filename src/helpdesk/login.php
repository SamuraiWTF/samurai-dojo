<?php include 'header.inc'; ?>

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"><?php echo LOGIN_SIGN_IN;?></h1>
      <label for="inputEmail" class="sr-only"><?php echo LOGIN_USERNAME;?></label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only"><?php echo LOGIN_PASSWORD;?></label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo LOGIN_BUTTON_SIGNIN;?></button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

<?php include 'footer.inc';