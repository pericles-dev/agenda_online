<form action="/user/register_submit" method="POST" class="form">
    <fieldset>
        <legend>Registrar</legend>

        <label class="form-label">
            <span>Nome:</span>
            <input type="text" class="form-input" name="first_name" placeholder="maria">
        </label>

        <label class="form-label">
            <span>Sobrenome:</span>
            <input type="text" class="form-input" name="last_name" placeholder="helena">
        </label>


        <label class="form-label">
            <span>Nome de usuário:</span>
            <input type="text" class="form-input" name="username" placeholder="maria.h">
        </label>

        <label class="form-label">
            <span>Data de nascimento:</span>
            <input type="date" class="form-input" name="birthdate">
        </label>

        <label class="form-label">
            <span>Gênero:</span>
                <label class="form-label r">
                    Masculino:
                    <input type="radio" name="gender" value="m">
                </label>

                <label class="form-label r">
                    Feminino:
                    <input type="radio" name="gender" value="f">
                </label>
        </label>

        <label class="form-label">
            <span>E-mail:</span>
            <input type="email" class="form-input" name="email" placeholder="maria@email.exemplo">
        </label>

        <label class="form-label">
            <span>Confirmar E-mail:</span>
            <input type="email" class="form-input" name="confirm_email" placeholder="maria@email.exemplo">
        </label>

        <label class="form-label">
            <span>Senha:</span>
            <input type="password" class="form-input" name="password">
        </label>


        <label class="form-label">
            <span>Confirmar Senha:</span>
            <input type="password" class="form-input" name="confirm_password">
        </label>

        <input type="submit" class="button" value="Registrar">
    </fieldset>
</form>