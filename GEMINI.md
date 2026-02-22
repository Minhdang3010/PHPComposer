# GEMINI.md - PHP Composer E-commerce Project

## Project Overview

This project is a custom-built e-commerce web application written in PHP. It follows a Model-View-Controller (MVC) architectural pattern. The framework is lightweight and does not use major external frameworks like Laravel or Symfony, relying on a custom-built core for routing and database interaction.

**Key Technologies:**

*   **Backend:** PHP
*   **Database:** MySQL (using PDO for connection)
*   **Frontend:** HTML, CSS, JavaScript (with jQuery)
*   **Dependency Management:** Composer (for PSR-4 autoloading)
*   **Web Server:** Assumes a standard setup like Apache or Nginx.

**Architecture:**

*   **`public/index.php`**: The single entry point for all web requests.
*   **`core/`**: Contains the core application logic:
    *   `App.php`: A custom router that maps URLs to Controller actions.
    *   `Controller.php`: The base controller that all other controllers extend.
    *   `BaseModel.php`: The base model providing common database operations (CRUD).
    *   `Database.php`: Manages the PDO database connection.
*   **`app/`**: Contains the main application code:
    *   `Controllers/`: Handles user requests and interacts with models.
    *   `Models/`: Represents database tables and handles data logic.
    *   `Views/`: Contains the presentation layer (PHP templates).
    *   `Config/`: Holds configuration files for the database (`config.php`) and URL routes (`routes.php`).
*   **`vendor/`**: Managed by Composer, contains the autoloader.
*   **`database/`**: Contains the database schema and data dump (`mocart_pro_v2.sql`).

---

## Building and Running the Project

To run this project on a local machine, follow these steps.

**Prerequisites:**

*   A local web server environment (e.g., Laragon, XAMPP, MAMP) with PHP and MySQL.
*   A database management tool like phpMyAdmin or a command-line client.
*   [Composer](https://getcomposer.org/) installed.

**1. Database Setup:**

1.  Open your database management tool.
2.  Create a new database named `mocart_pro_v2` with `utf8mb4` character set (e.g., `utf8mb4_vietnamese_ci` collation).
3.  Import the SQL file `database/mocart_pro_v2.sql` into the newly created database. This will create all the necessary tables and populate them with initial data.

**2. Configuration:**

1.  Open the configuration file: `app/Config/config.php`.
2.  Verify the database connection settings and update them if necessary to match your local environment:
    ```php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', ''); // Your MySQL password
    define('DB_NAME', 'mocart_pro_v2');
    ```
3.  Update the `BASE_URL` to match the URL you will use for the project on your local server. For example, if you access the project at `http://localhost/PHPComposer/`, the setting should be:
    ```php
    define('BASE_URL', 'http://localhost/PHPComposer/');
    ```

**3. Install Dependencies:**

*   This project currently only uses Composer for autoloading, which is already included in the `vendor` directory. If you modify `composer.json` to add new dependencies, you will need to run `composer install` from the project root.

**4. Running the Application:**

*   Point your web browser to the `BASE_URL` you configured in `app/Config/config.php`. The application's home page should load.
*   The `.htaccess` file in the root directory is configured to redirect all requests to the `public/` folder, which is the correct web server document root.

---

## Development Conventions

*   **Routing**:
    *   Simple vanity URLs (aliases) are defined in `app/Config/routes.php`. You can add new aliases here.
    *   The core routing logic is in `core/App.php`. It follows a `/:controller/:action/:param1/:param2` pattern.
    *   A special `admin` prefix in the URL switches the router to look for controllers within the `app/Controllers/Admin/` directory.

*   **Models**:
    *   Models should be placed in `app/Models/`.
    *   Each model should extend `Core\BaseModel`.
    *   To connect a model to its database table, set the protected property `$table`. For example, in a `Product` model: `protected $table = 'products';`
    *   Models automatically inherit basic CRUD methods (`all`, `find`, `create`, `update`, `delete`).

*   **Controllers**:
    *   Controllers are located in `app/Controllers/`.
    *   They should extend `Core\Controller`.
    *   Use `$this->model('ModelName')` to instantiate a model.
    *   Use `$this->view('view/path', $data)` to render a view and pass data to it. The path is relative to the `app/Views/` directory and does not include the `.php` extension.

*   **Views**:
    *   Views are standard PHP files located in `app/Views/`.
    *   Data passed from the controller is extracted into local variables using `extract($data)`. You can then echo these variables directly in the view.
    *   Layouts (like headers and footers) are included using standard `require` statements.
