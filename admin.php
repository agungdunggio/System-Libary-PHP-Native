<?php 
session_start();
$flashMessage = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : '';
$flashMessageType = isset($_SESSION['flash_message_type']) ? $_SESSION['flash_message_type'] : '';

// Hapus pesan flash setelah ditampilkan
unset($_SESSION['flash_message']);
unset($_SESSION['flash_message_type']); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <img src="asset/img/logo.webp" alt="Logo" class="logo">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#dashboard" id="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#member"><i class="fas fa-users"></i> Member</a></li>
            <li><a href="#book"><i class="fas fa-book"></i> Book</a></li>
            <li><a href="#transaction"><i class="fas fa-exchange-alt"></i> Loans & Returns</a></li>
            <li><a href="#logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <?php if (isset($flashMessage)) : ?>
        <div id="flash-message" class="flash-message flash-<?php echo htmlspecialchars($flashMessageType); ?>">
            <p><?php echo htmlspecialchars($flashMessage); ?></p>
        </div>
    <?php endif; ?>
    <div class="main-content">
        <!-- main content -->
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="asset/js/ajax.js"></script>
    <script>
        $(document).ready(function() {
            var flashMessage = $('#flash-message');
            if (flashMessage.length) {
                setTimeout(function() {
                    flashMessage.fadeOut();
                }, 5000); // 5000 ms = 5 detik
            }
        });
    </script>
</body>
</html>
