<?php
        include_once 'klasy/Baza.php';
        include_once 'klasy/User.php';
        include_once 'klasy/UserManager.php';
        include_once "skrypty/elementy.php";
?>
<?php
         echo getNaglowek();
    ?>
        </head>
    <body>
        <!-- Responsive navbar-->
        <?php
            echo getNav("sklep");
        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5 " style="min-height: 300px;">
                
                <div class="col-lg-5">
                    <p>Nasza kwiaciarnia internetowa oferuje świeże kwiaty. 
                       Nie ma tu kolejek, co pozwala szybciej zdecydować się na wymarzoną wiązankę. 
                       Wysyłkę kwiatów zawsze realizujemy ekspresowo a zamówiony przez Ciebie bukiet będzie świeży i piękny jeszcze długo po dostarczeniu. 
                       Taka dostawa to również rozwiązanie niezwykle wygodne dla osób zapracowanych i firm. 
                       Umożliwia dostarczenie kwiatów na wskazany adres i o umówionej godzinie.</p>
                </div>
                <div class="col-lg-7">
                    <div id="Karuzela" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#przykladowaKaruzela3" data-slide-to="0" class="active"></li>
                      <li data-target="#przykladowaKaruzela3" data-slide-to="1"></li>
                      <li data-target="#przykladowaKaruzela3" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="img/1.jpg" alt="Pierwszy slajd">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/2.jpg" alt="Drugi slajd">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/3.jpg" alt="Trzeci slajd">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#Karuzela" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#Karuzela" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                  </div>
              </div>
            </div>
            <?php
                echo getStopka();
            ?>
