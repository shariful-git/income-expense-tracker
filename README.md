# Personal Income & Expense Tracker

A simple, user-friendly Laravel application designed for real-life people to easily track their daily income and expenses. Built with the latest Laravel version (12.x as of January 2026) for maintainability, security, and modern PHP features.

This project aims to provide a clean, intuitive personal finance management tool without unnecessary complexity. It's perfect for individuals or small families who want to monitor their cash flow effortlessly.

## Features

- User registration and authentication (secure login/logout)
- Add, edit, delete income entries (with amount, date, category, and description)
- Add, edit, delete expense entries (with amount, date, category, and description)
- Predefined and custom categories for income/expenses
- Dashboard with overview: total income, total expenses, balance, and monthly summary
- Monthly/Yearly reports with simple charts (using Laravel Livewire or Chart.js) - (upcomming)
- Data export to CSV - (upcomming)
- Responsive design (works on mobile and desktop)
- Easy to maintain and extend

## Technologies Used

- **Laravel 12.x** (latest stable version)
- **PHP 8.2+**
- **MySQL** (or SQLite for quick testing)
- **Laravel Breeze** (for authentication scaffolding)
- **Tailwind CSS** (for styling)
- **Livewire** (optional for dynamic components, if added later)
- **Laravel Sanctum** (for API if extended)

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM (for asset compilation)
- MySQL or any supported database
- Git

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/shariful-git/income-expense-tracker.git
   cd personal-income-expense-tracker
