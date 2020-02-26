<?php
if(isset($_SESSION['succes'])){
    echo $_SESSION['succes'];
    unset($_SESSION['succes']);
}

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<div class="container">
    <div class="d-flex justify-content-center h-60 w-50 pt-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></h4>
            </div>
            <div class="card-body">
                <div class="media">
                    <?php echo '<img src="./uploads/'.$_SESSION['image'].'" class="img-responsive h-50 w-50">'?>
                    <div class="media-body ml-3">
                        <p><?php echo $_SESSION['email'] ?></p>
                        <p><?php echo $_SESSION['street'].' '.$_SESSION['housenumber'] ?><br>
                        <?php echo $_SESSION['postalcode'].' '.$_SESSION['city']; ?></p><br>
                        <a class="btn btn-primary btn-block" href="./index.php?page=edit">Pas je profiel aan</a>
                        <a class="btn btn-danger btn-block" href="./php/delete.php?id=<?php echo $_SESSION['id'] ?>">Verwijder je profiel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>