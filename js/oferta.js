$(document).ready(function () {
        
    
        
});
       
function dodaj(id,k,na)
{
        var idp="ile"+id;
        var n=parseInt(document.getElementById(idp).value);
        document.getElementById(idp).value=0;
        if(n>0)
        {
            k*=n;
            var item = {};
            item.id = id; 
            item.ilosc = n;
            item.wartosc = k;
            item.nazwa = na;

            let koszyk = JSON.parse(localStorage.getItem("koszyk"));
            if (koszyk == null) {
              koszyk = [];
            }
            koszyk.push(item);
            localStorage.setItem('koszyk', JSON.stringify(koszyk));
            
        }
}