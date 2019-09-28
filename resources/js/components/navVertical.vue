<template>
    <div>
        <!--Define la nav lateral-->
        <!--TODO: meter clases active en enlaces-->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>GESTIÓN GENERAL</span>
                    </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">
                        <span data-feather="home"></span>
                        Seguimiento
                        <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('facturacion') }}">
                        <span data-feather="file"></span>
                        Facturación
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('clientes') }}">
                        <span data-feather="users"></span>
                        Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('productos') }}">
                        <span data-feather="list"></span>
                        Productos
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>GESTIÓN FISCAL</span>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Trimestre actual
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Año actual
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Años anteriores
                    </a>
                </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
        return
    }
}
</script>
