Create database shop;
use shop;

Create table categories
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL unique,
    status tinyint(1) default '1'
);
Create table product
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL unique,
    status tinyint(1) default '1',
    price float NOT NULL,
    sale float default '0',
    image varchar(100) NOT NULL,
    descriptions text NULL ,
    category_id int NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
Create table admin
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL ,
    email varchar(100) NOT NULL unique,
    password varchar(100) NOT NULL,
    avatar varchar(100) NOT NULL,
    last_login date default NOW()
    
);
Create table customers
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL ,
    email varchar(100) NOT NULL unique,
    phone varchar(23) NOT NULL unique,
    address varchar(255) NULL,
    gender tinyint(1) default '1',
    birthday date NOT NULL,
    password varchar(100) NOT NULL,
    last_login date default NOW(),
    avatar varchar(100) NOT NULL
);
Create table oders
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL ,
    email varchar(100) NOT NULL,
    phone varchar(23) NOT NULL ,
    address varchar(255) NULL,
    order_date date default NOW(),
    status tinyint(1) default '1',
    order_note varchar(255) NULL,
    customers_id int NOT NULL,
     FOREIGN KEY (customers_id) REFERENCES customers(id)
);
Create table oder_details
(
    order_id int NOT NULL ,
    product_id int NOT NULL,
    quantity int NOT NULL,
    price float NOT NULL,
    primary key (order_id,product_id),
   FOREIGN KEY ( order_id) REFERENCES oders(id),
       FOREIGN KEY ( product_id) REFERENCES product(id)
);
Create table ratings
(
    customer_id int NOT NULL ,
    product_id int NOT NULL,
    comments text NOT NULL,
   start float NOT NULL,
   ratting_date date default NOW(),
   status tinyint(1) default '0',
  primary key (customer_id,product_id),
   FOREIGN KEY ( customer_id) REFERENCES customers(id),
   FOREIGN KEY ( product_id) REFERENCES product(id)
);

insert into admin(name,email,password,avatar) values
('admin','admin@gmail.com','123456','person_3.jpg');

insert into categories(name) values
('Ghế văn phòng'),
('Ghế giám đốc'),
('Ghế phòng khách'),
('Ghế học sinh'),
('Ghế mầm non'),
('Ghế khác');

insert into product(name,price,category_id,image)
values
('Nordic Chair',50,1,'product-1.png'),
('Kruzo Aero Chair',78,1,'product-2.png'),
('Ergonomic Chair',43,1,'product-3.png');

