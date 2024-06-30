<form action="/task/edit_task_submit" method="POST" class="form">
    <fieldset>
        <legend>Editar Tarefa</legend>

        <input type="hidden" name="id" value="<?= $data["id"] ?>">

        <label class="form-label">
            <span>Nome:</span>
            <input type="text" class="form-input" name="task_name" placeholder="Ir ao mercado" value="<?= $data["task_name"] ?>">
        </label>

        <label class="form-label">
            <span>Descrição:</span>
            <textarea class="form-textarea" name="task_description" rows="10" placeholder="Ir ao mercado para fazer as compras do mês."><?= $data["task_description"] ?></textarea>
        </label>

        <label class="form-label">
            <span>Data:</span>
            <input type="date" class="form-input" name="task_date" value="<?= $data["task_date"] ?>">
        </label>

        <label class="form-label">
            <span>Hora:</span>
            <input type="time" class="form-input" name="task_hour" value="<?= $data["task_hour"] ?>">
        </label>

        <input type="submit" class="button" value="Salvar">
    </fieldset>
</form>