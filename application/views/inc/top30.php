<h2 class="sec_title">Top 10</h2>
<?php
$image_path=  getImagePath();

foreach ($_top30 as $item) {
    ?>                            
    <div class="dphoto">
        <a href="<?php echo base_url() . 'dog/details/' . $item['slug']; ?>" title="<?php echo $item['name']; ?>">            
            <p><?php echo $item['name']; ?></p>
        </a>
    </div>
    <?php
}//end foreach

?>