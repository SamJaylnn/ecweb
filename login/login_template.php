<div class="container" style="width: 400px; margin: 200px auto;">
    <h2 class="col form-signin-heading">Please sign in</h2>
    <br>
  <form class="row form-signin" action="verify.php" method = "post">
    <div class="input-group">
        <label class="col-3 col-form-label">Username</label>
        <input type="content" name="USERNAME" class="col-8 form-control" placeholder="Username">
    </div>
    <br>
    <div class="input-group" style="margin-top:10px">
        <label class="col-3 col-form-label">Password</label>
        <input type="password" name="PASSWORD" class="col-8 form-control" placeholder="Password">
    </div>
    <br>
    <div class="checkbox" style="margin-top:10px; margin-left:20px">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" style="margin-top:10px; margin-bottom:10px" type="submit">Sign in</button>
  </form>
  
  
<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
  
  <form action="/user/create.php">
    <input class="btn btn-outline-info" style="margin:10px auto" type="submit" value="New User" />
  </form>

</div>