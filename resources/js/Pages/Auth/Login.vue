<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4">Admin Login</h3>

                <div v-if="form.errors.email" class="alert alert-danger" role="alert">
                    {{ form.errors.email }}
                </div>

                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input
                            id="email"
                            type="email"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.email }"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            id="password"
                            type="password"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.password }"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <div v-if="form.errors.password" class="invalid-feedback">
                            {{ form.errors.password }}
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="remember"
                            v-model="form.remember"
                        />
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Log in
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
