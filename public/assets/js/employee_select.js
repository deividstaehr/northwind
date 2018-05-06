let regioes = document.getElementById('inpRegiao');

regioes.addEventListener('change', function(){
    $.ajax({
        url: "/northwind/public/territory_all",
        method: "GET",
        data: { codigo: regioes.value }
    }).done(function(teste){
        console.log(teste);
    });
});
