require(['order!jquery','order!apppath','order!raty'], function($,apppath){

    var starOff  = apppath+'assets/plugins/raty-2.5.2/img/dog1_off.png';
    var starOn   = apppath+'assets/plugins/raty-2.5.2/img/dog1_on.png';
    
        $('.dog_char_item').raty({        
        'score': function() {return $(this).attr('data-score');},
        readOnly:true,starOff:starOff,starOn:starOn
        });
    
});