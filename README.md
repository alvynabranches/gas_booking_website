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

#### <b>MySQL</b>

CREATE TABLE gas(gas_id int PRIMARY KEY AUTO_INCREMENT, gas_name varchar(64), gas_type varchar(32));

CREATE TABLE location(location_id int PRIMARY KEY AUTO_INCREMENT, location_name varchar(128) NOT NULL UNIQUE);

CREATE TABLE customer(customer_id int PRIMARY KEY AUTO_INCREMENT, customer_name varchar(128), customer_no bigint, customer_email varchar(128), customer_address varchar(1024), username varchar(128) NOT NULL UNIQUE, password varchar(1024), customer_type ENUM('domestic', 'commercial'), customer_location_id int, FOREIGN KEY (customer_location_id) REFERENCES location(location_id));

CREATE TABLE booking(booking_id int PRIMARY KEY AUTO_INCREMENT, booking_date date, booking_amount float, booking_customer_id int, booking_status enum('pending', 'delivered'), FOREIGN KEY (booking_customer_id) REFERENCES customer(customer_id));
ALTER TABLE booking ADD COLUMN booking_type ENUM("cod", "prepaid");
ALTER TABLE booking MODIFY booking_customer_id int NOT NULL;
ALTER TABLE booking MODIFY booking_date DATETIME NOT NULL;

CREATE TABLE payment(payment_id int PRIMARY KEY AUTO_INCREMENT, payment_date date, payment_booking_id int, delivery_address varchar(256), FOREIGN KEY (payment_booking_id) REFERENCES booking(booking_id));

CREATE TABLE feedback(feedback_id int PRIMARY KEY AUTO_INCREMENT, feedback_date datetime, name varchar(128), phone_no varchar(16), email varchar(128), feedback_location_id int NOT NULL, feedback_subject varchar(128), feedback_message varchar(4096), FOREIGN KEY (feedback_location_id) REFERENCES location(location_id));
CREATE TABLE user_feedback(feedback_id int PRIMARY KEY AUTO_INCREMENT, feedback_customer_id int NOT NULL, feedback_subject varchar(128), feedback_message varchar(4096), FOREIGN KEY (feedback_customer_id) REFERENCES customer(customer_id));

INSERT INTO location(location_name) VALUES ("Porvorim"), ("Panjim"), ("Mapusa");
INSERT INTO location(location_name) VALUES ("Ponda"), ("Valpoi"), ("Vasco"), ("Margao"), ("Pernem"), ("Bicholim"), ("Canacona");

###### SCHEMA CHANGES

CREATE TABLE agency(agency_id int PRIMARY KEY AUTO_INCREMENT, agency_name varchar(256), agency_address varchar(1024), agency_location_id int, agency_contact_person varchar(256), agency_phone_no varchar(16), agency_email_id varchar(128), agency_username varchar(256), agency_password varchar(4096), FOREIGN KEY (agency_location_id) REFERENCES location(location_id));

<br>

<!-- #### <b>PostgreSQL</b>

CREATE TABLE gas(gas_id SERIAL PRIMARY KEY, gas_name VARCHAR(64), gas_type VARCHAR(32));

CREATE TABLE location(location_id SERIAL PRIMARY KEY, location_name VARCHAR(128));

CREATE TABLE customer(customer_id SERIAL PRIMARY KEY, customer_no INT, customer_email VARCHAR(128), username VARCHAR(64), password VARCHAR(64), customer_location_id INT REFERENCES location(location_id));

CREATE TABLE booking(booking_id SERIAL PRIMARY KEY, booking_date date, booking_amount REAL, booking_customer_id INT REFERENCES customer(customer_id));

CREATE TABLE payment(payment_id SERIAL PRIMARY KEY, payment_date date, payment_booking_id INT REFERENCES booking(booking_id), delivery_address VARCHAR(256));

INSERT INTO location(location_name) VALUES ("Porvorim"), ("Panjim"), ("Mapusa"); -->

## <b>Hosted Enviroments</b>

1. [Heroku](https://_.herokuapp.com)
<!-- 2. [Hostinger](https://_.com) -->

<br>