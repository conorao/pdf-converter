<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

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
            <p>Here you go- now you have the capability to make a PDF a JPG yourself.</p>
            <p><strong>Note:</strong> this only works with one page PDF files. If you're converting a multi-page document to PDF I'll have to extend the functionality of this little webapp. Otherwise, have fun and convert to your heart's content!</p>
            <p>Maximum filesize: 2MB</p>
            
            <hr>
    
            <p>

            <form action="upload.php" method="post" enctype="multipart/form-data">
               <p>
                  <label for="file">Select a .pdf:</label> 
                    <p><input type="file" name="userfile" id="file"></p>
                    <p><button class="btn btn-info">Upload and Convert</button></p>
               </p>
            </form>
            </p>
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
