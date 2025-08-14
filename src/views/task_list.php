<?php require_once __DIR__ . '/header.php'; ?>
<?php require_once __DIR__ . '/header.php'; ?>


<h1>Task List</h1>
    <a href="?action=create">+ Criar tarefa</a>

    <?php if (empty($tasks)) : ?>
        <p>No tasks found.</p>
    <?php else: ?>
        <table class="table-task">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título </th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Criado em:</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['id']) ?></td>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td><?= htmlspecialchars($task['description']) ?></td>
                        <td><?= $controller->translateStatus($task['status']) ?></td>
                        <td><?= htmlspecialchars($task['created_at']) ?></td>
                        <td >
                            <a href="index.php?action=edit&id=<?= $task['id'] ?>">Editar</a>

                            <form action="index.php?action=delete" method="POST" style="display:inline;">

                            <input type="hidden" name="id" value="<?= $task['id'] ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                Excluir
                            </button>
                            </form>
                        </td>
                                </tr>
                <?php  endforeach;?>
            </tbody>
        </table>
    <?php endif; ?>

<?php require_once __DIR__ . '/footer.php';?>