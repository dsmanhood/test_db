<?php

$username = "xxx";
$password = "xxx";
$hostname = "2017dreams.com"; 
$dbname = "twozeul1_leads";

$connection = mysql_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL"); // Establishing Connection with Server

$db_selected = mysql_select_db($dbname, $connection)
or die("Could not select databasename"); // Selecting Database from Server

if ($db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
    $create = "CREATE TABLE IF NOT EXISTS Users (
            Name varchar(255) NOT NULL,
            Email varchar(255) NOT NULL )";

    $results = mysql_query($create) or die (mysql_error());

    /* echo "The tables have been created !"; */
}

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

$name_field = $_POST['first_name'];
$name = mysql_real_escape_string($name_field);

$email_field = $_POST['email'];
$email = mysql_real_escape_string($email_field);

    if($name !=''||$email !=''){
    //Insert Query of SQL
        $query = mysql_query("insert into Users(Name, Email) values ('$name', '$email')");
       /* echo "<br/><br/><span>Data Inserted successfully...!!</span>"; */
    }
    else{
       /* echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>"; */
    }
}
mysql_close($connection); // Closing Connection with Server
?>