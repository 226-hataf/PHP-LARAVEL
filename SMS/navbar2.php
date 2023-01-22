<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      <form class="form-inline my-2 my-lg-0">
      
      <!-- <input href="searcheddata.php=<?php echo $user['CusName']?>" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <a href="searcheddata.php=<?php echo $user['CusName']?>" class="btn btn-outline-success my-2 my-sm-0">Search</a> -->

      <div class="row">
            <div class="col-md-8 ">
            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')||($_SESSION['role'] == 'normal')) {
              
            ?>
              <a href="add_record.php" class="btn btn-primary">Add New Record</a>
            <?php
            }
            ?>  
            </div>
      </div>
      <div class="row">
            <div class="col-md-8 ">
              <a href="logout.php" name="logout" class="btn btn-success">logout</a>
            </div>
      </div>    
      </form>
    </ul>
  </div>
</nav>