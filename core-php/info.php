<?php 
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>

</div>
    <div class="container">
    <button class="btn btn-secondary my-5"><a href="display.php"class="text-light"> Display</a></button>
    <?php
    if (isset($_GET['info'])) {
        $id = $_GET['info'];
        
        $sql="select * from `data` where  `id`= $id";
        //  echo "<h1> You are in ID : $id </h1>";

        $result=mysqli_query($conn,$sql);
        //  $getRow = mysqli_fetch_row($result);
        if ($result) {
            // echo "34";
            while ($row=mysqli_fetch_array($result)) {
                // $id         =     $row['id'];
                $image      =     $row['profilepic'];
                $name       =     $row['name'];
                $address    =     $row['address'];
                $created    =     $row['created_at'];
                ?>

                <div class="row">
                <div class="col-sm">
                <img src="<?php echo $image; ?>" width='200' height='200'>
                </div>
                <div class="col-sm">
                    <h3> ID : <?php echo $id; ?></h3>
                    <h3> NAME : <?php echo $name; ?></h3> 
                    <h3> ADDRESS : <?php echo $address;?></h3>
                    <h3> CREATED AT : <?php echo $created;?></h3>
                </div>
              
                    </div>
              <?php          
            }  
        }
    }
?>
  <tbody>

    <table class="table table-striped " style="margin-top: 55px">
        <thead>
            <tr>
            <!-- <th scope="col">User Id</th> -->
            <th scope="col">Id</th>
            <th scope="col">Certificate</th>
            <th scope="col">Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqql="select * from `information` where`uid`= $id";
            $result=mysqli_query($conn,$sqql);
            if ($result) {
                while ($row=mysqli_fetch_assoc($result)) {
                $insert_id = mysqli_insert_id($conn);

                    $id               =     $row['id'];
                    $certificate     =     $row['certificate'];
                    $year           =     $row['year'];
                    ?>

                    <tr>
                        <!-- <td><?php //echo $uid; ?></td> -->
                        <th><?php echo $id; ?></th>
                        <td><img src="<?php echo $row['certificate']; ?>" width='80' height='80'></td>
                        <td><?php echo $year; ?></td>
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