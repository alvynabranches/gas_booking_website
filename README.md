# Gas Booking Website

##### <b>This is a demo website just for refreshing my PHP memory.</b> 
<br><br>
## <b>Database Architecture</b>

1. gas(id primary key, gas_name, gas_type)
2. location(location_id, location_name)
3. customer(id primary key, name, address, phone, email, username, password, location_id foreign key)
4. booking(id primary key, date, amount, customer_id foreign key)
5. payment(id primary key, date, booking_id foreign key, delivery_address)
<!-- 6. delivery(id primary key, ) -->


### <b>Queries Used</b>

CREATE TABLE gas(gas_id int PRIMARY KEY AUTO_INCREMENT, gas_name varchar(64), gas_type varchar(32));

CREATE TABLE location(location_id int PRIMARY KEY AUTO_INCREMENT, location_name varchar(128));

CREATE TABLE customer(customer_id int PRIMARY KEY AUTO_INCREMENT, customer_no int, customer_email varchar(128), username varchar(64), password varchar(64), customer_location_id int, FOREIGN KEY (customer_location_id) REFERENCES location(location_id));

CREATE TABLE booking(booking_id int PRIMARY KEY AUTO_INCREMENT, booking_date date, booking_amount float, booking_customer_id int, FOREIGN KEY (booking_customer_id) REFERENCES customer(customer_id));

CREATE TABLE payment(payment_id int PRIMARY KEY AUTO_INCREMENT, payment_date date, payment_booking_id int, delivery_address varchar(256), FOREIGN KEY (payment_booking_id) REFERENCES booking(booking_id));

