<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon" sizes="16x16">
        <title i class="fas fa-utensils">Food For Every Student</title>
    </head>
      </div>
    </div>
    <body id="page-<?php echo $page; ?>">
      <header>
        <div class="page-header-top text-left text-md-leftcontainer">
          <a href="index.php?p=home"><img src="./images/logo.jpg" alt="StudentEat"/></a><h2 class="text-right">Recipes to suit every Student at anytime.</h2>
        </div>
        <nav class="navbar navbar-expand-lg mb-4">
            <div class=”container”>
                <div class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-caret-square-down"></i>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?p=home">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?p=categories">Categories</a>
                      </li>
                    <form action="search.html" method="get" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                      <?php 
                      if($_SESSION['is_logged_in']) { 
                      ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=account">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=logout">Logout</a>
                        </li>
                      <?php 
                      }else{ 
                      ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=login">Login / Register</a>
                        </li>
                      <?php
                      } ?>
                    </ul>
                </div>                              
            </div>            
        </nav>  
      </header>