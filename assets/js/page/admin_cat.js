require(['order!jquery','order!apppath','order!json2','order!bootstrap','order!tinymce'], function($,apppath){
        
       tinymce.init({
            selector: "#new_desc,#new_desc_bottom", menubar : false,
            toolbar:"undo redo | bold italic | alignleft aligncenter alignright alignjustify | link",
             plugins:["link anchor searchreplace"]
        });
        
        
    $('#category').click(function(){
        $('#btn_show_cat_list').removeAttr('disabled');
    });

    //CLICK on Category List Button
    $('#btn_show_cat_list').click(function(){
        //alert('show cat list');
        var tbl=$('.admin_update_category #category').val();
        var title=$('.admin_update_category #category option:selected').text();
        //alert('table: '+tbl);
        $('.admin_update_category #table_title').text(title);
        $('.admin_update_category #new_item_name').text(title);
        $('.admin_update_category #current_table').val(tbl);
        var data='table='+tbl;
        
        //alert('app path: '+apppath+'admin/getCategoryTable');
        $.ajax({
                type:"POST",
                data:data,
                url: apppath+'admin/getCategoryTable',
                success:function(mydata){
                    $("#cat_table_body").html("");
                     var item = $.parseJSON(mydata);                                    
                    for (var i=0;i<item.length;i++)
                    {
                        console.log(item[i]);
                        var _sn = item[i].sn;
                        var _name = item[i].name;
                        var _sidebar_name = item[i].name_sidebar;
                        var _seo_title = item[i].seo_title;
                        var _slug = item[i].slug;
                        var _desc = item[i].desc;
                        var _desc_bottom = item[i].desc_bottom;
                        var _order = item[i].order;
                        var _slug = item[i].slug;
                        //console.log('Name: '+_name+' Sidebar Name: '+_sidebar_name+' Slug '+_slug);
                        console.log('desc '+_desc);
                         var row='<tr id="row_id_'+_sn+'">';
                            //row+='<td>'+_sn+'</td>';
                            row+='<input type="hidden" id="desc_'+_sn+'" value=\''+_desc+'\'/>';
                            row+='<input type="hidden" id="desc_bottom_'+_sn+'" value=\''+_desc_bottom+'\'/>';
                            row+='<td id="row_cat_order_'+_sn+'">'+_order+'</td>';
                            row+='<td id="row_cat_name_'+_sn+'">'+_name+'</td>';
                            row+='<td id="row_cat_sidebar_name_'+_sn+'">'+_sidebar_name+'</td>';
                            row+='<td id="row_cat_seo_title_'+_sn+'">'+_seo_title+'</td>';
                            row+='<td id="row_cat_slug_'+_sn+'">'+_slug+'</td>';                            
                            row+='<input type="hidden" id="cat_'+_sn+'" value="'+_sn+'"/>';                            
                            row+='<td><button class="btn btn-primary btn-xs" type="button" value="'+_sn+'"><i class="icon-pencil"></i> Edit</button> ';
                            row+='<button class="btn btn-danger  btn-xs" type="button" value="'+_sn+'"><i class="icon-trash"></i> Remove</button></td>';
                            row+='</tr>';

                        //console.log(row);
                        $('#cat_table_body').append(row);
                        
                    }//end for
                    $('#new_item_form').css('display','block');
                    //alert(mydata);
               },
                error:function(data){alert('Error: '+data);}
        });
        
        $('#new_cat_name').val('');
        $('#new_cat_name_sidebar').val('');
        $('#new_cat_slug').val('');
        $('#new_cat_order').val('');
        $('#new_desc').val('');
        $('#new_desc_bottom').val('');
        $('#new_cat_name').focus();
    });//end function
    
    
    //Edit link click
    $('#cat_table_body').on('click','.btn-primary',function(){
        //alert('order: '+);
        tinyMCE.triggerSave();
        
        //$('cat_desc.tinymce').html('');
            var _sn=$(this).val();
            $('#cat_name').val($('#row_cat_name_'+_sn).text());
            $('#cat_sidebar_name').val($('#row_cat_sidebar_name_'+_sn).text());
            $('#cat_seo_title').val($('#row_cat_seo_title_'+_sn).text());
            $('#cat_slug').val($('#row_cat_slug_'+_sn).text());
                        
            //alert('desc '+$('#desc_'+_sn).val());            
            $('#cat_desc').val($('#desc_'+_sn).val());
            $('#cat_desc_bottom').val($('#desc_bottom_'+_sn).val());
            
            $('#cat_order').val($('#row_cat_order_'+_sn).text());
            $('#cat_sn').val(_sn);
            $('#cat_table').val($('#current_table').val());
            
            
        tinymce.init({
            selector: "#cat_desc,#cat_desc_bottom",menubar : false,
            toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | code",
             plugins:["link anchor code searchreplace"]
        });
            
            $('#myModal').modal('show');
        });
    
    //Update
    $('#save_changes').click(function(){
        
        tinyMCE.triggerSave();
         
        var _table=$('#cat_table').val();
        var _cat_sn=$('#cat_sn').val();
        var _name=$('#cat_name').val();
        var _sidebar_name=$('#cat_sidebar_name').val();
        var _seo_title=$('#cat_seo_title').val();
        var _desc=$('#cat_desc').val();
        var _desc_bottom=$('#cat_desc_bottom').val();
        var _slug=$('#cat_slug').val();
        var _order=$('#cat_order').val();
        
        data='table='+_table+'&_sn='+_cat_sn+'&_name='+_name+'&_sname='+_sidebar_name+'&_slug='+_slug+'&_order='+_order+'&_seo_title='+_seo_title+'&_desc='+_desc+'&_desc_bottom='+_desc_bottom;
        
  //      alert(data);
//        return 0;
         $.ajax({
                type:"POST",
                data:data,
                url: apppath+'admin/update_category_validation',
                success:function(mydata){
                    if(mydata==1){
                        $('#myModal').modal('hide');    
                        $('#row_cat_name_'+_cat_sn).text(_name);
                        $('#row_cat_sidebar_name_'+_cat_sn).text(_sidebar_name);
                        $('#row_cat_seo_title_'+_cat_sn).text(_seo_title);
                        $('#row_cat_order_'+_cat_sn).text(_order);
                        
                        $('#desc_'+_cat_sn).text(_desc);
                        $('#desc_bottom_'+_cat_sn).text(_desc_bottom);
                        
                        $('#row_cat_slug_'+_cat_sn).text(_slug);
                        
                        var msg='<div class="alert alert-success fade in">';
                            msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            msg+='<h4>Update success message</h4>';
                            msg+='<p>Record <strong>"'+_name+'"</strong> was updated successfully</p>';
                            msg+='</div>';
                            
                            $('#tbl_msg').append(msg);                        
                            
                    }//end if mydata=1
                    
                },
                error:function(mydata){
                    alert('Error: '+mydata);
                    
                }
        });
        
    });

    //add new
    $('#btn_add_new').click(function(){
        
         tinyMCE.triggerSave();
         
        var table=$('#current_table').val();
        var _name=$('#new_cat_name').val();
        var _sidebar_name=$('#new_cat_name_sidebar').val();
        var _seo_title=$('#new_cat_seo_title').val();
        var _desc=$('#new_desc').val();
        var _desc_bottom=$('#new_desc_bottom').val();
        var _slug=$('#new_cat_slug').val();
        var _order=$('#new_cat_order').val();
        
        var input='table='+table+'&_name='+_name+'&_sname='+_sidebar_name+'&_slug='+_slug+'&_order='+_order+'&_seo='+_seo_title+'&_desc='+_desc+'&_desc_bottom='+_desc_bottom;
        //alert(input);
        //return 0;
               $.ajax({
                type:"POST",
                data:input,
                url: apppath+'admin/add_category_validation',
                success:function(_new_sn){
                    if($.isNumeric( _new_sn )){
                        $(".alert").alert('close');
                        console.log('success');                                                            
                        var row='<tr>';
                            //row+='<td>new</td>';
                            row+='<td id="row_cat_order_'+_new_sn+'">'+_order+'</td>';
                            row+='<td id="row_cat_name_'+_new_sn+'">'+_name+'</td>';
                            row+='<td id="row_cat_sidebar_name_'+_new_sn+'">'+_sidebar_name+'</td>';
                            row+='<td id="row_cat_seo_title_'+_new_sn+'">'+_seo_title+'</td>';
                            row+='<td id="row_cat_slug_'+_new_sn+'">'+_slug+'</td>';                            
                            row+='<input type="hidden" id="cat_'+_new_sn+'" value="'+_new_sn+'"/>';                            
                            row+='<td><button class="btn btn-primary btn-xs" type="button" value="'+_new_sn+'"><i class="icon-pencil"></i> Edit</button> ';
                            row+='<button class="btn btn-danger btn-xs" type="button" value="'+_new_sn+'"><i class="icon-trash"></i> Remove</button></td>';
                            row+='</tr>';
                       //console.log(row);
                        $('#cat_table_body').append(row);
                                            
                        $('#new_cat_name').val('');
                        $('#new_cat_name_sidebar').val('');
                        $('#new_cat_slug').val('');
                        $('#new_cat_seo_title').val('');
                        $('#new_cat_order').val('');
                        $('#new_cat_name').focus();
                        
                    }else{
                        //ERROR DISCOVERED
                        $("#msg").html("");
                        var error='<div class="alert alert-danger fade in">';
                            error+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            error+='<h4>Error!</h4>';
                            error+='<p>'+_new_sn+'</p>';                            
                            error+='</div>';
                            
                            $('#msg').append(error);
                        console.log(_new_sn);    
                    }
                    
                },
                error:function(mydata){
                    alert('Error: '+mydata);
                    
                }
        });
                
    });//end btn-add-new

    //Remove Model
    $('#cat_table_body').on('click','.btn-danger',function(){
    //alert('order: '+);
        var _sn=$(this).val();
        $('#remove_cat_table').val($('#current_table').val());
        $('#remove_cat_sn').val(_sn);        
        $('#remove_cat_name').val($('#row_cat_name_'+_sn).text());
            
        //alert('sn: '+_sn);
        $('#remove_model').modal('show');
    });
    
    //Remove Item
    $('#delete_item_confirm').click(function(){
        
        var _sn     =$('#remove_cat_sn').val();
        var _name   =$('#remove_cat_name').val();
        var _table  =$('#remove_cat_table').val();
        
        var _data='table='+_table+'&_sn='+_sn;
        
              $.ajax({
                type:"POST",
                data:_data,
                url: apppath+'admin/remove_category_validation',
                success:function(res){
                    $('#row_id_'+_sn).remove();
                    $('#remove_model').modal('hide'); 
                    
                  var msg='<div class="alert alert-danger fade in">';
                    msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    msg+='<h4>Record delete message</h4>';
                    msg+='<p>Record <strong>"'+_name+'"</strong> was deleted successfully</p>';
                    msg+='</div>';

                    $('#tbl_msg').append(msg);
                },
                error:function(error){
                    console.log('error; '+error);
                }
            });//end ajax
            
    });//end remove item

    //Item slug
    $('#new_cat_name').bind("change keypress",function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $('#new_cat_slug').val(Text);
    });
    $('#new_cat_name').bind("focusout",function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $('#new_cat_slug').val(Text);
    });    

});