<?php
        include_once 'klasy/Baza.php';
        include_once 'klasy/User.php';
        include_once 'klasy/UserManager.php';
        include_once 'skrypty/connectionData.php';
        include "skrypty/elementy.php";

        $db = new Baza($hostname, $hostlogin, $hostpass, $database);

        $um = new UserManager();
        session_start();
        $userid = $um->getLoggedInUser($db, session_id());
        if ($userid < 0) 
        {
            header("location:login.php");
        }
?>
<?php
         echo getNaglowek();
    ?>
        <script src="js/zamow.js"></script>   
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("brak");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="card row py-4 mt-3" style="min-height: 300px;">
                <form action="skrypty/zamowienieForm.php" method="post">
                    <h2 class="py2">Dane osobowe</h2>
                    
                    <table>
                        <tr><td>Miejscowosc:</td><td><input name="m" id="m" required/></td></tr>
                        <tr><td>Ulica:</td><td><input name="u" id="u" required/></td></tr>
                        <tr><td>Nr domu:</td><td><input name="nr_d" id="nr_d" required/></td></tr>
                        <tr><td>Nr mieszkania:</td><td><input name="nr_m" id="nr_m"/></td></tr>
                        <tr><td>Czas dostawy:</td><td><input type="datetime-local" name="czas" id="czas" required/></td></tr>
                    </table>
                    
                    
                    <h3 class="py-2">Sposób zapłaty</h3>
                    <label><input name="zaplata" type="radio" value="odb" id="odb" required/> zapłata przy odbiorze</label><br>
                    <label><input name="zaplata" type="radio" value="int" id="int" required/> zapłata przez intenet</label>
                    
                    <br><br>
                    koszt całkowity: <span id="koszt"></span>zł
                    <span id="ukryty"></span>
                    <span id="u"></span>
                    <script>
                    var koszyk = JSON.parse(localStorage.getItem('koszyk'));
                    
                    dane="";
                    if (koszyk == null || koszyk.length==0) {
                    }
                    else
                    {
                        var koszt=0;
                        for(var i=0;i<koszyk.length;i++) 
                        { 

                            var id=parseInt(koszyk[i].id);
                            var n=parseInt(koszyk[i].ilosc);
                            var w=parseFloat(koszyk[i].wartosc);
                            var o=koszyk[i].nazwa;
                            dane+=id+","+n+","+w+","+o+":";
                            
                        }
                    }
                    
                    document.getElementById("ukryty").innerHTML='<input type="hidden" id="koszyk" name="koszyk" value="'+dane+'">';
                    </script>
                    
                    <div class="text-center"><input type="submit" value=" Złóż zamówienie " /></div>
                </form>
            </div>
            <?php
                echo getStopka();
            ?>