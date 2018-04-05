$(document).ready(function(){
    $('.btn-delete').on('click', function(){
        let rgxSeparator = /\[-@-\]/g;
        let name = this.id.split(rgxSeparator)[0];
        let id = this.id.split(rgxSeparator)[1];
        let title = document.getElementById('productNameModel');

        title.innerText = name.toUpperCase();

        $('#btn-confirm-delete').on('click', function(){
            console.log('sim');
        });
    });
});