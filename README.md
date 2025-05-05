# Project Bolt SB1

This project is a user management system built with PHP. It allows users to perform CRUD (Create, Read, Update, Delete) operations on user data. The project is designed with a modular structure, separating concerns into classes for database interaction, user management, validation, and routing.

## Features

- Create, edit, view, and delete users.
- Pagination and search functionality for user lists.
- Input validation for user data.
- Modular architecture for easy maintenance and scalability.

## Prerequisites

Before running this project, ensure you have the following installed:

- PHP 7.4 or higher
- Composer (for dependency management)
- A web server (e.g., Apache or Nginx)
- PostgreSQL (if migrating to Supabase) or MySQL (default setup)

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-repo/project-bolt-sb1.git
   cd project-bolt-sb1
   ```

2. **Install Dependencies**:
   If the project uses Composer for dependencies, run:
   ```bash
   composer install
   ```

3. **Set Up the Database**:
   - Create a database in your preferred database management system (e.g., MySQL or PostgreSQL).
   - Import the provided `schema.sql` file to set up the database schema:
     ```bash
     mysql -u username -p database_name < schema.sql
     ```
   - If migrating to Supabase, follow the migration steps below.

4. **Configure the Application**:
   Update the config.php file with your database connection details:
   ```php
   // filepath: config.php
   define('DB_HOST', 'your-database-host');
   define('DB_NAME', 'your-database-name');
   define('DB_USER', 'your-database-username');
   define('DB_PASS', 'your-database-password');
   ```

5. **Run the Application**:
   - Start your web server and point it to the project directory.
   - Access the application in your browser at `http://localhost/project-bolt-sb1`.

## Supabase Migration

If you want to migrate the project to Supabase (PostgreSQL):

1. **Export the Current Schema**:
   Export your MySQL schema to a SQL file:
   ```bash
   mysqldump -u username -p --no-data database_name > schema.sql
   ```

2. **Modify the Schema**:
   Adjust the schema to be compatible with PostgreSQL. For example, update data types and constraints as needed.

3. **Import the Schema into Supabase**:
   Use the Supabase SQL editor or a PostgreSQL client to import the schema:
   ```bash
   psql -h your-supabase-host -U your-supabase-user -d your-supabase-db -f schema.sql
   ```

4. **Update the Database Connection**:
   Update the `Database` class in Database.php to use Supabase credentials:
   ```php
   // filepath: classes/Database.php
   public function getConnection() {
       $host = 'your-supabase-host';
       $db_name = 'your-supabase-db';
       $username = 'your-supabase-user';
       $password = 'your-supabase-password';
       $conn = null;

       try {
           $conn = new PDO("pgsql:host=$host;dbname=$db_name", $username, $password);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $exception) {
           echo "Connection error: " . $exception->getMessage();
       }

       return $conn;
   }
   ```

5. **Test the Application**:
   Verify that the application works correctly with the Supabase database.

## Project Structure

```
project-bolt-sb1/
├── classes/
│   ├── Database.php        # Handles database connection
│   ├── User.php            # User model
│   ├── UserRepository.php  # Handles database operations for users
│   ├── UserController.php  # Handles business logic for users
│   ├── Validator.php       # Validates user input
├── config.php              # Configuration file
├── index.php               # Main entry point
├── views/
│   ├── users/
│       ├── create.php      # Create user form
│       ├── edit.php        # Edit user form
│       ├── delete.php      # Delete user confirmation
│       ├── view.php        # View user details
│       ├── list.php        # List users with pagination
├── schema.sql              # Database schema
└── README.md               # Project documentation
```

## Usage

- **Create User**: Navigate to `http://localhost/project-bolt-sb1/index.php?action=create`.
- **Edit User**: Navigate to `http://localhost/project-bolt-sb1/index.php?action=edit&id={user_id}`.
- **Delete User**: Navigate to `http://localhost/project-bolt-sb1/index.php?action=delete&id={user_id}`.
- **View User**: Navigate to `http://localhost/project-bolt-sb1/index.php?action=view&id={user_id}`.
- **List Users**: Navigate to `http://localhost/project-bolt-sb1/index.php`.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.