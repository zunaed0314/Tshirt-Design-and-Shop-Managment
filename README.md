1. Download Visual Studio Code for better understanding of the codebase
2. Download XAMPP.
3. Keep the main project inside the "C:\xampp" directory
4. Run 'XAMPP control pannel'. Start Apache and MySQL.
5. Click 'Admin' of MySQL.
6. Go to 'SQL'.
7. Write this Query and press 'Go'.

-- Create the database
CREATE DATABASE logindb;

-- Use the newly created database
USE logindb;

-- Table 1: customer_cart
CREATE TABLE customer_cart (
    sellerid INT(11),
    customerid INT(11),
    productid INT(11),
    name VARCHAR(50),
    price VARCHAR(30),
    size VARCHAR(30)
);

-- Table 2: design2
CREATE TABLE design2 (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    color VARCHAR(255),
    size VARCHAR(255),
    image_data VARCHAR(1000),
    uploaded_image_path VARCHAR(1000)
);

-- Table 3: orders
CREATE TABLE orders (
    id INT(11),
    name VARCHAR(200),
    tshirtid INT(11),
    orderplaced VARCHAR(10),
    orderdate DATE,
    deliverydate DATE,
    deliverystatus VARCHAR(50),
    quantity VARCHAR(30),
    totalPrice VARCHAR(30)
);

-- Table 4: pendingseller
CREATE TABLE pendingseller (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    company_name VARCHAR(50),
    email VARCHAR(80),
    password VARCHAR(200),
    address VARCHAR(200),
    area VARCHAR(200),
    phone VARCHAR(200),
    image_url VARCHAR(200)
);

-- Table 5: products
CREATE TABLE products (
    sellerid INT(11),
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    price VARCHAR(30),
    colors VARCHAR(100),
    sizes VARCHAR(50),
    image_path VARCHAR(200)
);

-- Table 6: report
CREATE TABLE report (
    id INT(11),
    seller INT(11),
    title VARCHAR(200),
    description VARCHAR(1000)
);

-- Table 7: sellers
CREATE TABLE sellers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    company_name VARCHAR(50),
    email VARCHAR(50),
    phone VARCHAR(50),
    password VARCHAR(200),
    address VARCHAR(200),
    area VARCHAR(100)
);

-- Table 8: users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(80),
    phone VARCHAR(20),
    password VARCHAR(200),
    address VARCHAR(200),
    area VARCHAR(50)
);



QUERY IS FINISHED.

8. Now you are all set. Type "http://localhost/A103/" in your preferred browser and click the 'webfront.php' file and you are good to go!
9. Now you either log-in as a customer or seller or admin.
10. If you log-in as a customer, you can design your tshirt in your own preferred color, icons and wordarts. Choose your preferred size and quantity.
11. For buying thsirt from shop, shop must be authorized to sell their products online.
12. While registering as a seller, a document must be submitted along with it so that the admin can confirm the legitimacy of the shop. If confirmed, the shop would appear for the customers and they can buy from there.
13. Seller can add tshirt into his shop as per instruction from the product manager.
14. Customer then can buy the tshirt from that particular shop. 
