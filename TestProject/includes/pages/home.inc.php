<?php
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if(isset($_SESSION['succes'])){
    echo $_SESSION['succes'];
    unset($_SESSION['succes']);
}
?>

<table>
    <tr>
        <th>Boek</th>
        <th>Schrijver</th>
    </tr>
    <?php
    $sql = "SELECT * from books INNER JOIN writers ON books.FKWriterId = writers.WriterId";
    $sth = $conn->prepare($sql);
    $sth->execute();
    while($row = $sth->FETCH(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $row['BookName']; ?></td>
            <td><?php echo $row['WriterName']; ?></td>
        </tr>
        <?php
    }
    ?>
</table>