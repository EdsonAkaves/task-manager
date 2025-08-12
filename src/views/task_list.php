    <h1>Task List</h1>
    <a href="?action=create">+ Add Task</a>

    <?php if (empty($tasks)) : ?>
        <p>No tasks found.</p>
    <?php else: ?>
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 8px;">ID</th>
                    <th style="border: 1px solid #ccc; padding: 8px;">Title</th>
                    <th style="border: 1px solid #ccc; padding: 8px;">Description</th>
                    <th style="border: 1px solid #ccc; padding: 8px;">Status</th>
                    <th style="border: 1px solid #ccc; padding: 8px;">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;"><?= htmlspecialchars($task['id']) ?></td>
                        <td style="border: 1px solid #ccc; padding: 8px;"><?= htmlspecialchars($task['title']) ?></td>
                        <td style="border: 1px solid #ccc; padding: 8px;"><?= htmlspecialchars($task['description']) ?></td>
                        <td style="border: 1px solid #ccc; padding: 8px;"><?= htmlspecialchars($task['status']) ?></td>
                        <td style="border: 1px solid #ccc; padding: 8px;"><?= htmlspecialchars($task['created_at']) ?></td>
                                </tr>
                <?php  endforeach;?>
            </tbody>
        </table>
    <?php endif; ?>