

<?php 
    if(!empty($data["dataStory"])){
        $data_Story = $data["dataStory"]["Story"];
        $data_Category = $data["dataStory"]["Category"];
        $dataStory=$data["dataStory"];
    }
    $dataChapterEnd = array();
    if(!empty($data["dataChapterEnd"])){
        $dataChapterEnd = $data["dataChapterEnd"]["Chapter"];
    }
    $dataListChapter = array();
    if(!empty($data["dataListChapter"])){
        $dataListChapter = $data["dataListChapter"];
    }
    if(!empty($data["dataStoryCoincident"])){
        $dataStoryCoincident = $data["dataStoryCoincident"];
    }
?>
<?php echo $this->element('story/menu');?>
<section class="header_text sub">
    <!-- <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" > -->
    <h4><span><?php echo $data["dataStory"]["Story"]["name"]?></span></h4>
</section>
<section class="main-content">
    <div class="row">
  
        <div class="span9">
            <div class="row">
                <div class="span4">
            
                <?php
                                            
                                            $image_name=$this->Html->image('/img/stories/'.$data_Story['id'].'.jpg', array('alt'=>$data_Story['name'],'style'=>"width:300px;height:400px;"));
                                            
                                            ?>
                    <?php
                    echo $image_name;
                    ?>
                     
                   
                    <!-- <ul class="thumbnails small">                               
                        <li class="span1">
                            <a href="themes/images/ladies/2.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="themes/images/ladies/2.jpg" alt=""></a>
                        </li>                               
                        <li class="span1">
                            <a href="themes/images/ladies/3.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="themes/images/ladies/3.jpg" alt=""></a>
                        </li>                                                   
                        <li class="span1">
                            <a href="themes/images/ladies/4.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="themes/images/ladies/4.jpg" alt=""></a>
                        </li>
                        <li class="span1">
                            <a href="themes/images/ladies/5.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="themes/images/ladies/5.jpg" alt=""></a>
                        </li>
                    </ul> -->
             
                </div>
           
                <div class="span5">
                    <address>
                        <strong>Thể loại:</strong> <span><?php echo $data_Category["name"]?></span><br>
                        <strong>Số lượt xem:</strong> <span><?php echo $data_Story["view"]?></span><br>
                        <strong>Chap mới nhất:</strong> <span><?php echo !(empty($dataChapterEnd["name"])) ? $dataChapterEnd["name"] : "" ?></span><br>                                
                    </address>                                  
                    <h4><a href="#"><strong>Đọc truyện</strong></a></h4>
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Mô tả </a></li>
                        <li class=""><a href="#profile">Danh sách chapter</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <?php echo $data_Story["description"]?>
                        </div>
                        <div class="tab-pane" id="profile">
                            <div style="" class="col-sm-12 infolinechap">
                                <?php if(!empty($dataListChapter)):?>
                                    <?php foreach ($dataListChapter as $key => $value) { ?>
                                        <div class="col-sm-9">
                                        <?php $link = Router::url(
                                        array(
                                        'controller' => 'pages',
                                        'action'=> 'detail_chap',
                                        'slug1' => strtolower(Inflector::slug($data_Story['name'])),
                                        'slug2' => strtolower(Inflector::slug($value['Chapter'] ['name'])),
                                        'id' => $value['Chapter']['id'],
                                        ));
                                        ?>
                                        <a href="<?php echo $link;?>"><?php echo $value["Chapter"]["name"]?></a>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php echo (!empty($value['Chapter']['created']))? $value['Chapter']['created']:""?>
                                        </div>
                                    <?php }?>
                                <?php endif;?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span9"> 
                    <br>
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><strong>Truyện cùng </strong> Thể Loại</span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
                        </span>
                    </h4>
                    <div id="myCarousel-1" class="carousel slide">
                        <div class="carousel-inner">
                            <?php if(!empty($dataStoryCoincident["item_active"])):?>
                            <div class="active item">
                                <ul class="thumbnails">
                                    <?php foreach ($dataStoryCoincident["item_active"] as $key => $value) { ?>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p>
                                                <?php
                                            $image_name=$this->Html->image('/img/stories/'.$value['Story']['id'].'.jpg', array('alt'=>$value['Story']['name'],'style'=>"width:200px;height:300px;"));
                                            echo $image_name;
                                            ?>
                                            
                                                  
                                                </p>
                                                <?php
                                                    echo $this->Html->link($value['Story']['name'],
                                                        array(
                                                            'controller' => 'pages',
                                                            'action' => 'detail_story',
                                                            'id' => $value['Story']['id'],
                                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                                            array('class'=> "title")
                                                            );
                                                ?>
                                                <br/>
                                            </div>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($dataStoryCoincident["item"])):?>
                            <div class="item">
                                <ul class="thumbnails">
                                <?php foreach ($dataStoryCoincident["item"] as $key => $value) { ?>
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p>
                                                <?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
                                                <?php
                                                $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
                                                echo $this->Html->link($img,
                                                    array(
                                                        'controller' => 'pages',
                                                        'action' => 'detail_story',
                                                        'id' => $value['Story']['id'],
                                                        'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                                        array('class'=> "title", 'escape'=>false)
                                                    );
                                                ?>
                                            </p>
                                                <?php
                                                    echo $this->Html->link($value['Story']['name'],
                                                        array(
                                                            'controller' => 'pages',
                                                            'action' => 'detail_story',
                                                            'id' => $value['Story']['id'],
                                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                                            array('class'=> "title")
                                                            );
                                                ?>
                                                <br/>
                                        </div>
                                    </li>
                                <?php }?>
                                </ul>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
</section>
<script>
    $(function () {
        $('#myTab a:first').tab('show');
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    })
</script>