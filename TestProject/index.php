<?php
session_start();

include 'private/db.php';

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

$sql = 'SELECT UserId, Titel, UsrPage FROM navbar WHERE Link = :page';
$sth = $conn->prepare($sql);
$sth->bindParam(':page', $page);
$sth->execute();

$rsPage = $sth->fetch(PDO::FETCH_ASSOC);
    
$id = $rsPage['UserId'];
$titel = $rsPage['Titel'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titel; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <?php include 'includes/navbar.inc.php'; ?>
        </header>
        <?php
        /*
        
        THIS DOESNT WORK ON A REGULAR SITE!!
        YOU HAVE TO ADJUST URL1 AND HEADER LOCATION!!
        
        */
        $url = explode('/', $_SERVER['REQUEST_URI'])[4];
        @$url1 = explode('/', $_SERVER['REQUEST_URI'])[5];
        if(empty($url) || $url1){
            header("location: http://localhost/school/bookonshelf/bookonshelf_1/index.php?page=home");
            exit();
        }else{
            if(isset($page)){
                if(isset($_SESSION['id'])){
                    if(file_exists('includes/usrPages/'.$page.'.inc.php')){
                        include 'includes/usrPages/'.$page.'.inc.php';
                    }elseif(file_exists('includes/pages/'.$page.'.inc.php')){
                        if($page == 'login' || $page == 'register'){
                            include 'includes/pages/home.inc.php';
                        }else{
                            include 'includes/pages/'.$page.'.inc.php';
                        }
                    }else{
                        $_SESSION['error'] = '<p class="alert alert-danger text-center">De pagina die je wil bezoeken bestaat niet!</p>';
                        include 'includes/pages/home.inc.php';
                    }
                }else{
                    if(file_exists('includes/pages/'.$page.'.inc.php')){
                        include 'includes/pages/'.$page.'.inc.php';
                    }elseif(file_exists('includes/usrPages/'.$page.'.inc.php')){
                        $_SESSION['error'] = '<p class="alert alert-danger text-center">Je moet ingelogd zijn om deze pagina te bezoeken!</p>';
                        include 'includes/pages/home.inc.php';
                    }else{
                        $_SESSION['error'] = '<p class="alert alert-danger text-center">De pagina die je wil bezoeken bestaat niet!</p>';
                        include 'includes/pages/home.inc.php';
                    }
                }
            }else{
                $_SESSION['error'] = '<p class="alert alert-danger text-center">De pagina die je wil bezoeken bestaat niet!</p>';
                include 'includes/pages/home.inc.php';
            }
        }
        ?>
    </body>
</html>