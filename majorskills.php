<head>
  <link rel="stylesheet" type="text/css" href="majorskill.css">

  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Yinka Enoch Adedokun">
  <title>Register Page</title>
</head>
<body>
  <form class="register" action="majorquery.php" method="post">
  <!-- Main Content -->
  <div class="container-fluid">
    <div class="row main-content bg-success text-center">
      <div class="col-md-4 text-center company__info">
        <span class="compan   y__logo"><h2><span class="fa fa-android"></span></h2></span>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4OENIRhMJSSFfply5eouqd6qk7bgx3cmIFQ&s">
      </div>
      <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
        <div class="container-fluid">
          <div class="row">
            <h2>Major Skills</h2>
          </div>
          <div class="row">
            <form control="" class="form-group">
             <div class="row">
                <input type="text" name="name" <?php $name=$_REQUEST['id'];?>   value="<?php echo "$name"; ?>"   readonly  >
              </div>


              <div class="row">
                <input type="text" name="skill1" class="form__input" placeholder="Major Skill 1">
              </div>

               <div class="row">
                <input type="text" name="skill2" class="form__input" placeholder="Major Skill 2">
              </div>

              <div class="row">
                <input type="text" name="skill3" class="form__input" placeholder="Major Skill 3">
              </div>

              <div class="row">
                <input type="text" name="skill4" class="form__input" placeholder="Major Skill 4">
              </div>

              <div class="row">
                <input type="text" name="skill5" class="form__input" placeholder="Major Skill 5">
              </div>

              <div class="row">
                <input type="text" name="skill6" class="form__input" placeholder="Major Skill 6">
              </div>

              

              

              

              
              
              
             <button style="width:200px; background-color: seagreen; border-radius: 100px;color: whitesmoke;"  value="register" class="form__input">Enter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="container-fluid text-center footer">
    Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Techinfinity</a></p>
  </div>
  </form>
</body>