<div class="container form">
    <form action="/task/add_task_submit" method="post">

        <?php check_errors() ?>

        <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">

        <label for="task_name">
            <span>Título:</span>
            <input type="text" name="task_name" id="task_name">
        </label>

        <label for="task_description">
            <span>Descrição:</span>
            <textarea name="task_description" id="task_description"></textarea>
        </label>

        <label for="task_date">
            <span>Data:</span>
            <input type="date" name="task_date" id="taskt_date" placeholder="00-00-00 00:00">
        </label>

        <label for="task_hour">
            <span>Hora:</span>
            <input type="time" name="task_hour" id="task_hour">
        </label>

        <input type="submit" value="Registrar">
    </form>
</div>