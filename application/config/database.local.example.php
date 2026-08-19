<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Copy to database.local.php on the server. Never commit the copied file.
$db['online']['hostname'] = 'localhost';
$db['online']['username'] = 'DATABASE_USERNAME';
$db['online']['password'] = 'DATABASE_PASSWORD';
$db['online']['database'] = 'DATABASE_NAME';

// Make this connection the default on the live server.
$db['default'] = $db['online'];
