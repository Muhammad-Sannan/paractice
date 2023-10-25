<?php 
include('connection.php');
include('header.php');



if(!isset($_GET['updateid'])){
    if (isset($_POST['submit'])) {
        $name           =   $_POST['name'];;
        $address        =   $_POST['address'];
        // ------------------------------------
        // user table
        $insert_id      =   0;
        $certificate    =   $_FILES['certificate'];
        $year           =   $_POST['year'];

        // echo "<pre>";
        // print_r($certificate);
        // exit();
                
            if(isset($_FILES['profilepic'])){

 
                $filename           = $_FILES["profilepic"]["name"];
                $tempname           = $_FILES["profilepic"]["tmp_name"];
                $ppicDestination    =       'Uploads/'.$filename;
                move_uploaded_file($tempname, $ppicDestination);
                // Get all the submitted data from the form
                
                $sql= "insert into `data`(name,address,profilepic)
                values('$name','$address','$ppicDestination ') ";
             
                // Execute query
                $result             =           mysqli_query($conn,$sql);
            if ($result) {
                $insert_id      =            mysqli_insert_id($conn); 
                
                // echo $insert_id;
                // header('location:display.php');    
            }
               
            }

            if(isset($_FILES['certificate'])){
                $certificate    =   '';
            
                if($insert_id >0 ){
                    for ($i=0; $i < COUNT($year); $i++) {
                            # code...
                         if($_FILES['certificate']['error'][$i] == 0){
                            $cpic=$_FILES['certificate']['name'][$i];

 
                            $filename           =       $cpic;
                            $tempname           =       $_FILES["certificate"]["tmp_name"][$i];
                            $ppic               =       'Uploads/'.$filename;
                            // echo $name;
                            move_uploaded_file($tempname, $ppic);
                            // Get all the submitted data from the form

                            $query2 = "INSERT INTO `information` (`uid`,`certificate`,`year`) VALUES ($insert_id,'".$ppic."', '".$year[$i]."')";
                            $result1 = mysqli_query($conn, $query2);
                       
                            // echo $insert_id;
                            
                        }               
                           
                    }
               
                }
        
        header('location:display.php');
        }
    }
}

?>