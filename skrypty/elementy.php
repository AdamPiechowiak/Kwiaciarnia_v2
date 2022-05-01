<?php
    function getNav($strona)
    {
        $nav = '
        <nav class="navbar navbar-expand-lg navbar-dark bg-green">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Kwiaciarnia internetowa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">';
        if($strona=="sklep")
        {
            $nav.='<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Sklep</a></li>';
        }
        else
        {
            $nav.='<li class="nav-item"><a class="nav-link" href="index.php">Sklep</a></li>';
        }
        if($strona=="oferta")
        {
            $nav.='<li class="nav-item"><a class="nav-link active" aria-current="page" href="oferta.php">Oferta</a></li>';
        }
        else
        {
            $nav.='<li class="nav-item"><a class="nav-link" href="oferta.php">Oferta</a></li>';
        }
        if($strona=="koszyk")
        {
            $nav.='<li class="nav-item"><a class="nav-link active" aria-current="page" href="koszyk.php">Koszyk</a></li>';
        }
        else
        {
            $nav.='<li class="nav-item"><a class="nav-link" href="koszyk.php">Koszyk</a></li>';        
        }
        
        include 'skrypty/connectionData.php';

        $db = new Baza($hostname, $hostlogin, $hostpass, $database);

        $um = new UserManager();
        @session_start();
        $userid = $um->getLoggedInUser($db, session_id());
        if ($userid > 0) 
        {
            $sql = "SELECT email FROM users where id=$userid";

            $result = $db->selectA($sql);
            $row = $result->fetch_object();
            $nav.='<li class="nav-item"><a class="nav-link" href="" >'.$row->email.'</a></li>'; 
            $nav.='<li class="nav-item"><a class="nav-link" href="skrypty/processLogin.php?akcja=wyloguj" >Wyloguj</a></li>';
        } 
        else 
        {
            
            if($strona=="login")
            {
                $nav.='<li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Zaloguj się</a></li>';
            }
            else
            {
                $nav.='<li class="nav-item"><a class="nav-link" href="login.php">Zaloguj się</a></li>';        
            }
            if($strona=="rejestraja")
            {
                $nav.='<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Rejestracja</a></li>';
            }
            else
            {
                $nav.='<li class="nav-item"><a class="nav-link" href="register.php">Rejestracja</a></li>';        
            }
        }
        
  
                    
                   $nav.=' </ul>
                </div>
            </div>
        </nav>';
        return $nav;
    }
    
    function getProduct($product)
    {
        
        $el = '<div class="card h-100">
                        <div class="card-body row">
                            <img class="col-sm-2" style="display: block; height: 200px; width: 200px;" src="'.$product->getZdjecie().'" alt="alt" />
                            <div class="col-sm-8 mt-5"><p class="mt-5">';
        $el .= $product->getNazwa()." ".$product->getCena().' zł/szt <input id="ile'.$product->getId().'" class="w-25" type="number" value="0"> <button id="p'.$product->getId().'" onclick=\'dodaj('.$product->getId().','.$product->getCena().',"'.$product->getNazwa().'")\'>dodaj do koszyka</button></p></div>
                        </div>
                    </div>';
        return $el;
    }
    
    function getStopka()
    {
        
        $s = '<!-- Call to Action-->
            <div class="row  py-4 text-center">
                <iframe class="col-md-8 mb-5" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24381.29373126147!2d22.001240445982585!3d50.03444643008345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spl!4v1625749108818!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    
                <div class="col-md-4 mb-5 text-black-50">
                    <div class="h-100">
                            <h2 class="card-title">Kontakt:</h2>
                            <p class="card-text">Telefon:    +48 11 111 11 11</p>
                            <p class="card-text">E-mail: kwiaciarnia@kwiaty.pl</p>
                            <p class="card-text">Poniedziałek - niedziela: 8:00 - 20:00</p>
                            <p class="card-text">Adres: aleja Henryka Mickiewicza 11<br> 35-001 Rzeszów</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-green">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Kwiaciarnia internetowa</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>';
        return $s;
    }
    
    function getNaglowek()
    {
    $n = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kwiaciarnia internetowa</title>
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
        ';
    
        return $n;
    }
?>