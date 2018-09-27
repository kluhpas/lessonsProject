<?php
  echo '
<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark ">

  <a id="navbar-brand" class="navbar-brand mx-auto" href="/lessonsProject/user/index.php">LessonsProject</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" id="navbar-ul">
      <li class="nav-item active">
        <a class="nav-link" href="/lessonsProject/user/profile.php">
        <img src="/lessonsProject/media/person.svg" id="navbar-icon" alt="missing icon">
        Profilo<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/lessonsProject/user/logout.php">
        <img src="/lessonsProject/media/account-logout.svg" id="navbar-icon" alt="missing icon">
        Logout</a>
      </li>
    </ul>
  </div>
</nav>';
 ?>
