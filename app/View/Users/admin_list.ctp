<?php
echo $this->Html->css(array(
'../template_admin/vendor/datatables-plugins/dataTables.bootstrap.css',
'../template_admin/vendor/datatables-responsive/dataTables.responsive.css',
));
echo $this->Html->script(array(
'../template_admin/vendor/datatables/js/jquery.dataTables.min.js',
'../template_admin/vendor/datatables-plugins/dataTables.bootstrap.min.js',
'../template_admin/vendor/datatables-responsive/dataTables.responsive.js',
));
?>
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
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $key => $val){
?>
<tr>
<td><?php echo $val['User']['id']?></td>
<td><?php echo $val['User']['name']?></td>
<td><?php echo $val['User']['username']?></td>
<td><?php echo $val['User']['email']?></td>
<td>
<?php echo $this->Html->link('Edit',array('controller'=>'users','action'=>'edit',$val['User']['id']), array('class' => 'btn btn-warning'));
?>
<?php echo $this->Html->link('Del',array('controller'=>'users','action'=>'delete',$val['User']['id']), array('class' => 'btn btn-danger'));
?>
</td>
</tr>
<?php }?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>