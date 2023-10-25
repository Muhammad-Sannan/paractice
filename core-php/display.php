<?php
include('connection.php');
include('header.php');
?>
    <div class="container">
        <button class="btn btn-secondary my-5"><a href="index.php"class="text-light"> Add Data</a></button>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Profile Pic</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Year</th>
      <th scope="col">Certificate</th>
      <th scope="col">Created</th>
      <th scope="col">Edit/Delete </th>
      <th scope="col">More </th>
      
    </tr>
  </thead>
  <tbody>

    <?php
    // INNER JOIN

    $sql= "SELECT data.id, data.name, data.profilepic,data.address,information.year,information.certificate,data.created_at
    FROM `data`
    INNER JOIN `information` ON data.id=information.uid";

    // LEFT JOIN
    // $sql = "SELECT data.id,data.name,information.year,information.certificate
    // FROM `data`
    // RIGHT JOIN `information`
    // ON data.id=information.id";


    // RIGHT JOIN
    // $sql = "SELECT data.id, data.name,data.address,data.profilepic,data.created_at,information.year,information.certificate
    // $sql = "SELECT data.id,data.name,information.year,information.certificate
    // FROM `data`
    // RIGHT JOIN `information`
    // ON data.id=information.id";

    // CROSS JOIN
    // $sql = "SELECT data.id,data.name, information.year
    // FROM `data`
    // CROSS JOIN `information`";
 
    // SELF JOIN
    // $sql = "SELECT A.name AS name1, B.name AS name2, A.address
    // FROM `data` A, `data` B
    // WHERE A.address = B.address
    // ORDER BY A.address";

    // echo $sql;
    // die();

    $result=mysqli_query($conn,$sql);
    if ($result) {
      while ($row=mysqli_fetch_assoc($result)) {
        // print_r($row);
          $id              =     $row['id'];
          $name            =     $row['name'];
          $address         =     $row['address'];
          $year            =     $row['year'];
          $certificate     =     $row['certificate'];
          $created         =     $row['created_at']
    ?>
        <tr>
            
          <th><?php echo $id; ?></th>
          <td><img src="<?php echo $row['profilepic']; ?>" width='80' height='80'></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $address; ?></td>
          <td><?php echo $year; ?></td>
          <td><img src="<?php echo $certificate; ?>" width='80' height='80'></td>
          <td><?php echo $created; ?></td>

          <td>
          <button class='btn btn-success'><a href='index.php?updateid=<?php echo $row['id'] ?>'class= text-light>Edit</a></button>
          <button class='btn btn-danger'><a href='delete.php?deleteid=<?php echo $row['id'] ?>&profilepic=<?php echo $row['profilepic']; ?>' class =text-dark>Delete</a></button>
          </td>

          <td>
          <button class='btn btn-info'><a href='info.php?info=<?php echo $row['id'] ?>'class= text-light>info</a></button>
          </td>

        </tr>
          

    <?php
        }   
    } 
      ?>
      
  </tbody>
  </table>
    </div>
</body>
</html>