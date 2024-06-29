<div class="container task">
    <?php if (isset($_SESSION["user_id"])) : ?>
        <div class="add_task">
            <a href="/task/add_task" class="new_task_button">Nova tarefa</a>
        </div>
    <?php endif ?>
    <?php foreach ($data as $task) : ?>
        <div class="task_card">
            <span class="task_date"><?= $task["task_date"] ?></span>
            <h2 class="task_title"><?= $task["task_name"] ?></h2>
            <hr>
            <p class="task_description"><?= $task["task_description"] ?></p>

            <div>
                <a href="/task/edit_task/<?= $task["id"] ?>" class="link">Editar Tarefa</a>
                <a href="/task/delete_task/<?= $task["id"] ?>" class="link">Deletar tarefa</a>
            </div>
        </div>
    <?php endforeach ?>
</div>