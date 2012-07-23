2Checkout PHP Library
=====================

This library provides developers with a simple set of bindings to the 2Checkout purchase routine, Instant Notification Service and Back Office API.

To use, download or clone the repository.

```shell
git clone https://github.com/craigchristenson/2checkout-php.git
```

Require in your php script.

```php
require_once("/path/to/2checkout-php/lib/Twocheckout.php");
```

Full documentation for each binding will be provided in the [Wiki](https://github.com/craigchristenson/2checkout-php/wiki).


Example API Usage
-----------------

*Example Request:*

```php
Twocheckout::setCredentials("apiusername", "apipassword");
$args = array('sale_id' => 4753855417);
Twocheckout_Sale::stop($args);
```

*Example Response:*

```php
Array
(
    [Lineitem(s) Stopped Successfully] => Array
        (
            [0] => 4763150311
            [1] => 4763150323
            [2] => 4763150335
        )

)
```

Example Checkout Usage:
-----------------------

*Example Request:*

```php
$args = array(
    'sid' => 532001,
    'cart_order_id' => 'Example Cart ID',
    'total' => '1.00'
);
Twocheckout_Charge::redirect($args);
```

Example Return Usage:
---------------------

*Example Request:*

```php
$sid = 532001;
$secret_word = 'tango';
$passback = Twocheckout_Return::passback($sid, $secret_word, 'demo');
print_r($passback);
```

*Example Response:*

```php
Array
(
    [middle_initial] => P
    [sid] => 532001
    [fixed] => Y
    [cart_weight] => 0
    [key] => 0A45DFE35A2CDE2F0255E86D766E8ABD
    [state] => OH
    [last_name] => Christenson
    [email] => christensoncraig@gmail.com
    [city] => Columbus
    [street_address] => 123 Test St
    [cart_order_id] => Example Cart ID
    [merchant_order_id] => 
    [order_number] => 4763167867
    [country] => USA
    [ip_country] => United States
    [cart_id] => Example Cart ID
    [lang] => en
    [demo] => Y
    [pay_method] => CC
    [invoice_id] => 4763167876
    [cart_tangible] => N
    [total] => 1.00
    [phone] => 555-555-5555 
    [credit_card_processed] => Y
    [zip] => 43123
    [street_address2] => dddsdsc
    [card_holder_name] => Craig P Christenson
    [first_name] => Craig
    [_button_checkout_x] => 115
    [_button_checkout_y] => 19
    [_button_checkout] => Checkout
)
```

Example INS Usage:
------------------

*Example Request:*

```php
$sid = 532001;
$secret_word = 'tango';
$message = Twocheckout_Ins::message($sid, $secret_word);
print_r($message);
```

*Example Response:*

```php
Array
(
    [message_type] => ORDER_CREATED
    [message_description] => New order created
    [timestamp] => 2028-03-31 23:30:26
    [md5_hash] => F8A2BBE63476DD04A5EDF4A551AC2AF3
    [message_id] => 26795262
    [key_count] => 56
    [vendor_id] => 532001
    [sale_id] => 1
    [sale_date_placed] => 2003-06-24 16:10:29
    [vendor_order_id] => promo12345
    [invoice_id] => 1
    [recurring] => 0
    [payment_type] => credit card
    [list_currency] => GBP
    [cust_currency] => JPY
    [auth_exp] => 2027-08-30
    [invoice_status] => approved
    [fraud_status] => wait
    [invoice_list_amount] => 5.00
    [invoice_usd_amount] => 2.50
    [invoice_cust_amount] => 250
    [customer_first_name] => John
    [customer_last_name] => Smith
    [customer_name] => John Smith
    [customer_email] => jsmith@example.com
    [customer_phone] => 6149212450
    [customer_ip] => 224.69.167.204
    [customer_ip_country] => United States
    [bill_street_address] => 55 Lane Ave.
    [bill_street_address2] => 
    [bill_city] => Mytown
    [bill_state] => NV
    [bill_postal_code] => 55555
    [bill_country] => USA
    [ship_status] => not_shipped
    [ship_tracking_number] => 
    [ship_name] => June Cleaver
    [ship_street_address] => 123 Main St.
    [ship_street_address2] => Apt. B
    [ship_city] => Anytown
    [ship_state] => OH
    [ship_postal_code] => 12345
    [ship_country] => USA
    [item_count] => 1
    [item_name_1] => t-shirt
    [item_id_1] => 12
    [item_list_amount_1] => 5.00
    [item_usd_amount_1] => 2.50
    [item_cust_amount_1] => 250
    [item_type_1] => bill
    [item_duration_1] => 
    [item_recurrence_1] => 
    [item_rec_list_amount_1] => 
    [item_rec_status_1] => 
    [item_rec_date_next_1] => 
    [item_rec_install_billed_1] => 
)
```

Full documentation for each binding will be provided in the [Wiki](https://github.com/craigchristenson/2checkout-php/wiki).
