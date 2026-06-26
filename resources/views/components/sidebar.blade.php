<aside class="sidebar">

    <div class="logo">

        <i class="bi bi-box-seam"></i>

        <span>
            VENTAS PRO
        </span>

    </div>

    <ul class="menu">

        <li>
            <a href="#">
                <i class="bi bi-grid"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}">
                <i class="bi bi-tags"></i>
                Categorías
            </a>
        </li>

        <li>
            <a href="{{ route('products.index') }}">
                <i class="bi bi-box"></i>
                Productos
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-people"></i>
                Clientes
            </a>
        </li>

        <li>
            <a href="{{route('suppliers.index')}}">
                <i class="bi bi-truck"></i>
                Proveedores
            </a>
        </li>

        <li>
            <a href="{{route('purchases.index')}}">
                <i class="bi bi-cart-plus"></i>
                Compras
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-receipt"></i>
                Ventas
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-arrow-left-right"></i>
                Kardex
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-graph-up"></i>
                Reportes
            </a>
        </li>

    </ul>

    <div class="sidebar-user">

        <div>

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <small class="d-block text-muted">
                Administrador
            </small>

        </div>

    </div>

</aside>