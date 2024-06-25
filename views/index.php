<?php include '../includes/header.php'; ?>
<?php
$post = new Post($conn);
$posts = $post->getAll();
?>

<div class="container">
    <h1>Welcome to the Gabe's Blog</h1>

    <?php foreach ($posts as $post): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars(substr($post['content'], 0, 100)); ?>...</p>
                <a href="view_post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read more</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include '../includes/footer.php'; ?>
