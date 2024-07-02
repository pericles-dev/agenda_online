<?= get_message("successful_registration")?>
<form action="/user/login_submit" method="POST" class="form">
    <fieldset>
        <legend>Entrar</legend>

        <label class="form-label">
            <span>E-mail:</span>
            <input type="email" class="form-input" name="email" placeholder="maria@email.exemplo">
        </label>

        <label class="form-label">
            <span>Senha:</span>
            <input type="password" class="form-input" name="password">
        </label>

        <input type="submit" class="button" value="Entrar">
    </fieldset>
</form>