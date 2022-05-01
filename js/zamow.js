var jest=false;

$(document).ready(function () {
        
    $("#dom").click(function () {
        
        wyswietlKoszt();
        if(jest==false)
        {
            dodaj();
            jest = true;
        }
    });
    
    $("#kw").click(function () {
        
        wyswietlKoszt();
        usun();
        jest=false;
    });
    
    $("#exp").click(function () {
        
        wyswietlKoszt();
    });
    
    wyswietlKoszt();
    
    document.getElementById("odb").checked='';
    document.getElementById("int").checked='';
    
    document.getElementById("kw").checked='';
    document.getElementById("dom").checked='';
    
});

function dodaj()
{
    document.getElementById("adres").innerHTML='<h3 class="py-2">Adres zamieszkania</h3><table><tr><td>Miejscowość:</td><td><input name="miasto" id="miasto" required/></td></tr><tr><td>Ulica:</td><td><input name="ul" id="ul" required/></td></tr><tr><td>Numer budynku:</td><td><input name="nb" id="nb" required/></td></tr><tr><td>Numer mieszkania:</td><td><input name="nm" id="nm" /></td></tr></table><br>';
}

function usun()
{
    document.getElementById("adres").innerHTML='';
}

function wyswietlKoszt()
{
    var koszt=0;
    
    var koszyk = JSON.parse(localStorage.getItem('koszyk'));
    if (koszyk == null) {
        koszyk=[];
    }
    
    for(var i=0;i<koszyk.length;i++) 
    { 
            
            var w=parseFloat(koszyk[i].wartosc);
            koszt+=w;
    }
    
    document.getElementById("koszt").innerHTML=koszt;
    document.getElementById("u").innerHTML='<input type="hidden" id="koszt" name="koszt" value="'+koszt+'">';
}