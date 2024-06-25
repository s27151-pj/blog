<?php include '../includes/header.php'; ?>
<?php
$post_id = $_GET['id'];
$post = new Post($conn);
$current_post = $post->getById($post_id);
?>

<div class="container">
    <h2><?php echo htmlspecialchars($current_post['title']); ?></h2>
    <p><?php echo htmlspecialchars($current_post['content']); ?></p>

    <h3>Comments</h3>
    <?php
    $comment = new Comment($conn);
    $comments = $comment->getByPostId($post_id);
    ?>

    <?php foreach ($comments as $comment): ?>
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-text"><?php echo htmlspecialchars($comment['content']); ?></p>
                <small>By <?php echo htmlspecialchars($comment['username']); ?> on <?php echo htmlspecialchars($comment['publish_date']); ?></small>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if ($session->get('user_id')): ?>
        <h3>Add a Comment</h3>
        <form action="../scripts/add_comment_script.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
