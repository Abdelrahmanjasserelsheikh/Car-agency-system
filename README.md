# 🚗 Car Agency — Web Application

![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1.3-purple?logo=bootstrap)
![XAMPP](https://img.shields.io/badge/Server-XAMPP-red?logo=apache)

A full-stack car agency web application built with **PHP**, **MySQL**, and **CSS**.  
It features a public-facing website, user authentication, and a protected admin dashboard with full CRUD functionality.

---

## 📋 Table of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Getting Started](#getting-started)
- [Admin Panel](#admin-panel)
- [Screenshots](#screenshots)
- [Author](#author)

---

## 📖 About The Project

Car Agency is a web-based platform that allows users to browse available cars and allows admins to manage the inventory. The project was built as a full-stack PHP application using XAMPP as the local server and MySQL as the database.

---

## ✨ Features

### 🌐 Public Features
- Responsive landing page with hero section
- Browse available cars with images
- About Us and Services sections
- Contact information in the footer

### 🔐 Authentication
- User **Registration** with first name, last name, email and password
- User **Login** with session management
- **Logout** functionality that destroys the session
- Role-based access control (`admin` / `user`)
- Navbar updates dynamically based on login state
- Profile avatar showing user initials (e.g. AB for Abdelrahman)
- **Hover dropdown** on profile icon showing username and logout button

### 👤 User Dashboard
- Personalized greeting: `Hi, [Username]!`
- Access to car listings
- Restricted from admin-only content

### ⚙️ Admin Panel (Admin Only)
The admin panel is **hidden from regular users** and only visible to accounts with `role = 'admin'`.

#### 📊 Dashboard Stats (4 Cards)
| Card | Description |
|------|-------------|
| 🚗 Total Cars | Total number of cars in the database |
| 👥 Total Customers | Total number of registered users |
| 🏷️ Total Car Models | Count of distinct car models |
| 🆕 New Customers This Month | Users registered in the current month |

#### 📈 Chart
- **Bar chart** (Chart.js) showing number of cars added per month over the last 6 months

#### 🛠️ Car Management — Full CRUD
| Action | File | Description |
|--------|------|-------------|
| ➕ Create | `create_cars.php` | Add a new car (model + date) |
| 📋 Read | `read_cars.php` | View all cars in a styled table |
| ✏️ Update | `update_cars.php` | Edit an existing car's details |
| 🗑️ Delete | `delete_cars.php` | Delete a car with confirmation |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|------------|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP 8.2 |
| Database | MySQL (via MySQLi) |
| Server | XAMPP (Apache) |
| CSS Framework | Bootstrap 5.1.3 |
| Icons | Font Awesome 6.5 |
| Charts | Chart.js |

---

## 📁 Project Structure
caragency/
│
├── auth/
│   ├── login.php
│   ├── login_handler.php
│   ├── logout.php
│   ├── register.php
│   └── register_handler.php
│
├── config/
│   └── database.php
│
├── css/
│   ├── css/
│   │   ├── homepage.css
│   │   ├── login.css
│   │   ├── signup.css
│   │   ├── headerlogin.css
│   │   └── style.css
│   └── images/
│       ├── logo.png
│       ├── image_of_car1.png
│       └── images.png
│
├── dashboard/
│   ├── homepage.php
│   ├── cars.php
│   ├── users.php
│   ├── create_cars.php
│   ├── read_cars.php
│   ├── update_cars.php
│   └── delete_cars.php
│
├── includes/
│   ├── header.php
│   ├── headerhomepage.php
│   └── footer.php
│
├── middleware/
│
└── public/
└── index.php
---

## 🗄️ Database Schema

### `users` table
| Column | Type | Description |
|--------|------|-------------|
| id | INT AUTO_INCREMENT PK | User ID |
| fname | VARCHAR(50) | First name |
| lname | VARCHAR(50) | Last name |
| email | VARCHAR(100) | Email address |
| password | VARCHAR(255) | Hashed password |
| role | VARCHAR(20) | `admin` or `user` |
| created_at | TIMESTAMP | Registration date |

### `cars` table
| Column | Type | Description |
|--------|------|-------------|
| car_id | INT AUTO_INCREMENT PK | Car ID |
| car_model | VARCHAR(50) | Car model name |
| car_date | DATE | Date added |

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) installed
- Browser (Chrome recommended)

### Installation

1. **Clone the repository** into your XAMPP `htdocs` folder:
```bash
   git clone https://github.com/YOUR_USERNAME/caragency.git
   cd xampp/htdocs/caragency
```

2. **Start XAMPP** — enable Apache and MySQL

3. **Import the database**:
   - Open `http://localhost/phpmyadmin`
   - Create a new database called `caragency`
   - Import the SQL file if provided

4. **Configure database connection** in `config/database.php`:
```php
   $conn = mysqli_connect("localhost", "root", "", "caragency");
```

5. **Visit the app**:
http://localhost/caragency/public/index.php

### Setting Up Admin Account
After registering, run this SQL query in phpMyAdmin:
```sql
UPDATE users SET role = 'admin' WHERE email = 'your@email.com';
```

---

## 🔒 Admin Panel

To access the admin panel:
1. Register a new account
2. Set your role to `admin` via phpMyAdmin (see above)
3. Log in — the admin panel will appear automatically on the homepage

---

## 📸 Screenshots

> Add your screenshots here after uploading them to your repo:

```md
![Homepage](screenshots/homepage.png)
![Admin Panel](screenshots/admin.png)
![Read Cars](screenshots/read_cars.png)
![Login](screenshots/login.png)
```

---

## 👨‍💻 Author

**Abdelrahman**  
📧 abdelrahmanjasserelsheikh@gmail.com  
📍 Egypt  

---

## 📄 License

This project is for educational purposes.  
© 2026 Car Agency. All rights reserved.