<nav class="topbar">

    <div class="search-box">

        <i class="bi bi-search"></i>

        <input
            type="text"
            placeholder="Buscar..."
        >

    </div>

    <div class="d-flex align-items-center gap-3">

        <button
            class="btn btn-light rounded-circle">

            <i class="bi bi-bell"></i>

        </button>

        <div class="d-flex align-items-center">

            <img
                src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                width="40"
                class="rounded-circle">

        </div>
        <div class="d-flex align-items-center gap-2">

            <a href="{{ route('logout') }}"
                class="btn btn-light rounded-circle"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Salir
                <i class="bi bi-box-arrow-right"></i>

            </a>

        </div>

    </div>

</nav>