$(document).ready(function(){
    console.log('document ready');

    $.ajax({
        type: 'GET',
        url: 'main.php',
        dataType: 'xml',
        success: function(resp){
            console.log('data seems good', resp);
            //take the table out of the resp object and add it to the DOM

            //put the xml tree into a tempdiv
            var tempDiv = $('<div>').append($(resp).find('table'));

            //make the contents of temp div into a plantext string and then into the target as actual html
            $('#target').html(tempDiv.html());


            // //before an XML document can be accessed, it must be loaded into an XML DOM object
            // const parser = new DOMParser(); //get our parser object ready to use
            // const changedResp = parser.parseFromString(resp, "text/xml"); //resp is now
            // console.log('changed resp:', changedResp);

            // //use jQuery to look through the xml response
            // $(resp).find('entry').each(function(){
            //     document.body.innerHTML += $(this).find('title').text();
            // });

            //actually, just use jQuery to find the table already made for the front end and add it straight to the dom

            // $('document').append(resp);
            // $('#target').html($(resp).find('table'))




            // $('table').addClass('table')

            // document.body.innerHTML += resp.attributes;
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