<?php include '../includes/header.php'; ?>
<?php
if (!$session->get('user_id')) {
    header("Location: login.php");
    exit();
}
?>

<div class="container">
    <h2>Add New Post</h2>
    <form action="../scripts/add_post_script.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
