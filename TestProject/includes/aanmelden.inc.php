<?php require 'base.inc.php' ?>
    <form action="../php/aanmelden.php" method="post">
        <label> Gebruikersnaam</label>
        <input type="text" id="username" name="username" required>
        <label> E-mail</label>
        <input type="text" id="email" name="email" required>
        <label> Password</label>
        <input type="password" id="password" name="password">
        <button type="submit" name="aanmelden" value="aanmelden"> Aanmelden </button>
    </form>
</body>
</html>