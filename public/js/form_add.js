$(document).ready(function(){
    $("#chicken_wings").prop('disabled', true);
    $('input[type=radio]').click(function(){
        if($(this).prop('id') == "radio_wings"){
            $("#chicken_wings").prop("disabled", false);
            $("#chicken_wings").prop("hidden", false);

            $("#salade_verte").prop("disabled", true);
            $("#salade_verte").prop("hidden", true);
        }else{
            $("#chicken_wings").prop("disabled", true);
            $("#chicken_wings").prop("hidden", true);

            $("#salade_verte").prop("disabled", false);
            $("#salade_verte").prop("hidden", false);
        }

    });
 });
