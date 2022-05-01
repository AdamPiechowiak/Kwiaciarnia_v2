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
            echo getNav("rejestraja");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 my-5 " style="min-height: 300px;">
                
                <h3>Formularz rejestracji</h3>
                <p>
                    <form action="" method="post">       
                        Imie: <br/><input name="first_name" required=""/><br/> 
                        Nazwisko: <br/><input name="last_name" required=""/><br/> 
                        email: <br/><input name="email" type="email" required=""/><br/> 
                        hasło: <br/><input name="password" type="password" required=""/><br/> 
                        tel: <br/><input name="tel_nr" pattern="\d{8}\d+" required=""/><br/> 
                    <input type="submit" value="Zapisz" name="submit"/>
                  </form>
                </p>  
                
                <?php    
                    include_once('klasy/User.php');    
                    include_once('klasy/RegistrationForm.php'); 
                    include_once('klasy/Baza.php');
                    include('skrypty/connectionData.php');

                    $db = new Baza($hostname, $hostlogin, $hostpass, $database);
                    $rf = new RegistrationForm();  //wyświetla formularz rejestracji 
                    if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) 
                    { 
                        $user = $rf->checkUser(); //sprawdza poprawność danych 
                        if ($user === NULL)           
                            echo "<p>Niepoprawne dane rejestracji.</p>";        
                        else
                        {            
                            echo "<p>Zarejestrowany</p>";  
                            echo "<br>";
                            $user->save($db);
                        }    
                    }
                ?>
            </div>
            <?php
                echo getStopka();
            ?>
