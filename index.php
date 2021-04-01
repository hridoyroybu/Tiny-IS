
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
    if(isset($_GET['msg']))
        echo "<span style='color:green'>".$_GET['msg']."</span>";
?>
<?php
   $db =  new Database();
   $query = "SELECT * FROM user";
   $read = $db->select($query);
?>
<table>
  <tr>
    <th width="5%">Serial</th>
    <th width="35%">Name</th>
    <th width="25%">Email</th>
    <th width="20%">Phone</th>
    <th width="10%">Action</th>
  </tr>

   <?php
   $cnt = 1;
    while ($row = $read->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$cnt++."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phn']."</td>";
        echo "<td> <a href=update.php?id=".urlencode($row['id']).">Edit</a></td>";
        echo "</tr>";
    }
    ?>
</table>
        <a href="insert.php">Insert Data</a>
                
    </body>
</html>
