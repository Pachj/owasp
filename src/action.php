<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SQL Injection form error example</title>
    <meta name="description" content="Twitter Bootstrap Version2.0 form error example from w3resource.com."> <link href="http://localhost/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body style="margin-top: 50px">
<div class="container">
    <div class="row">
        <div class="span6">
            <?php
            $host="db";
            $username="root";
            $password="MYSQL_ROOT_PASSWORD";
            $db_name="MY_DATABASE";

            try {
                $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $uid = $_POST['uid'];
            $pid = $_POST['passid'];

            $sql = $conn->prepare("select * from user_details where userid = :uid and password = :pid");
            $sql->bindParam(':uid', $uid);
            $sql->bindParam(':pid', $pid);

            $result = $sql->execute();

            if($result)
            {

            $rows = $sql->fetchAll(PDO::FETCH_BOTH );

            echo "<h4>".
                "-- Personal Information -- ".
                "</h4>",
            "</br>";
                foreach ($rows as $row)
                {
                    echo "
        <p>".
                        "User ID : ".
                        $row[0]."
        </p>";
                    echo "
        <p>".
                        "Password : ".
                        $row[1]."
        </p>";
                    echo "
        <p>".
                        "First Name : ".
                        $row[2]." Last Name : ".
                        $row[3].
                        "</p>";
                    echo "
        <p>".
                        "Gender : ".
                        $row[4]." 
          Date of Birth :".
                        $row[5]."
        </p>
   ";echo "
        <p>".
                    "Country : ".
                    $row[6]." 
          User rating : ".$row[7].
                    "</p>
   ";
                    echo "<p>
   "."Email ID : ".
                        $row[8].
                        "</p>";
                    echo "--------------------------------------------";
                }}
            else echo "Invalid user id or password";
            ?>
        </div>
    </div>
</div>
</body>
</html>

<!-- anything' or 'x'='x -->
