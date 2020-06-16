<?php
class CategoriesController extends AppController
{
    var $layout = 'admin';
    var $uses = array('Category');
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function admin_list(){
        $this->set('title_for_layout', 'Menu');
        //generateTreeList là hàm được CakePHP hổ trợ dùng để lấy ra danh sách, với các tuỳ chọn các bạn xem thêm ở link trong bài 
        $data = $this->Category->generateTreeList(null,null,null, '&nbsp;&nbsp;|&mdash;');
        $this->set('menu', $data);

    }
    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->Category->find('first', array(
                    'conditions'=>array('id = '.$id)
            ));
            if(!empty($data)){
                $this->Category->delete($id);
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
            }else{
                $this->Session->setFlash('Error','default',array('class'=>"alert alert-success"));
            }
            $this->redirect(array('action'=>'list'));
        }
    }
    public function admin_edit($id = null){
        $this->set('title_for_layout', 'Edit Category');
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        $detail = $this->Category->find('first', array(
            'fields' => array('id', 'name','parent_id','description'),
            'conditions'=>array('id = '.$id),
            'recursive'   =>-1
        ));
        $this->set('detail', $detail);
        if($this->request->is('post')){
            $arrParams = $this->data['Category'];
            if($arrParams['name']==null){
                $error['name'] = 'Not null';
            }
            if(empty($error)){
                $now = date('Y:m:d h:i:s');
                $data = array(
                    'Category'=>array(
                        'name'=> $arrParams['name'],
                        'date_updated'=>$now,
                        'parent_id'=>$arrParams['parent_id'],
                        'description'=>$arrParams['description']
                    )
                );
                $this->Category->id = $id;
                $this->Category->save($data);
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect('list');
            }
            
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
    public function admin_add(){
        //Lấy dữ liệu đang có để chọn khi muốn thêm vào menu con
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        //mảng thông báo lỗi (cách này không dùng validate bên model)
        $error = array();
        if($this->request->is('post')){
            $arrParams = $this->data['Category'];//dữ liệu sau khi submit
            if($arrParams['name']==null){
                $error['name'] = 'Not null';//kiểm tra lỗi
            }
            if(empty($error)){
                //Tiến thành thêm dữ liệu  Thông báo thành công và chuyển trang
                $now = date('Y:m:d h:i:s');
                $arrParams['date_created'] = $now;
                $arrParams['date_updated'] = $now;
                $this->Category->save($arrParams);
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect('list');
            }
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
    //Font-end
    public function menu(){
        $result = $this->Category->find('all', array('fields' => array('id', 'name','parent_id'),'conditions'=>array(' parent_id=0'),'order'=>array('id'=>'asc'), 'recursive'=>-1));
        return $result;
    }
    public function submenu($id){
        $arrProducer = $this->Category->find('all', array(
            'fields' => array('id', 'name','parent_id'),
            'conditions' => array('parent_id = '.$id),
            'order'=>array('id'=>'asc'),
            'recursive'   =>-1
        ));
        return $arrProducer;
    }
}