# ✈️ Travel Agency Admin Management System

> **Internal Admin Dashboard** for a local travel agency company in Bangladesh — built to feel like a real production business application, not a generic demo.

![Status](https://img.shields.io/badge/status-planning-blue) ![Type](https://img.shields.io/badge/type-internal--admin-informational) ![Stack](https://img.shields.io/badge/stack-Laravel%2013%20%2B%20Inertia%20%2B%20Vue-red)

---

## 📚 Table of Contents

1. [Technology Stack](#1-️-technology-stack)
2. [Core Development Principles — Mandatory Workflow](#2-🔁-core-development-principles--mandatory-workflow)
3. [Requirement-First Rule](#3-📋-requirement-first-rule)
4. [Existing Project Protection](#4-🛡️-existing-project-protection)
5. [UI/UX](#5-🎨-uiux)
6. [Reusable Vue Components](#6-🧩-reusable-vue-components)
7. [Database & Backend](#7-🗄️-database--backend)
8. [Forms & Server-Side Validation](#8-✅-forms--server-side-validation)
9. [Authentication](#9-🔐-authentication)
10. [Authorization](#10-🛂-authorization)
11. [Route Parameters, IDs & UUIDs](#11-🆔-route-parameters-ids--uuids)
12. [CSRF Protection](#12-🧷-csrf-protection)
13. [Mass Assignment Protection](#13-🚧-mass-assignment-protection)
14. [File Upload Security](#14-📁-file-upload-security)
15. [Sensitive Customer Documents](#15-🔏-sensitive-customer-documents)
16. [OTP & Verification Security](#16-🔑-otp--verification-security)
17. [Financial & Business Data Security](#17-💰-financial--business-data-security)
18. [Database Security](#18-🗃️-database-security)
19. [Error Handling & Logging](#19-🧯-error-handling--logging)
20. [Rate Limiting](#20-⏱️-rate-limiting)
21. [Session Security](#21-🍪-session-security)
22. [Environment & Secret Management](#22-🌱-environment--secret-management)
23. [Production Security](#23-🚀-production-security)
24. [Security Headers & Clickjacking Protection](#24-🧱-security-headers--clickjacking-protection)
25. [API & Token Security](#25-🔗-api--token-security)
26. [Dependency & Framework Security](#26-📦-dependency--framework-security)
27. [PHP & Server Security](#27-🖥️-php--server-security)
28. [Security Logging & Auditability](#28-📝-security-logging--auditability)
29. [Testing Requirements](#29-🧪-testing-requirements)
30. [UI State & Error Experience](#30-💬-ui-state--error-experience)
31. [Customer & Financial Data](#31-👤-customer--financial-data)
32. [Documents](#32-📄-documents)
33. [Coding Standards](#33-🧹-coding-standards)
34. [Important AI Rule](#34-🤖-important-ai-rule)
35. [Technical Documentation Reference](#35-📖-technical-documentation-reference)
36. [Final Goal](#36-🎯-final-goal)

---

## 1. 🛠️ Technology Stack

Use the following primary technology stack unless there is a clear technical reason to use something else **and the decision is approved**.

| Layer | Technology |
|---|---|
| Backend | PHP 8.3+, Laravel 13 |
| Database | MySQL |
| Frontend | Vue.js, JavaScript (ES6+) |
| Bridge | Inertia.js |
| UI Framework | Bootstrap 5 (+ Bootstrap Icons) |

**Architecture:** `Laravel 13 + Inertia.js + Vue.js + Bootstrap 5 + MySQL`

**Laravel** is responsible for:
- Routing · Authentication · Authorization · Validation
- Database operations · Eloquent relationships · Business logic
- File handling · Notifications · Queues (when required) · Server-side security

**Vue.js** is responsible for:
- Admin pages · UI components · Forms
- Interactions · Client-side state (where appropriate) · User experience

**Inertia.js** is the bridge between Laravel and Vue.js.

> ⚠️ Do **NOT** create a separate REST API for normal admin CRUD unless there is a genuine requirement.

---

## 2. 🔁 Core Development Principles — Mandatory Workflow

The project **MUST** strictly follow:

> ### **Plan → Build → Review → Approve → Continue**

The entire project **MUST NOT** be built at once. Development happens in small, logical, reviewable phases.

### 2.1 📝 Plan
Before starting every major phase, explain:

1. What will be built
2. Why it is needed
3. What business problem it solves
4. Which files/modules may be created or modified
5. Which database tables or relationships may be affected
6. How the implementation will work
7. Dependencies
8. Assumptions
9. Potential risks
10. Any unclear requirement that could affect architecture, database design, or business workflow

If a significant technical decision is required:
- Explain the available approaches briefly
- Recommend the best approach
- Explain important trade-offs
- **Ask for user approval** before proceeding when the decision materially affects architecture, database structure, or business workflow

> 🚫 Do NOT guess when an unclear requirement could create long-term technical consequences.

### 2.2 🔨 Build
After the plan is clear and required decisions approved:
- Implement **ONLY** the current phase
- Do NOT implement future phases
- Do NOT create unrelated features
- Do NOT modify unrelated files
- Preserve existing working functionality
- Follow Laravel 13, Vue, Inertia and Bootstrap conventions
- Reuse existing project components where appropriate
- Avoid unnecessary abstractions / packages
- Explain why any new package/library is necessary before introducing it

### 2.3 🔍 Review
After completing the current phase, **STOP development** and provide a complete review covering:

1. What was created
2. Files created
3. Existing files modified
4. Database migrations & schema changes
5. Models and relationships
6. Routes and controllers
7. Form Requests and validation
8. Vue pages and reusable components
9. Important business logic
10. Security considerations
11. How the components connect
12. Manual testing steps
13. Expected results
14. Edge cases
15. Known limitations
16. Any decisions that still require clarification

> Do not start the next major phase during the review.

### 2.4 ✅ Approve
After the review, explicitly ask the user to review the completed phase:

> **"Phase completed. Please review the implementation. If everything is correct, approve this phase and I will proceed to the next phase."**

Do **NOT** continue automatically. Do **NOT** assume approval from:
- Silence
- A review request
- A question
- A request for explanation
- Partial feedback
- Positive comments that do not explicitly approve continuation

Only **explicit** user approval allows the next major phase to begin.

### 2.5 ➡️ Continue
Only after explicit approval:
- Proceed to the next logical phase
- Start the next phase with a **new Plan**
- Follow the same **Plan → Build → Review → Approve → Continue** workflow

### 2.6 🛑 Strict Stop Rule

> **NEVER** build the entire project at once.
> **NEVER** automatically continue to the next major phase.
> **ALWAYS STOP** after every major phase and wait for explicit approval.

If the user requests changes during review:
1. Modify only the relevant phase
2. Re-test the affected functionality
3. Provide an updated review
4. Stop again
5. Wait for approval

> A phase is NOT approved until the user explicitly approves it.

---

## 3. 📋 Requirement-First Rule

This is a real Bangladesh-based travel agency. Actual business requirements will be collected **separately**.

Until then:
- Do NOT assume company-specific workflows
- Do NOT invent unnecessary business rules
- Do NOT finalize service-specific processes without evidence
- Build only flexible and reusable foundations
- Clearly identify assumptions
- Ask questions when requirements are unclear

### Once company requirements are provided:
1. Analyze the requirements
2. Identify entities and workflows
3. Identify relationships
4. Identify business rules
5. Identify roles and permissions
6. Identify financial rules
7. Identify document requirements
8. Identify reporting requirements
9. Identify risks and ambiguities
10. Propose the implementation plan

### 🧭 Candidate Modules (NOT pre-approved)

> ⚠️ A module appearing below does **NOT** mean it is approved for implementation. Do NOT create tables, routes, controllers, pages, permissions, or workflows for a candidate module until the actual business requirement justifies it.

- Dashboard
- Customers
- Services
- Operations
- Bookings
- Visa
- Air Ticketing
- Tour Packages
- Hotel
- Hajj/Umrah
- Payments
- Suppliers/Vendors
- Staff
- Roles & Permissions
- Documents
- Notifications/Reminders
- Reports
- Settings

Implement modules **only** according to actual company requirements.

---

## 4. 🛡️ Existing Project Protection

Before modifying the existing project, inspect:
- Current project structure
- Current Laravel version
- Current Vue and Inertia setup
- Current Bootstrap setup
- Existing routes, controllers, models, migrations
- Existing layouts and Vue components
- Existing authentication (understand before replacing/modifying)

### Rules
- Do NOT replace working architecture without a justified reason
- Do NOT delete working functionality without approval
- Do NOT rewrite unrelated code
- Preserve existing behavior while implementing new requirements
- If existing code conflicts with the desired architecture → explain the issue before making a major structural change
- Do not perform large-scale refactoring unless it is part of the approved phase
- Inspect a file's current implementation before modifying it

---

## 5. 🎨 UI/UX

Create a clean, modern, professional business administration interface.

**Priorities:** Usability · Productivity · Readability · Consistency · Accessibility · Responsive design

### Use Bootstrap 5 properly for:
Grid · Forms · Tables · Cards · Modals · Buttons · Alerts · Dropdowns · Navigation · Responsive layouts

Use **Bootstrap Icons** where useful.

### 🚫 Avoid
- Excessive animation
- Unnecessary custom CSS
- Visual clutter
- Over-designed dashboards
- Excessive gradients
- Unnecessary decorative elements

### 📱 Must work well on
Desktop · Laptop · Tablet · Mobile

---

## 6. 🧩 Reusable Vue Components

Possible reusable components:

`DataTable` · `Search` · `Filters` · `StatusBadge` · `Modal` · `FormInput` · `SelectInput` · `FileUploader` · `Pagination` · `EmptyState` · `LoadingState` · `ConfirmDialog` · `Toast/Alert`

> ⚠️ Do NOT create a reusable component **merely because it's listed here**.

Create one only when:
- The same UI pattern is used in multiple places
- Reuse improves consistency
- The component has a clear independent responsibility
- Reuse reduces meaningful duplication

Avoid premature abstraction.

---

## 7. 🗄️ Database & Backend

Use proper relational database design. Before creating complex tables, identify:

Entities · Relationships · Required/Optional fields · Statuses · Ownership · Assignment · Financial relationships · Documents · Audit requirements · Deletion behavior

### Use
- Foreign keys
- Appropriate indexes
- Timestamps
- Soft deletes where appropriate
- Laravel Eloquent relationships
- Meaningful naming
- Appropriate unique constraints

Avoid unnecessary JSON/TEXT fields when proper relational tables are more appropriate.

### 📐 Database Migration Rule
- All schema changes **MUST** go through Laravel migrations
- Do NOT manually modify schemas as normal workflow
- Identify: relationships, cardinality, ownership, lifecycle/status, uniqueness, index requirements, deletion behavior, financial relationships, audit requirements
- Use database transactions for critical multi-step operations where appropriate

---

## 8. ✅ Forms & Server-Side Validation

> **All important validation and security checks MUST be enforced on the Laravel backend.** Vue.js validation is only for UX — it is **NOT** a security boundary.

For every important form, validate:

Required fields · Nullable fields · Strings · Numbers · Booleans · Dates · Emails · Phone numbers · Statuses/enums · Relationships · Max lengths · Route parameters · Referenced record existence · Authorization · Never trust client-controlled values

Use **Form Request classes** for complex/reusable validation.

```php
$request->validate([
    'name'  => ['required', 'string', 'max:255'],
    'email' => ['required', 'email', 'max:255'],
    'phone' => ['nullable', 'string', 'max:30'],
]);
```

Use **validated data** for DB operations. Never blindly use `$request->all()` for create/update.

---

## 9. 🔐 Authentication

Use Laravel 13's official authentication mechanisms whenever applicable.

- Protect admin routes with authentication middleware
- Never expose protected admin functionality to unauthenticated users
- Use Laravel's secure password hashing — never store plaintext passwords
- Regenerate sessions after authentication where appropriate
- Properly invalidate sessions during logout
- Implement email verification when required (prefer Laravel's official mechanism)
- Protect sensitive account actions with additional verification when required

> ℹ️ Authentication proves a user is logged in. **Authentication MUST NOT be treated as authorization.**

---

## 10. 🛂 Authorization

Every protected operation **MUST** be authorized on the server.

Use: **Policies · Gates · Middleware · Role/permission checks**

- Do NOT rely only on Vue to hide restricted buttons
- Do NOT assume every authenticated admin can access every resource
- Verify authorization before **view / create / edit / delete / download**
- Follow least-privilege principles
- Keep authorization logic centralized and maintainable

**Example restricted operations:** editing staff, viewing private customer documents, issuing refunds, modifying supplier payments, changing roles/permissions, viewing financial reports.

> Actual permissions depend on company requirements.

---

## 11. 🆔 Route Parameters, IDs & UUIDs

UUIDs may be used for publicly exposed resource identifiers when there is a **clear architectural reason**.

- UUIDs reduce exposure of sequential internal IDs
- UUIDs are **NOT** a replacement for authorization — always verify authorization
- Use Laravel route model binding where appropriate
- Use explicit UUID route binding when UUIDs are intended public identifiers
- Do NOT add UUID columns to every table without a clear requirement

```php
Route::get('/users/{user:uuid}/edit', [UserController::class, 'edit'])
    ->name('users.edit');
```

> The controller/policy layer must still verify authorization.

---

## 12. 🧷 CSRF Protection

- Use Laravel's built-in CSRF protection
- Protect state-changing web requests
- Do NOT disable CSRF protection for normal admin operations
- Follow Laravel 13 and Inertia.js standard request handling
- Do NOT build a custom CSRF system
- Verify any exception before implementation

---

## 13. 🚧 Mass Assignment Protection

Never blindly pass user-controlled request data into Eloquent models.

```php
// ❌ Avoid
$user->update($request->all());

// ✅ Prefer
$validated = $request->validated();
$user->update($validated);
```

Use Laravel's mass-assignment protection appropriately — only intentionally writable fields should be accepted.

---

## 14. 📁 File Upload Security

File uploads are security-sensitive. **All uploads MUST be validated server-side.**

### General Rules
- Never trust the original filename, client-provided extension, or client-provided MIME info
- Validate via Laravel's server-side validation mechanisms
- Restrict file size and allowed types (per-feature)
- Use Laravel Storage; generate safe server-side filenames/paths
- Never allow uploaded files to become executable server-side code
- Don't store sensitive files in publicly accessible locations without justified design
- Store only necessary metadata in the DB
- Protect sensitive file operations with authorization

```php
$request->validate([
    'document' => [
        'required',
        'file',
        'mimes:jpg,jpeg,png,pdf',
        'max:5120',
    ],
]);
```

### 🎯 Feature-Specific File Validation
> Do NOT create one global file-extension whitelist for the entire application.

Different features (passport documents, visa documents, customer photos, invoices, supplier documents, reports, spreadsheet imports) need their **own** validation rules. Common file-security logic may be reused via services/components, but business-specific validation must stay feature-aware. Never rely only on JS validation.

---

## 15. 🔏 Sensitive Customer Documents

Travel agency data may include: passport info, visa documents, identity documents, personal information, financial documents. **Treat all as sensitive.**

- Prefer private storage
- Authorize every view/download/delete operation
- Do not expose predictable public URLs
- Do not place sensitive files in the public web root unless explicitly justified
- Use controlled Laravel responses for protected downloads/views
- Do not expose unnecessary document paths to Vue/Inertia
- Do not include sensitive document contents in logs
- Consider audit logging for sensitive document access when required

---

## 16. 🔑 OTP & Verification Security

Implement OTP only when required by actual business requirements. If required:

- Generate OTPs/tokens using **secure random generation**
- Never use sequential DB IDs as OTP tokens
- OTPs must have short expiration periods and be single-use
- Invalidate OTPs after successful verification
- Limit verification attempts; rate-limit generation and verification
- Prevent unlimited resend attempts
- Never expose OTPs in logs or unnecessarily through Inertia/API responses
- Store OTP-related secrets securely; consider hashing OTPs

---

## 17. 💰 Financial & Business Data Security

> **All authoritative financial calculations MUST be controlled by Laravel. Never trust frontend-calculated financial values.**

This includes: selling price, cost price, customer payment, paid amount, due amount, refund, supplier payment, commission, staff commission, profit, discount, tax, fees.

```php
$profit = $sellingPrice - $costPrice;
// ❌ Do NOT accept a client-provided profit value as authoritative
```

For critical financial operations:
- Use database transactions where appropriate
- Validate business rules
- Prevent invalid negative balances unless explicitly allowed
- Use **DECIMAL** DB types for money — never floating-point for authoritative values
- Keep financial calculations consistent
- Record important financial changes when auditability is required
- Never allow frontend-only calculations to determine authoritative balances

---

## 18. 🗃️ Database Security

- Never concatenate untrusted input into SQL
- Prefer parameterized queries
- Validate identifiers before DB operations
- Use foreign keys and appropriate indexes
- Use transactions for critical multi-step operations
- Avoid unnecessary raw SQL; if genuinely required, use parameter binding
- Never expose passwords, tokens, secrets, or sensitive internal data
- Prefer Eloquent/query builder protections over manually constructed SQL

---

## 19. 🧯 Error Handling & Logging

Do not expose internal application information to users.

- Never expose raw SQL errors, stack traces, filesystem paths, or secrets
- Use Laravel's exception handling system
- Use try/catch only when custom recovery, cleanup, rollback, contextual logging, or a specific user-facing response is required — don't wrap every DB operation unnecessarily
- Log useful technical info, but **never** log passwords, OTPs, API keys, access tokens, or sensitive document contents
- Show users clear, safe error messages

```php
try {
    DB::transaction(function () use ($validated) {
        // Critical business operation
    });
} catch (\Throwable $e) {
    Log::error('Critical operation failed.', [
        'exception' => $e,
    ]);

    return back()->with(
        'error',
        'Something went wrong. Please try again.'
    );
}
```

---

## 20. ⏱️ Rate Limiting

Apply rate limiting to sensitive/abuse-prone operations:

Login attempts · OTP requests · OTP verification · Password reset requests · Sensitive account actions · Expensive reports · Expensive searches · External service/API requests

Use Laravel's **official** rate-limiting mechanisms — don't build a custom system unless genuinely required.

---

## 21. 🍪 Session Security

- Use Laravel's standard session mechanisms
- Regenerate session after authentication where appropriate
- Invalidate sessions during logout
- Protect sensitive actions
- Configure secure cookies in production; use HTTPS
- Do not store sensitive auth info in browser `localStorage`
- Never expose session secrets to Vue
- Review session configuration before production deployment

---

## 22. 🌱 Environment & Secret Management

- Never commit `.env` — use `.env.example`
- Never hard-code passwords, API keys, or DB credentials
- Never expose private API keys to Vue
- Never expose server-side secrets through Inertia props
- Use Laravel configuration/environment variables appropriately
- Review environment configuration before production deployment

---

## 23. 🚀 Production Security

**Minimum:**
```env
APP_ENV=production
APP_DEBUG=false
```

Also:
- Use HTTPS; configure secure cookies
- Protect application logs and `.env`
- Prevent public access to private storage
- Use appropriate filesystem permissions
- Keep PHP, Laravel, and dependencies updated
- Remove unnecessary dev/debug tooling from production
- Review server configuration before deployment

---

## 24. 🧱 Security Headers & Clickjacking Protection

At minimum, protect the admin app against clickjacking, using:
- `X-Frame-Options`
- Content Security Policy (`frame-ancestors`)

> Do NOT blindly copy security middleware from older Laravel versions.

Before implementing:
- Verify compatibility with Laravel 13
- Verify compatibility with Inertia.js
- Verify compatibility with legitimate embedding requirements
- Explain significant security-header decisions before implementation
- Do NOT add headers that unnecessarily break legitimate functionality

---

## 25. 🔗 API & Token Security

This project primarily uses **Laravel + Inertia.js + Vue.js**.

> Normal admin CRUD **MUST NOT** be converted into a separate REST API without a genuine requirement. Do NOT introduce an API just because it's a "modern pattern."

Use Inertia server-side interactions for admin CRUD, unless there's a real requirement such as: external integrations, mobile apps, public consumers, third-party systems, separate frontend apps.

If an API becomes necessary:
1. Explain why it is required
2. Obtain approval before introducing separate API architecture
3. Use the appropriate Laravel 13 auth/token mechanism
4. Validate every request; authorize every operation
5. Apply rate limiting
6. Return only required data — never expose passwords/secrets/unnecessary internal fields

> Do NOT add Sanctum, Passport, or another API auth package unless the actual requirement justifies it.

---

## 26. 📦 Dependency & Framework Security

This project uses **Laravel 13** (requires PHP 8.3+ within its supported range).

Before upgrading dependencies:
- Check Laravel 13 compatibility
- Review official upgrade docs & breaking changes
- Review security advisories
- Test the application
- Review affected packages

Use `composer audit` to check for known vulnerabilities.

> 🚫 Do NOT blindly run `composer update` in production. Upgrades must be deliberate, reviewed, and tested.

---

## 27. 🖥️ PHP & Server Security

Production server configuration should follow secure deployment practices, e.g.:

```ini
expose_php = Off
display_errors = Off
log_errors = On
```

Server-level configuration depends on the hosting environment. **Application-level Laravel security does NOT replace proper server security.**

---

## 28. 📝 Security Logging & Auditability

Sensitive administrative operations should be auditable when required by company workflow:

User creation · User deletion/deactivation · Role changes · Permission changes · Customer data changes · Sensitive document access · Financial transactions · Refunds · Supplier payment changes · Important booking changes · Sensitive account changes

> Audit logs **MUST NOT** store: passwords, OTPs, API keys, access tokens, unnecessary document contents, or other secrets.

Audit requirements must be finalized according to actual company requirements.

---

## 29. 🧪 Testing Requirements

For every major feature, test:

Normal/happy path · Validation failures · Unauthorized access · Unauthenticated access · Not-found scenarios · Duplicate/conflicting data · Destructive actions · Financial calculations · File upload restrictions · Responsive layouts · Empty states · Error states

Use Laravel's supported testing tools and existing project conventions.

> ⚠️ A feature is complete only when its core behavior has been implemented **and** verified — not merely because the page renders.

---

## 30. 💬 UI State & Error Experience

Important pages must properly handle:

Loading state · Empty state · Validation errors · Server errors · Success messages · Confirmation dialogs · Destructive action warnings · Disabled/submitting states

### 🚫 Never leave users with
Blank screens · Unclear errors · Silent failures · Unresponsive buttons · Unclear destructive actions

---

## 31. 👤 Customer & Financial Data

**Customer management may include:**
Personal/contact information · Passport information · Documents · Services · Booking history · Payment history · Due · Notes · Assigned staff

**Financial management (if required) may include:**
Customer payment · Partial payment · Due · Refund · Supplier payment · Cost price · Selling price · Commission · Profit · Staff commission

> Financial calculations must be reliable and server-controlled. Do not implement these features until actual company requirements justify them.

---

## 32. 📄 Documents

If document management is required:
- Validate file type and size
- Use secure storage
- Store necessary metadata
- Protect sensitive files; authorize access
- Provide appropriate upload/view/download/delete actions
- Avoid exposing private file URLs
- Consider audit logging for sensitive document access

---

## 33. 🧹 Coding Standards

Write clean, maintainable, production-oriented code following:

Laravel conventions · Vue best practices · Inertia.js conventions · Bootstrap 5 conventions · DRY principles · Separation of concerns · Reusable components · Meaningful naming · Simple solutions over unnecessary abstractions

**Before modifying an existing file:** inspect current implementation, preserve unrelated behavior, avoid unnecessary rewrites.

**Before adding a package/library:** explain why it's necessary, check whether Laravel/Vue/Inertia/Bootstrap already solves it, check Laravel 13 compatibility, add only if justified.

> Do NOT rewrite unrelated parts of the project when fixing a small issue.

---

## 34. 🤖 Important AI Rule

If a requirement is unclear and could affect **database design, architecture, security, authorization, financial logic, business workflow, or data relationships** →

> ### **ASK FOR CLARIFICATION INSTEAD OF GUESSING.**

For significant technical decisions:
1. Explain available approaches
2. Recommend the best option
3. Explain important trade-offs
4. Ask for approval when the decision materially affects the project

> Do NOT add features outside the agreed scope. Do NOT invent company-specific business rules.

---

## 35. 📖 Technical Documentation Reference

**Primary references:**
- [Laravel 13 Documentation](https://laravel.com/docs/13.x)
- Inertia.js Documentation
- Vue.js Documentation
- Bootstrap 5 Documentation
- MySQL Documentation

When implementing framework-specific behavior:
- Prefer official documentation
- Verify documentation for the exact installed version
- Do not rely on outdated Laravel examples
- Do not copy older Laravel application structures blindly
- If Laravel 13 provides a newer implementation approach, follow it

### 🎯 Laravel-specific security priority order
> **Correctness → Least Privilege → Server-Side Enforcement → Data Protection → Maintainability → Scalability**

---

## 36. 🎯 Final Goal

> Build a **Secure + Scalable + Maintainable + Professional** Travel Agency Admin Management System, based on the real workflow of the Bangladesh-based company.

The final product must feel like a **real production business application**, not a generic demo dashboard.

**The system should be:**

✅ Business-accurate · ✅ Easy to use · ✅ Secure · ✅ Maintainable · ✅ Scalable · ✅ Responsive · ✅ Consistent · ✅ Production-oriented

### 🏆 Priority Order
> **Business Accuracy → Usability → Maintainability → Security → Scalability → UI Quality**

---

<p align="center"><sub>📌 This document governs how development on this project must proceed — follow it strictly, phase by phase.</sub></p>