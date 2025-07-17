<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

      function showAlert() {
            Swal.fire({
                title: 'Hello again!',
                text: 'This is a repeated alert.',
                icon: 'info',
                confirmButtonText: 'Close'
            });
        }
      function showAlertSuccess() {
            Swal.fire({
                title: 'Success!',
                text: 'Your action was successful.',
                icon: 'success',
                confirmButtonText: 'Close'
            });
        }
      function showAlerterror() {
            Swal.fire({
                title: 'Error!',
                text: 'There was an error processing your request.',
                icon: 'error',
                confirmButtonText: 'Close'
            });
        }
      function showAlertWarning() {
            Swal.fire({
                title: 'Warning!',
                text: 'This is a warning alert.',
                icon: 'warning',
                confirmButtonText: 'Close'
            });
        }

            function showAlertWarningWithImage() {
        Swal.fire({
            title: 'Rukko bhai!',
            text: 'wait bro.',
             background: 'rgba(255, 255, 255, 0.2)',
            color: '#000',
            backdrop: `
                rgba(0,0,0,0.4)
                url("https://gifdb.com/images/high/strong-woman-warning-n2qnctziorisj2z8.webp")
                top center
                no-repeat
            `,
            imageUrl: "{{ asset('assets/images/warning.png') }}", // Laravel asset helper
            imageWidth: 80,
            imageHeight: 80,
        });
    }
        window.onload = function () {
            showAlert();
        };
</script>
