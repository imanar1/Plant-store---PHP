<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php">
      <img src="../image/logo blomm2.png" alt="Logo" width="200" height="80">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navigation links and search form -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Navigation links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

          <a class="nav-link active" aria-current="page" href="homepage.php">
            <i class="fas fa-home" style="color: rgb(109, 161, 140);"></i> Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="gifts.php">
            <i class="fas fa-gift" style="color: rgb(109, 161, 140);"></i> Gifts
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="flowers.php">
            <i class="fas fa-seedling" style="color: rgb(109, 161, 140);"></i> Flowers
          </a>
        </li>
      </ul>

      <!-- Search form -->
      <form class="d-flex">
        <div class="input-group">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <span class="input-group-text" style="background-color: rgb(109, 161, 140);"><i class="fas fa-search"
              style="color: white;"></i></span>
        </div>
      </form>


      <!-- Signup, login buttons -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="signup.php">
            <i class="fas fa-user-plus" style="color: rgb(109, 161, 140);"></i> Signup
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">
            <i class="fas fa-sign-in-alt" style="color: rgb(109, 161, 140);"></i> Login
          </a>
        </li>

      </ul>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</nav>