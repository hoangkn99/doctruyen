<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>About</h4>
						<p>Đồ án môn Kỹ thuật phát triển hệ thống web. Website đọc truyện sử dụng cakephp</p>			
					</div>
				
					<div class="span4">
                    <h4>Menu</h4>

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
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>