<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Category wise breed rank</strong></div>
            <div class="panel-body">
                <form id="cat_ranking_form" class="form-inline" role="form" method="post">
                    <div class="form-group col-sm-3">                        
                        <?php
                        $cat=getBreedCategory();
                        ?>
                        
                            <select id="breed_cat" name="breed_cat" class="form-control">
                                <option selected="SELECTED" disabled="DISABLED">Select A Category</option>
                                <?php
                                foreach($cat as $row):?>
                                <option value="<?php echo $row['table'];?>">
                                    <?php echo $row['name'];?>
                                </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>                        
                    </div>
                    <div class="form-group col-sm-3">                        
                        <?php
                        $cat=getBreedCategory();
                        ?>
                        
                            <select id="sub_cat" name="sub_cat" class="form-control" disabled="disabled">
                                <option selected="SELECTED" disabled="DISABLED">Select Sub Category</option>
                                <?php
                                foreach($cat as $row):?>
                                <option value="<?php echo $row['table'];?>">
                                    <?php echo $row['name'];?>
                                </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>                        
                    </div>                    
                  
                    <div class="form-group col-sm-3">
                        
                            <select id="breed_name" name="breed_name" class="form-control"
                                    disabled="disabled">
                                <option selected="SELECTED" disabled="DISABLED">Select A Breed</option>                                
                            </select>                        
                    </div>
                      <div class="form-group col-sm-2">
                        <label class="control-label col-sm-4" for="addrank">Rank</label>
                        <div class="col-sm-8">                    
                        <input type="number" min="0" class="form-control" id="addrank" name="addrank" 
                               placeholder="Rank" disabled="disabled"
                               value="0">
                        </div>
                    </div>
                    <div class="form-group col-sm-1">
                        <button type="button" id="add_rank" disabled="disabled" class="btn btn-info"> Add</button>
                    </div>
                </form>
            </div>
        </div>        
        
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table  class="table table-bordered table-striped table-responsive table-responsive">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Origin</th>
                    <th>Size</th>
                    <th>Breed Group</th>
                    <th>Characteristics</th>
                    <th>Color</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbl_ranking">
                <?php
                if(isset($_rankedBreedList)){
                    foreach($_rankedBreedList as $row):
                        ?>
                      <tr class="rank_row_<?php echo $row['rsn'];?>">
                        <input type="hidden" id="rank_sn_<?php echo $row['rsn'];?>">
                        <td><?php echo $row['rank'];?></td>
                        <td class="name_<?php echo $row['item_sn'];?>"><?php echo $row['item_info_name'];?></td>
                        <td><?php echo $row['origin'];?></td>
                        <td><?php echo $row['size_type'];?></td>
                        <td><?php echo $row['breed_group'];?></td>
                        <td><?php echo $row['char_type'];?></td>
                        <td><?php echo $row['color_type'];?></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger btn_remove" 
                                    value="<?php echo $row['rsn'];?>"><i class="icon-trash"></i> Remove</button>
                        </td>
                    </tr>      
                         <?php
                    endforeach;
                }//end fi
                ?>                
                    
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal" id="removeRankModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Remove Ranking Confirmation</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="target_sn" value="">                  
                  <input type="hidden" id="target_table" value="">  
                  <p>Are you sure to remove <strong><span id="target_item_name"></span></strong> from <strong><span id="target_cat"></span></strong> Category Ranking?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-large" 
                        id="confirm_remove_ranking"><i class="icon-trash"></i> Remove This</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>         
</div>
<script>require(['page/admin_rank_cat']);</script>