<html>
<head>
  <!-- The title of tab of the website. -->
  <title>Missile Alert System Augmentation</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <style>
    .wrapper {
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
      grid-auto-rows: minmax(500px, auto);
      grid-gap: 1em;
      /* Horizontal Placement */
      justify-items: stretch;
      /* Vertical Placement */
      align-items: stretch;
    }

    /* Make every div in wrapper with #eee color and with padding of 1em */
    .wrapper > div {
      background: lightgoldenrodyellow;
    }

    .box1 {
      grid-column: 2/3;
      border: 4px solid black;
      text-align: center;
    }

    .box1 > div {
      margin: 1em;
      padding: .5em;
    }

    .steps {
      display: grid;
    }

    input[type='test'] {
      -webkit-appearance: none;
      width: 30px;
      height: 30px;
      background: white;
      border-radius: 5px;
      border: 2px solid #555;
      margin-top: -5px;
    }

    input[type='checkbox']:checked {
      background: #abd;
    }

    h3 {
      margin: 0 auto;
    }

    input[type=submit] {
      -webkit-appearance: none;
      width: 131px;
      height: 50px;
      background-color: red;
      color: white;
      margin-top: .5em;
      font-size: 2em;
      font-family: "Times New Roman";
      font-weight: bold;
      border: 2px solid black;
    }

    #back {
      text-align: center;
      background-color: #eee;
      color: black;
      padding: 1em 0em 1em 0em;
      margin: 0;
    }
  </style>
</head>
<body>
<div class="wrapper">
  <div class="box box1">
    <div style="border: 2px solid black">
      <h1 style="color: red;">EMERGENCY ALERT SYSTEM</h1>
    </div>

    <div class="steps" style="text-align: left; color: black; margin-top: 0px; margin-bottom: 0px;">
      <div style="margin: 0 auto;">
        <form action="../startingPages/firstPage.html" method="POST">
          <div>
            <h3>Username:</h3>
            <input type="text" name="username" id="username"> <br>
            <h3>Password:</h3>
            <input type="password" name="password" id="password">
          </div>
          <div>
            <input type="submit" name="submit" value="LOGIN">
          </div>
        </form>
        <script>
          document.getElementById("username").required = true;
          document.getElementById("password").required = true;
        </script>
        <?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $data = $_POST['username'] . '-' . $_POST['password'] . "\n";
    $ret = file_put_contents('../logs/login.txt', $data, FILE_APPEND | LOCK_EX);
    if ($ret === false) {
        die('There was an error writing this file');
    } else {
        echo "$ret bytes written to file";
    }
} else {
    die('no post data to process');
}
?>
      </div>
    </div>
  </div>
</div>
</body>
</html>