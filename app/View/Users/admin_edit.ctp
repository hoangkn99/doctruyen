<div id="wrapper">
        <!-- Navigation -->
        <?php echo $this->element('admin/navigate');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users
                    <button onclick="window.location.href='/admin/users/index'" style="float: right;" type="button" class="btn btn-primary">Danh sách</button>
                    </h1>
                    <?php echo $this->Session->flash();?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit user
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <?php echo $this->Form->input('username', array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <?php echo $this->Form->input('email', array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Full name</label>
                                            <?php echo $this->Form->input('name', array('class'=>'form-control')); ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Save</button>
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