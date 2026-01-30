<?php
require 'registerdbcon.php';
$name = $_REQUEST['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="achieve.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Yinka Enoch Adedokun">
  <title>Register 12345678975Page</title>
</head>
<body>
  <!-- Existing form unchanged -->
  <form class="register" action="achievequery.php" method="post">
    <div class="container-fluid">
      <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">
          <h2><span class="fa fa-android"></span></h2>
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4OENIRhMJSSFfply5eouqd6qk7bgx3cmIFQ&s" alt="logo">
        </div>
        <div class="col-md-8 login_form">
          <div class="container-fluid">
            <h2>Register</h2>
            <div class="row">
              <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly class="form__input">
            </div>
            <div class="row">
              <input type="text" name="description" placeholder="Project Description" class="form__input" required>
            </div>
            <div class="row">
              <input type="text" name="project_title" placeholder="Project Title" class="form__input" required>
            </div>
            <div class="row">
              <input type="text" name="image" placeholder="Project Image URL" class="form__input" required>
            </div>
            <div class="row">
              <input type="text" name="project_link" placeholder="Project Video Clip URL" class="form__input" required>
            </div>
            <button name="action" value="add" style="width:200px;background-color:seagreen;border-radius:100px;color:white;" class="form__input">
              Upload
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Projects Table -->
  <?php if ($name): ?>
  <div class="container-fluid text-center" style="margin-top:20px;">
    <h3>Your Projects</h3>
    <table style="width:90%;max-width:900px;margin:auto;border-collapse:collapse;font-family:Arial,sans-serif;box-shadow:0 2px 6px rgba(0,0,0,0.1);">
      <thead style="background:#49708f;color:white;">
        <tr>
          <th style="padding:10px;text-align:left;">Title</th>
          <th style="padding:10px;text-align:left;">Description</th>
          <th style="padding:10px;text-align:left;">Image</th>
          <th style="padding:10px;text-align:left;">Video Link</th>
          <th style="padding:10px;text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $res = $conn->query(
          "SELECT sno, project_title, description, image, project_link FROM project WHERE name='" . $conn->real_escape_string($name) . "'"
        );
        while ($row = $res->fetch_assoc()):
      ?>
        <tr style="background:#f9f9f9;border-bottom:1px solid #ddd;">
          <td style="padding:10px;"><?php echo htmlspecialchars($row['project_title']); ?></td>
          <td style="padding:10px;"><?php echo htmlspecialchars($row['description']); ?></td>
          <td style="padding:10px;"><a href="<?= htmlspecialchars($row['image']) ?>" target="_blank">View</a></td>
          <td style="padding:10px;"><a href="<?= htmlspecialchars($row['project_link']) ?>" target="_blank">View</a></td>
          <td style="padding:10px;text-align:center;">
            <form action="achievequery.php" method="post" onsubmit="return confirm('Delete this project?');">
              <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
              <input type="hidden" name="delete_sno" value="<?php echo intval($row['sno']); ?>">
              <button type="submit" name="action" value="delete" style="
                background-color:#dc3545;
                color:white;
                padding:6px 12px;
                border:none;
                border-radius:4px;
                cursor:pointer;
                transition:background-color .2s;
              " onmouseover="this.style.backgroundColor='#c82333';" onmouseout="this.style.backgroundColor='#dc3545';">
                Delete
              </button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>

  <!-- Footer -->
  <div class="container-fluid text-center footer" style="margin-top:30px;">
    Coded with ♥ by Techinfinity
  </div>
</body>

</html>
