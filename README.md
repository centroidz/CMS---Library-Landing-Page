# 🏛️ Keeper CMS Library

[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![GrapesJS](https://img.shields.io/badge/Editor-GrapesJS-green.svg)](https://grapesjs.com)

> **Official CMS for [keeper.css-octa.com](https://keeper.ccs-octa.com/)** > A high-performance, flexible CMS built on Laravel MVC, featuring a headless API architecture for seamless content delivery.

---

## ✨ Core Features

### 🎨 Design & Customization
* **GrapesJS Page Builder:** Full WYSIWYG experience to create custom webpages without touching code.
* **Template Engine:** Choose from pre-designed landing page templates and edit content in real-time.
* **Custom Nav Links:** Dynamically manage your website's navigation structure.

### 👥 Staff & Role Management
* **RBAC (Role-Based Access Control):** Granular permission system. Assign specific tasks to roles (e.g., Editor, Moderator, Admin).
* **Authorization Layers:** Automatic restriction of features and UI elements based on user permissions.
* **Organizable Staff Page:** Drag-and-drop or toggle visibility for staff members displayed on the public site.

### 📢 Dynamic Content
* **Interchangeable Announcement Board:** Update site-wide alerts or news banners instantly.
* **Headless API Logic:** The CMS acts as a brain, pushing content and logic to a separate **Public Website** via API.

---

## 🛠️ Installation

### Prerequisites
* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL

### Quick Start
```bash
# 1. Clone the repository
git clone [https://github.com/your-username/keeper-cms-library.git](https://github.com/your-username/keeper-cms-library.git)
cd keeper-cms-library

# 2. Install PHP dependencies
composer install

# 3. Install & compile assets
npm install && npm run dev

# 4. Setup environment
cp .env.example .env
php artisan key:generate

# 5. Database Setup
php artisan migrate --seed
