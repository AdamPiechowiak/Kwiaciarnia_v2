$(document).ready(function () {
    
    wyswietl();
        
});
       
function usun(id)
{
    var koszyk = JSON.parse(localStorage.getItem('koszyk'));
    if (koszyk == null) {
        koszyk = [];
    }
        
    koszyk.splice(id,1);
        
    localStorage.setItem('koszyk', JSON.stringify(koszyk));
        
    wyswietl();
}

function wyswietl()
{
    var dane="";
    var koszyk = JSON.parse(localStorage.getItem('koszyk'));
    dane+='<div class="lg-4 my-4 " style="min-height: 300px;">';
    if (koszyk == null || koszyk.length==0) {
        dane+='<h1 class="text-center">koszyk jest pusty</h1>';
    }
    else
    {
        var koszt=0;
        for(var i=0;i<koszyk.length;i++) 
        { 
            
            var id=parseInt(koszyk[i].id)+3;
            var n=parseInt(koszyk[i].ilosc);
            var w=parseFloat(koszyk[i].wartosc);
            var o=koszyk[i].nazwa;
            koszt+=w;
            dane+='<div class="card h-100"><div class="card-body row"><img class="col-sm-2" style=" height: 100px; width: 100px;" src="img/';
            dane+=id;
            dane+='.jpg" alt="alt" /><div class="col-sm-8 mt-5"><p class="mt-3">';
            dane+=o;
            dane+='  ilość:  ';
            dane+=n;
            dane+=' koszt: ';
            dane+=w;
            dane+='zł <button onclick="usun(';
            dane+=i;
            dane+=')">usun</button></p></div></div></div>';
        }
            dane+='<div class="sm-3 py-4">Koszt całkowity : '+koszt+'zł</div>';
            dane+='<div class="sm-3 py-4 text-center"><a href="zamow.php" id="zamow" class="bg-green px-3 py-3">Zamów teraz</a></div>';
    }
    dane+='</div>';
    document.getElementById("wyswietl").innerHTML=dane;
}