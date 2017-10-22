$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: 'main.php',
        dataType: 'xml',
        success: function(resp){
            console.log('data seems good',resp);
            //take the table out of the resp object and add it to the DOM
        },
        failure: function(resp){
            console.log('something went wrong retrieving data', resp);
        }
    });
});