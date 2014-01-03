require(['order!jquery','order!apppath','order!bootstrap'], function($,apppath){

    $('.admin_home tr td .btn-danger').click(function(){
            var _sn=$(this).val();
            $('#del_item_modal #item_name').val($('#item_name_of_'+_sn).text());
            $('#del_item_modal #item_sn').val(_sn);
            $('#delete_item_confirm').val(_sn);
            $('#get_item_name').text($('#item_name_of_'+_sn).text());
            $('#del_item_modal').modal('show');
    });

    //DLETE ITEM
    $('#delete_item_confirm').click(function(){
        var _sn     =$(this).val();
        var _name   =$('#item_name').val();
        //alert(_sn);
        var _data ='sn='+_sn;
              $.ajax({
                    type:"POST",
                    data:_data,
                    url: apppath+'dog/deletItem',
                    success:function(res){
                        
                        $('#item_row_id_'+_sn).remove();
                        $('#del_item_modal').modal('hide'); 
                    
                    var msg='<div class="alert alert-danger fade in">';
                      msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      msg+='<h4>Record delete message</h4>';
                      msg+='<p>Record <strong>"'+_name+'"</strong> was deleted successfully</p>';
                      msg+='</div>';

                      $('#tbl_msg').append(msg);
                        
                    },
                    error:function(error){
                        alert('Error :'+error);
                    }
                });
    });//end del item
});