<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormInput from '@/Components/FormInput.vue';
import LoadingButton from '@/Components/LoadingButton.vue';

const page = usePage();
const user = page.props.user;

const profileForm = useForm({
    name: user.name,
    email: user.email,
});

const passwordForm = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updateProfile = () => {
    profileForm.patch(route('profile.update'), {
        preserveScroll: true,
    });
};

const updatePassword = () => {
    passwordForm.put(route('profile.password.update'), {
        preserveScroll: true,
        onSuccess: () => passwordForm.reset(),
        onError: () => {
            if (passwordForm.errors.password) {
                passwordForm.reset('password', 'password_confirmation');
            }
            if (passwordForm.errors.current_password) {
                passwordForm.reset('current_password');
            }
        },
    });
};
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h4 class="mb-0 fw-bold text-dark">Profile Settings</h4>
        </template>

        <div class="row g-4">
            <!-- Profile Information -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="fw-bold mb-1">Profile Information</h5>
                        <p class="text-muted small">Update your account's profile information and email address.</p>
                    </div>
                    <div class="card-body p-4">
                        <form @submit.prevent="updateProfile">
                            <FormInput 
                                v-model="profileForm.name" 
                                label="Name" 
                                id="name" 
                                type="text"
                                :error="profileForm.errors.name"
                                required
                            />

                            <FormInput 
                                v-model="profileForm.email" 
                                label="Email Address" 
                                id="email" 
                                type="email"
                                :error="profileForm.errors.email"
                                required
                            />

                            <div class="mt-4 text-end">
                                <LoadingButton 
                                    type="submit" 
                                    variant="primary" 
                                    :loading="profileForm.processing"
                                >
                                    Save Changes
                                </LoadingButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="fw-bold mb-1">Update Password</h5>
                        <p class="text-muted small">Ensure your account is using a long, random password to stay secure.</p>
                    </div>
                    <div class="card-body p-4">
                        <form @submit.prevent="updatePassword">
                            <FormInput 
                                v-model="passwordForm.current_password" 
                                label="Current Password" 
                                id="current_password" 
                                type="password"
                                :error="passwordForm.errors.current_password"
                                required
                            />

                            <FormInput 
                                v-model="passwordForm.password" 
                                label="New Password" 
                                id="password" 
                                type="password"
                                :error="passwordForm.errors.password"
                                required
                            />

                            <FormInput 
                                v-model="passwordForm.password_confirmation" 
                                label="Confirm Password" 
                                id="password_confirmation" 
                                type="password"
                                :error="passwordForm.errors.password_confirmation"
                                required
                            />

                            <div class="mt-4 text-end">
                                <LoadingButton 
                                    type="submit" 
                                    variant="dark" 
                                    :loading="passwordForm.processing"
                                >
                                    Update Password
                                </LoadingButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
