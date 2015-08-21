$(document).ready(function() {
 $("#search_input").keyup(function(){
     var search_input = $(this).val();
     var dataString = 'keyword='+ search_input;
     if(search_input.length<=0){
         $("#searchresultdata").remove();
     }else{
         if ( $("#searchresultdata").length ==0 ) {
             $('<div id="searchresultdata" class="srch-results"></div>').appendTo('.srch-content');
         }

        //AJAX POST
        $.ajax({
             type: "POST",
             url: "../InputForm/search.php",
             data: dataString,
             beforeSend: function() {
                $('input#search_input').addClass('loading');
             },
            success: function(response){
                 $('#searchresultdata').html(response).show();
                 if ($('input#search_input').hasClass("loading")) {
                     $("input#search_input").removeClass("loading");
                 }
             }
         });
     }
 });
});