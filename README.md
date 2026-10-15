# AquaPure Water Services

A responsive PHP + MySQL water ordering website. Customers browse water products, filter by category, add items to a cart, enter delivery details, and place orders. No admin dashboard: manage products and orders directly in phpMyAdmin.

## Requirements
- XAMPP (Apache, MySQL) with PHP 8+ and PDO MySQL

## Setup
1. Extract `aquapure-water` into `C:\xampp\htdocs\`.
2. Start **Apache** and **MySQL** in XAMPP.
3. Open `http://localhost/phpmyadmin`, select **Import**, and upload `database/aquapure.sql` (or paste the SQL into the SQL tab).
4. Edit `config/db.php` if your MySQL username/password differs from `root` / empty password.
5. Visit `http://localhost/aquapure-water/`.

## Managing products in phpMyAdmin
Select database `aquapure` → table `products` → **Insert**. Set `name`, `description`, `category`, `price`, `stock`, and optionally `image_url` (an HTTPS image URL or a relative path). Leave `id` and `created_at` blank. Use Browse/Edit to update products and stock. The site automatically displays them.

## Orders
Customer orders are saved in `orders` and `order_items`. Use phpMyAdmin to view orders and update `orders.status` manually. No payment gateway, delivery pricing, or automated notifications are included. Customers are shown a confirmation page; arrange payment and delivery outside the site.

## Files
- `index.php`: home/catalog
- `cart.php`: cart management
- `checkout.php`: customer details and order placement
- `success.php`: confirmation
- `database/aquapure.sql`: schema and demo products
- `config/db.php`: database connection

## Notes
The checkout uses a database transaction and stock checks. Product images can be managed via the `image_url` column. For public deployment, configure HTTPS, secure database credentials, and add appropriate privacy and abuse controls.
