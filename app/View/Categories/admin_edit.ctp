<div id="wrapper">
        <!-- Navigation -->
        <?php echo $this->element('admin/navigate');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                    <button onclick="window.location.href='/admin/categories/list'" style="float: right;" type="button" class="btn btn-primary">List</button>
                    </h1>
                    <?php echo $this->Session->flash();?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->Form->create('Category',array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <?php 
                                                echo $this->Form->input('name', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$detail['Category']['name']));
                                            ?>
                                            <?php if(!empty($error['name'])):?>
                                            <span style="color:red;"><?php echo $error['name'];?></span>
                                            <?php endif;?>
                                        </div>

                                        <div class="form-group">
                                            <label>Select menu</label>
                                            <?php echo $this->Form->select('parent_id',$result,array('class'=>'form-control','empty'=>array('0'=>""),'default'=>$detail['Category']['parent_id']));?>  
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <?php 
                                            echo $this->Form->textarea('description', array('class'=>'form-control ckeditor','id'=>'description','value'=>$detail['Category']['description']));
                                            ?>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" onclick="window.location.href='/admin/categories/list'" class="btn btn-info">List</button>
                                    <?php echo $this->Form->end();?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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