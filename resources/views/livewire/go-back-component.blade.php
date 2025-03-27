<div class="appHeader bg-primary text-light container">
    <div class="left">
        <button id="goBackBtn" class="btn text-white">
            <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="Search Icon" class="chevron-back" height="24">
        </button>
    </div>
    <div class="pageTitle"></div>
    <div class="right">

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('goBackBtn').addEventListener('click', function() {
                console.log('Go back');
                window.history.go(-1); // Kembali ke halaman sebelumnya
            });
        });
    </script>
</div>
