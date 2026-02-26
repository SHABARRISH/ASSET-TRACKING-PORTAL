# 🏢 ASSET TRACKING PORTAL

A full-stack **Asset Management & Tracking System** built using **PHP, MySQL, XAMPP, and phpMyAdmin**, designed to manage organizational assets with separate Admin and User panels, role-based authentication, reporting dashboard, and AI chatbot integration.

---

## 🚀 Project Overview

The Asset Tracking Portal is a scalable, production-ready web application that enables organizations to:

* Categorize assets (IT Equipment, Furniture, Vehicles, Others)
* Track asset lifecycle and status
* Manage maintenance records
* Generate analytical reports
* Allow users to buy/rent assets
* View personalized asset ownership
* Integrate AI chatbot support

The system follows **role-based access control (RBAC)** with separate UI and codebases for Admin and User.

---

# 🔐 Authentication

### 👨‍💼 Admin Login

* Email: `admin@gmail.com`
* Password: `admin123`

### 👤 User Login

* Email: `user@gmail.com`
* Password: `user123`

Separate login logic and UI are maintained for both roles.

---

# 🖥️ Core Features

## 1️⃣ Login System

* Separate login pages for Admin and User
* Secure session handling
* Role-based dashboard redirection

---

## 2️⃣ Home Page Features

### 📦 Asset Categorization

* IT Equipment
* Furniture
* Vehicles
* Others

### 📊 Asset Status Tracking

* Active
* Under Maintenance
* Retired
* Lost/Stolen

---

# 👨‍💼 Admin Panel Features

* Add new assets with:

  * Asset type
  * Make/Model
  * Serial number
  * Purchase date
  * Cost
  * Assigned employee/department
  * Location
  * Warranty period
* Upload:

  * Asset images
  * Invoices
  * Warranty documents
* Edit / Delete assets
* Categorize assets
* Track lifecycle status
* View analytics dashboard
* Generate reports
* AI chatbot integration

Admin UI is completely isolated from User UI for scalability.

---

# 👤 User Panel Features

* View available assets
* View asset details:

  * Cost
  * Image
  * Description
* Buy or Rent asset
* Purchase reflection in profile
* Personal dashboard
* AI chatbot support

If a user buys or rents an asset:
→ It automatically reflects in User Profile
→ Asset status updates in database

---

# 📊 Dashboard & Reports Module

### Overview Dashboard

* Total assets by category
* Total assets by status
* Assets due for maintenance (next 30 days)
* High-maintenance assets
* Assets nearing end of useful life

### Reports Generation

* Asset inventory report
* Maintenance cost report
* Depreciation summary
* AI recommendation summary

---

# 🤖 AI Chatbot Integration

* Dedicated chatbot UI section
* API integration ready
* Scalable to integrate OpenAI or custom AI models
* Used for:

  * Asset recommendations
  * Maintenance insights
  * Depreciation prediction
  * Smart reporting summary

---

# 🏗️ Production-Ready Folder Structure

```
asset-tracking-portal/
│
├── admin/
│   ├── dashboard/
│   ├── assets/
│   ├── reports/
│   ├── chatbot/
│   └── includes/
│
├── user/
│   ├── dashboard/
│   ├── assets/
│   ├── profile/
│   ├── chatbot/
│   └── includes/
│
├── config/
│   ├── database.php
│   ├── constants.php
│
├── api/
│   ├── chatbot_api.php
│   ├── asset_api.php
│
├── uploads/
│   ├── images/
│   ├── documents/
│
├── database/
│   └── asset_tracking.sql
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│
└── index.php
```

✔ Separate Admin & User codebase
✔ Scalable architecture
✔ Collision-free modular structure
✔ API-ready backend

---

# 🛠️ Tech Stack

* Backend: PHP
* Database: MySQL
* Server: XAMPP
* DB Tool: phpMyAdmin
* Frontend: HTML, CSS, JavaScript
* AI Integration: REST API ready

---

# ⚙️ Setup Instructions

1. Install XAMPP
2. Start Apache & MySQL
3. Import `asset_tracking.sql` in phpMyAdmin
4. Place project folder inside:

   ```
   htdocs/
   ```
5. Run:

   ```
   http://localhost/asset-tracking-portal
   ```

---

# 📈 Scalability Considerations

* Modular folder separation
* Role-based routing
* API-based architecture
* Upload management isolation
* Ready for microservice migration

---

# 🎯 Future Enhancements

* Payment gateway integration
* Email notifications
* Role expansion (Manager, Auditor)
* Cloud storage integration
* Advanced AI predictive analytics


