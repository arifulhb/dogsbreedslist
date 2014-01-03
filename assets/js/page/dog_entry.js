require(['order!jquery','order!apppath','order!raty','order!tinymce'], function($,apppath){

    var starOff  = apppath+'assets/plugins/raty-2.5.2/img/star-off.png';
    var starOn   = apppath+'assets/plugins/raty-2.5.2/img/star-on.png';

    
    $('#r_dog_char_1').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_1_val]').val(_score);
    });
    $('#r_dog_char_2').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_2_val]').val(_score);
    });
    $('#r_dog_char_3').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_3_val]').val(_score);
    });
    $('#r_dog_char_4').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_4_val]').val(_score);
    });
    $('#r_dog_char_5').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_5_val]').val(_score);
    });
    $('#r_dog_char_6').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_6_val]').val(_score);
    });
    $('#r_dog_char_7').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_7_val]').val(_score);
    });
    $('#r_dog_char_8').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_8_val]').val(_score);
    });
    $('#r_dog_char_9').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_9_val]').val(_score);
    });
    $('#r_dog_char_10').click(function() {
        var _score = $(this).find('input[name=score]').val();        
        $('input[name=r_dog_char_10_val]').val(_score);
    });
    
    $('.r_dog_char').raty({        
        'score': function() {return $(this).attr('data-score');},
        //click   : function(score,event){$('input[name=voverall]').val(score)},
        starOff:starOff,starOn:starOn});

    $('#txtName').bind("change keypress",function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $('#txt_item_slug').val(Text);
    });
    $('#txt_item_slug').bind("focusout",function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $('#txt_item_slug').val(Text);
    });
    
    
    //$(document).ready(function(){
        tinymce.init({
            selector: "textarea",
            menubar : false,
            toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | code",
             plugins:["link anchor code searchreplace"]
        });
    //});
    
});