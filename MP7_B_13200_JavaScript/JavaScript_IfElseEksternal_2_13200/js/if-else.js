var iTotal;
var sKupon;

iTotal = prompt("Masukkan total belanja (dalam ribu rupiah).", 0);
sKupun = prompt("Punya kupon? (Y)a atau (T)idak", "Y");

if (iTotal >= 200){
    if (sKupoon == "Y"){
        alert("Diskon 20% dan gratis ongkin");
    }else{
        alert("Diskon 10% dan gratis ongkir");
    }
}else{
    if(sKupon == "Y"){
        alert("Diskon 10%");
    }else{
        alert("Tidak ada diskon");
    }
}