@if ($errors->any())
    <script type="text/javascript">
        function showMessageValidationError() {
            const Toast = Swal.mixin({
                toast: false,
                position: 'center',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                animation: true,
                title: '{{ __('Validation Error!') }}',
                html: '@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach',
            })
        }

        window.onload = showMessageValidationError;
    </script>
@endif
