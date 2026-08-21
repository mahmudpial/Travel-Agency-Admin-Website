# ✈️ Travel Agency Admin - Project State & Changelog

This document tracks the current state of the project, major architecture decisions, bug fixes, and the next steps. It is maintained by the AI assistant after every major phase or bug fix.

---

## 📅 Current Project Stage
**Status:** Waiting for Business Requirements
**Completed Phases:**
- **Phase 1:** Foundational Setup & Authentication (Laravel 13, Vue 3, Inertia.js, Bootstrap 5)
- **Phase 2:** Admin Authenticated Layout & Dashboard UI (Reusable UI Foundation)
- **Phase 2.1:** Core Reusable Vue Components (FormInput, LoadingButton, StatusBadge, ToastNotification)
- **Phase 2.2:** Advanced Reusable Vue Components (DataTable, EmptyState, ConfirmDialog, FormSelect, FileUploader)
- **Phase 2.3:** Admin Profile Module (Profile and Password Update)
- **Phase 2.4:** Error Pages & Roles Foundation (Inertia Custom Error Pages, Spatie Laravel Permission)

---

## 🏗️ Architecture Decisions (ADR)
1. **Frontend Stack:** We chose Vue 3 + Inertia.js instead of building a separate REST API to keep the architecture simple, secure, and tightly integrated with Laravel's session-based authentication.
2. **UI Framework:** We chose Bootstrap 5 for a clean, professional admin interface.
3. **Requirement-First Approach:** We explicitly decided NOT to build business modules (like Customers, Bookings) until actual company requirements are provided, to prevent incorrect database design.

---

## 🐛 Key Bug Fixes & Learnings
- **Double Hashing Bug:** In Laravel 11/13, the `User` model automatically casts the `password` field to `hashed`. Using `bcrypt('password')` in the DatabaseSeeder caused the password to be hashed twice, making `Auth::attempt` fail. 
  - *Fix:* Passed the plain text `'password'` in the seeder.
- **Vue Template Global Scope Bug:** Vue 3 templates do not have access to the global `window` object by default. Using `window.route()` in `AuthenticatedLayout.vue` caused a render error.
  - *Fix:* Used the globally provided `route()` helper from ZiggyVue directly in the template instead of `window.route()`.

---

## 🚀 Next Steps
- Waiting for actual business requirements from the client (e.g., how they manage customers, bookings, packages, and payments).
- Optional: Can build more Reusable Vue Components (e.g., DataTables, Global Toasts, Modal components) while waiting for requirements.
