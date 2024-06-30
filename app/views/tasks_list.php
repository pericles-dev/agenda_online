<?php if (isset($_SESSION["user_id"])) : ?>
    <div>
        <a href="/task/add_task" class="button">Nova Tarefa</a>
    </div>

    <?php if (count($data) > 0) : ?>
        <?php foreach ($data as $task) : ?>
            <div class="task_card">
                <span class="task_date"><?= $task["task_date"] ?></span>
                <h2 class="task_title"><?= $task["task_name"] ?></h2>
                <p class="task_description"><?= $task["task_description"] ?></p>

                <ul class="task_options">
                    <li>
                        <a href="/task/edit_task/<?= $task["id"] ?>" class="update_task yellow">
                            <img src="<?= BASE_URL ?>/assets/img/pencil.svg" alt="Editar tarefa">
                            Editar
                        </a>
                    </li>
                    <li>
                        <a href="/task/delete_task/<?= $task["id"] ?>" class="delete_task red">
                            <img src="<?= BASE_URL ?>/assets/img/trash3.svg" alt="Deletar tarefa">
                            Deletar
                        </a>
                    </li>
                </ul>
            </div>
        <?php endforeach ?>
    <?php else : ?>

        <p class="not-found">Não foram encontradas tarefas.</p>

    <?php endif ?>
<?php endif ?>