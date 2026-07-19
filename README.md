# GreenConnect2

GreenConnect2 is an eco-conscious social networking and gamified impact tracking platform built with Laravel 11. It features a modern Glassmorphism UI, a real-time Eco-Impact dashboard, and an interactive Eco-Gift store.

## Features

- User Authentication & Profiles: Secure user registration and profile management.
- Eco-Impact Dashboard: Gamified tracking system where users earn points for eco-friendly actions.
- Eco-Gift Store: Users can send and receive virtual gifts such as "Plant a Tree" or "Ocean Cleanup", which contribute to their overall impact score.
- Glassmorphism UI: A clean, modern, frosted-glass design aesthetic.

## Technology Stack

- Backend: Laravel 11 (PHP 8.4)
- Database: SQLite
- Frontend: Blade Templates, Vanilla CSS, Vite
- Deployment: Docker (Multi-stage build)

## Local Development

1. Clone the repository.
2. Install PHP dependencies: `composer install`
3. Install Node dependencies: `npm install`
4. Copy the environment file: `cp .env.example .env`
5. Generate the application key: `php artisan key:generate`
6. Run database migrations: `php artisan migrate`
7. Start the local development server: `php artisan serve`
8. Compile frontend assets: `npm run dev`

## Deployment

This application is containerized using Docker and is configured for deployment on PaaS platforms like Render. The provided Dockerfile utilizes a multi-stage build process to compile Node assets and PHP dependencies into a final, lightweight production image.
