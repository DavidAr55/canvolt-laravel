@if ($message = Session::get('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ $message }}',
                confirmButtonText: 'OK',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#00ff00',
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $message }}',
                confirmButtonText: 'OK',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#ff0000',
                confirmButtonColor: '#d33'
            });
        });
    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: '{{ $message }}',
                confirmButtonText: 'OK',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#ffa500',
                confirmButtonColor: '#f0ad4e'
            });
        });
    </script>
@endif
