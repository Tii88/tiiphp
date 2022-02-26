<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">
</head>
<body>
    <div id="progressbar"></div>

    <!-- navbar - header -->

    <header>
        <div class="logo">
            <a href="index.html"><img src="./img/logo1.png" alt="logo"></a>
            <a href="#" class="header_logo">Tii</a>
        </div>
        <nav class="nav" id="nav-menu"> 
            <ion-icon name="close" class="header_close" id="close-menu"></ion-icon>
             <!-- facebook -->
           
            <!-- navbar -->
            <ul class="nav_list">
                <li class="nav_item"><a href="#about" class="nav_link">ទំព័រដេីម</a></li>
                <li class="nav_item"><a href="#" class="nav_link">ចង់ទិញស្រាបៀលឬក៏ទាក់ទង</a></li>
                <li class="nav_item"><a href="#" class="nav_link">លក់ស្រាបៀល</a></li>
                <li class="nav_item"><a href="#" class="nav_link">BN</a></li>
                <li class="nav_item"><a href="#" class="nav_link">kJ</a></li>
                <li class="nav_item"><a href="#content" class="nav_link">Content Us</a></li>
                <img src="./img/moon.png" id="icon">           
            </ul>
        </nav>
        <!-- menu-nabar --> 
        <ion-icon name="menu" class="header_toggle" id="toggle-menu"></ion-icon>
    </header>
    <div class="about" id="about"> 

    </div>

    <!-- contact form -->

    <div class="container" id="content">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <h3>Get Comments</h3>
            <input type="text" name="name" id="name" placeholder = "Your Name" required>
            <input type="email"name="email" id="email" placeholder="Email id" required>
            <input type="text" name="phone" id="phone" placeholder="Phone no." required>
            <textarea id="message" name="comment" rows="4" placeholder="How can we help you?"></textarea>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
            <button type="submit" name="post">Post Comments</button>
        </form>
    </div>




    <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<?php
echo "<h2>Your Input:</h2>";
echo "Name : $name";
echo "<br>";
echo "Email :$email";
echo "<br>";
echo "message :$comment";
echo "<br>";
echo "Gender :$gender";
?>



    <!-- javascrpit -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        
    
    <!-- javascrpit text -->

<script>
var icon2 = document.getElementById ("icon");
icon.onclick = function(){
   document.body.classList. toggle("dark-theme");
   if(document.body.classList.contains ("dark-theme")){
       icon.src = "img/sun.png";
   }else{
       icon.src = "img/moon.png";
   }
}              
</script>

<script>
$(window).scroll(function(){
    var scroll = $(window).scrollTop(),
    dh = $(document).height(),
    wh = $(window).height();
    scrollPercent = (scroll / (dh-wh)) * 100;
    $('#progressbar').css('height', scrollPercent + '%');
})    
</script>


<script>
const navMenu = document.getElementById('nav-menu'),
    toggleMenu = document.getElementById('toggle-menu'),
    closeMenu = document.getElementById('close-menu')

toggleMenu.addEventListener('click',() => {
    navMenu.classList.toggle('show')
})

closeMenu.addEventListener('click',() => {
    navMenu.classList.remove('show')
})
</script>
</body>
</html>