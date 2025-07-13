# Laravel Blog App 📰

A simple blog application built using the Laravel PHP framework. This project allows users to create, edit, and delete blog posts with authentication.

## 📌 Features

- User registration and login (Laravel Breeze)
- Create, read, update, delete (CRUD) blog posts
- Post listing with pagination
- Authentication and authorization
- Flash messages for user feedback
- Responsive design using Bootstrap or Tailwind

## 🛠️ Tech Stack

- **Framework**: Laravel 10+
- **Database**: MySQL (or SQLite for local testing)
- **Frontend**: Blade Templates, TailwindCSS / Bootstrap
- **Authentication**: Laravel Breeze / Sanctum (optional)

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/Khawla-alharthi/Laravel_Blog_App.git
cd Laravel_Blog_App
```

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Serve the application

```bash
php artisan serve
```

## 📂 Project Structure
 - app/Models/Post.php – Blog post model
 - app/Http/Controllers/PostController.php – Handles blog logic
 - routes/web.php – Web routes
 - resources/views/ – Blade views for layout and posts

## 👩‍💻 Contributing
*Pull requests are welcome. For major changes, please open an issue first to discuss.*
