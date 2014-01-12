<div class="sidebar">   
<div class="ad-panel">
    <p class="aside_title">Sponsored Link</p>
    <?php /*<p class="sponsored-link">Sponsored Link</p> */?>
    <div class="linkunit-16090">
        160x90 link unit
    </div>
</div>
<p class="aside_title">Size</p>
<ul id="menu_size" class="sidebar-list list-unstyled">
<?php

foreach($_tax_size as $item): ?>
    <li><a href="<?php echo base_url().'category/size/'.$item['slug'];?>"><?php echo $item['name_sidebar'];?></a></li>
<?php
endforeach;
?>
</ul>
<p class="aside_title">Breed Group</p>
<ul id="menu_breed" class="sidebar-list list-unstyled">
<?php

foreach($_tax_breed as $item): ?>
    <li><a href="<?php echo base_url().'category/breed_group/'.$item['slug'];?>"><?php echo $item['name_sidebar'];?></a></li>
<?php
endforeach;
?>
</ul>
<p class="aside_title">Characteristics</p>
<ul id="menu_breed" class="sidebar-list list-unstyled">
<?php

foreach($_tax_char as $item): ?>
    <li><a href="<?php echo base_url().'category/characteristics/'.$item['slug'];?>"><?php echo $item['name_sidebar'];?></a></li>
<?php
endforeach;
?>
</ul>
<p class="aside_title">Color</p>
<ul id="menu_breed" class="sidebar-list list-unstyled">
<?php

foreach($_tax_color as $item): ?>
    <li><a href="<?php echo base_url().'category/color/'.$item['slug'];?>"><?php echo $item['name_sidebar'];?></a></li>
<?php
endforeach;
?>
</ul>

</div>