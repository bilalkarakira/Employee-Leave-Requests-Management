# Laravel Leave Management App

This Laravel-based Leave Management application allows employees to request time off and enables managers to review and manage leave requests efficiently. It supports role-based access, meaning different users (e.g., Employee, Manager) will have access to different parts of the application based on their role.

---

## ✨ Features

- **User Registration & Login**
- **Role Selection (Employee / Manager)**
- **Department Selection During Registration**
- **Leave Request Submission by Employees(Start Date, End Date, Reason)**
- **Leave Request Approval/Decline by Managers**
- **Validation to Prevent Invalid Date Ranges**
- **Error Handling & User Feedback**
- **Role-based Dashboards**
- **Tailwind CSS for Clean UI**

---

## 🧰 Tech Stack

- **Laravel** – Backend Framework
- **Blade** – Templating Engine
- **Tailwind CSS** – Utility-first CSS Framework

---

## ✅ Prerequisites

Make sure the following tools are installed before running this project:

- **PHP >= 8.1**  
  [Install PHP](https://www.php.net/manual/en/install.php) (or use [Laravel Herd](https://herd.laravel.com) for Mac users)

- **Composer** – PHP Dependency Manager  
  [Install Composer](https://getcomposer.org/download/)

- **Node.js & NPM** – JavaScript runtime and package manager  
  [Install Node.js](https://nodejs.org/en/download/)

- **PostgreSQL** – Database  
  [Install PostgreSQL](https://www.postgresql.org/download/)  
  [Install pgAdmin](https://www.pgadmin.org/download/)

- **Git** – Version Control  
  [Install Git](https://git-scm.com/downloads)

- **Laravel Installer**  
  ```bash
  composer global require laravel/installer
  ```

---

## 🚀 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/bilalkarakira/Employee-Leave-Requests-Management.git
cd Employee-Leave-Requests-Management
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Database Setup (pgAdmin + PostgreSQL)

This application uses **PostgreSQL** as the database. Follow the steps below to configure it locally using **pgAdmin**:

#### ➤ Install PostgreSQL & pgAdmin

- 📦 [Download and install PostgreSQL](https://www.postgresql.org/download/)
- 🧰 [Download and install pgAdmin](https://www.pgadmin.org/download/)

#### ➤ Create a New Database in pgAdmin

- Open **pgAdmin** and connect to your PostgreSQL server (you may be asked to enter the password you set during installation).
- In the left sidebar:
  - Right-click on **Databases** → click **Create** → **Database**.
  - Enter a database name (e.g., `leave_management`) and click **Save**.

#### ➤ Configure `.env` File

After creating the database:

- Open the project’s `.env` file
- Update the database settings like below:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=leave_management
DB_USERNAME=your_postgres_username
DB_PASSWORD=your_postgres_password
```

### 4. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Run the Development Server

```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

## Notes

* Tailwind CSS must be correctly configured in `resources/css/app.css` and built using `vite` or Laravel Mix.
* If you add new views, ensure they are included in the `content` array of `tailwind.config.js`.
* A filter by status (e.g., Pending, Approved, Rejected) for the Leave Requests page was considered for enhanced usability but is not yet implemented. This can be added in future versions to improve navigation and request management.

```js
// Example tailwind.config.js content section
content: [
  './resources/**/*.blade.php',
  './resources/**/*.js',
  './resources/**/*.vue',
],
```
