# BeProfit

### General
A mini CRUD API project composed in native PHP OOP.

### Installation and Setup:
- Download zip file attached to the email.
- Extract zipped folder **_BeProfit_** And place it inside you local server directory `C:\xampp\htdocs` or any other directory defined and running my **xampp** local server.
- Open local **xampp** server and make sure that _pdo_mysql_ extention isn't commented out on **PHP.ini** file and ready for use.
- Run _Apache_ local server and _MySQL_ local database.

### Database Setup:
1. Open the browser and navigate on the url to your `localhost<:port>\phpmyadmin\` that's currently running, for example: `localhost:8000\phpmyadmin\` | `localhost:80\phpmyadmin\` | `localhost\phpmyadmin\`.
2. Open new database under the name **`be_profit`** set collation to `utf8_general_ci` and make sure engine is `InnoDB`.
3. After successfully Defining the new database run the following script to create the project's table:
```sh
CREATE TABLE `be_profit`.`orders` ( 
`order_id` VARCHAR(255) NOT NULL , 
`shop_id` VARCHAR(255) NOT NULL , 
`total_price` FLOAT NOT NULL , 
`subtotal_price` FLOAT NOT NULL , 
`total_weight` INT(11) NOT NULL , 
`total_tax` INT(11) NOT NULL , 
`currency` VARCHAR(3) NOT NULL , 
`financial_status` VARCHAR(255) NOT NULL , 
`total_discounts` INT(11) NOT NULL , 
`name` VARCHAR(255) NOT NULL , 
`fulfillment_status` VARCHAR(255) NOT NULL , 
`country` VARCHAR(2) NOT NULL , 
`province` VARCHAR(2) NOT NULL , 
`total_production_cost` INT(11) NOT NULL , 
`total_items` INT(11) NOT NULL , 
`total_order_shipping_cost` INT(11) NOT NULL , 
`total_order_handling_cost` INT(11) NOT NULL , 
`processed_at` DATETIME NOT NULL , 
`created_at` DATETIME NOT NULL , 
`updated_at` DATETIME NOT NULL , 
`closed_at` DATETIME NOT NULL , 
UNIQUE (`order_id`)
) ENGINE = InnoDB;
```

## Usage:
Open the browser and navigate on the url to your `localhost<:port>` that's currently running (`localhost:8000` | `localhost:80` | `localhost`). Select the folder **_BeProfit_** and you will be navigated to a user interface showing the following methods:

##### Initiate:
Fetch data from external resource.

##### Get Orders:
Fetch data records from local database.

##### Get Order:
Read single data record from local database.

##### Create Order:
Create single data record to local database.

##### Update Order:
Update single data record on local database.

##### Delete Order:
Delete single data record from local database.

##### Get Summery:
Get summery of predefined records from local database.

> All of the user interface methods are logging a **json** output to the browser's **Console** tab. Requests can be obvserved via the browser's **Network** tab.
