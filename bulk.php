<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<form action="bulk.php" method="POST" enctype="multipart/form-data" class="ml-5">

    Caption : <input type="text" name="caption" required><br>
    Upload Here : <input type="file" name="files[]" multiple ><br>

    <input type="submit" value="submit" name="submit" />
    <input type="submit" name="fetch" value="fetch" />
 
</form>
</body>
</html>


<?php


$con = new mysqli("localhost","root","","bulk");



// if($con->connect_error){
//     die("Connection failed ".$con->connect_error );
// }
// else
// {
//     echo"connection successfull ";
// }

// if(isset($_POST['submit']))
// {
//     $cap = $_POST['caption'];
//       // Configure upload directory and allowed file types 
//       $upload_dir = 'uploads'.DIRECTORY_SEPARATOR; 
//       $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
        
//       // Define maxsize for files i.e 5MB 
//       $maxsize = 5 * 1024 * 1024;  
    
//       // Checks if user sent an empty form  
//       if(!empty(array_filter($_FILES['files']['name']))) { 
    
//           // Loop through each file in files[] array 
//           foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
                
//               $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
//               $file_name = $_FILES['files']['name'][$key]; 
//               $file_size = $_FILES['files']['size'][$key]; 
//               $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
    
//               // Set upload file path 
//               $filepath = $upload_dir.$file_name; 
    
//               // Check file type is allowed or not 
//               if(in_array(strtolower($file_ext), $allowed_types)) { 
    
//                   // Verify file size - 2MB max  
//                   if ($file_size > $maxsize)          
//                       echo "Error: File size is larger than the allowed limit.";  
    
//                   // If file with name already exist then append time in 
//                   // front of name of the file to avoid overwriting of file 
//                   if(file_exists($filepath)) { 
//                       $filepath = $upload_dir.time().$file_name; 
                        
//                       if( move_uploaded_file($file_tmpname, $filepath)) { 
//                           echo "{$file_name} successfully uploaded <br />"; 
//                       }  
//                       else {                      
//                           echo "Error uploading {$file_name} <br />";  
//                       } 
//                   } 
//                   else { 
                    
//                       if( move_uploaded_file($file_tmpname, $filepath)) { 
//                           echo "{$file_name} successfully uploaded <br />"; 
//                       } 
//                       else {                      
//                           echo "Error uploading {$file_name} <br />";  
//                       } 
//                   } 
//               } 
//               else { 
                    
//                   // If file extention not valid 
//                   echo "Error uploading {$file_name} ";  
//                   echo "({$file_ext} file type is not allowed)<br / >"; 
//               }  
//           } 
//       }  
//       else { 
            
//           // If no files selected 
//           echo "No files selected."; 
//       } 
//   }  

//   $sql = "INSERT INTO photo VALUES('$cap','$file_name','$file_size')";
    
//   if( $con -> query($sql) === true  ){
//       echo "successfull ";
//   }
//   else{
//       echo "Unsuccessfull ";

//   }

if(isset($_POST['submit'])){ 
    // Include the database configuration file 
    $cap = $_POST['caption'];
     
    // File upload configuration 
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $con->query("INSERT INTO photo (filename,size) VALUES $insertValuesSQL"); 
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
    // Display status message 
    echo $statusMsg; 
} 



  if(isset($_POST['fetch'])){

    $result = $con->query("SELECT * FROM photo");
   
   if($result->num_rows>0){
               
   
   
           
           echo "<table class='table table-bordered   text-center table-hover table-striped table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl ' >
           <tr>
      
           
           <th >caption</a></th> 
   
           <th>Post</th> 
     
           <th> size</th>
           </tr> "; 
   
       while($row = $result->fetch_assoc()){
       
             
    
                   echo "
                   <tr>
   
                
                   <td>$row[caption]</td>   
                   <td> <img src= '{$row['filename']}' height='50px' width ='50px' ></td>               
                      
                    
                   <td>$row[size] </td>   
                              
                   </tr>";
       
           
   
       }
       echo "</table>";
   
       }
   
   
       else {
       echo "ERROR ";
       }
       
   }
   
   
?>
