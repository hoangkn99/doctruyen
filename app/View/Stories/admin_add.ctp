<div id="wrapper">
        <!-- Navigation -->
        <?php echo $this->element('admin/navigate');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Story
                    <button onclick="window.location.href='/admin/stories/list'" style="float: right;" type="button" class="btn btn-primary">List</button>
                    </h1>
                    <?php echo $this->Session->flash();?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Story
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $this->Form->create('Story',array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false),'enctype' => 'multipart/form-data')); ?>
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
                                            <label>Thể loại</label>
                                            <?php echo $this->Form->select('category_id',$result,array('class'=>'form-control','empty'=>array(0=>"")));?>
                                            <?php if(!empty($error['category_id'])):?>
                                            <span style="color:red;"><?php echo $error['category_id'];?></span>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <?php echo $this->Form->input('upload', array('type' => 'file')); ?>
                                            <?php if(!empty($error['upload'])):?>
                                            <span style="color:red;"><?php echo $error['upload'];?></span>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <?php 
                                            echo $this->Form->textarea('description', array('class'=>'form-control','id'=>'description'));
                                            ?>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" onclick="window.location.href='/admin/stories/list'" class="btn btn-info">List</button>
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