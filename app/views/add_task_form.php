<form action="/task/add_task_submit" method="POST" class="form">
    <fieldset>
        <legend>Adicionar Tarefa</legend>

        <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">

        <label class="form-label">
            <span>Nome:</span>
            <input type="text" class="form-input" name="task_name" placeholder="Ir ao mercado">
        </label>

        <label class="form-label">
            <span>Descrição:</span>
            <textarea class="form-textarea" name="task_description" rows="5" placeholder="Ir ao mercado para fazer as compras do mês."></textarea>
        </label>

        <label class="form-label">
            <span>Data:</span>
            <input type="date" class="form-input" name="task_date">
        </label>

        <label class="form-label">
            <span>Hora:</span>
            <input type="time" class="form-input" name="task_hour">
        </label>

        <input type="submit" class="button" value="Salvar">
    </fieldset>
</form>