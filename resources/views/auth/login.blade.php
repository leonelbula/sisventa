@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}"
                             alt="Logo"
                             width="80">

                        <h3 class="mt-3 fw-bold">
                            Sistema de Ventas
                        </h3>

                        <p class="text-muted">
                            Inicia sesión para continuar
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Correo -->
                        <div class="mb-3">
                            <label class="form-label">
                                Correo electrónico
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="correo@empresa.com"
                                    required
                                    autofocus
                                >
                            </div>

                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label class="form-label">
                                Contraseña
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Ingrese su contraseña"
                                    required
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    id="togglePassword"
                                >
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Recordarme -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="remember"
                                    id="remember"
                                >

                                <label
                                    class="form-check-label"
                                    for="remember"
                                >
                                    Recordarme
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-decoration-none"
                                >
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <!-- Botón -->
                        <div class="d-grid">
                            <button
                                type="submit"
                                class="btn btn-primary btn-lg"
                            >
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-3 text-muted">
                © {{ date('Y') }} Sistema de Ventas
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('togglePassword')
.addEventListener('click', function () {

    const password = document.getElementById('password');
    const icon = this.querySelector('i');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});
</script>
@endpush