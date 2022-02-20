@if(Session::has('success'))
    <script type="text/javascript">
        function showMessageSuccess() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                animation: true,
                title: '{{ Session::get('success') }}',
            })
        }

        window.onload = showMessageSuccess;
    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        function showMessageError() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                animation: true,
                title: '{{ Session::get('error') }}',
            })
        }

        window.onload = showMessageError;
    </script>
@endif

@if(Session::has('warning'))
    <script type="text/javascript">
        function showMessageWarning() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                animation: true,
                title: '{{ Session::get('warning') }}',
            })
        }

        window.onload = showMessageWarning;
    </script>
@endif

@if(Session::has('info'))
    <script type="text/javascript">
        function showMessageInfo() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'info',
                animation: true,
                title: '{{ Session::get('info') }}',
            })
        }

        window.onload = showMessageInfo;
    </script>
@endif
