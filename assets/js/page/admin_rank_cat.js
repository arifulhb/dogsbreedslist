require(['order!jquery','order!apppath','order!jquery-ui','order!bootstrap'], function($,apppath){
    
    $('.category_ranking #sub_cat').attr('disabled','disabled');
    $('.category_ranking #breed_name').attr('disabled','disabled');
    $('.category_ranking #addrank').attr('disabled','disabled');
    $('.category_ranking #add_rank').attr('disabled','disabled');
    
    $('#cat_ranking_form #breed_cat').change(function(){
        var _table=$('#breed_cat').val();
        var _sub_cat=$('#breed_cat option:selected').text();
        
        $('.category_ranking #breed_name').attr('disabled','disabled');
        $('.category_ranking #addrank').attr('disabled','disabled');
        $('.category_ranking #add_rank').attr('disabled','disabled');
        if(_table!=null){
            $.ajax({
                type:"POST",
                    data:'_table='+_table,
                    url: apppath+'category/getTableAJAX',
                    success:function(mydata){                    
                       var item = $.parseJSON(mydata);
                       $('#sub_cat').empty();
                       //console.log(mydata);
                          var row='<option disabled="DISABLED" selected="SELECTED">Select a '+_sub_cat+'</option>';
                            //row+=_name+'';
                            $('#sub_cat').append(row);
                        for (var i=0;i<item.length;i++)
                        {
                            var _sn=item[i].sn;
                            var _name=item[i].name;
                            var row='<option value="'+_sn+'">';
                            row+=_name+'</option>';
                            $('#sub_cat').append(row);
                        }//end for
                        $('.category_ranking #sub_cat').removeAttr('disabled');
                    },
                    error:function(error){

                    }
           });//end ajax
        }// !=null
        //$('.category_ranking #sub_cat').removeClass('disabled');
        
    });//end click category
    
    $('#sub_cat').change(function(){
        var _table=$('#breed_cat').val();
        var _cat=$('#sub_cat').val();
                
        if((_table!=null) && (_cat!=null)){            
           //Select box
            $.ajax({
                type:"POST",
                    data:'_table='+_table+'&_sn='+_cat,
                    url: apppath+'dog/getBreedListUnrankedByCategoryAjax',
                    success:function(mydata){                    
                       var item = $.parseJSON(mydata);
                       $('#breed_name').empty();
                       //console.log(mydata);
                       var row='<option disabled="DISABLED" selected="SELECTED">Select A Breed</option>';
                            //row+=_name+'';
                       $('#breed_name').append(row);
                       //console.log('len: '+item.length);
                            
                        for (var i=0;i<item.length;i++)
                        {
                            var _sn=item[i].item_sn;
                            var _name=item[i].item_info_name;
                            var row='<option value="'+_sn+'">';
                            row+=_name+'</option>';
                            $('#breed_name').append(row);
                        }//end for
                        if(item.length>0){
                            $('.category_ranking #breed_name').removeAttr('disabled');
                            $('.category_ranking #addrank').removeAttr('disabled');
                            $('.category_ranking #add_rank').removeAttr('disabled');
                        }else{
                            $('.category_ranking #breed_name').attr('disabled','disabled');
                            $('.category_ranking #addrank').attr('disabled','disabled');
                            $('.category_ranking #add_rank').attr('disabled','disabled');
                        }
                    },
                    error:function(error){

                    }
            });//end ajax
            
            //List table
            $.ajax({
                type:"POST",
                    data:'_table='+_table+'&_sn='+_cat,
                    url: apppath+'dog/getBreedListRankedByCategoryAjax',
                    success:function(mydata){                    
                       var item = $.parseJSON(mydata);
                       
                       //console.log('getBreedListRankedByCategoryAjax LAN: '+item.length);
                       $('#tbl_ranking').empty();
                        for (var i=0;i<item.length;i++)
                        {                                                     
                        var row='<tr class="rank_row_'+item[i].rsn+'">';
                            row+='<td>'+item[i].rank+'</td>';
                            row+='<td class="name_'+item[i].rsn+'">'+item[i].item_info_name+'</td>';
                            row+='<td >'+item[i].origin+'</td>';
                            row+='<td >'+item[i].size_type+'</td>';
                            row+='<td >'+item[i].breed_group+'</td>';
                            row+='<td >'+item[i].char_type+'</td>';
                            row+='<td >'+item[i].color_type+'</td>';
                            row+='<td >'+'<button class="btn btn-xs btn-danger btn_remove" value="'+item[i].rsn+'"><i class="icon-trash"></i> Remove</button>'+'</td>';
                            row+='</tr>';
                            $('#tbl_ranking').append(row);
                                                                        
                        }//end for
                        
                    },
                    error:function(error){

                    }
            });//end ajax
            
        }//end not null
    });//sub_cat change
    
    //Add Category Rank
    $('#add_rank').click(function(){
        
        var _table=$('#breed_cat').val();
        var _sub_cat=$('#sub_cat').val();
        var _breed=$('#breed_name').val();
        var _rank=$('#addrank').val();
        
        var add_data='_table='+_table+'&_sub_cat='+_sub_cat+'&_breed='+_breed+'&_rank='+_rank;
        var _sn     =$('#breed_name').val();
        var _name     =$('#breed_name :selected').text();
        
        
        //add category rank
        $.ajax({
                  type:"POST",
                    data:add_data,
                    url: apppath+'dog/addBreedCategoryRankAjax',
                    success:function(mydata){
                        //console.log(mydata);
                         if($.isNumeric( mydata )){
                        //Added successfully

                            var row='<tr class="rank_row_'+mydata+'_new">';
                                row+='<td>'+_rank+'</td>';
                                row+='<td class="name_'+mydata+'">'+_name+'</td>';
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
                    error:function(mydata){
                
                    }
        });//end ajax
        //alert('table '+_table);
    });
    
    //Show Delete catgory rank model
    $('#tbl_ranking').on('click','.btn_remove',function(){
                
        var _rsn=$(this).val();        
        var _table=$('#breed_cat').val();
        var _cat=$('#sub_cat option:selected').text();       
        var _name =$('.name_'+_rsn).html();
        
        $('#target_sn').val(_rsn);
        $('#target_table').val(_table);
        $('#target_item_name').html(_name);
        $('#target_cat').html(_cat);
        $('#removeRankModal').modal('show');
        
    });
    
   
    //Remove category rank
    $('#confirm_remove_ranking').click(function(){

       var _rsn=$('#target_sn').val();
       var _table=$('#target_table').val();
       $.ajax({
            type:"POST",
                data:'_rsn='+_rsn,
                url: apppath+'dog/removeRankValidation',
                success:function(mydata){                    
                    $('.rank_row_'+_rsn).remove();                    
                },
                error:function(error){
                    alert('Error: '+error);
                }
       });
       //console.log('hide model');
       $('#removeRankModal').modal('hide');

   });//end confirm_remove_ranking click
   
});