<?php
$mysqli = new mysqli('localhost', 'root', '', 'apartment') or die($mysqli->connect_error);
$admin = 'admin';
$manager = 'manager';
$tenant = 'tenant';
$staff = 'staff';
$rent = 'rent';
$payment = 'payment';
$complain = 'complain';
$building = 'building';
$apartment = 'apartment';
$role = 'role';
$dues = 'dues';