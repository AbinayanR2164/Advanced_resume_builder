<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="personal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Details</title>
    
</head>

    
<body>
   <form class="login" action="personalquery.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <div id="divLogin" class="login_screen">
            <h2 id="spnLogin">Personal Details</h2>
            <input type="text" name="name" value="<?php echo $_REQUEST['id']; ?>" readonly>
            <input type="number" name="mobilenumber" placeholder="Mobile Number">
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="mailid" placeholder="Email ID">
            <input type="text" name="aboutus" placeholder="About Us">
            <input type="text" name="website" placeholder="Your website (optional)">

            <!-- PDF Uploads -->
            <label style="color: white;  " >About page image (portriat format is recommended)</label>
            <input type="file" name="aboutimage" accept=".pdf">
            
            <label style="color: white;   ">home page image (landscape B&W image format is recommended min(700X600))</label>
            <input type="file" name="homeimage" accept=".pdf">

            <button type="submit">Submit</button>
        </div>
    </div>
</form>


  </body>

</html>
