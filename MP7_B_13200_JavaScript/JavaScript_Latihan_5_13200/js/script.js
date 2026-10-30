function fn_ValForm(){
    if (document.getElementById("nama").value == ""){
        sMsg += "\n* Anda belum mengisikan nama";
    }
    if (document.getElementById("email").value ==""){
        sMsg += "\n* Anda belum mengisikan email";
    }
    if (document.getElementById("umur").value == ""){
        sMsg += "\n* Anda belum mengisikan umur";
    }

    if (sMsg != ""){
        alert("Peringatan:\n" + sMsg);
        return false;
    }else{
        return true;
    }
}