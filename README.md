# 🚀 CareerConnect - Job Portal Laravel Application

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red.svg" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
</p>

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Email Features](#email-features)
- [Database Schema](#database-schema)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## 🎯 About

**CareerConnect** is a comprehensive job portal application built with Laravel 11 and Laravel Breeze. It connects job seekers with employers, providing a platform for posting jobs, applying for positions, and managing the entire hiring process.

### 🏗️ Built With

- **Laravel 11** - PHP Framework
- **Laravel Breeze** - Authentication scaffolding
- **Tailwind CSS** - Utility-first CSS framework
- **SQLite/MySQL** - Database
- **Spatie Laravel Permission** - Role & Permission management
- **Mailtrap** - Email testing service

## ✨ Features

### 👥 User Management
- **Multi-role authentication** (Admin, Employer, Candidate)
- **User registration with welcome emails**
- **Role-based permissions**
- **Profile management**

### 💼 Job Management
- **Job posting** (Employers only)
- **Job browsing and filtering**
- **Advanced search functionality**
- **Job categories and types**
- **Application deadline management**
- **Job views tracking with analytics**

### 📊 Analytics & Tracking
- **Job view counting** with duplicate prevention
- **View analytics dashboard** for employers
- **Daily, weekly, and monthly statistics**
- **Anonymous vs registered user tracking**

### 📧 Email System
- **Welcome emails** for new users
- **Automated email notifications**
- **Queue support** for better performance
- **Beautiful HTML email templates**

### 🔍 Advanced Features
- **Real-time job filtering**
- **Pagination**
- **Responsive design**
- **SweetAlert notifications**
- **AJAX-powered interactions**

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite/MySQL database
- Mailtrap account (for email testing)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/TanmoyDhar1077/Job_Portal_Laravel.git
cd Job_Portal_Laravel
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

### 5. Build Assets
```bash
# Build for development
npm run dev

# Or build for production
npm run build
```

## ⚙️ Configuration

### Database Configuration
Update your `.env` file with database credentials:
```env
DB_CONNECTION=sqlite
# Or for MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=job_portal
# DB_USERNAME=root
# DB_PASSWORD=
```

### Mailtrap Configuration
Configure email settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@careerconnect.com
MAIL_FROM_NAME="CareerConnect"
```

## 🎮 Usage

### Start the Development Server
```bash
php artisan serve
```
Visit: `http://localhost:8000`

### Default Admin Access
- **Email:** admin@example.com
- **Password:** Set up during seeding

### User Roles

#### 🔧 Admin
- Manage all users
- Manage roles and permissions
- View all job posts
- System administration

#### 🏢 Employer
- Post job openings
- Manage own job posts
- View applications
- Access job analytics
- View applicant details

#### 👨‍💼 Candidate
- Browse job listings
- Apply for jobs
- Track application status
- Manage profile

## 📧 Email Features

### Welcome Email System
When a new user registers, they automatically receive a beautifully designed welcome email featuring:

- **Professional HTML template** with responsive design
- **Personalized greeting** with user's name
- **Platform features overview**
- **Quick start guide** with action buttons
- **Branded styling** matching the application

### Testing Email Functionality
```bash
# Test welcome email directly
php artisan email:test-welcome test@example.com

# Simulate user registration with email
php artisan user:simulate-registration "John Doe" "john@example.com"
```

### Email Template Features
- 📱 **Responsive design** for all devices
- 🎨 **Professional styling** with CSS
- 🔗 **Action buttons** for quick navigation
- 📋 **Feature highlights** list
- 🏢 **Branded header and footer**

## 🗄️ Database Schema

### Main Tables

#### Users
- `id`, `name`, `email`, `password`
- `email_verified_at`, `remember_token`
- `created_at`, `updated_at`

#### Job Posts
- `id`, `user_id`, `job_title`, `job_category`
- `company_name`, `location`, `job_type`, `job_level`
- `salary_range`, `experience_required`, `education_level`
- `application_deadline`, `job_description`
- `is_active`, `views`, `created_at`, `updated_at`

#### Job Views (Analytics)
- `id`, `job_post_id`, `user_id`, `ip_address`
- `user_agent`, `created_at`, `updated_at`
- **Unique constraint** on `job_post_id` + `user_id`

#### Applications
- `id`, `job_post_id`, `user_id`, `status`
- `cv_path`, `cover_letter`, `applied_at`
- `created_at`, `updated_at`

## 🛠️ API Endpoints

### Job Management
```
GET    /jobs              # List all jobs
POST   /jobs              # Create new job
GET    /jobs/{id}         # View job details
PUT    /jobs/{id}         # Update job
DELETE /jobs/{id}         # Delete job
GET    /jobs/{id}/analytics # View job analytics
```

### Applications
```
GET    /jobs/{job}/apply           # Application form
POST   /jobs/{job}/apply           # Submit application
GET    /my-applications            # User's applications
PATCH  /applications/{id}/status   # Update application status
```

### User Management
```
GET    /users             # List users (Admin)
PUT    /users/{id}        # Update user
DELETE /users/{id}        # Delete user
```

## 🧪 Testing

### Run Test Suite
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=JobTest
```

### Manual Testing Commands
```bash
# Test email functionality
php artisan email:test-welcome your-email@example.com

# Simulate user registration
php artisan user:simulate-registration "Test User" "test@example.com"

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## 📊 Analytics Features

### Job View Tracking
- **Unique view counting** per user per job
- **Anonymous user tracking** with IP-based deduplication
- **Owner exclusion** (job owners don't count as views)
- **Time-based analytics** (daily, weekly, monthly)

### Analytics Dashboard
- 📈 **Total views** with visual indicators
- 👥 **Unique user count** tracking
- 📅 **Time-based statistics** breakdown
- 📊 **Daily view trends** with visual charts
- 🔍 **Anonymous vs registered** user analytics

## 🔧 Artisan Commands

### Custom Commands
```bash
# Test welcome email
php artisan email:test-welcome {email}

# Simulate user registration
php artisan user:simulate-registration {name} {email}

# Clear all caches
php artisan optimize:clear
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed

## 📁 Project Structure

```
job-portal/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Mail/                # Email classes
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   ├── views/              # Blade templates
│   │   ├── emails/         # Email templates
│   │   └── jobs/           # Job-related views
│   └── css/                # Stylesheets
├── routes/
│   └── web.php             # Web routes
└── tests/                  # Application tests
```

## 🔒 Security

- **CSRF Protection** on all forms
- **SQL Injection Prevention** via Eloquent ORM
- **XSS Protection** with Blade templating
- **Authentication** via Laravel Breeze
- **Authorization** with role-based permissions

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Tanmoy Dhar**
- GitHub: [@TanmoyDhar1077](https://github.com/TanmoyDhar1077)
- Project: [Job_Portal_Laravel](https://github.com/TanmoyDhar1077/Job_Portal_Laravel)

## 🙏 Acknowledgments

- [Laravel Framework](https://laravel.com) for the excellent foundation
- [Tailwind CSS](https://tailwindcss.com) for the utility-first CSS framework
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) for role management
- [SweetAlert2](https://sweetalert2.github.io) for beautiful alerts

---

<p align="center">Made with ❤️ using Laravel</p>
