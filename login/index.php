<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Anti-Foodwaste</title>
  </head>
  <body>
    <div class="container">
      <div class="form-box active" id="Login-form">
        <form action="">
          <h2>Login</h2>
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="login">Login</button>
          <p>Dont have an account? <a href="#" onclick="showForm('Register-form')">Register</a></p>
        </form>
      </div>
      <div class="form-box" id="Register-form">
        <form action="">
          <h2>Register</h2>
          <input type="text" name="username" placeholder="username" required />
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required/>
          <button type="submit" name="register">Register</button>
          <p>Already have an account? <a href="#" onclick="showForm('Login-form')">Login</a></p>
        </form>
      </div>
    </div>
    <script src="/login/script.js"></script>
  </body>
</html>
