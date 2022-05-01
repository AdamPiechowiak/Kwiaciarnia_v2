<?php
        include_once 'klasy/Baza.php';
        include_once 'klasy/User.php';
        include_once 'klasy/UserManager.php';
        include_once 'skrypty/connectionData.php';
        include_once "skrypty/elementy.php";
        
        $db = new Baza($hostname, $hostlogin, $hostpass, $database);

        $um = new UserManager();
        session_start();
        $userid = $um->getLoggedInUser($db, session_id());
        if ($userid > 0) 
        {
            header("location:index.php");
        }
?>
<?php
         echo getNaglowek();
    ?>
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("login");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 my-5 " style="min-height: 300px;">
                <h3>Formularz logowania</h3>
                    <form action="skrypty/processLogin.php" method="post">
                        <?php
                        if (filter_input(INPUT_GET, "czy") )
                        {
                            echo "nieprawidlowy login lub haslo</br>";
                        }
                        ?>
                        email: <input name="login" type="email" required=""/><br/> 
                        hasło: <input name="passwd" type="password" required=""/><br/> 
                        <input type="submit" value="Zaloguj" name="zaloguj" />
                    </form>
            </div>
            <?php
                echo getStopka();
            ?>
