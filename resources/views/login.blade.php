<div>
    <form action="{{route('authenticate')}}" method="POST">
        @csrf
        <h2>Авторизация</h2>
        <label for="">Email</label>
        <br>
        <input type="email" name="email" value="{{old('email')}}">
        @error('email')
        {{$message}}
        @enderror
        <br><br>
        <label for="">Password</label>
        <br>
        <input type="password" name="password">
        @error('password')
        {{$message}}
        @enderror
        <br>
        <br>
        <button type="submit">Войти</button>
    </form>
</div>
