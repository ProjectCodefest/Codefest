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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav class="">
                <ul class="">
                    <?php include 'includes/navbar.inc.php'; ?>
                </ul>
            </nav>
        </header>
        <?php
        /*
        
        THIS DOESNT WORK ON A REGULAR SITE!!
        YOU HAVE TO ADJUST URL1 AND HEADER LOCATION!!
        
        */
        $url = explode('/', $_SERVER['REQUEST_URI'])[3];
        @$url1 = explode('/', $_SERVER['REQUEST_URI'])[4];
        if(empty($url) || $url1){
            header("location: http://localhost/codefest-master/testproject/index.php?page=home");
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
                        $_SESSION['error'] = '<p class="">De pagina die je wil bezoeken bestaat niet!</p>';
                        include 'includes/pages/home.inc.php';
                    }
                }else{
                    if(file_exists('includes/pages/'.$page.'.inc.php')){
                        include 'includes/pages/'.$page.'.inc.php';
                    }elseif(file_exists('includes/usrPages/'.$page.'.inc.php')){
                        $_SESSION['error'] = '<p class="">Je moet ingelogd zijn om deze pagina te bezoeken!</p>';
                        include 'includes/pages/home.inc.php';
                    }else{
                        $_SESSION['error'] = '<p class="">De pagina die je wil bezoeken bestaat niet!</p>';
                        include 'includes/pages/home.inc.php';
                    }
                }
            }else{
                $_SESSION['error'] = '<p class="">De pagina die je wil bezoeken bestaat niet!</p>';
                include 'includes/pages/home.inc.php';
            }
        }
        ?>
    </body>
</html>