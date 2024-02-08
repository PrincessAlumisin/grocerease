<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/contact-us.css">
    <title>GrocerEase</title>
    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="assets/images/logo1.png"></a>
                    </div>
                    <div class="menu">
                        <ul>
                            <a href="homepage.php">Home</a>
                            <a href="about-us.php">About</a>
                            <a href="contact-us.php">Contact</a>
                        </ul>
                    </div>
                    <div class="login-btn">
                        <a href="index.php">Login</a>
                    </div>
        </div>  
        <div class="login">
            <h1>Contact Us</h1>
            <form>
                <div class="row">
                    <input type="text" required>
                    <span>Name</span>
                </div>
                <div class="row">
                    <input type="email" required>
                    <span>Email</span>
                </div>
                <div class="row">
                    <input type="number" required>
                    <span>Mobile</span>
                </div>
                <div class="row">
                    <textarea rows="3" required></textarea>
                    <span>Message</span>
                </div>
                <div class="row">
                    <input type="submit" value="Send Message">
                </div>
            </form>
        </div>
    </div>    
</body>
</php>