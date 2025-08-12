<?php require_once __DIR__ . '/header.php'; ?>

<h2> Create New Task</h2>
<form action="?action=create" method="POST">
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" rows="4" required></textarea><br><br>

    <button type="submit">Save task</button>
    <a href="index.php">Cancel</a>

</form>

<?php require_once __DIR__ . '/footer.php';?>