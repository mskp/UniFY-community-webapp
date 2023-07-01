<?php
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    exit(header('location: /unify/login'));
}
?>

<header>
    <a href="/unify/" class="logo">
        <h3>
            <span class="crimson">UniFY</span>
        </h3>
    </a>
    <nav>
        <ul class="nav-links">
            <li><a href="/unify/">Home</a></li>
            <li><a href="profile">Profile</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="about">About Us</a></li>
        </ul>
        <div class="menu-btn">
            <span class="bar"></span>
        </div>
    </nav>
    <form action=""><button name="logout">Logout</button></form>
</header>