$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
        .fiind('#modalContent')
        .load($(this).attr('value'));
    });
    });
   