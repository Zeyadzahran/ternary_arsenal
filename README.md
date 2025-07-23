# 🔫 Ternary Arsenal - Laravel Weapon E-commerce Platform

**Ternary Arsenal** is a Laravel-based e-commerce platform that simulates global weapon trading. Each country can manage its own weapons, while special roles (like admin and world rulers) can perform higher-level control, such as banning weapons or managing users. Users have role-based access and each role has a unique journey through the platform.

---

## 🌐 User Roles & Access Flow

### 🔹 Guest
- Access the public **Market**
- View **Historical Events**

### 🔸 General User (Local)
- Register & choose a **country**
- Buy weapons **only from their own country**
- View **profile**
- **Send and receive** emails (CSV/report-based communication)

### 🟡 Country/Government Official
- Register & choose **country**
- Buy weapons from **any country**
- View **profile**
- **Send and receive** emails
- **Add new weapons**

### 🔴 Admin / World Ruler
- Full access:
  - Register & choose **country**
  - Buy weapons from **any country**
  - View **profile**
  - **Send and receive** emails
  - **Add weapons**
  - **CRUD for all models** (Users, Weapons, Countries)
  - **Ban/unban weapons** (disabled for purchase globally)

---

## 💻 Built With

- [Laravel 10+](https://laravel.com/)
- [PHP 8.x](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Blade Templates](https://laravel.com/docs/10.x/blade)
- [Cloudinary](https://cloudinary.com/) (for image hosting)
- [SMTP Gmail](https://mailtrap.io/) (for sending emails)
- CSV file parsing with native PHP

---

## ✨ Features Summary

- Role-based UI and access
- Shopping cart system with pending and checkout states
- Weapon banning (rulers only)
- CSV upload for bulk import
- CSV export and Gmail delivery
- Team-based discounts on weapons
- Country filters and sub-categorization
- Clean user dashboard and navbar indicators
- Cloudinary-hosted logos and images

---

## ⚙️ Installation & Setup

### 1. Clone the Project

```bash
git clone https://github.com/your-username/ternary-arsenal.git
cd ternary-arsenal
```
### 2. Install PHP Dependencies
```bash
composer install
```
### 3. Install Frontend Assets
```bash
npm install
npm run dev
```
`⚠️ Make sure to run npm run dev continuously while developing to compile your assets (CSS & JS). You can also use npm run build for production.`


### 4. Create Environment File
```bash
cp .env.example .env
```
### 5. Configure .env
Set your database, mail, and Cloudinary keys:
```bash
//env
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

//mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Ternary Arsenal"

//Cloudinary
CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@cloud_name
```
### 6. Generate Application Key
```bash
php artisan key:generate
```
### 7. Run Migrations
```bash
php artisan migrate
```
### 8. Run the Server
```bash
php artisan serve
Visit: http://localhost:8000
```
## 📤 CSV Upload
### Admins or rulers can:

 - Upload .csv files to import weapons.

 - The system parses the file and inserts valid entries.

 - CSV can be exported and sent as email attachments to verified Gmail addresses.

## 🛑 Weapon Banning
 - Rulers can toggle a "ban" flag on weapons.

 - Banned weapons are hidden from all buyers.

 - A badge or icon indicates the ban status.

## 📧 Email Notes
 - Gmail SMTP is used for sending real emails with CSV attachments.

 - Make sure your Gmail is set up for App Passwords (2FA recommended).

---

👩‍💻 Developed By

 Tahany, Zeyad, Shams 
 
 Team: two zeros and one 
