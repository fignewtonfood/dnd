# DnD

##### Epicodus D&D Campaign Manager, started 8/29/2015

#### By Tim White, Ike Mattice

## Description

This program will store shoes and shoe brands into a MySQL database. The user will have the capability to create, read, update, and delete individual shoe entries as well as creating and reading shoe brands.

## Setup

- clone https://github.com/fignewtonfood/wk4_code_review.git
- Run $ composer install in project folder
- Start mySQL server
- Start php server in web directory folder
- navigate web browser to localhost:8000
- Run phpmyadmin and import database store.zip from folder


## Technologies Used

PHP, phpunit, Silex, Twig, HTML, CSS, Boostrap, Symfony, MySQL

## SQL Commands Used
CREATE DATABASE shoes;
USE shoes;
CREATE TABLE `brands` (`id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL, `name` VARCHAR(255) NULL DEFAULT NULL, PRIMARY KEY (`id`));
CREATE TABLE `stores` (`id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL, `name` VARCHAR(255) NULL DEFAULT NULL, PRIMARY KEY (`id`));
CREATE TABLE `brands_stores` (`id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL, `brand_id` INTEGER NULL DEFAULT NULL, `store_id` INTEGER NULL DEFAULT NULL, PRIMARY KEY (`id`));

### Legal


Copyright (c) 2015 Tim White, Ike Mattice

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
