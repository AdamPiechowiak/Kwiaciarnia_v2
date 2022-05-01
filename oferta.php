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
        <script src="js/oferta.js"></script>       
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("oferta");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 my-3" style="min-height: 300px;">
                    <?php
                        include "klasy/Product.php";
                        include_once 'klasy/Baza.php';
                        include 'skrypty/connectionData.php';

                        $db = new Baza($hostname, $hostlogin, $hostpass, $database);
                        $sql = "SELECT * FROM product";

                        $result = $db->selectA($sql);
                        
                        foreach ($result as $row) {
                            echo getProduct(new Product($row["id"],$row["nazwa"],$row["zdjecie"],$row["cena"]));
                        }
                    ?>
            </div>
            <?php
                echo getStopka();
            ?>
