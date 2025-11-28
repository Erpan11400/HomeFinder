# HomeFinder

Our Team - Web Programming
- ALVIN NABIL THORIQ
- DARREL MARANATHA BARIMBING
- ERVAN SETYATAMA
- MELVIN JORDAN PANGESTU
- MUHAMMAD APTA CHANDRAKANTA

## Project Description

HomeFinder is a web application built with Laravel, designed to help users find their perfect property.  It allows users to browse available properties, view detailed information, and manage their favorite listings.  Users can register, login, and view property details.

## Features and Functionality

*   **User Authentication:**
    *   Registration: Users can create accounts using their name, email, and password. Implemented in `app/Http/Controllers/AuthController.php` and accessible via `/register` route.
    *   Login: Existing users can log in with their email and password. Implemented in `app/Http/Controllers/AuthController.php` and accessible via `/login` route.
    *   Logout:  Users can log out of their account, implemented in `app/Http/Controllers/AuthController.php` and accessible via `/logout` route.
*   **Property Listing:**
    *   Browse Properties: Users can view a list of available properties.  Implemented in `app/Http/Controllers/PropertyController.php` and accessible via the `/property` route. Displays property photo, city, country, bed count, bath count, area, and price.
    *   Property Details: Users can view detailed information about a specific property, including photos, summary, and dimensions. Implemented in `app/Http/Controllers/PropertyController.php` and accessible via the `/properties/{id}` route.
    *   Dashboard:  Displays a selection of recently added properties on the main dashboard. Implemented in `app/Http/Controllers/AuthController.php` and accessible via `/` or `/dashboard` route.
*   **Favorites (Future):**
    *   Although not fully implemented, the `App\Models\Favorite.php` model and `FavoriteController.php` exist, indicating the intention to add a "Favorites" feature.

## Technology Stack

*   **PHP:**  The primary language for backend development.
*   **Laravel:** A PHP framework providing structure and tools for web application development. Version is specified in `composer.json` (not provided in the file list, but assumed to be a standard Laravel project).
*   **MySQL (or other database):** Used for storing user data and property information. Configured in `config/database.php`.
*   **Blade:** Laravel's templating engine used for creating dynamic views.
*   **Bootstrap:** CSS framework for creating responsive and visually appealing user interfaces. (Used in the views)
*   **JavaScript:** For front-end interactivity (using `axios` for API calls, initialized in `resources/js/bootstrap.js`).

## Prerequisites

*   **PHP:**  Version 8.0 or higher is recommended (check Laravel documentation for specific version requirements).
*   **Composer:** A dependency manager for PHP.  [https://getcomposer.org/](https://getcomposer.org/)
*   **Database:**  MySQL, PostgreSQL, SQLite, or another database supported by Laravel.
*   **Node.js and npm:** Required for front-end asset compilation.

## Installation Instructions

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/Erpan11400/HomeFinder.git
    cd HomeFinder
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Configure the environment:**

    Copy the `.env.example` file to `.env`:  
    ``` bash
    cp .env.example .env
    ```

4.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6.  **Seed the database (optional, for demo data):**

    ```bash
    php artisan db:seed PropertySeeder
    ```
    This will run the `PropertySeeder` (located at `database/seeders/PropertySeeder.php`) which creates 10 properties.

7.  **Start the development server:**

    ```bash
    php artisan serve
    ```

    This will start the server, usually on `http://localhost:8000`.

## Usage Guide

1.  **Access the application:**

    Open your web browser and navigate to the URL where the application is running (e.g., `http://localhost:8000/`).

2.  **Browse Properties:**

    *   To view all properties, navigate to `/property` (handled by `PropertyController@index`).

3.  **View Property Details:**

    *   Click on a property to view its details (accessible via `/properties/{property_id}`, handled by `PropertyController@show`).  You'll see information such as price, bedrooms, bathrooms, area, summary, and available images.

## API Documentation

This project does not include a dedicated API. The application serves web pages directly.

## Contributing Guidelines

Contributions are welcome! Here's how you can contribute:

1.  **Fork the repository.**
2.  **Create a new branch for your feature or bug fix:**

    ```bash
    git checkout -b feature/your-feature-name
    ```

3.  **Make your changes and commit them with clear and descriptive messages.**
4.  **Push your changes to your forked repository.**
5.  **Submit a pull request to the `main` branch of the original repository.**

## License Information

No license is specified in the provided information. Consider adding a license file (e.g., MIT, Apache 2.0) to clarify the terms of use.

## Contact/Support Information

For questions or support, please contact the repository owner [Erpan11400](https://github.com/Erpan11400).