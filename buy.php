<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid #ff6600;
}

body {
	background-color:#e6e6e6;
	color:#009999;

}

#head {

font-size:2em;
color:#00b386;
text-align:center;
}

</style>
</head>
<body>

<h1 id="head"> Books in the Store </h1>

<?php

//connect to the server

$con = mysqli_connect('127.0.0.1','root','root@2016');

//check if it is connected
if(!$con)
{
    
    echo "Error Connecting to the server";
}

elseif(!mysqli_select_db($con,'book'))
{
    echo "Database not found";
}

//now sql commands

$sql = "select * from detail";


			
if(!mysqli_query($con,$sql))
{
    die("Query Failes!".mysqli_error($con));
}
else
{
  		

$result = $con->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Name of Seller</th><th>Book Name</th><th>Author</th><th>Publication</th><th>YEAR</th><th>Condition of the book</th><th>Comment</th><th>Phone</th>";
     // output data of each row
     while($row = $result->fetch_assoc())
     {
         echo
    "<tr><td>" . $row["name"]. "</td><td>" . $row["bname"]. "</td><td> " . $row["author"]. "</td>"."<td>" . $row["public"]. "</td><td>" . $row["year"]. "</td><td>" . $row["cond"]. "</td>"."<td>" . $row["comment"]. "</td><td>" . $row["phone"]. " " . "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
}  

//header("refresh:5;url=sign.html");

?>

</body>
</html>
