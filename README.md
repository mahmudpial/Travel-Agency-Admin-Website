# ✈️ Travel Agency Admin Website

![Status](https://img.shields.io/badge/status-active-success) ![Type](https://img.shields.io/badge/type-internal_admin-blue) ![Stack](https://img.shields.io/badge/stack-Laravel_13_%2B_Vue_3-red)

A secure, scalable, and maintainable internal admin management dashboard built for a Bangladesh-based travel agency. This project follows strict architecture rules, emphasizing robust backend validation, modular frontend components, and modern UI/UX design.

---

## ✨ Features

- **Authentication & Profile:** Secure session-based login and logout, plus a complete Profile Module for admins to update their information and passwords securely.
- **Roles & Permissions:** Foundation built with `spatie/laravel-permission`. Includes predefined roles (Super Admin, Admin, Manager, Staff) to manage access control.
- **Modern Dashboard UI:** Built with Vue 3, Inertia.js, and Bootstrap 5 for a clean, responsive, single-page application (SPA) feel.
- **Custom Error Pages:** Beautiful, branded error pages (403, 404, 500) integrated directly with Inertia.js.
- **Reusable Components:** Includes a library of highly reusable UI components (`FormInput`, `FormSelect`, `FileUploader`, `LoadingButton`, `StatusBadge`, `ToastNotification`, `DataTable`, `EmptyState`, `ConfirmDialog`, `AppModal`, `Pagination`, `FormDatePicker`, `AppTabs`) and an Authenticated Layout to ensure consistency and speed up development.
- **Requirement-Driven:** Modules (Customers, Bookings, Services) are strategically planned and built *only* when explicit business rules are defined.

---

## 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP 8.3+, Laravel 13 |
| **Frontend** | Vue.js 3 (Composition API) |
| **Bridge** | Inertia.js |
| **Styling** | Bootstrap 5, Bootstrap Icons |
| **Database** | MySQL |
| **Routing (Frontend)** | Ziggy |

---

## 📂 Project Structure (Tree)

Here is the high-level overview of the important directories and files in this project:

```text
Travel-Agency-Admin-Website/
├── app/
│   ├── Http/Controllers/     # Application logic (e.g., Auth, Dashboard)
│   └── Models/               # Eloquent Models (e.g., User)
├── bootstrap/                # Laravel bootstrap files
├── config/                   # Configuration files
├── database/
│   ├── migrations/           # Database schema definitions
│   └── seeders/              # Database seeders (e.g., Admin User)
├── docs/                     # Project documentation (e.g., PROJECT_STATE.md)
├── public/                   # Publicly accessible assets and entry point
├── resources/
│   ├── js/
│   │   ├── Components/       # Reusable UI components (FormInput, Toasts, etc.)
│   │   ├── Layouts/          # Reusable Vue layouts (e.g., AuthenticatedLayout)
│   │   ├── Pages/            # Vue page components (e.g., Auth/Login, Dashboard)
│   │   └── app.js            # Main frontend entry point (Inertia & Vue setup)
│   ├── sass/                 # Custom styling (app.scss)
│   └── views/
│       └── app.blade.php     # Main Blade template for Inertia
├── routes/
│   ├── web.php               # Web routes for Laravel
│   └── console.php           # Console commands
├── AGENTS.md                 # Core AI rules and project workflow guidelines
├── package.json              # NPM dependencies
├── vite.config.js            # Vite configuration
└── README.md                 # This file
```

---

## 🚀 Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing.

### Prerequisites
- **PHP** >= 8.3
- **Composer**
- **Node.js** & **NPM**
- **MySQL**

### Installation

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd Travel-Agency-Admin-Website
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM dependencies:**
   ```bash
   npm install
   ```

4. **Environment Setup:**
   Copy the example `.env` file and configure your database settings.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Migration & Seeding:**
   Run the migrations and seed the database with the initial admin user.
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Default Admin: `admin@example.com` / `password`)*

6. **Run the Application:**
   Start the Laravel local development server and the Vite dev server in separate terminals:
   ```bash
   php artisan serve
   ```
   ```bash
   npm run dev
   ```

---

## 📝 Documentation & Workflow

This project is built under strict guidelines defined in `AGENTS.md`. 
The current state of the project, including recent changes, bug fixes, and architecture decisions, is continuously maintained in [`docs/PROJECT_STATE.md`](docs/PROJECT_STATE.md). 

**Important:** This `README.md` and `PROJECT_STATE.md` are dynamically updated after every major phase or feature addition.
