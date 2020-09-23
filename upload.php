<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data" class="ml-5">

    Caption : <input type="text" name="caption" required><br>
    Upload Here : <input type="file" name="photo" ><br>
    like : <input type="number" name="like" ><br>
    <input type="submit" value="submit" name="submit" />
    <input type="submit" name="fetch" value="fetch" />
 
</form>
</body>
</html>


<?php


$con = new mysqli("localhost","root","","upload");



if($con->connect_error){
    die("Connection failed ".$con->connect_error );
}
else
{
    echo"connection successfull ";
}


error_reporting(E_ERROR | E_WARNING | E_PARSE);

echo"this is if";


if(isset($_POST['submit'])){
    echo"this is in if ";
    $cap = $_POST['caption'];
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if file was uploaded without errors
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
               
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "./" . $filename);
                    echo "Your file was uploaded successfully.";
                
            } else{
                echo "Error: There was a problem uploading your file. Please try again."; 
            }
        } else{
            echo "Error: " . $_FILES["photo"]["error"];
        }
    }

    $sql = "INSERT INTO pic VALUES('','$cap','$filename','$like','$filesize')";
    
    if( $con -> query($sql) === true  ){
        echo "successfull ";
    }
    else{
        echo "Unsuccessfull ";

    }
}





if(isset($_POST['fetch'])){

    $result = $con->query("SELECT * FROM pic");
   
   if($result->num_rows>0){
               
   
   
           
           echo "<table class='table table-bordered   text-center table-hover table-striped table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl ' >
           <tr>
      
           
           <th >caption</a></th> 
   
           <th>Post</th> 
           <th> like</th>
           <th> size</th>
           </tr> "; 
   
       while($row = $result->fetch_assoc()){
       
             
    
                   echo "
                   <tr>
   
                
                   <td>$row[caption]</td>   
                   <td> <img src= '{$row['filename']}' height='50px' width ='50px' ></td>               
                   <td>$row[like] </td>   
                    
                   <td>$row[photosize] </td>   
                              
                   </tr>";
       
           
   
       }
       echo "</table>";
   
       }
   
   
       else {
       echo "ERROR ";
       }
       
   }
   
   


?>