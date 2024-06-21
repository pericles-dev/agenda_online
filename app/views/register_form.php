<form action="/user/register" method="post">
    <label for="first_name">
        <span class="input-title">Nome:</span>
        <input type="text" name="first_name" id="first_name">
    </label>

    <label for="last_name">
        <span class="input-title">Sobrenome:</span>
        <input type="text" name="last_name" id="last_name">
    </label>

    <label for="username">
        <span class="input-title">Usuário:</span>
        <input type="text" name="username" id="user_name">
    </label>

    <label for="birthdate">
        <span class="input-title">Data de nascimento:</span>
        <input type="date" name="birthdate" id="birthdate">
    </label>

    <label for="email">
        <span class="input-title">Gênero:</span>
        <span>
            Masculino:
            <input type="radio" name="gender" value="male">
        </span>
        <span>
            Feminino:
            <input type="radio" name="gender" value="female">
        </span>
        
    </label>

    <label for="email">
        <span class="input-title">E-mail:</span>
        <input type="email" name="email" id="email">
    </label>

    <label for="confirm_email">
        <span class="input-title">E-mail:</span>
        <input type="email" name="confirm_email" id="confirm_email">
    </label>

    <input type="submit" value="Registrar">
</form>