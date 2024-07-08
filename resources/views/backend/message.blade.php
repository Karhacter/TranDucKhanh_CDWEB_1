@if (session('message'))
    @php
        $arrmsg = session('message');
    @endphp
    <div class="alert alert-{{ $arrmsg['type'] }} alert-dismissible fade show" role="alert">
        !{{ $arrmsg['msg'] }}! 

    </div>

    <script>
        // Hide the alert after 3 seconds
        setTimeout(function() {
            let alertElement = document.querySelector('.alert-dismissible');
            if (alertElement) {
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                setTimeout(() => {
                    alertElement.remove();
                }, 500); // Allow some time for the fade out effect
            }
        }, 1000);
    </script>
@endif
