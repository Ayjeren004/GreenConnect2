# GreenConnect

GreenConnect is a premium, responsive social network built using Laravel 11 for eco-conscious advocates. It features an interactive posts feed to share sustainability ideas, mutual follow connections between green users, user profile managers, and a digital gift card trading center.

## Live Local Server
* Local Host: **`http://127.0.0.1:8001`**

## Key Features
* **Sustainability Feed:** Share text posts and image attachments on eco-tips, recycling initiatives, or carbon reduction strategies. Users can comment on and like posts.
* **Mutual Connections:** A user follow/unfollow mapping engine to build green community circles.
* **Gift Exchange Center:** A trading portal allowing users to send and receive digital gift cards with recorded sender/receiver history.
* **Sanctum API Integrations:** Secured token authentication `/api/login/token` for managing posts and comments programmatically.
* **Premium Theme:** Styled with a responsive, dark-themed glassmorphism interface, custom CSS animations, and Google Fonts typography.

## Technical Stack
* **Backend:** PHP 8.2+, Laravel 11, Sanctum
* **Database:** SQLite (default connection)
* **Frontend:** Blade Templates, Bootstrap CSS, custom Vanilla CSS variables, and Vite compilation

## Local Installation & Run Setup

### 1. Clone the Repository
```bash
git clone git@github.com:Ayjeren004/GreenConnect2.git
cd GreenConnect2
```

### 2. Configure Environment Options
Copy the template configuration file to configure options (SQLite is preconfigured as the default connection):
```bash
cp .env.example .env
```

### 3. Install Dependencies
Install composer requirements (use ignore-platform-reqs if running on PHP 8.4+):
```bash
composer install --ignore-platform-reqs
npm install
```

### 4. Build Database Schema and Seed Data
Create the local SQLite database file, migrate table schemas, and seed actors, movies, gifts, and posts records:
```bash
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

### 5. Compile Assets and Launch
Compile JavaScript and CSS styles and start the local development server:
```bash
npm run build
php artisan serve --port=8001
```
Once started, navigate to **`http://127.0.0.1:8001`** in your browser.
