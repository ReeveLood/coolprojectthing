<!DOCTYPE html>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
  echo "<script>console.log(success);</script>";
}
?>
<html lang="en-us">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css"></link>
    <script>
      function numChars(val) {
        var len = val.value.length;
        $('#charNum').text(len);
      };
      var coll = document.getElementsByClassName("collapsible");
      var i;
      
      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
      
    </script>
</head>
<body>
  <?php 
  $data = $data2 = $data3 = $data4 = $data5 = $data6 = $data7 = $data8 = $data9 = $essay = $col1 = $col2 = $col3 = "";
  
  $servername = "localhost";
  $username = "root";
  $dbname = "demo";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, "", $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $data2 = $_POST["data2"];
    $data3 = $_POST["data3"];
    $data4 = $_POST["data4"];
    $data5 = $_POST["data5"];
    $data6 = $_POST["data6"];
    $data7 = $_POST["data7"];
    $data8 = $_POST["data8"];
    $data9 = $_POST["data9"];
    $col1 = $_POST["col1"];
    $col2 = $_POST["col2"];
    $col3 = $_POST["col3"];
    $essay = $_POST["essay"];
  }
  if ($data != "" and $data4 != "" and $data7 != ""){
    $sql = "TRUNCATE TABLE Data;";
        if(mysqli_query($conn, $sql)){
          echo "<script>console.log('success')</script>";
        } else {
          echo "failure";
        }
    $sql = "INSERT INTO Data (row1, row2, row3)
            VALUES ($data, $data2, $data3),
            ($data4, $data5, $data6),
            ($data7, $data8, $data9);";
    if (mysqli_multi_query($conn, $sql)) {
      echo "<script>console.log(New records created successfully)</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $sql = "INSERT INTO Data (col)
            VALUES('$col1');";
    if (mysqli_query($conn, $sql)) {
      echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $sql = "INSERT INTO Data (col)
            VALUES('$col2');";
    if (mysqli_query($conn, $sql)) {
      echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $sql = "INSERT INTO Data (col)
            VALUES('$col3');";
    if (mysqli_query($conn, $sql)) {
      echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  ?>
  <div class="pager">
  <div class="headr">
  <h1><font size="7">Academia</font></h1>
  </div>
  <div class="container">
    <img src="https://aatvos.com/wp-content/uploads/2018/10/Aatvos_Koln-Kalk_library-social-inclusion-1.jpg" alt="library image" width="500" height="500" class="center">
  </div>
  <br>
  <button data-toggle="collapse" data-target="#demo" class="btn btn-primary btn-lg btn-block">Insert Data Table</button>
  <br>
  <div id="demo" class="collapse">
  <h>Data Input Center. Place data in here and get it saved and get certain statistics of the data.</h>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="usrform">
      Col1: <input type="text" name="col1" value="<?php echo $col1;?>">
      Col2: <input type="text" name="col2" value="<?php echo $col2;?>">
      Col3: <input type="text" name="col3" value="<?php echo $col3;?>"><br>
      Data: <input type="text" name = "data" value="<?php echo $data;?>">
      Data: <input type="text" name="data2" value="<?php echo $data2;?>">
      Data: <input type="text" name="data3" value="<?php echo $data3;?>"><br>
      Data: <input type="text" name="data4" value="<?php echo $data4;?>">
      Data: <input type="text" name="data5" value="<?php echo $data5;?>">
      Data: <input type="text" name="data6" value="<?php echo $data6;?>"><br>
      Data: <input type="text" name="data7" value="<?php echo $data7;?>">
      Data: <input type="text" name="data8" value="<?php echo $data8;?>">
      Data: <input type="text" name="data9" value="<?php echo $data9;?>">
    <input type="submit" name="submit" value="Submit">
    </form>
  </div>
    <br>
  <button data-toggle="collapse" data-target="#demo2" class="btn btn-info btn-lg btn-block">Insert Essay</button>
  <div id="demo2" class="collapse">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="usdform">
    <textarea id="field" rows="4" cols="50" name="essay" onkeyup="numChars(this)" form="usdform" value="<?php echo $essay;?>">Place some data in here. (For English)</textarea>
    <input type="submit" name="submit" value="Submit">
    <br>
    Num of Chars: <h id="charNum"></h>
  </div>
    <br>
    </form>
    <h>Input:</h>
    <?php
      $servername = "localhost";
      $username = "root";
      $dbname = "demo";
      $average1 = 0;
      $average2 = 0;
      $average3 = 0;
        
      // Create connection
      $conn = mysqli_connect($servername, $username, "", $dbname);
      // Check connection
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "SELECT col FROM Data";
      if ($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                
                    echo "<tr>";
                        echo "<th>id</th>";
                        while($row = mysqli_fetch_array($result)){
                          echo "<th>" . $row['col'] . "</th>";
                        }
                    echo "</tr>";
            } else {
              echo "No columns.";
            }
      } else {
        echo "ERROR: Could not execute $sql";
      }
      $sql = "SELECT id,row1,row2,row3 FROM Data";
      if ($result = mysqli_query($conn, $sql)){
        if (mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)){
                if ($row['id']<4){
                  if ($row['id'] == 1){
                    $average1 += $row['row1'];
                    $average1 += $row['row2'];
                    $average1 += $row['row3'];
                  }else if ($row['id'] == 2){
                    $average2 += $row['row1'];
                    $average2 += $row['row2'];
                    $average2 += $row['row3'];                    
                  } else if ($row['id'] == 3){
                    $average3 += $row['row1'];
                    $average3 += $row['row2'];
                    $average3 += $row['row3'];                    
                  }
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['row1'] . "</td>";
                        echo "<td>" . $row['row2'] . "</td>";
                        echo "<td>" . $row['row3'] . "</td>";
                    echo "</tr>";
                }
                if ($row['id'] == 4){
                  $average1 /= 3;
                  $average2 /= 3;
                  $average3 /= 3;
                }
          }
          echo "</table>";
          mysqli_free_result($result);
        } else {
          echo "No records matching your query were found.";
        }
      } else {
        echo "ERROR: Could not execute $sql";
      }
      echo "Average of first row: " . $average1 . "<br>";
      echo "Average of second row: " . $average2 . "<br>";
      echo "Average of third row: " . $average3 . "<br>";
      echo $essay;
  ?>
   <div class="res">
      <h1 style="text-align: center;"><font size="7">Resources</font></h1>
      <hr>
      <p style="margin-left:10px;"><font size="3">Here are a couple of reliable resources for academic work and research.</font></p>
      <ul>
        <li><a href="https://www.jstor.org/" target="_blank">Jstor</a></li>
        <li><a href="https://scholar.google.com/" target="_blank">Google Scholar</a></li>
        <li><a href="https://www.ebsco.com/academic-libraries" target="_blank">EBSCO</a></li>
        <li><a href="https://www.science.gov/" target="_blank">Science.gov</a></li>
        <li><a href="https://www.scopus.com/home.uri" target="_blank">Scopus</a></li>
      </ul>
      <p style="margin-left:10px;"><font size="3">Encyclopedia resources. (Not meant to be cited generally)</font></p>
      <ul>
        <li><a href="https://en.wikipedia.org/wiki/Main_Page" target="_blank">Wikipedia</a></li>
        <li><a href="https://www.britannica.com/" target="_blank">Britannica</a></li>
        <li><a href="https://www.dictionary.com/" target="_blank">Dictionary.com</a></li>
        <li><a href="https://www.merriam-webster.com/" target="_blank">Webster Dictionary</a></li>
        <li><a href="https://www.gutenberg.org/" target="_blank">Gutenberg</a></li>
        <li><a href="https://archive.org/web/" target="_blank">Wayback Machine</a></li>
      </ul>
      <br>
    </div> 
    <button id="button" type="button" onclick="myFunction()">Random tip!</button>
    <div id="demo3"></div>
    <script type="text/javascript">
        window.onload = (function () {
            var tips = ["Always cite your sources!", "Make sure to use peer-reviewed papers when doing research.", "Even when paraphrasing, it is better to cite the source to be sure.", "Check extra information on the authors of your work to see how credible they are.", "Need help making citations? Do not use auto citation - check the official guidelines." ]
            var refButton = document.getElementById("button");

            refButton.onclick = function() {
                document.getElementById("demo3").innerHTML = tips[Math.floor(Math.random() * tips.length)];
            };
        });
    </script>
    <script>
      (function() {
        var cx = '005364593558451367129:1q1xi2lp6vo';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
      
    </script>
    <gcse:search></gcse:search>
    <br>
  </div>
</body>
</html>
<!-- add random tip