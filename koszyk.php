<?php
        include_once 'klasy/Baza.php';
        include_once 'klasy/User.php';
        include_once 'klasy/UserManager.php';
        include_once 'skrypty/connectionData.php';
        include_once "skrypty/elementy.php";
?>
    <?php
         echo getNaglowek();
    ?>
        <script src="js/koszyk.js"></script>   
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("koszyk");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <span id="wyswietl">
                
            </span>
            <?php
                echo getStopka();
            ?>
