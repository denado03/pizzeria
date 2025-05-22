<div>
    <form action="{{route('registerCreate')}}" method="POST">
        @csrf
        <h2>Регистрация</h2>
        <label for="">Username</label>
        <br>
        <input type="text" name="username" value="{{old('username')}}">
        @error('username')
        {{$message}}
        @enderror
        <br><br>
        <label for="">Email</label>
        <br>
        <input type="email" name="email" value="{{old('email')}}">
        @error('email')
        {{$message}}
        @enderror
        <br><br>
        <label for="">Пароль</label>
        <br>
        <input type="password" name="password" value="{{old('password')}}">
        @error('password')
        {{$message}}
        @enderror
        <br><br>
        <label for="">Повторите пароль</label>
        <br>
        <input type="password" name="password_confirmation" >
        @error('password_confirmation')
        {{$message}}
        @enderror
        <br>
        <br>
        <button type="submit">Зарегестрироваться</button>
    </form>
</div>
