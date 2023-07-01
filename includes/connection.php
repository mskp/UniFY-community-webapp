<?php
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'mycommunity';

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Could not connect to database");
