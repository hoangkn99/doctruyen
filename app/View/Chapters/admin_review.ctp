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
                            Review Chapter
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(!empty($detail['Chapter']['link_img'])){
                                            $url_arr = explode("#", $detail['Chapter']['link_img']);
                                            if(count($url_arr)>1){
                                                foreach($url_arr as $row){
                                                    ?>
                                                    <img src="<?php echo $row?>" alt="" style="max-width: 100%;"/><br />
                                                <?php }
                                        }
                                    ?>
                                    <?php }?>

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