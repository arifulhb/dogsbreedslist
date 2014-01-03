requirejs.config({
    //By default load any module IDs from js/lib
    //baseUrl: 'assets/js',
    paths: {
        'apppath'   :'app/apppath',
        //'cslider'   :'plugin/cslider',
        //'dtpicker'  :'plugin/bootstrap_dtpicker/bootstrap-datepicker',
        'raty'      :'../plugins/raty-2.5.2/jquery.raty',
        'tinymce'    :'../plugins/tinymce_4.0.11_jquery/tinymce.min',
        //'prettify'  :'plugin/bootstrap_wizard_master/prettify',
        //'modernizr' :'plugin/modernizr.custom.28468',
        'order'     :'lib/order',
        'bootstrap' :'../plugins/bootstrap/js/bootstrap.min',
        'json2'     :'lib/json2',
        'jquery-ui' :'lib/jquery-ui.min',
        'jquery'    :'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min'
        //'jquery'    :'lib/jquery'
    },
    shim: {
        "bootstrap": {deps: ["jquery"]},        
        "raty": {deps: ["jquery"]}
        //"wizard": {deps: ["jquery"]},
        //"dtpicker": {deps: ["jquery"]}
    }
});
//console.log('require configured');
//requirejs(["main"]);
require(['order!jquery','order!bootstrap'],function($){
    console.log('LOADED js/app.js with jquery & bootstrap');
     
   
});