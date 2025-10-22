---
marp: true
paginate: true
theme: default
---

# Project 1 – Inventory REST API (PDO)
**Hani Kebede** | Module 1 – REST API Servers

---

## Agenda
1. Overview & Goals
2. DB Schema & Setup
3. Auth (Bearer Token)
4. Endpoints – Items
5. Endpoints – Categories
6. Testing (cURL & HTML)
7. NGINX Deployment
8. Screenshots (Proof of Work)
9. Next Steps

---

## Goals
- Build 8 REST APIs + 2 Auth APIs  
- Secure with Bearer token  
- Test via cURL & HTML  
- Deploy behind NGINX

---

## Tech Stack
- PHP 8 + PDO (MySQL)
- NGINX + PHP-FPM
- Marp slides
- cURL & Fetch API

---

## DB Schema
Tables:
- users(id, username, password_hash)
- categories(id, name)
- items(id, category_id, name, sku, qty, price)

---

## Schema SQL
`code/schema.sql` creates tables and seeds demo user.

---

## Auth: Login
**POST** `/api/auth_login.php`
```json
{"username":"demo","password":"password"}
