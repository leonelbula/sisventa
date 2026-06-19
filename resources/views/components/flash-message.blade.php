@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',
        timer: 2500,
        showConfirmButton: false,
        timerProgressBar: true,
        toast: true,
        position: 'top-end'
    });
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        confirmButtonText: 'Aceptar'
    });
});
</script>
@endif

@if(session('warning'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: '{{ session('warning') }}',
        confirmButtonText: 'Aceptar'
    });
});
</script>
@endif

@if(session('info'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'info',
        title: 'Información',
        text: '{{ session('info') }}',
        confirmButtonText: 'Aceptar'
    });
});
</script>
@endif