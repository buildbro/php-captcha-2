# php-captcha-2
a simple image captcha built with vanilla PHP

## Major tools used
1. MySQL
2. GD Image PHP Extension
3. SESSION

## How to Use
1. Setup MySQL database by running this query or using a tool like PhpMyAdmin

CREATE TABLE `captcha_memo` (
`user_id` varchar(100) NOT NULL,
`code` varchar(100) NOT NULL,
`generated_at` timestamp NULL DEFAULT NULL
)

2. Update database credentials in config.php

3. Run contact.php on a browser to see how the captcha works

## Screenshot
Coming soon

## License
This project is distributed under the MIT license. 
