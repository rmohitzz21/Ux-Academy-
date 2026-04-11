<?php
// ========================================
// UX Academy - Navbar Include
// ========================================

// Get current page if not already set
$currentPage = $currentPage ?? '';
?>
<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="<?php echo SITE_URL; ?>/index.php" class="navbar-brand">
            <img src="<?php echo SITE_URL; ?>/img/naya_1@4x.png" alt="UX Pacific Logo" />
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggle" aria-label="Toggle Menu">☰</button>

        <!-- Menu -->
        <div class="navbar-menu">
            <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link <?php echo ($currentPage === 'index' ? 'active' : ''); ?>">Home</a>
            <a href="<?php echo SITE_URL; ?>/index.php#what-section" class="nav-link <?php echo ($currentPage === 'about' ? 'active' : ''); ?>">About Us</a>
            <a href="<?php echo SITE_URL; ?>/cources.php" class="nav-link <?php echo ($currentPage === 'courses' ? 'active' : ''); ?>">Courses</a>
            <a href="<?php echo SITE_URL; ?>/career.php" class="nav-link <?php echo ($currentPage === 'career' ? 'active' : ''); ?>">Career</a>
        </div>

        <!-- CTA -->
        <a href="<?php echo SITE_URL; ?>/contact.php" class="navbar-cta btn-primary" style="margin-left: auto;">Contact Us</a>
    </div>
</nav>

<!-- Navbar Toggle Script -->
<script>
(function() {
    const toggle = document.querySelector(".navbar-toggle");
    const menu = document.querySelector(".navbar-menu");

    if (toggle && menu) {
        toggle.addEventListener("click", () => {
            menu.classList.toggle("show");
        });
    }
})();
</script>
