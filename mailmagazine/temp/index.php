<html>
<head>
<meta name="robots" content="noindex,nofollow">
<meta charset="UTF-8">
</head>
<body>
  <ul>
<?php
  foreach (glob("*.txt") as $filename) {
    echo '<li><a href="'.$filename.'">'.$filename.'</a></li>';
  }
?>
</ul>
</body>
</html>