# PHP Profile Picture Gallery with Luminous Lightbox

A lightweight PHP application that allows users to upload profile pictures, stores the filenames in a MySQL database, and displays them in a sleek responsive gallery. It features a modern popup lightbox effect using the **Luminous** JavaScript library.

## 🚀 Features
* **Secure File Renaming:** Automatically appends a unique timestamp to uploaded files to prevent filename conflicts.
* **Auto-Directory Creation:** Automatically creates the target `uploads/` folder if it doesn't exist.
* **Database Driven:** Tracks image paths efficiently inside a MySQL database.
* **Sleek UI:** Circular profile avatars (`object-fit: cover`) arranged in a flexible CSS Grid layout.
* **Interactive Lightbox:** Clicking an avatar triggers a smooth, modern overlay popup via Luminous.

## 🛠️ Prerequisites & Stack
* **PHP:** Version 7.4 or higher recommended.
* **Database:** MySQL / MariaDB.
* **Local Server Environment:** XAMPP, MAMP, or WampServer.
* **Frontend Libraries:** Luminous Lightbox (loaded via CDN).

## 🗄️ Database Setup
Before running the application, create your database and table by running the following SQL query in your database manager (like phpMyAdmin):

```sql
CREATE DATABASE IF NOT EXISTS profile_db;
USE profile_db;

CREATE TABLE IF NOT EXISTS profile_pics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## ⚙️ Configuration
The application is pre-configured for standard local testing environments. If your setup varies, modify these lines in the PHP script:

1. **Database Credentials:** Update `$host`, `$user`, `$pass`, and `$db` to match your local setup.
2. **Upload Directory Path:** The script currently points to a hardcoded XAMPP macOS path:
   ```php
   $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/php_samples/uploads/";
   ```
   *Change this path if you are running on Windows, Linux, or a different local web root.*

## 📂 Project Structure
```text
├── uploads/             # Auto-generated folder containing uploaded image files
├── index.php            # Main application script (Database, Processing, UI)
└── README.md            # Project documentation
```

## 🤝 License
This project is open-source and available under the [MIT License](https://opensource.org).
