<div>
    <form action="" method="POST">
        @csrf
        <h2>Регистрация</h2>
        <label for="">Username</label>
        <br>
        <input type="text" name="name">
        <br><br>
        <label for="">Email</label>
        <br>
        <input type="email" name="email">
        <br><br>
        <label for="">Пароль</label>
        <br>
        <input type="password" name="password">
        <br><br>
        <label for="">Повторите пароль</label>
        <br>
        <input type="re-password" name="password">
        <br>
        <br>
        <button type="submit">Зарегестрироваться</button>
    </form>
</div>
