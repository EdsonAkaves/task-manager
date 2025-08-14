<?php require_once __DIR__ . '/header.php'; ?>

<h2> Criar Nova Tarefa</h2>
<form action="?action=create" method="POST">
    <label for="title">Título:</label><br>
    <input type="text" name="title" id="title" required><br><br>

    <label for="description">Descrição:</label><br>
    <textarea name="description" id="description" rows="4" required></textarea><br><br>

    <button type="submit">Salvar tarefa</button>
    <a href="index.php">Cancelar</a>

</form>

<?php require_once __DIR__ . '/footer.php';?>