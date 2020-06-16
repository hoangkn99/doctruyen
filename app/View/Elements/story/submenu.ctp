<?php $data = $this->requestAction('/categories/submenu/'.$id);?>
<?php if(!empty($data)):?>
<ul>
    <?php foreach ($data as $key => $value) { ?>
     <li><a href="#"><?php echo $value['Category']['name'];?></a>
    </li>
    <?php }?>
</ul>
<?php endif;?>