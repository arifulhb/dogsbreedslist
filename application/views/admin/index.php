<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Dogs breed list</strong></div>
            <div class="panel-body">
            <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr id="dog_row">
                    <th id="_name">Name</th>
                    <th id="_othername">SEO Title</th>
                    <th id="_origin">Origin</th>
                    <th id="_size">Size Type</th>
                    <th id="_breed">Breed Group</th>
                    <th id="_char">Characteristics</th>
                    <th id="_color">Color Group</th>
                    <th id="_action"  class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($dogs_list as $item):
                    ?>
                    <tr id="item_row_id_<?php echo $item['item_sn'];?>">
                        <td><a href="<?php echo base_url().'dog/details/'.$item['slug'];?>" target="_blank"
                               id="item_name_of_<?php echo $item['item_sn'];?>"
                               title="<?php echo  $item['item_info_name'];?>"><?php echo $item['item_info_name'];?></a></td>
                        <td><?php echo $item['item_seo_title'];?></td>
                        <td><?php echo $item['origin'];?></td>
                        <?php /*<td><a href="<?php echo base_url().'admin/category/size-type/'.$item['size_slug'];?>"><?php echo $item['size_type'];?></a></td>*/?>
                        <td><?php echo $item['size_type'];?></td>
                        <td><?php echo $item['breed_group'];?></td>
                        <td><?php echo $item['char_type'];?></td>
                        <td><?php echo $item['color_type'];?></td>
                        <td class="text-center"> 
                            <div class="btn-group btn-group-xs">
                                <a href="<?php echo base_url().'admin/update_dog/'.$item['item_sn'];?>" class="btn btn-xs btn-primary"><i class="icon-pencil"></i> Update</a>
                                <button class="btn btn-xs btn-danger" value="<?php echo $item['item_sn'];?>"><i class="icon-trash"></i> Delete</button>
                                <?php /*                                
                                <a href="<?php echo base_url().'admin/delete_dog/'.$item['item_sn'];?>" class="btn btn-xs btn-danger"><i class="icon-trash"></i> Delete</a> 
                                 */?>
                            </div>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
            
            <!-- Modal -->
            <div class="modal" id="del_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                  </div>
                    <input type="hidden" id="item_sn" value=""/>
                    <input type="hidden" id="item_name" value=""/>
                  <div class="modal-body">
                      <p>Are you sure to delete <strong><span id="get_item_name"></span></strong> ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_item_confirm" value="">Delete</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </div>
            <div id="tbl_msg">
                
            </div>
        </div>
    </div>
</div>
<script>require(['page/admin_index']);</script>