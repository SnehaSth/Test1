<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Banking Software</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Sneha</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-form">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Signupform.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
      </div>
    </nav>

    <!-- Jumbotron / Hero Section -->
    <div class="jumbotron">
      <h1 class="display-4">Welcome to Our Banking Software</h1>
      <p class="lead">
        Experience secure and convenient banking services with us.
      </p>
      <a class="btn btn-light btn-lg" href="#" role="button">Get Started</a>
    </div>

    <!-- Features Section -->
    <div class="container features">
      <div class="row">
        <div class="col-md-4">
          <div class="feature-box">
            <h3>Withdraw Amount</h3>
            <p>
              Withdraw your money anytime conveniently.
            </p>
            <button type="submit" class="btn1" href="withdraw.php">Withdraw</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <h3>Online Banking</h3>
            <p>Access your accounts anytime, anywhere with our online banking
              services.</p>
              <button type="submit" class="btn1" href="">Online Banking</button> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <h3>Deposit</h3>
            <p>
              Deposit your amount safely with us.
            </p>
            <button type="submit" class="btn1" href="deposite.php">Deposit</button>
          </div>
        </div>
      </div>
    </div>
    <!--Contact Us-->
    <!-- Contact Form Section -->
    <div class="container contact-form">
      <h2 class="text-center mb-4">Contact Us</h2>
      <form>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Your Name">
              </div>
              <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Your Email">
              </div>
          </div>
          <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>

    <!-- Footer Section -->
    <footer class="footer">
      <p>&copy; 2024 Banking Software. All rights reserved.By Sneha Shrestha</p>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
