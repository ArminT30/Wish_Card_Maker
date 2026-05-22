# Wish Card Maker Web Application

A dynamic web application for creating personalized greeting cards for love, birthday, friendship, and anniversary categories. The application provides custom message and design options. It also includes an administrative panel for managing users, themes, and card data.

---

## Features

- User registration and login system  
- Create customized wish cards  
- Multiple card categories:
  - Love cards  
  - Birthday cards  
  - Friendship cards  
  - Anniversary cards  
- View generated cards  
- Admin dashboard for management  
- Add and delete card themes  
- User management system  
- Secure authentication system  

---

## Technologies Used

- PHP  
- MySQL  
- HTML  
- CSS  
- XAMPP (Local server environment)  

---

## Admin Features

- Admin login authentication  
- Admin dashboard  
- Add new themes (`add_theme.php`)  
- Delete cards (`delete_card.php`)  
- Delete users (`delete_user.php`)  
- View all created cards (`view_cards.php`)  

---

## Project Structure

- `index.html` – Home page  
- `register.php` – User registration  
- `login.php` – User login  
- `home.php` – User dashboard  
- `create_card.php` – Create wish cards  
- `view_cards.php` – View created cards  
- `admin_login.php` – Admin login  
- `admin_dashboard.php` – Admin panel  
- `add_theme.php` – Add card themes  
- `delete_card.php` – Delete cards  
- `delete_user.php` – Delete users  
- `db_connect.php` – Database connection file  
- `init_db.sql` – Database setup file  
- `logout.php` – Logout functionality  
- `thank_you.php` – Confirmation page  
- `style.css` – Styling file  

---

## Screenshots

### Home Page
![Home Page](screenshots/home.jpg)

### User Dashboard
![User Dashboard](screenshots/dashboard.jpg)

### Admin Login
![Admin Login](screenshots/admin_login.jpg)

### Admin Dashboard
![Admin Dashboard](screenshots/admin_dashboard.jpg)

---

## How to Run the Project

1. Install XAMPP on your system  
2. Copy the project folder into the `htdocs` directory  
3. Start Apache and MySQL in XAMPP  
4. Import `init_db.sql` into the MySQL database  
5. Open a browser and run:
