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

CREATE TABLE gas(gas_id INT PRIMARY KEY AUTO_INCREMENT, gas_name VARCHAR(64), gas_type VARCHAR(32));

CREATE TABLE location(location_id INT PRIMARY KEY AUTO_INCREMENT, location_name VARCHAR(128) NOT NULL UNIQUE);

CREATE TABLE customer(customer_id INT PRIMARY KEY AUTO_INCREMENT, customer_name VARCHAR(128), customer_no BIGINT, customer_email VARCHAR(128), customer_address VARCHAR(1024), username VARCHAR(128) NOT NULL UNIQUE, password VARCHAR(1024), customer_type ENUM('domestic', 'commercial'), customer_location_id INT NOT NULL, FOREIGN KEY (customer_location_id) REFERENCES location(location_id));

CREATE TABLE booking(booking_id INT PRIMARY KEY AUTO_INCREMENT, booking_date DATETIME NOT NULL, booking_amount float, booking_customer_id INT NOT NULL, booking_status enum('pending', 'delivered'), booking_type ENUM("cod", "prepaid"), FOREIGN KEY (booking_customer_id) REFERENCES customer(customer_id));

CREATE TABLE payment(payment_id INT PRIMARY KEY AUTO_INCREMENT, payment_date date, payment_booking_id INT, delivery_address VARCHAR(256), FOREIGN KEY (payment_booking_id) REFERENCES booking(booking_id));

CREATE TABLE feedback(feedback_id INT PRIMARY KEY AUTO_INCREMENT, feedback_date DATETIME, name VARCHAR(128), phone_no BIG INT NOT NULL, email VARCHAR(128) NOT NULL, feedback_location_id INT NOT NULL, feedback_subject VARCHAR(128), feedback_message VARCHAR(4096), FOREIGN KEY (feedback_location_id) REFERENCES location(location_id));
CREATE TABLE user_feedback(feedback_id INT PRIMARY KEY AUTO_INCREMENT, feedback_customer_id INT NOT NULL, feedback_subject VARCHAR(128), feedback_message VARCHAR(4096), FOREIGN KEY (feedback_customer_id) REFERENCES customer(customer_id));

INSERT INTO location(location_name) VALUES ("Porvorim"), ("Panjim"), ("Mapusa"), ("Ponda"), ("Valpoi"), ("Vasco");
INSERT INTO location(location_name) VALUES ("Margao"), ("Pernem"), ("Bicholim"), ("Canacona");

###### SCHEMA CHANGES

CREATE TABLE agency(agency_id INT PRIMARY KEY AUTO_INCREMENT, agency_name VARCHAR(256) NOT NULL, agency_address VARCHAR(1024), agency_location_id INT NOT NULL, agency_contact_person VARCHAR(256) NOT NULL, agency_phone_no VARCHAR(16) NOT NULL, agency_email_id VARCHAR(128) NOT NULL, agency_username VARCHAR(256) UNIQUE NOT NULL, agency_password VARCHAR(4096) UNIQUE NOT NULL, agency_confirm BOOLEAN, FOREIGN KEY (agency_location_id) REFERENCES location(location_id));

CREATE TABLE agency_feedback(feedback_id INT PRIMARY KEY AUTO_INCREMENT, feedback_agency_id INT NOT NULL, feedback_date datetime, name VARCHAR(128), phone_no BIGINT, email VARCHAR(128), FOREIGN KEY (feedback_agency_id));

CREATE TABLE admin(admin_id INT PRIMARY KEY AUTO_INCREMENT, admin_name VARCHAR(256) NOT NULL, admin_phone_no BIGINT NOT NULL,admin_email_id(256), username VARCHAR(256), password VARCHAR(4096), );

ALTER TABLE user_feedback ADD COLUMN feedback_date datetime NOT NULL;
ALTER TABLE booking MODIFY customer_location_id INT NOT NULL;
ALTER TABLE feedback MODIFY phone_no BIGINT NOT NULL;
ALTER TABLE feedback MODIFY email VARCHAR(128) NOT NULL;

<br>

## <b>Hosted Enviroments</b>

1. [Heroku](https://_.herokuapp.com)
<!-- 2. [Hostinger](https://_.com) -->