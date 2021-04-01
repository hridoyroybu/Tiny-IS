<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: 10%;
  margin-top: 2%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

</style>

</head>
    <body>
   
<?php
    include 'config.php';
    include 'database.php';
?>
<?php
   $db =  new Database();
   if(isset($_POST['submit'])){
       $N = mysqli_real_escape_string($db->link , $_POST['name']);
       $E = mysqli_real_escape_string($db->link ,$_POST['email']);
       $P = mysqli_real_escape_string($db->link ,$_POST['phn']);
       
        if($N == '' || $E == '' || $P == '')
            echo "<span style='color:red'> Filled should not be blank </span>";
        else{
            $query = "INSERT INTO user(name,email,phn) values('$N' , '$E', '$P')";
            $create = $db->insert($query);        
        }
   }
?>

<form action="insert.php" method="post">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Enter Name"></td>
    </tr>
     <tr>
        <td>Email</td>
        <td><input type="text" name="email" placeholder="Enter Email"></td>
    </tr>
     <tr>
        <td>Phone</td>
        <td><input type="text" name="phn" placeholder="Enter Phone"></td>
    </tr>
     <tr>
         <td></td>
         <td><input type="submit" name="submit" value="Submit">
    </tr>
</table>
                
 </form>
<a href="index.php">Back to Home</a>
        
    </body>
</html>
