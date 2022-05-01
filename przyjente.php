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
        <script>
            
            $(document).ready(function () {
                localStorage.clear();
            });
            
        </script>   
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="text-center row py-4 mt-3" style="min-height: 300px;">
                <h1>Zamówienie przyjęte</h1>
            </div>
            <?php
                echo getStopka();
            ?>
