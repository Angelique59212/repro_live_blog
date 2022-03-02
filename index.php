<?php

namespace App;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\RoleManager;

require 'Connect.php';
require 'Config.php';

require 'include.php';

$roleManager = new RoleManager();

echo "<pre>";
print_r($roleManager);
echo "</pre>";

$articleManager = new ArticleManager();
echo "<pre>";
print_r($articleManager);
echo "</pre>";


