<?php
$servername = "localhost";
$username = "FullUser";
$mypassword = fopen("password.gitignore","r") or die("Unable to open file!");
$password = fread($mypassword,filesize("password.gitignore"));
$database="mydatabase";
fclose($mypassword);

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sendquery ="SELECT distinct zip FROM users";

echo "<html>";
echo "<body>";
echo "<p>";
if ($qresult = $conn -> query($sendquery)) {
    while($row = $qresult -> fetch_row()){
        echo "<ul>";
        echo "<li>";
        printf("zip: (%s) \n", $row[0]);       //% means where it will be inserting the arguement
        echo("\n");
        echo "</li>";
        echo "</ul>";
    }
    $qresult -> free_result();
}
echo "</p>";
echo "</body>";
echo "</html>";
$conn -> close();
?>