<?php

use App\Config\ViewConfig;

if (false === ViewConfig::hideMenu())
    include '../views/_components/menu.php';

?>

<main class="main-content border-radius-lg">

    <?php

    if (false === ViewConfig::hideNavBar())
        include '../views/_components/navbar.php';

    ?>