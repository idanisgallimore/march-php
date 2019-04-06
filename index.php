<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Parmlèes Official</title>
</head>

<body>
    <?php 
    include("components/nav.php");
    ?>
    <div class="nav-padding"></div>
    <?php
    if (!isset($_REQUEST['page'])) {
        include("includes/main.inc.php");
    } else {
        $page = $_REQUEST['page'];
        $nextPage = "includes/$page.inc.php";
        include($nextPage);
    }
    ?>
    <?php 
    include("components/footer.php");
    ?>
    <!-- Script for javascript -->
    <script src="scripts/script.js"></script>
</body>

</html> 