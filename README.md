# Netflix Clone

This Netflix clone project was made for a school project named “Hobo”. The project was successfully finished on June 19, 2024. It’s a detailed application with different roles for admin, content manager, and customer (klant), each with their own tasks and abilities.<br>

The admin can manage user data, the content manager can manage the series, seasons, and episodes, and the customer can view all the series. The project shows a good understanding of managing user roles and content in a streaming service.

![alt text](https://github.com/nuk3dev/netflix_clone/blob/main/public/images/design.png)

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
