<?php
   // Configuration - Your Options
      $allowed_filetypes = array('.pdf','pdf'); // These will be the types of file that will pass the validation.
      $max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.5MB).
      $upload_path = './files/'; // The place the files will be uploaded to (currently a 'files' directory).
 
      $filename = md5(mt_rand()).$_FILES['userfile']['name']; // Get the name of the file (including file extension).
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      //$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
      die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      die('Conor made a mistake. Let him know to chmod the files dir.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
         $status = 1; //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>';
      else
         $status = 0; //echo 'There was an error during the file upload.  Please try again.';

   $imagick = new Imagick();
   $imagick->setResolution(300, 300); 
   $imagick->readImage($_SERVER['DOCUMENT_ROOT'] . '/pdf/files/' . $filename); 
   $withNewExt = $upload_path.preg_replace("/\\.[^.\\s]{3,4}$/", "", $filename).'.jpg';
   if($imagick->writeImages($withNewExt, false)) 
       $status1 = 1;
   else
       $status1 = 0;  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Completed</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body onload="fileInput()">

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><span class="glyphicon glyphicon-floppy-disk"></span></h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">PDF to JPEG converter</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">PDF to JPEG converter</h1>
            <p><?php if (isset($status)) {
                        if ($status == 1) { 
                            echo 'Your file upload was successful! The original .pdf is <a href="' . $upload_path . $filename . '" title="Your File"><button class="btn btn-info">here</button></a>'; 
                        } else {
                            echo 'There was an error during the file upload.  Please try again. <a href="index.php"><button class="btn btn-warning">Try again</button></a>';
                        }
                    }
            ?></p>
            
            <p><?php if (isset($status1)) {
                        if ($status == 1) { 
                            echo 'The image converted! View the .jpg <a href="' . $withNewExt . '" title="Your File"><button class="btn btn-success">here</button></a>'; 
                        } else {
                            echo 'There was an error during the conversion.  Please try again. <a href="index.php"><button class="btn btn-warning">Try again</button></a>';
                        }
                    }
            ?></p>
            <hr>
          </div>

          <div class="mastfoot">
            <div class="inner">
            <p>&copy; Conor Odell <?php echo date("Y"); ?></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.file-input.js"></script>
    <script> 
    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();
    </script>
  </body>
</html>
