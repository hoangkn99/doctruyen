<div id="wrapper" class="container">
			<?php echo $this->element('story/menu');?>
	
<section class="main-content">
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Truyện <strong>Mới nhất</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<?php if(!empty($dataStoryNewUpdate)):?>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php if(!empty($dataStoryNewUpdate["item_active"])):?>
							<div class="active item">
								<ul class="thumbnails">
									<?php foreach ($dataStoryNewUpdate["item_active"] as $key => $value) { ?>
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
									<?php }?>
								</ul>
							</div>
							<?php endif;?>
							<?php if(!empty($dataStoryNewUpdate["item"])):?>
							<div class="item">
								<ul class="thumbnails">
								<?php foreach ($dataStoryNewUpdate["item"] as $key => $value) { ?>
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
								<?php }?>
								</ul>
							</div>
							<?php endif;?>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Truyện <strong>Xem nhiều</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<?php if(!empty($dataStoryView)):?>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php if(!empty($dataStoryView["item_active"])):?>
							<div class="active item">
								<ul class="thumbnails">												
									<?php foreach ($dataStoryView["item_active"] as $key => $value) { ?>
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
									<?php }?>
								</ul>
							</div>
							<?php endif;?>
							<?php if(!empty($dataStoryView["item"])):?>
							<div class="item">
								<ul class="thumbnails">
									<?php foreach ($dataStoryView["item"] as $key => $value) { ?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p>
												<a href="product_detail.html">
												<?php
                                            echo $this->Html->image('/img/stories/'.$value['Story']['id'].'.jpg', array('alt'=>$value['Story']['name'],'style'=>"width:100px;height:100px;"));
                                            ?>
												</a>
											</p>
											<a href="product_detail.html" class="title"><?php echo $value["Story"]["name"]?></a><br/>
											<!-- <a href="products.html" class="category">Commodo consequat</a>
											<p class="price">$17.25</p> -->
										</div>
									</li>
								<?php }?>
								</ul>
							</div>
							<?php endif;?>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
			
		</div>				
	</div>
</section>
