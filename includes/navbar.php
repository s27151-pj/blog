<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="../views/index.php">Gabe's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../views/index.php">Home</a>
            </li>
            <?php if (isset($session) && $session->get('user_id')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="../views/add_post.php">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../scripts/logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="../views/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/register.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
