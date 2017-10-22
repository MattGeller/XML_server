$(document).ready(function(){
    console.log('document ready');

    $.ajax({
        type: 'GET',
        url: 'main.php',
        dataType: 'xml',
        success: function(resp){
            console.log('data seems good',resp);
            //take the table out of the resp object and add it to the DOM
        },
        error: function(resp){
            console.log('something went wrong retrieving data', resp);
        }
    });

    // $.ajax({
    //     type: 'GET',
    //     url: 'main.php',
    //     dataType: 'json',
    //     success: function(resp){
    //         console.log('data seems good',resp);
    //         //take the table out of the resp object and add it to the DOM
    //     },
    //     error: function(resp){
    //         console.log('something went wrong retrieving data', resp);
    //     }
    // });
});