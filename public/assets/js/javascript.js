//Configurando função de delete com ajax
function confirmDel(id)
{
    //Busca tk essencial do laravel criado lá na view
    let token=document.getElementsByName("_token")[0].value;
    //Busca rota
    let href =document.getElementById("del"+id).value;

    //Confirm, caso sim envia ajax
    if(confirm("Deseja mesmo apagar?")){
        let ajax=new XMLHttpRequest();
        //Define method e passa rota
        ajax.open("DELETE", href);
        //Insere token no header
        ajax.setRequestHeader('X-CSRF-TOKEN',token);
        //Se ok, redireciona pro index
        ajax.onreadystatechange=function(){
            if(ajax.readyState === 4 && ajax.status === 200){
                window.location.href="postos";
            }
        };
        ajax.send();
    }else{
        return false;
    }
}
