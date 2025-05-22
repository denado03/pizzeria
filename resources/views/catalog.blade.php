<div>
    <div>
        <a href="{{route('login')}}">Вход</a>
        <a href="{{route('register')}}">Регистрация</a>
    </div>
    Homepage
    @auth
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">
                Выйти
            </button>
        </form>
    @else


    @endauth
</div>
