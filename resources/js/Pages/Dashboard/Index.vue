<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h4 class="mb-0 fw-bold text-dark">Dashboard Overview</h4>
        </template>

        <!-- Dashboard Widgets -->
        <div class="row g-4 mb-4">
            <!-- Widget 1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Customers</h6>
                            <h3 class="mb-0 fw-bold">---</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget 2 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-calendar-check-fill fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Active Bookings</h6>
                            <h3 class="mb-0 fw-bold">---</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget 3 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-wallet2 fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Pending Payments</h6>
                            <h3 class="mb-0 fw-bold">---</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget 4 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-airplane-fill fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Visa/Tickets</h6>
                            <h3 class="mb-0 fw-bold">---</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content Area -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted">Welcome to the Travel Agency Admin System! The business modules are currently being prepared.</p>
                        
                        <div class="text-center py-5">
                            <i class="bi bi-activity text-secondary opacity-25" style="font-size: 4rem;"></i>
                            <h6 class="mt-3 text-muted">No recent activity yet</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary text-white position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 p-4 opacity-25">
                        <i class="bi bi-airplane" style="font-size: 8rem; transform: rotate(45deg);"></i>
                    </div>
                    <div class="card-body p-4 position-relative z-1">
                        <h5 class="fw-bold mb-3">Quick Actions</h5>
                        <p class="mb-4 opacity-75">Common tasks will appear here once modules are activated.</p>
                        <button class="btn btn-light rounded-pill px-4 fw-medium text-primary shadow-sm w-100 mb-2" disabled>
                            <i class="bi bi-plus-circle me-2"></i> New Booking
                        </button>
                        <button class="btn btn-outline-light rounded-pill px-4 fw-medium w-100" disabled>
                            <i class="bi bi-person-plus me-2"></i> Add Customer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
