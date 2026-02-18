# ContractVault — Contract Tracking System

Laravel 11 + Vue.js + PostgreSQL · Minimal & Professional

---

## 🚀 Quick Setup

### Prerequisites
- PHP 8.2+ · Composer · Node.js 18+ · PostgreSQL 14+

```bash
# 1. Install dependencies
composer install
npm install

# 2. Environment
cp .env.example .env
php artisan key:generate

# Edit .env:
#   DB_DATABASE=contractvault_db
#   DB_USERNAME=postgres
#   DB_PASSWORD=your_password
#   APP_NAME=ContractVault

# 3. Create DB in psql / pgAdmin
#   CREATE DATABASE contractvault_db;

# 4. Migrate & seed
php artisan migrate
php artisan db:seed

# 5. Dev servers
php artisan serve          # → http://localhost:8000
npm run dev                # Vite hot reload
```

**Demo login:** `demo@contractvault.com` / `password`

---

## 🗂️ File Map

```
app/
  Http/Controllers/
    PageController.php       ← Home page
    AuthController.php       ← Login / Register / Logout
    DashboardController.php  ← Dashboard overview (stats)
    ContractController.php   ← Full CRUD + expiring/drafts views
    AccountController.php    ← Profile & password settings
  Models/
    User.php
    Contract.php             ← Contract::TYPES, scopes (expiringSoon, forUser…)
  Providers/
    AppServiceProvider.php   ← Shares $expiringSoonCount with all views

resources/views/
  layouts/
    public.blade.php         ← Marketing / public pages
    auth.blade.php           ← Split-panel login/register
    app.blade.php            ← Dashboard with sidebar

  partials/
    logo.blade.php           ← SVG + wordmark
    sidebar.blade.php        ← Nav items — edit $navItems array to add/remove
    topbar.blade.php         ← Topbar with New Contract button
    public-nav.blade.php     ← Public header
    public-footer.blade.php  ← Public footer
    flash.blade.php          ← Auto-dismiss flash messages
    status-badge.blade.php   ← Active / Expiring / Expired / Draft badges

  pages/
    home/
      index.blade.php        ← Landing page (includes sections below)
      sections/
        hero.blade.php
        features.blade.php
        how-it-works.blade.php
        cta.blade.php
    auth/
      login.blade.php
      register.blade.php
    dashboard/
      index.blade.php        ← Stats, recent contracts, expiring soon
    contracts/
      index.blade.php        ← Searchable/filterable table
      create.blade.php       ← New contract form
      edit.blade.php         ← Edit form
      show.blade.php         ← Contract detail view
      expiring.blade.php     ← Card grid of expiring contracts
      drafts.blade.php       ← Drafts table
      _form.blade.php        ← Shared form partial (used by create + edit)
    account/
      settings.blade.php     ← Profile + password + delete account

routes/web.php               ← All routes in one place (well commented)
database/migrations/         ← users + contracts tables
database/seeders/            ← 8 realistic sample contracts
```

---

## 📋 Contract Statuses

| Status   | Meaning                              |
|----------|--------------------------------------|
| `draft`  | Not yet published / in progress      |
| `pending`| Awaiting signature or start          |
| `active` | Live and in effect                   |
| `expiring` | Active but end date within 30 days |
| `expired`| Past end date                        |

---

## ➕ How to Add a New Page

**1. Add the route** in `routes/web.php` inside the `auth` middleware group:
```php
Route::get('/contracts/archive', [ContractController::class, 'archive'])->name('contracts.archive');
```

**2. Add the controller method:**
```php
public function archive(): View
{
    $contracts = Contract::forUser(auth()->id())->where('status', 'expired')->paginate(20);
    return view('pages.contracts.archive', compact('contracts'));
}
```

**3. Create the view** at `resources/views/pages/contracts/archive.blade.php`:
```blade
@extends('layouts.app')
@section('title', 'Archive')
@section('page-title', 'Archive')
@section('content')
    {{-- Your content --}}
@endsection
```

**4. Add to sidebar** in `resources/views/partials/sidebar.blade.php`:
```php
$navItems = [
    // ... existing items
    ['label' => 'Archive', 'route' => 'contracts.archive', 'icon' => '...svg path...'],
];
```

---

## ➖ How to Remove a Section or Page

- **Home section**: Remove the `@include` line in `pages/home/index.blade.php`
- **Nav item**: Remove from `$navItems` in `partials/sidebar.blade.php`
- **Route**: Delete or comment out in `routes/web.php`

---

## 🔒 Security

- Auth middleware on all `/dashboard`, `/contracts/*`, `/account/*` routes
- Each contract is scoped to `user_id` — users can only see their own
- `abort_if($contract->user_id !== auth()->id(), 403)` in ContractController
- CSRF on all forms (`@csrf`)
- File uploads stored in `private` disk (not publicly accessible)
- PostgreSQL `ilike` for case-insensitive search

---

## 🛠️ Production

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
```
