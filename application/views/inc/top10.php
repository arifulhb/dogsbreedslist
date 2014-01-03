<h2 class="sec_title">Top 10</h2>
<?php
$image_path=  getImagePath();

foreach ($_top10 as $item) {
    ?>                            
    <div class="dphoto">
        <a href="<?php echo base_url() . 'dog/details/' . $item['slug']; ?>" title="<?php echo $item['item_info_name']; ?>">
            <img class="img-rounde img-thumbnail"
                 src="<?php echo $image_path . $item['photo1']; ?>" 
                 alt="<?php echo $item['item_info_name']; ?>"/>
            <p><?php echo $item['item_info_name']; ?></p>
        </a>
    </div>
    <?php
}//end foreach

?>