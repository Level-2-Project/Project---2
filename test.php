<?php 

$pass1 = '1234567890';
$hasshed1 = password_hash( $pass1, PASSWORD_DEFAULT );
$hasshed2 = password_hash( $pass1, PASSWORD_DEFAULT );
echo $hasshed1;?><br><?php
echo $hasshed2;