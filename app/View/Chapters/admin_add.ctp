<div id="wrapper">
        <!-- Navigation -->
        <?php echo $this->element('admin/navigate');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chapter
                    <button onclick="window.location.href='/admin/chapters/list'" style="float: right;" type="button" class="btn btn-primary">List</button>
                    </h1>
                    <?php echo $this->Session->flash();?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Chapter
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $this->Form->create('Chapter',array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false),'enctype' => 'multipart/form-data')); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <?php
                                                echo $this->Form->input('name', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100'));
                                            ?>
                                            <?php if(!empty($error['name'])):?>
                                            <span style="color:red;"><?php echo $error['name'];?></span>
                                            <?php endif;?>
                                        </div>

                                        <div class="form-group">
                                            <label>Chọn truyện</label>
                                            <?php echo $this->Form->select('story_id',$result,array('class'=>'form-control','empty' => false));?>
                                            <?php if(!empty($error['story_id'])):?>
                                            <span style="color:red;"><?php echo $error['story_id'];?></span>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label>Link Img</label>
                                            <?php
                                            echo $this->Form->textarea('link_img', array('class'=>'form-control','id'=>'link_img'));
                                            ?>
                                            <?php if(!empty($error['link_img'])):?>
                                            <span style="color:red;"><?php echo $error['link_img'];?></span>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label>Thứ tự</label>
                                            <?php
                                                echo $this->Form->input('ordering', array('class'=>'form-control'));
                                            ?>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" onclick="window.location.href='/admin/chapters/list'" class="btn btn-info">List</button>
                                    <?php echo $this->Form->end();?>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>