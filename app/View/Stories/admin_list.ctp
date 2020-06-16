<!-- DataTables CSS -->
<?php
    echo $this->Html->css(array(
        '../template_admin/vendor/datatables-plugins/dataTables.bootstrap.css',
        '../template_admin/vendor/datatables-responsive/dataTables.responsive.css',
    ));
?>
<!-- DataTables JavaScript -->
<?php
    echo $this->Html->script(array(
        '../template_admin/vendor/datatables/js/jquery.dataTables.min.js',
        '../template_admin/vendor/datatables-plugins/dataTables.bootstrap.min.js',
        '../template_admin/vendor/datatables-responsive/dataTables.responsive.js',
    ));
?>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
<div id="wrapper">
        <!-- Navigation -->
        <?php echo $this->element('admin/navigate');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Story</h1>
                    <?php echo $this->Session->flash();?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Story
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Thể loại</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $key => $val){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $this->Html->image('/img/stories/'.$val['Story']['id'].'.jpg', array('alt'=>$val['Story']['name'],'style'=>"width:100px;height:100px;"));
                                            ?>
                                        </td>
                                        <td><?php echo $val['Story']['name']?></td>
                                        <td>
                                            <?php echo $val['Category']['name']?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link('Edit',array('controller'=>'stories','action'=>'edit',$val['Story']['id']), array('class' => 'btn btn-warning'));
                                            ?>
                                            <?php echo $this->Html->link('Del',array('controller'=>'stories','action'=>'delete',$val['Story']['id']), array('class' => 'btn btn-danger'));
                                            ?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
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