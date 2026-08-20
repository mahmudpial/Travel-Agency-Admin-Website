<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <div class="admin-wrapper">
        <!-- Sidebar placeholder -->
        <div class="bg-dark text-white p-3" style="width: 250px;">
            <h4>Admin Panel</h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <Link :href="route('dashboard')" class="nav-link text-white active">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </Link>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Navbar placeholder -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Dashboard</span>
                    <div class="d-flex align-items-center">
                        <span class="me-3">Admin User</span>
                        <Link :href="route('logout')" method="post" as="button" class="btn btn-outline-danger btn-sm">
                            Logout
                        </Link>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to the Travel Agency Admin System</h5>
                        <p class="card-text">You are successfully logged in! This is the foundational scaffold.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
