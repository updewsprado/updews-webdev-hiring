<html>
<head>
    <title>Day2-HTML</title> 
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <header class="fixed-nav-bar">
        <ul>
            <h2>Day2-HTML</h2>
            <li class="dropdown">
                <a href="#" class="dropbtn">Home</a>
                <div class="dropdown-content">
                  <a href="#">Gallery</a>
                  <a href="#">Contact Us</a>
                  <a href="#">Forum</a>
                  <a href="#">Signin / Signup</a>
                  <a href="#">Report</a>
              </div>
          </li>
      </ul> 
  </header>
  <div class="p-container">
      <p>"Tonight we dine in the Dark zone"</p>
      <form action="save_users.php" method="post">
        <input type="text" name="fullname" placeholder="Full name">
        <input type="text" name="email" placeholder="Email Address">
        <input type="text" name="age" placeholder="Age">
        <button type="submit" name="btn-save"><strong>SAVE</strong></button>
      </form>
  </div>
</body>
</html>
