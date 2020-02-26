<?php session_start(); ?>
<?php require 'base.inc.php' ?>
<?php if (isset($_SESSION['error'])): ?>
    <?php foreach($_SESSION['error'] as $error): ?>
        <p><?php echo '<p style="margin-left: 25%; color: #ff726f;">'. $error. '</p>' ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form action="../php/login.php" method="post">
        <label> Login </label>
        <input type="text" name="email">
        <label> Wachtwoord </label>
        <input type="password" name="password">
        <button type="submit"> Login </button>
        <a href="aanmelden.inc.php"> Geen account? Maak hier aan! </a>
    </form>
</body>
</html>