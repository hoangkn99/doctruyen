
          
<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <a href="index.html" class="logo pull-left">
            <img src="app\webroot\img\logo1.png" alt="" class="site_logo" />
        </a>
        <nav id="menu" class="pull-right">
        <?php $categoryMenu = $this->requestAction('/categories/menu/');
?>
            <?php if(!empty($categoryMenu)):?>
                <ul>
                    <li><a href="http://localhost:81/doctruyen/">Home</a></li>
                    <?php foreach ($categoryMenu as $key => $value) { ?>
                        <li><?php
                                echo $this->Html->link($value['Category']['name'],
                                array(
                                    'controller' => 'pages',
                                    'action' => 'view_genre',
                                    'id' => $value['Category']['id'],
                                    'slug' => strtolower(Inflector::slug($value['Category']['name']))),
                                    array('class'=> "")
                                    );
                                    ?>
                            <?php echo $this->element('story/submenu',array('id'=>$value['Category']['id']));
                            ?>
                        </li>
                    <?php }?>
                </ul>
            <?php endif;?>
        </nav>
    </div>
</section>