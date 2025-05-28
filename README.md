# Laravel Leave Management App

This Laravel-based Leave Management application allows employees to request time off and enables managers to review and manage leave requests efficiently. It supports role-based access, meaning different users (e.g., Employee, Manager) will have access to different parts of the application based on their role.

## Features

* **User Registration & Login**
* **Role Selection (Employee / Manager)**
* **Department Selection During Registration**
* **Leave Request Submission (Start Date, End Date, Reason)**
* **Validation to prevent incorrect date ranges**
* **Error Handling & User Feedback**
* **Dashboard to view leave requests (customized per role)**
* **Tailwind CSS Styling for a clean UI**

## Tech Stack

* Laravel (Backend Framework)
* Blade (Templating Engine)
* Tailwind CSS (Styling)

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/leave-management.git
cd leave-management
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database and mail configuration. You can use the `.env.example` file as a reference, for local development I am using pgAdmin and pgSQL for local testing.

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Build Frontend Assets (Tailwind)

```bash
npm run dev   # for development
npm run build # for production
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
