# 🛒 E-Commerce Platform

  

This Platform is a Laravel-based e-commerce platform with powerful role-based features and cross-country product management. Users can browse, buy, and manage inventory based on their role – whether they're customers, vendors, or platform admins.

  

From dynamic dashboards to secure email-based CSV exports, delivers a complete e-commerce experience with a creative twist.

  
  
  

## 🌐 User Roles & Access Flow

  

### 🔹 Guest

- View the **Public Market**

- Explore **Historical Events**

  

![Public Market](https://res.cloudinary.com/dtjflvikd/image/upload/v1753851273/Public_Market_wje0wc.png)
  

### 🔸 General User (Local)

- Register and select a **country**

- Purchase weapons **only from their country**

- **Shopping Cart**

![Cart](https://res.cloudinary.com/dtjflvikd/image/upload/v1753851239/Cart_Page_rajyq3.png)

- View and edit their **profile**

- **Request Weapons** 


### 🟡 Country / Government Official

- Register and select a **country**

- Purchase weapons from **any country**

- View and manage profile

- **Add new weapons**

- **Send/receive emails** (CSV/stock report)

  ![Request](https://res.cloudinary.com/dtjflvikd/image/upload/v1753852604/Request_vjqjd9.png)
 ![Report](https://res.cloudinary.com/dtjflvikd/image/upload/v1753852602/Report_bl1r0c.png)


### 🔴 Admin / World Ruler

- Full system access:

  - Register and choose a **country**

  - Buy weapons from **any country**

  - View and manage **profile**

  - **Send/receive emails**

  - **Add/edit/delete** weapons

  - **CRUD for all models** (Users, Weapons, Countries, Discounts)

  - **Ban/unban weapons** (banned weapons hidden globally)

  ![CRUD and Ban](https://res.cloudinary.com/dtjflvikd/image/upload/v1753851267/Ban_wzzzag.png)


---

  

## ✨ Features Summary

  

- 🛡️ Role-based dashboards & access flow

- 🛒 Shopping cart with checkout & pending logic

- 🚫 Weapon banning (ruler-exclusive)

- 📤 Bulk weapon import via CSV

- 📧 CSV export with Gmail delivery

- 🎯 Team-based discounts on weapons

- 🌍 Country filters and categorization

- 🧑‍💻 User-friendly dashboard with visual indicators

- ☁️ Cloudinary-powered image hosting

  

---

  

## 💻 Built With

  

- [Laravel 10+](https://laravel.com/)

- [PHP 8.x](https://www.php.net/)

- [MySQL](https://www.mysql.com/)

- [Blade Templates](https://laravel.com/docs/10.x/blade)

- [Cloudinary](https://cloudinary.com/) (image hosting)

- [Gmail SMTP](https://mailtrap.io/) (email services)

- Native PHP for CSV handling

  

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

> ⚠️ Run `npm run dev` continuously during development to compile CSS/JS. Use `npm run build` for production.

  

### 4. Create Environment File

```bash

cp .env.example .env

```

  

### 5. Configure `.env`

  

```env

DB_DATABASE=your_db

DB_USERNAME=your_user

DB_PASSWORD=your_pass

  

MAIL_MAILER=smtp

MAIL_HOST=smtp.gmail.com

MAIL_PORT=587

MAIL_USERNAME=your_email@gmail.com

MAIL_PASSWORD=your_app_password

MAIL_ENCRYPTION=tls

  

MAIL_FROM_ADDRESS=your_email@gmail.com

MAIL_FROM_NAME="Ternary Arsenal"

  

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

  

### 8. Run the Application

```bash

php artisan serve

```

Visit: [http://localhost:8000](http://localhost:8000)

  

---

  

## 📤 CSV Upload Feature

  

- Admins & Rulers can upload `.csv` files to bulk import weapons.

- Files are parsed and stored if valid.

- CSV exports are sent via **Gmail SMTP** to valid addresses.

  

---

  

## 🛑 Weapon Banning System

  

- Rulers can toggle a **ban flag** on any weapon.

- Banned weapons are **hidden from all buyers**.

- A visual badge/icon indicates banned status.

  

---

  

## 📧 Email Notes

  

- Uses Gmail SMTP for real-time email sending.

- Emails include **CSV attachments** (stock reports, checkout summaries, weapon requests).

- Ensure **App Passwords** are enabled (recommended with Gmail 2FA).

  

---

  

## 👩‍💻 Developed By

  

Tahany, Zeyad, Shams  

Team: **two zeros and one**