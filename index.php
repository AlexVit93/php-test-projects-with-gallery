<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Saite</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <div class="container col-12 mx-auto">
        <header class="row">
            <?php include_once("./assets/pages/header.php");?>
        </header>

        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <?php include_once("./assets/pages/menu.php");?>
    </nav>
    
      <main class="row">
    
      <?php if (isset($_GET["page"])){
                $page = $_GET["page"];
                if($page == 1)
                  include_once("./assets/pages/home.php");
                if($page == 2)
                  include_once("./assets/pages/upload.php");
                if($page == 3)
                  include_once("./assets/pages/gallery.php");
                if($page == 4)
                  include_once("./assets/pages/registration.php");
                if($page == 5)
                  include_once("./assets/pages/guestbook.php");
            }
            ?>
        </main>
        <footer class="row">
            <?php include_once("./assets/pages/footer.php");?>
        </footer>
    </div>
<script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>