<script setup>
import { Link } from '@inertiajs/vue3';
import ToastNotification from '@/Components/ToastNotification.vue';
</script>

<template>
    <div class="admin-wrapper d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="sidebar bg-dark text-white d-flex flex-column flex-shrink-0" style="width: 260px; transition: all 0.3s;">
            <div class="p-4 border-bottom border-secondary d-flex align-items-center">
                <i class="bi bi-airplane-engines fs-3 me-2 text-primary"></i>
                <span class="fs-5 fw-semibold">Travel Admin</span>
            </div>
            
            <ul class="nav nav-pills flex-column mb-auto p-3 gap-1">
                <li class="nav-item">
                    <Link 
                        :href="route('dashboard')" 
                        class="nav-link text-white d-flex align-items-center"
                        :class="{ 'active bg-primary': $page.url === '/dashboard' }"
                    >
                        <i class="bi bi-speedometer2 me-3 fs-5"></i>
                        Dashboard
                    </Link>
                </li>
                <!-- Future Modules Placeholders -->
                <li class="nav-item">
                    <a href="#" class="nav-link text-white-50 d-flex align-items-center" style="cursor: not-allowed;" title="Module not yet active">
                        <i class="bi bi-people me-3 fs-5"></i>
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white-50 d-flex align-items-center" style="cursor: not-allowed;" title="Module not yet active">
                        <i class="bi bi-calendar-check me-3 fs-5"></i>
                        Bookings
                    </a>
                </li>
            </ul>

            <div class="p-3 border-top border-secondary">
                <div class="d-flex align-items-center text-white text-decoration-none">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <strong>{{ $page.props.auth?.user?.name || 'Admin User' }}</strong>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="main-content flex-grow-1 d-flex flex-column bg-light overflow-hidden">
            <!-- Top Navbar -->
            <header class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-3 shadow-sm z-index-1">
                <div class="container-fluid px-0 d-flex justify-content-between align-items-center">
                    
                    <!-- Sidebar Toggle (Mobile placeholder) -->
                    <button class="btn btn-light d-lg-none border-0" type="button">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                    
                    <!-- Breadcrumbs / Page Title -->
                    <div class="d-none d-lg-block">
                        <slot name="header">
                            <h5 class="mb-0 fw-semibold text-secondary">Overview</h5>
                        </slot>
                    </div>

                    <!-- Right Top Actions -->
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-light position-relative rounded-circle border-0 p-2" title="Notifications">
                            <i class="bi bi-bell fs-5 text-secondary"></i>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>
                        
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle border-0 rounded-pill px-3 py-2 d-flex align-items-center gap-2" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fw-medium text-dark">{{ $page.props.auth?.user?.name || 'Account' }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userMenu">
                                <li>
                                    <Link class="dropdown-item d-flex align-items-center gap-2 py-2" :href="route('profile.edit')">
                                        <i class="bi bi-person-circle text-secondary"></i> Profile
                                    </Link>
                                </li>
                                <li>
                                    <Link class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                        <i class="bi bi-gear text-secondary"></i> Settings
                                    </Link>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <Link 
                                        :href="route('logout')" 
                                        method="post" 
                                        as="button" 
                                        class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger fw-medium w-100 text-start"
                                    >
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-grow-1 overflow-auto p-4 p-md-5">
                <slot />
            </main>
        </div>
        
        <!-- Global Toast Notifications -->
        <ToastNotification />
    </div>
</template>

<style scoped>
.sidebar {
    height: 100vh;
    position: sticky;
    top: 0;
}
.nav-link {
    transition: all 0.2s ease;
    border-radius: 0.5rem;
}
.nav-link:hover:not(.active) {
    background-color: rgba(255,255,255,0.05);
    transform: translateX(3px);
}
.main-content {
    min-width: 0; /* Prevents flex items from blowing out width */
}
</style>
