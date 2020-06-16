<?php //print_r($data);?>
<div id="resultsDiv">
<?php echo $this->element('story/menu');?>
    <section class="header_text sub">
        <h4><span><?php echo $data["dataGenre"]["Category"]["name"];?></span></h4>
    </section>
    <section class="main-content">
        <div class="row">                       
            <div class="span9">                             
                <ul class="thumbnails listing-products">
                <?php if(!empty($data["dataStory"])):?>
                    <?php
                    // Paginator options
                    $this->Paginator->options(array(
                        "update" => "#resultsDiv",
                        "before" => $this->Js->get("#spinner")->effect("fadeIn", array("buffer" => false)),
                        "complete" => '$("html, body").animate({scrollTop: 0}, "slow");',
                        'evalScripts' => true, 
                        ));
                    ?>
                    <?php foreach($data["dataStory"] as $row => $value) :?>
                        <li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p>
											<?php
                                            $image_name=$this->Html->image('/img/stories/'.$value['Story']['id'].'.jpg', array('alt'=>$value['Story']['name'],'style'=>"width:200px;height:300px;"));
                                            ?>
											<?php
											$img = $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
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
                    <?php endforeach;?>
                <?php endif;?>
                </ul>
                <hr>
                <!-- <div class="pagination pagination-small pagination-centered">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div> -->
                <div class="pagination pagination-small pagination-centered">
                    <div id="spinner" style="display: none;">
                        <?php echo $this->Html->image("loading.gif", array("id" => "busy-indicator")); ?>
                    </div>
                    <?php if($this->Paginator->param('count') > 6):?>
                    <?php
                     $this->Paginator->options(array('url' => array('id'=>$data["dataGenre"]["Category"]["id"],'slug' => strtolower(Inflector::slug($data["dataGenre"]["Category"]["name"])))));
                     ?>
                     <?php echo $this->Paginator->prev("Prev"); ?>
                     <?php echo $this->Paginator->numbers(array("separator"=>" ")); ?>
                     <?php echo $this->Paginator->next("Next"); ?>
                    <?php endif;?>
                    <?php echo $this->Js->writeBuffer();?>
                </div>
            </div>
            
        </div>
    </section>
</div>
