(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("o que fazemos","software",document.getElementById("o_que_fazemos").value);
        await SendAdmin.sendContent("o projeto","software",document.getElementById("o_projeto").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();