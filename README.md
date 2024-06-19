# Netflix Clone

This project is a Netflix clone, which includes user roles for admin, content manager, and customer (klant). The admin can manage user data, the content manager can manage the series, seasons, and episodes, and the customer can view all the series.

![alt text](https://github.com/LO2E-SWD2-HOBO/Groep-4-Brian-Emre/blob/main/public/images/design.png)

# Database

run the template.sql in your database with name netflix.

# Roles 

admin: manage the users data and on request can delete<br>
contentmanager: manage the content displayed (series, seasons, episodes)<br>
klant: can view the all the series<br>


# Accounts

**Admin**<br>
  - Email: `admin@123.com`<br>
  - Password: `test`<br>

**Content Manager**<br>
  - Email: `manager@123.com`<br>
  - Password: `test`<br>

**Klant (Customer)**
  - Email: `klant@123.com`<br>
  - Password: `test`<br>

# Setup

- php artisan serve
- npm run dev
- php artisan config:cache
- php artisan route:cache
