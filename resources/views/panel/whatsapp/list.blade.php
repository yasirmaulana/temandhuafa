<x-layout>

    <div class="pagetitle">
    <h1>WhatsApp Management</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('panel/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">WhatsApp</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
                        <div>
                            <h5 class="card-title p-0 m-0">Sessions</h5>
                            <p class="text-muted small m-0">Manage your WhatsApp connections.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-success d-flex align-items-center gap-1">
                                <i class="bi bi-send"></i> Broadcast
                            </button>
                            <button class="btn btn-success d-flex align-items-center gap-1">
                                <i class="bi bi-plus-lg"></i> New Session
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Session Card Item -->
                        <div class="col-md-4">
                            <div class="card border rounded-3 shadow-sm pt-0">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                                <i class="bi bi-smartphone text-success fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">session_1770079603678</h6>
                                                <small class="text-muted">connected • 6281511305597</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success-light text-success border border-success px-2 py-1 small" style="font-size: 0.7rem;">CONNECTED</span>
                                    </div>
                                    
                                    <p class="text-muted small mb-3">Created: 2/3/2026</p>
                                    
                                    <hr class="my-2">
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-1 text-success small">
                                            <i class="bi bi-wifi"></i> <span>Active</span>
                                        </div>
                                        <button class="btn btn-link p-0 text-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Session Card Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-success-light {
        background-color: #e6f7ef;
    }
    .fs-4 {
        font-size: 1.5rem !important;
    }
    .gap-1 { gap: 0.25rem; }
    .gap-2 { gap: 0.5rem; }
</style>
</x-layout>
