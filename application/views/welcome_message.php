<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Welcome</title>
  <style>
  body {
    margin: 0;
    padding: 0;
  }
  .hero {
    background-image: url("http://localhost:8080/waterfee/assets/chiangmai.png");
    background-size: cover;
    background-position: center;
    width: 100wh;
    height: 100vh;
    display: flex;
  }

  .center-content {
    width: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: auto;
  }
  .center-content h1, .center-content h3 {
    color: white;
    line-height: 1;
  }
  .center-content h1 {
    text-transform: uppercase;
    font-size: 3em;
    margin-bottom: 0;
    text-align: center;
  }
  .center-content h3 {
    margin-bottom: 40px;
    font-size: 1.5em;
    font-weight: normal;
  }
  .row {
    width: auto;
    height: auto;
  }
  .btn {
  box-sizing: border-box;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: transparent;
  border: 2px solid #e74c3c;
  border-radius: 0.6em;
  color: #e74c3c;
  cursor: pointer;
  display: flex;
  align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 1.2em 2.8em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
}
.btn:hover, .btn:focus {
  color: #fff;
  outline: 0;
}
.third {
  border-color: #3498db;
  color: #fff;
  box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0 #3498db;
  transition: all 150ms ease-in-out;
}
.third:hover {
  box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}
  </style>
</head>

<body>
<header class="hero">
  <div class="center-content">
    <h1>Welcome</h1>
    <h3>to our water calculator system.</h3>
    <div class="row">
      <a href="login" class="btn third">Customer Role</a>
      <a href="admin/login" class="btn third">Employee Role</a>
    </div>
  </div>
</header>
</body>
</html>
