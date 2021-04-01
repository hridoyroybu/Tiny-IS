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
   $id = $_GET['id'];
   $query = "SELECT * FROM user WHERE id=$id";
   $getdata = $db->select($query)->fetch_assoc();
   
   if(isset($_POST['submit'])){
       $N = mysqli_real_escape_string($db->link , $_POST['name']);
       $E = mysqli_real_escape_string($db->link ,$_POST['email']);
       $P = mysqli_real_escape_string($db->link ,$_POST['phn']);
       
        if($N == '' || $E == '' || $P == '')
            echo "<span style='color:red'> Filled should not be blank </span>";
        else{
            $query = "UPDATE user SET name='$N' , email='$E', phn='$P' WHERE id=$id ";
            $update = $db->update($query);        
        }
   }
?>
        
<?php
    if(isset($_POST['delete'])){
        $query = "DELETE FROM user WHERE id= $id";
        $deletedata = $db->Delete($query);
    }
?>

        <form action="update.php?id=<?php echo $id; ?>" method="post">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="<?php echo $getdata['name'];  ?>"></td>
    </tr>
     <tr>
        <td>Email</td>
        <td><input type="text" name="email" placeholder="<?php echo $getdata['email'];  ?>"></td>
    </tr>
     <tr>
        <td>Phone</td>
        <td><input type="text" name="phn" placeholder="<?php echo $getdata['phn'];  ?>"></td>
    </tr>
     <tr>
         <td><input type="submit" name="delete" value="Delete">
         <td><input type="submit" name="submit" value="Update">
         
    </tr>
</table>
                
 </form>
<a href="index.php">Back to Home</a>
        
    </body>
</html>
