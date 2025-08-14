<?php require_once __DIR__ . '/header.php'; ?>

    <h1>Edit Task</h1>

    <form method="post" action="index.php?action=edit&id=<?= $task['id'] ?>">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <br><br>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required><?= htmlspecialchars($task['description']) ?></textarea>
        <br><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pendente</option>
            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Concluída</option>

        </select>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="index.php">Voltar para a lista</a></p>

    <?php require_once __DIR__ . '/footer.php';?>