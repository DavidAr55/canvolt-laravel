@if ($message = Session::get('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '!Listo!',
                text: '{{ $message }}',
                confirmButtonText: 'Entendido',
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
                title: '!Error¡',
                text: '{{ $message }}',
                confirmButtonText: 'Entendido',
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
                title: '!Advertencia¡',
                text: '{{ $message }}',
                confirmButtonText: 'Entendido',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#ffa500',
                confirmButtonColor: '#f0ad4e'
            });
        });
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: '{{ $message }}',
                confirmButtonText: 'Entendido',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#2059F0',
                confirmButtonColor: '#f0ad4e'
            });
        });
    </script>
@endif

@if ($message = Session::get('success-cart'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '!Listo!',
                text: '{{ $message }}',
                confirmButtonText: 'Entendido',
                showCancelButton: true,
                cancelButtonText: 'Ver carrito',
                background: '#2f2f2f',
                color: '#fff',
                iconColor: '#00ff00',
                confirmButtonColor: '#494949',
                cancelButtonColor: '#23c050'
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.cancel) {
                    location.href = "{{ url('/carrito') }}";
                }
            });
        });
    </script>
@endif