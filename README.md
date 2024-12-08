# Desk Scheduler - web application

This Laravel-based web application is designed to manage and edit events and associated alarms for controlling the position of Linak smart desks. It integrates Breeze for authentication and provides functionality for triggering events, alarms, and notifications by utilizing REST API calls to both the desks as well as other embedded elements.

## Features

- **User Authentication**: Secure login and registration using Laravel Breeze.
- **Event Management**: Create, edit, and delete events and alarms to schedule desk position changes.
- **REST API Integration**:
  - Sends API calls to the WiFi2BLE box to trigger desk movements and gather data from desks.
  - Sends API calls to Raspberry Pi Pico for handling alarms and notifications.

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js (for frontend assets)
- PostgreSQL or any supported database
- Laravel 11.x
- [REST APIs for Raspberry Pi Pico must be available and configured.](https://github.com/danssolutions/desk-scheduler-pico)

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/danssolutions/desk-scheduler-web.git
   cd desk-scheduler-web
    ```
2. **Install Dependencies**:
    ```
    composer install
    npm install
    npm run dev
    ```

3. **Set Up Environment**: Copy `.env.example` to `.env` and update the following:

- Database credentials
- API endpoints for WiFi2BLE box and Raspberry Pi Pico

<!-- TODO: add example here -->

4. **Run Database Migrations**:

```php artisan migrate```

5. **Start the Server**:

```php artisan serve```

## Usage

1. Access the application in your browser at http://localhost:8000.
2. Log in or register as a user.
3. Use the dashboard to create and manage events:
    - Set Desk Position: Define start times and positions for desks.
    - Alarms and Notifications: Set triggers for sending alerts via the Raspberry Pi Pico.

## API Configuration

Ensure the WiFi2BLE box and Raspberry Pi Pico are running their respective APIs and are reachable from the Laravel application (they must all be in the same network). Update `.env` with the correct API base URLs.

## Folder Structure

- `routes/`: Contains web and API route definitions.
- `app/Http/Controllers/`: Includes controllers for handling event logic and API communication.
- `resources/views/`: Blade templates for the frontend.
- `database/`: Migration files for setting up the database schema.

## License

This project is open-source and available under the MIT License.
