<?php
$dataChapter = array();
if(!empty($data["dataChapter"])){
$dataChapter = $data["dataChapter"];
}
?>
<?php echo $this->element('story/menu');?>
<section class="header_text sub">
<!-- <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" > -->
<h4><span>Chi tiết chapter </span></h4>
<h4><span><?php echo $dataChapter["Chapter"]["name"]?> </span></h4>
<h3><span><?php echo $dataStory["Story"]["name"]?></span></h3>
</section>
<section class="main-content">
<div class="row">
<div class="span12">
<div class="span4 text-right">

<?php
$dataChapterPrev = $data['dataNeighbors']['prev'];
if(!empty($dataChapterPrev)){
echo $this->Html->link("Chương trước",
array(
'controller' => 'pages',
'action' => 'detail_chap',
'slug1' => strtolower(Inflector::slug($dataStory['Story']['name'])),
'slug2' => strtolower(Inflector::slug($dataChapterPrev['Chapter']['name'])),
'id' => $dataChapterPrev['Chapter']['id'],
),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));
}
?>
</div>
<div class="span3">
<?php
if(!empty($data["dataListChapter"])):
$dataListChapter = $data["dataListChapter"];
?>
<select class="form-control changechapter">
<?php foreach ($dataListChapter as $key => $value):?>
 
<?php $link = Router::url(
array(
'controller' => 'pages',
'action'=> 'detail_chap',
'slug1' => strtolower(Inflector::slug($dataStory['Story']['name'])),
'slug2' => strtolower(Inflector::slug($value['Chapter'] ['name'])),
'id' => $value['Chapter']['id'],
));
?>
<option <?php echo ($this->request->params['id'] == $value['Chapter']['id']) ? "selected" : ""?> value="<?php echo $link;?>"><?php echo $value['Chapter']['name']?></option>
<?php endforeach;?>
</select>
<?php endif;?>
</div>
<div class="span4">
<?php
$dataChapterNext = $data['dataNeighbors']['next'];
if(!empty($dataChapterNext)){
echo $this->Html->link("Chương sau",
array(
'controller' => 'pages',
'action' => 'detail_chap',
'slug1' => strtolower(Inflector::slug($dataStory['Story']['name'])),
'slug2' => strtolower(Inflector::slug($dataChapterNext['Chapter']['name'])),
'id' => $dataChapterNext['Chapter']['id'],
),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));
}
?>
</div>
</div>
 
</div>

<div class="row" style="text-align: center;">
<div style="margin-top: 10px;" class="span12">
<?php $url = $dataChapter['Chapter']['link_img'];
$url_arr = explode("#", $url);
if(!empty($url_arr)){
foreach($url_arr as $row){
?>
<img src="<?php echo $row?>" alt="" style="max-width: 100%;"/><br />
<?php }
}
?>
</div>
</div>
</section>
<script type="text/javascript">
$(document).on('change', ".changechapter", function() {
window.location.href = $(this).val();
});
</script>