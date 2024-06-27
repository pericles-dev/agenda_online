<div class="container form">
    <form action="/main/login_submit" method="POST">
        <?php check_errors() ?>
        <label for="email">
            <span class="input-title">E-mail:</span>
            <input type="email" name="email" id="email">
        </label>

        <label for="password">
            <span class="input-title">Senha:</span>
            <input type="password" name="password" id="password">
        </label>

        <input type="submit" value="Entrar">
    </form>
</div>