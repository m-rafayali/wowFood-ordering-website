# WowFood - Food Ordering Website

WowFood is a responsive food ordering website that provides a sleek and user-friendly interface for browsing and ordering meals. Featuring intuitive navigation, a powerful search bar, and visually appealing design, it is perfect for restaurants and food delivery businesses.

## Features

- **Responsive Design**: Seamless experience across desktop, tablet, and mobile.
- **Search Functionality**: Easily find food items with an intuitive search bar.
- **Food Categories**: Browse through different meal categories with visually engaging images.
- **PHP Backend**: Manages order processing, user authentication, and database interactions.
- **Database Integration**: Stores user data, order details, and food inventory.

## Tech Stack

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Hosting**: PHP-enabled server (e.g., Apache)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/m-rafayali/wowFood-ordering-website.git
    cd wowFood-ordering-website
    ```

2. Set up your MySQL database and configure the `config.php` file for database connection:
    ```php
    <?php
    // config.php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wowfood_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

3. Create necessary tables in the database:
    ```sql
    CREATE TABLE `users` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `email` VARCHAR(100) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL
    );

    CREATE TABLE `orders` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT NOT NULL,
        `food_item` VARCHAR(255) NOT NULL,
        `quantity` INT NOT NULL,
        `total_price` DECIMAL(10, 2) NOT NULL,
        `order_status` VARCHAR(50) DEFAULT 'Pending',
        FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
    );
    ```

4. Customize the website content and deploy it on your server.

## Usage

- **User Registration**: Users can sign up to place orders, save preferences, and track order status.
- **Food Ordering**: Browse categories and place food orders easily.
- **Admin Panel**: Manage menu items, categories, and orders.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
For any queries or collaboration opportunities, feel free to reach out to:

## Contact
For any queries or collaboration opportunities, feel free to reach out to:

    Muhammad Rafay Ali
    Email: m.rafayali@outlook.com
    GitHub: m-rafayali

