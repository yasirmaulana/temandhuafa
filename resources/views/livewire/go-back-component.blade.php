<div class="appHeader bg-primary text-light container">
    <div class="left">
        <button id="goBackBtn" class="btn text-white">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </button>
    </div>
    <div class="pageTitle"></div>
    <div class="right">

    </div>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('goBackBtn').addEventListener('click', function() {
                console.log('Go back');
                window.history.go(-1); // Kembali ke halaman sebelumnya
            });
        });
    </script>
</div>
