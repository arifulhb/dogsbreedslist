/* Slider 1 - Parallax slider*/

$(function(){
    //SIGNUP PAGE
//    $('#btn_signup').attr('disabled','DISABLED');
//
//    $('#u_agreement').click(function (){
//        $('#u_3rdparty').attr('checked','CHECKED');
//         if($('#u_agreement').is(':checked')){
//            $("#btn_signup").removeAttr('disabled');
//         }
//         else
//         {
//             $('#btn_signup').attr('disabled','DISABLED');
//         }
//
//    });

    //REVIEW PAGE
//    $('#business_name_search').autocomplete({
//        source :function( request, response ) {
//                $.ajax({
//                  type: "post",
//                  url: "http://homeofgolf/user/searchBusiness",
//                  //dataType: "json",
//                  data: 'keyword='+$("#business_name_search").val(),
//                  success: function(data ) {
//                    //var obj = JSON.parse(data);
//                    response( $.map( JSON.parse(data), function( item ) {
//                      return {label: item.bname,value: item.bname,key  : item.bsn}
//                    }));
//                    },
//                    error: function(){alert('Error while request..');}
//                });
//              },
//        delay: 500,
//        minLength:3,
//        select: function (event,ui)
//        {
//            $('#selected_id').val(ui.item.key);
//            $('#business_name_search').val(ui.item.value);
//            return false;
//        },
//        open:function(event, ui){
//            console.log('menu opened ');
//        },
//        create: function( event, ui ) {
//            console.log('Autocomplete CREATED');
//        },
//        response:function(event, ui){
//            console.log('Autocomplete response');
//        },
//        search:function(event, ui){
//            console.log('Autocomplete search');
//        },
//        close:function(event, ui){
//            console.log('Autocomplete CLOSED');
//        }
//    });
    //Review page
//      $(document).ajaxStart(function(){
//             $("body").css("cursor", "wait");
//            $("#business_name_search").css("cursor", "wait");
//            $('#icon_search').removeClass('icon-search');
//            $('#icon_search').addClass('icon-refresh icon-spin');
//        }).ajaxComplete(function(){
//            $("body").css("cursor", "auto");
//            $("#business_name_search").css("cursor", "auto");
//            $('#icon_search').removeClass('icon-refresh icon-spin');
//            $('#icon_search').addClass('icon-search');
//
//        });


        //SIGNUP PAGE
//        $('#user_type').change(function() {
//        //alert('Handler for .change() called.');
//        //var optionSelected = $("option:selected", this);
//        var valueSelected = this.value;
//        if(valueSelected=='golfer'){
//            $('#u_3rdparty_agreement').html("Do you wish to recieve golfing offers from 3rd parties?");
//        }else{
//            $('#u_3rdparty_agreement').html("Do you wish to receive information on advertising opportunities on this website?");
//        }
//      });

    //Slider of  Home page
    //Slider NOT LOADED
//    var cslider=$('#slider').length;
//    if(cslider>0){
//        //console.log('slider function loaded');
//        $('#slider').cslider({
//                autoplay: true,
//                interval : 9000
//        });
//    }

});


/* Image block effects */
//
//$(function() {
//      $('ul.hover-block li').hover(function(){
//        $(this).find('.hover-content').animate({top:'-3px'},{queue:false,duration:500});
//      }, function(){
//        $(this).find('.hover-content').animate({top:'125px'},{queue:false,duration:500});
//      });
//});

/* Slide up & Down */
//
//$(".dis-nav a").click(function(e){
//	e.preventDefault();
//	var myClass=$(this).attr("id");
//	$(".dis-content ."+myClass).toggle('slow');
//});


/* Image slideshow */
//No Data found
//$('#s1').cycle({
//    fx:    'fade',
//    speed:  2000,
//    timeout: 300,
//    pause: 1
// });

/* Support */

//$("#slist a").click(function(e){
//   e.preventDefault();
//   $(this).next('p').toggle(200);
//});

/* prettyPhoto Gallery */

//PLUGIN NOT LOADED
//jQuery(".prettyphoto").prettyPhoto({
//overlay_gallery: false, social_tools: false
//});


/* Isotype */

// cache container
//var $container = $('#portfolio');
//// initialize isotope
//$container.isotope({
//  // options...
//});

// filter items when filter link is clicked
//$('#filters a').click(function(){
//  var selector = $(this).attr('data-filter');
//  $container.isotope({ filter: selector });
//  return false;
//});