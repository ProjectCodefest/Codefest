    <?php if (!isset($_SESSION['role'])): // Geen role ingesteld?> 
        <button style="background-color: #9370DB; border-color: #9370DB;"class="contentBtn">Guest</button>
        <button style="background-color: #ff726f; border-color: #ff726f;"class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
    <?php elseif($_SESSION['role'] == 'admin'): // Admin role?>
        <button style="background-color: #9370DB; border-color: #9370DB;"class="contentBtn" onclick="window.location.href='includes/admin.inc.php'">Admin</button>
        <button style="background-color: #ff726f; border-color: #ff726f;"class="contentBtn" onclick="window.location.href='includes/new.inc.php'">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
    <?php elseif($_SESSION['role'] == 'user'): //User role?>
        <button style="background-color: #9370DB; border-color: #9370DB;"class="contentBtn">Gebruiker</button>
        <button style="background-color: #ff726f; border-color: #ff726f;"class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
        <button class="contentBtn">Link</button>
    <?php endif; ?>
    </div>
