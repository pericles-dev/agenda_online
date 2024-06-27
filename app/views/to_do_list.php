<div class="container task">
    <?php foreach ($data as $task) : ?>
        <div class="task_card">
            <span class="task_date"><?= $task["data"] ?></span>
            <h2 class="task_title"><?= $task["nome"] ?></h2>
            <hr>
            <p class="task_description"><?= $task["descricao"] ?></p>
        </div>
    <?php endforeach ?>
</div>