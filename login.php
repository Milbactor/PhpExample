<?php
  include 'header.inc.php';
  
  /* Check whether username and password are set and store them. */
  if(isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    /* Check whether they match. */
    if ($user === 'person' && $pass === 'person') {
      /* Set cookies.*/
      setcookie('user', $user);
      setcookie('pass', $pass);

      /* Redirect to the admin page. */
//      header('location: admin.php');
    } else {
      /*
       * Display an error mesagge if the username or password are 
       * incorect.
       */ 
      error('Wrong username or password!');
    }
  }
?>
    <h1>Log in</h1>
    <form method="post" action="login.php">
      <dl>
        <dt>Username</dt><dd><input type="text" name="user" /></dd>
        <dt>Password</dt><dd><input type="text" name="pass"></dd>
      </dl>
      <input type="submit" name="submit" value="Login" />
    </form>
<?php
  include 'footer.inc.php';
?>
