<script setup>
import { ref } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormInput from '@/Components/FormInput.vue';
import LoadingButton from '@/Components/LoadingButton.vue';
import StatusBadge from '@/Components/StatusBadge.vue';
import DataTable from '@/Components/DataTable.vue';
import ConfirmDialog from '@/Components/ConfirmDialog.vue';
import FormSelect from '@/Components/FormSelect.vue';
import FileUploader from '@/Components/FileUploader.vue';
import AppModal from '@/Components/AppModal.vue';
import Pagination from '@/Components/Pagination.vue';
import FormDatePicker from '@/Components/FormDatePicker.vue';
import AppTabs from '@/Components/AppTabs.vue';

const page = usePage();
const demoText = ref('');
const isSubmitting = ref(false);
const selectedOption = ref('');
const selectedFile = ref(null);
const demoDate = ref('');
const showDemoModal = ref(false);

const tableColumns = [
    { key: 'name', label: 'Name' },
    { key: 'email', label: 'Email' },
    { key: 'status', label: 'Status' },
    { key: 'actions', label: 'Actions' }
];

const tableData = [
    { id: 1, name: 'John Doe', email: 'john@example.com', status: 'Active' },
    { id: 2, name: 'Jane Doe', email: 'jane@example.com', status: 'Pending' }
];

const simulateSubmit = () => {
    isSubmitting.value = true;
    setTimeout(() => {
        isSubmitting.value = false;
        page.props.flash = { ...page.props.flash, success: 'Demo form submitted successfully!', error: null, warning: null, info: null };
    }, 1500);
};

const triggerErrorToast = () => {
    page.props.flash = { ...page.props.flash, error: 'This is a demo error message.', success: null, warning: null, info: null };
};
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
                        
                        <div class="mt-4 p-4 border rounded bg-light">
                            <h6 class="fw-bold mb-3">🛠️ Basic Components Demo</h6>
                            
                            <div class="mb-4">
                                <label class="d-block mb-2 text-muted small fw-bold">1. StatusBadge</label>
                                <div class="d-flex gap-2">
                                    <StatusBadge status="Confirmed" type="success" />
                                    <StatusBadge status="Pending" type="warning" />
                                    <StatusBadge status="Cancelled" type="danger" />
                                    <StatusBadge status="Processing" type="info" />
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6">
                                    <label class="d-block mb-2 text-muted small fw-bold">2. FormInput</label>
                                    <FormInput 
                                        v-model="demoText" 
                                        label="Demo Input Field" 
                                        placeholder="Type something here..." 
                                        helpText="This is a reusable form input component." 
                                    />
                                </div>
                                <div class="col-md-6">
                                    <label class="d-block mb-2 text-muted small fw-bold">3. FormSelect</label>
                                    <FormSelect 
                                        v-model="selectedOption" 
                                        label="Demo Select Dropdown" 
                                        :options="[{label: 'Active', value: 'active'}, {label: 'Inactive', value: 'inactive'}]"
                                    />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="d-block mb-2 text-muted small fw-bold">4. FileUploader</label>
                                <FileUploader 
                                    v-model="selectedFile" 
                                    label="Upload Document" 
                                    accept=".pdf,image/*" 
                                    helpText="Accepted formats: PDF, JPG, PNG"
                                />
                                <div class="small text-muted mt-1" v-if="selectedFile">
                                    Selected: <span class="fw-bold text-primary">{{ selectedFile.name }}</span>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="d-block mb-2 text-muted small fw-bold">5. LoadingButton, 6. ToastNotification & 7. ConfirmDialog</label>
                                <div class="d-flex gap-2">
                                    <LoadingButton @click="simulateSubmit" :loading="isSubmitting" variant="primary">
                                        <i v-if="!isSubmitting" class="bi bi-send me-1"></i> Submit Demo
                                    </LoadingButton>
                                    
                                    <button @click="triggerErrorToast" class="btn btn-outline-danger">
                                        Test Error Toast
                                    </button>

                                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#demoConfirmModal">
                                        Test Confirm Dialog
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 p-4 border rounded bg-light">
                            <h6 class="fw-bold mb-3">🗂️ Advanced Components Demo (Phase 2.2)</h6>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-0">
                                    <DataTable :columns="tableColumns" :items="tableData">
                                        <template #row="{ item }">
                                            <td>{{ item.name }}</td>
                                            <td>{{ item.email }}</td>
                                            <td>
                                                <StatusBadge 
                                                    :status="item.status" 
                                                    :type="item.status === 'Active' ? 'success' : 'warning'" 
                                                />
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-light text-primary py-0" title="View"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-sm btn-light text-success py-0" title="Edit"><i class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-sm btn-light text-danger py-0" title="Delete"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </template>
                                    </DataTable>
                                </div>
                            </div>
                            <div class="mt-3 card border-0 shadow-sm">
                                <div class="card-body p-0">
                                    <DataTable :columns="tableColumns" :items="[]" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 p-4 border rounded bg-light">
                            <h6 class="fw-bold mb-3">🧩 Phase 2.5 New Components Demo</h6>
                            
                            <div class="mb-4">
                                <label class="d-block mb-2 text-muted small fw-bold">8. FormDatePicker</label>
                                <div style="max-width: 300px;">
                                    <FormDatePicker 
                                        id="demo-date" 
                                        v-model="demoDate" 
                                        label="Select Travel Date" 
                                        placeholder="YYYY-MM-DD" 
                                    />
                                    <div class="small text-muted mt-1" v-if="demoDate">
                                        Selected: <span class="fw-bold text-primary">{{ demoDate }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="d-block mb-2 text-muted small fw-bold">9. AppTabs</label>
                                <AppTabs 
                                    :tabs="[
                                        { id: 'tab1', label: 'Basic Info', icon: 'bi-info-circle' },
                                        { id: 'tab2', label: 'Documents', icon: 'bi-file-earmark' }
                                    ]"
                                >
                                    <template #tab1>
                                        <p class="mb-0 text-muted">This is the content for the basic info tab. Great for dividing long forms.</p>
                                    </template>
                                    <template #tab2>
                                        <p class="mb-0 text-muted">This is the documents tab content. You could put a FileUploader here.</p>
                                    </template>
                                </AppTabs>
                            </div>

                            <div class="mb-4">
                                <label class="d-block mb-2 text-muted small fw-bold">10. AppModal & 11. Pagination</label>
                                <div class="d-flex gap-2 mb-3">
                                    <button class="btn btn-outline-primary" @click="showDemoModal = true">
                                        Open Vue Modal
                                    </button>
                                </div>
                                <div class="border rounded p-3 bg-white">
                                    <p class="text-muted small mb-0 text-center">Dummy Pagination Component</p>
                                    <Pagination :links="[
                                        { url: null, label: '&laquo; Previous', active: false },
                                        { url: '#', label: '1', active: true },
                                        { url: '#', label: '2', active: false },
                                        { url: '#', label: 'Next &raquo;', active: false }
                                    ]" />
                                </div>
                            </div>
                        </div>

                        <AppModal id="demoAppModal" title="Demo Custom Modal" v-model:show="showDemoModal">
                            <p class="text-muted">This modal is completely managed by Vue state (<code>v-model:show</code>) rather than standard Bootstrap data-attributes. This makes it easier to open/close from code after an API call.</p>
                            <template #footer>
                                <button type="button" class="btn btn-secondary" @click="showDemoModal = false">Close</button>
                                <button type="button" class="btn btn-primary" @click="showDemoModal = false">Save changes</button>
                            </template>
                        </AppModal>

                        <ConfirmDialog 
                            id="demoConfirmModal" 
                            title="Delete Item" 
                            message="Are you sure you want to delete this dummy item? This cannot be undone." 
                            @confirm="page.props.flash = { error: null, success: 'Item deleted successfully!' }"
                        />
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-primary text-white position-relative overflow-hidden">
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
