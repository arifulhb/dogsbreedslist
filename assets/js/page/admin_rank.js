require(['order!jquery','order!apppath','order!jquery-ui','order!bootstrap'], function($,apppath){

    $('#add_rank').click(function(){

        var _sn     =$('#breed_name').val();
        var _name     =$('#breed_name :selected').text();
        var _rank   =$('#addrank').val();
        //alert(_name);
        //exit();
        var data='breed_sn='+_sn+'&rank='+_rank;
        if(_sn!=null){

            $.ajax({
                type:"POST",
                data:data,
                url: apppath+'admin/addRankValidation',
                success:function(mydata){


                    if($.isNumeric( mydata )){
                        //Added successfully

                        var row='<tr class="rank_row_'+mydata+'_new">';
                            row+='<td>'+_rank+'</td>';
                            row+='<td class="name_'+_sn+'">'+_name+'</td>';
                            row+='<td >'+''+'</td>';
                            row+='<td >'+''+'</td>';
                            row+='<td >'+''+'</td>';
                            row+='<td >'+''+'</td>';
                            row+='<td >'+''+'</td>';
                            row+='<td >'+'<button class="btn btn-xs btn-danger btn_remove" value="'+mydata+'"><i class="icon-trash"></i> Remove</button>'+'</td>';
                            row+='</tr>';
                       //console.log(row);
                        $('#tbl_ranking').append(row);

                        $('#tbl_ranking .rank_row_'+mydata+'_new').effect("highlight");
                        $('#breed_name :selected').remove();
                        
                    }

                },
                error:function(error){
                    alert('Eroor: '+error)
                }
            });

        }else{
            $('#breed_name').focus();
        }

    });//end click

   $('#confirm_remove_ranking').click(function(){

       var _sn=$('#target_sn').val();
       
       $.ajax({
            type:"POST",
                data:'sn='+_sn,
                url: apppath+'dog/removeRankValidation',
                success:function(mydata){                    
                    $('.rank_row_'+_sn).remove();                    
                },
                error:function(error){
            
                }
       });
       //console.log('hide model');
       $('#removeRankModal').modal('hide');

   });
   
   //delete ranking item
    $('.btn_remove').click(function(){
        var _sn=$(this).val();
        
        var _name =$('.name_'+_sn).html();
        $('#target_sn').val(_sn);
        $('#target_item_name').html(_name);
        $('#removeRankModal').modal('show');
        //alert('sn: '+_sn);
    });
});