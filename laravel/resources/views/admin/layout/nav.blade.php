<nav>
    <a href="{{route('course.index')}}">Головна</a>
    |
    <a href="{{route('course.create')}}">Додати</a>
    |
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
        {{ __('Вийти з кабінета') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
