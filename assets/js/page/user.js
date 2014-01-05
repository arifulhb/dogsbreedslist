require(['order!jquery','order!apppath','order!json2'], function($,apppath){

    $('#btn_add_new').click(function(){
        var name=$('#txtusername').val();
        var email=$('#txtuseremail').val();
        var _data='_name='+name+'&_email='+email;
        $.ajax({
            type:"POST",
            data:_data,
            url: apppath+'user/adduser',
            success:function(res){
                console.log('res: '+res);
                if($.isNumeric(res)){
                    //success add in table
                    var row='<tr id="user'+res+'">';
                        row+='<td class="email">'+email+'</td>';
                        row+='<td class="name">'+name+'</td>';
                        row+='<td><button id="edit'+res+'" value="'+res+'" class="edit btn btn-primary btn-xs"><i class="icon-pencil"></i> Edit</button>';
                        row+='   <button id="delete'+res+'" value="'+res+'" class="delete btn btn-danger btn-xs"><i class="icon-trash"></i> Remove</button></td>';
                        row+='</tr>';
                    $('#user_table').append(row);
                    $('.alert').remove();
                }else if(res=='fail'){
                    concole.log('Dataase insert fail');
                }
                else{
                    $(".alert").css('display','block');
                    var msg='<div class="alert alert-danger fade in">';
                        msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                        msg+='<p><strong>Oh snap! You got an error!</strong></p>';
                        msg+=res;
                        msg+='</div>'                ;
                    $('#error_message').append(msg);
                    //'validation error: '+res;
                }

            },
            error:function(error){
                console.log('error: '+error);
            }
        });
    });
    
      //Edit Model
    $('#user_table').on('click','.edit',function(){
    //alert('order: '+);
        var _sn=$(this).val();        
        $('#edit_user_sn').val(_sn);        
        $('#txtusername_up').val($('#user'+_sn+' .name').text());
        $('#txtuseremail_up').val($('#user'+_sn+' .email').text());
            
        //alert('sn: '+_sn);
        $('#edit_model').modal('show');
    });
    
    //Update User
    $('#btn_update_user').click(function(){
        var _sn=$('#edit_user_sn').val();
        var _name=$('#txtusername_up').val();
        var _email=$('#txtuseremail_up').val();
        var _data='_sn='+_sn+'&_name='+_name+'&_email='+_email;
        $.ajax({
             type:"POST",
            data:_data,
            url: apppath+'user/updateuser',
            success:function(res){
                    if(res=='update'){
                    //success add in table
                    $('#user'+_sn+' .name').text('');
                    $('#user'+_sn+' .name').text(_name);
                    $('#user'+_sn+' .email').text('');                    
                    $('#user'+_sn+' .email').text(_email);                    
                    $('.alert').remove();
                    $('#edit_model').modal('hide'); 
                }else if(res=='fail'){
                    //concole.log('Dataase insert fail');
                    var msg='<div class="alert alert-danger fade in">';
                        msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                        msg+='<p><strong>Oh snap! You got an error!</strong></p>';
                        msg+=res;
                        msg+='</div>'                ;
                    $('#update_msg').append(msg);
                }
                else{
                    //$(".alert").css('display','block');
                    var msg='<div class="alert alert-danger fade in">';
                        msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                        msg+='<p><strong>Oh snap! You got an error!</strong></p>';
                        msg+=res;
                        msg+='</div>'                ;
                    $('#update_msg').append(msg);
                    //'validation error: '+res;
                }
            },
            error:function(error){
                console.log('error: '+error);
            }
        });
    });
    
    
    //Remove Model
    $('#user_table').on('click','.btn-danger',function(){
    //alert('order: '+);
        var _sn=$(this).val();        
        $('#remove_cat_sn').val(_sn);        
        $('#remove_cat_name').val($('#user'+_sn+' .name').text());
        $('#user_name').text($('#user'+_sn+' .name').text());
            
        //alert('sn: '+_sn);
        $('#remove_model').modal('show');
    });
    
    //delete_item_confirm
    $('#delete_item_confirm').click(function(){
        var id=$('#remove_cat_sn').val();
        $.ajax({
            type:"POST",
            data:'_id='+id,
            url: apppath+'user/deleteuser',
            success:function(res){
                if(res==1){
                 $('#user'+id).remove();
                 $('#remove_model').modal('hide'); 
                }                
            },
            error:function(error){
                console.log('error: '+error);
            }
        });
        
    });
});