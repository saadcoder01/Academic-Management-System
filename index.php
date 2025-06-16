<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>College Management System</title>
  <link rel="stylesheet" href="style.css"/>

  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('https://wallpaperaccess.com/full/1209458.jpg'); /* related to college/university */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
      font-size: 48px;
      text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 15px 30px;
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      border-radius: 12px;
      margin: 20px auto;
      width: 85%;
      box-shadow: 0 0 10px rgba(0,0,0,0.6);
    }

    .nav-item {
      position: relative;
      cursor: pointer;
      padding: 10px 15px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .nav-item:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .dropdown {
      display: none;
      position: absolute;
      top: 45px;
      left: 0;
      background-color: rgba(0, 0, 0, 0.85);
      min-width: 200px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.5);
      z-index: 100;
    }

    .nav-item:hover .dropdown {
      display: block;
    }

    .dropdown a, .navbar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      transition: background 0.2s ease;
    }

    .dropdown a:hover, .navbar a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .welcome-text {
      margin: 80px auto;
      margin-left: 50px;
      text-align: center;
      font-size: 38px;
      font-weight: bold;
      display: inline-block;
      padding: 30px 30px;
      background-color: rgba(0, 0, 0, 0.4); /* transparent dark background */
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
      text-shadow: 2px 2px 5px #000;
      animation: fadeIn 2s ease-in;
    }

    .welcome-text span {
      opacity: 0;
      animation: fadeLetter 1s ease-in forwards;
      display: inline-block;
    }

    .welcome-text span:nth-child(n) {
      animation-delay: calc(0.05s * var(--i));
    }

    @keyframes fadeLetter {
      to {
        opacity: 1;
        transform: translateY(0px);
      }
      from {
        opacity: 0;
        transform: translateY(10px);
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>

  <h1>College Management System</h1> 

  <!-- Navigation Bar -->
  <div class="navbar">
    <div class="nav-item">Login as Student
      <div class="dropdown">
        <a href="LoginStdAI.html">Artificial Intelligence</a>
        <a href="LoginStdDS.html">Data Science</a>
      </div>
    </div>
    <a href="LoginFct.html" class="nav-item">Login as Faculty</a>
    <div class="nav-item">Register as Student
      <div class="dropdown">
        <a href="RegisterStdAI.html">Artificial Intelligence</a>
        <a href="RegisterStdDS.html">Data Science</a>
      </div>
    </div>
    <a href="RegisterFct.html" class="nav-item">Register as Faculty</a>
  </div>

  <!-- Animated Welcome Message -->
  <div class="welcome-text" id="welcomeText">
    <span style="--i:1">W</span><span style="--i:2">e</span><span style="--i:3">l</span><span style="--i:4">c</span><span style="--i:5">o</span><span style="--i:6">m</span><span style="--i:7">e</span>
    <span style="--i:8"> </span>
    <span style="--i:9">T</span><span style="--i:10">o</span>
    <span style="--i:11"> </span>
    <span style="--i:12">C</span><span style="--i:13">o</span><span style="--i:14">l</span><span style="--i:15">l</span><span style="--i:16">e</span><span style="--i:17">g</span><span style="--i:18">e</span>
    <span style="--i:19"> </span>
    <span style="--i:20">M</span><span style="--i:21">a</span><span style="--i:22">n</span><span style="--i:23">a</span><span style="--i:24">g</span><span style="--i:25">e</span><span style="--i:26">m</span><span style="--i:27">e</span><span style="--i:28">n</span><span style="--i:29">t</span>
    <span style="--i:30"> </span>
    <span style="--i:31">S</span><span style="--i:32">y</span><span style="--i:33">s</span><span style="--i:34">t</span><span style="--i:35">e</span><span style="--i:36">m</span>
  </div>

  <script src="function.js"></script>
</body>
</html>
