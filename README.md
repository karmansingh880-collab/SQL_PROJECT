# Login & Registration System (PHP + MySQL)

A simple and secure user authentication system built using PHP and MySQL.  
Users can register, login, access a protected dashboard, and logout.  
Passwords are securely hashed for safe storage.

---

## 🛠 Technologies Used
- PHP (Core Backend Logic)
- MySQL (Database)
- HTML, CSS (Frontend UI)
- XAMPP / WAMP / Laragon (Local Server Environment)

---

## 📂 Project Structure
| File / Folder | Purpose |
|---------------|---------|
| `login.php`   | Login Form + Authentication |
| `register.php`| User Registration with Password Hashing |
| `dashboard.php` | Only logged-in users can access |
| `logout.php`  | Destroys session and logs user out |
| `config.php`  | Database Connection |
| `database.sql`| Database export to import in phpMyAdmin |

---

## 🧠 How to Run This Project

1. Install **XAMPP** and ensure **Apache + MySQL** are running.
2. Move project folder into:  
   `C:\xampp\htdocs\`
3. Open phpMyAdmin in browser:  
   `http://localhost/phpmyadmin`
4. Create a new database **named:** `USERS`
5. Import `database.sql` inside that database.
6. Open the project in browser:  
   `http://localhost/YourFolderName`

---

## 🔐 Default Table Structure (`users`)

| Field Name | Type | Description |
|-----------|------|-------------|
| id        | INT (PK, AUTO_INCREMENT) | Unique user ID |
| username  | VARCHAR(100) | Username |
| email     | VARCHAR(200) | User email |
| password  | VARCHAR(255) | Hashed password |

---

## ✅ Features
- Create Account / Register
- Secure Login Using `password_hash()` & `password_verify()`
- Session-Based Authentication
- Logout & Protected Dashboard
- Clean & Simple UI

---

## 🚀 Future Enhancements (Optional)
- Forgot Password / Reset System
- Profile Update System
- Role Based Login (Admin/User)
- Email Verification

---

## 📄 License
Free to use. Modify however you want.
