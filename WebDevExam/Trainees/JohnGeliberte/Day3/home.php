<html>
<head>
  <title>Day3-CSS</title> 
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
  <header class="fixed-nav-bar">
    <ul class="header-container">
      <h2>Day3-CSS</h2>
    </ul> 
  </header>
  <div class="content-container">
    <div class="sidebar">
    </div>
    <div class="p-container">
      <div>
       <ul>
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
    </div>
    <p>"Tonight we dine in the Dark zone"</p>
    <form action="save_users.php" method="post">
      <input type="text" name="fullname" placeholder="Full name">
      <input type="text" name="email" placeholder="Email Address">
      <input type="text" name="age" placeholder="Age">
      <button type="submit" name="btn-save"><strong>SAVE</strong></button>
    </form>
  </div>
</div>
</body>
</html>
