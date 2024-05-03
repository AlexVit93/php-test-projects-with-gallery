<h3>Gallery</h3>
<form action='index.php?page=3' method='post'>
<p>Select graphics extension to display:</p>
<select name='ext'>
<?php
$path = 'assets/gallery/';
if ($dir = opendir($path)) {
    $ar = array();
    while (($file = readdir($dir)) !== false) {
        $fullname = $path . $file;
        $pos = strrpos($fullname,'.');
        $ext = substr($fullname, $pos + 1);
        if (!in_array($ext, $ar)) {
          $ar[] = $ext;
          echo "<option>" . $ext . "</option>";
        }
    }
    closedir($dir);
}
?>
</select>
<button type="submit" name="submit">Show Pictures</button>
</form>
<br>
<?php 
if (isset($_POST['submit'])) {
    $ext = $_POST['ext'];
    $ar = glob($path . "*." . $ext);
    echo "<div class='panel panel-primary'>";
    echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">Gallery content</h3></div>';
    foreach ($ar as $a) {
        echo "<a href='" . $a . "'
        target='_blank'>
        <img src='" . $a . "'
        height='100px' border='0'
        alt='picture'
        class='ing-polaroid'/>
        </a>";
    }
    echo "</div>";
}
?>

<div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
<div class="carousel-inner">
<?php
$flag = true;
foreach ($ar as $a) {
  if ($flag) {
    echo '<div class="carousel-item active">';
    $flag = false;
  } else {
    echo '<div class="carousel-item">';
  }
  echo '<img src="'.$a.'" class="d-block w-100" alt="...">
</div>';
}
?>
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>