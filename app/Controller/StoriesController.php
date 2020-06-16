<?php
class StoriesController extends AppController
{
    var $layout = 'admin';
    var $uses = array('Category','Story');
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function admin_list(){
        $this->set('title_for_layout', 'Story');
        $data = $this->Story->find('all', array(
            'conditions'=>array('status'=>1),
            'order'       =>array('updated'=>'desc','Story.name'=>'asc'),
            'recursive'   => 0
        ));
        $this->set('data', $data);
    }
    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->Story->find('first', array(
                'conditions'=>array('id = '.$id),
                'recursive'   =>-1
            ));
            if(!empty($data)){
                $this->Story->delete($id);
                @unlink(WWW_ROOT.'img'.DS.'stories'.DS.$id.'.jpg');
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
            }else{
                $this->Session->setFlash('Error','default',array('class'=>"alert alert-success"));
            }
            $this->redirect('list');
        }
    }
    public function admin_edit($id = null){
        $this->set('title_for_layout', 'Edit Story');
        //Lấy dữ liệu thể loại truyện đang có để chọn
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        $error = array();
        $detail = $this->Story->find('first', array(
            'fields' => array('id', 'name','description', 'category_id'),
            'conditions'=>array('id = '.$id),
            'recursive'   =>-1
        ));
        $this->set('detail', $detail);
        if($this->request->is('post')){
            $arrParams = $this->data['Story'];
            if($arrParams['name']==null){
                $error['name'] = 'Not null';
            }
            if(empty($arrParams['category_id'])) $error['category_id'] = 'Vui lòng chọn thể loại truyện';
            if(!empty($this->data['Story']['upload']['name'])){
                 $file = $this->data['Story']['upload'];
                 $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //lấy phần mở rộng của file
                 $arr_ext = array('jpg', 'jpeg', 'gif'); //mảng các loại file được upload
                 //chỉ những file thuộc mảng trên mới có quyền upload, còn lại sẽ thông báo
                 if(in_array($ext, $arr_ext)){
                    $fla = 1;
                 }else{
                    $error['upload'] = 'Hình ảnh chỉ có thể có định dạng là jpg, jpeg, gif';
                 }
            }
            if(empty($error)){
                $now = date('Y:m:d h:i:s');
                $data = array(
                    'Story'=>array(
                        'name'=> $arrParams['name'],
                        'updated'=>$now,
                        'category_id'=>$arrParams['category_id'],
                        'description'=>$arrParams['description']
                    )
                );
                $this->Story->id = $id;
                if($this->Story->save($data)){
                    //Upload hình ảnh
                    if(!empty($fla)){
                        $file_name = $this->Story->id.'.jpg';
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/stories/' . $file_name);
                    }
                }
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect('list');
            }
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
    public function admin_add(){
        //Lấy dữ liệu thể loại truyện đang có để chọn
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        //mảng thông báo lỗi (cách này không dùng validate bên model)
        $error = array();
        if($this->request->is('post')){
            $arrParams = $this->data['Story'];//dữ liệu sau khi submit
            //kiểm tra lỗi
            if($arrParams['name']==null){
                $error['name'] = 'Tên truyện không thể rỗng';
            }
            if(empty($arrParams['category_id'])) $error['category_id'] = 'Vui lòng chọn thể loại truyện';
            //Kiểm tra có thực hiện upload hình đại diện hay không
            //Ở đây mình chỉ thực hiện đơn giản là upload hình ảnh không kiểm tra nhiu
            //Phần này mình sẽ có 1 bài riêng để upload file trong CakePHP
            if(!empty($this->data['Story']['upload']['name'])){
                 $file = $this->data['Story']['upload'];
                 $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //lấy phần mở rộng của file
                 $arr_ext = array('jpg', 'jpeg', 'gif'); //mảng các loại file được upload
                 //chỉ những file thuộc mảng trên mới có quyền upload, còn lại sẽ thông báo
                 if(in_array($ext, $arr_ext)){
                    $fla = 1;// biến xác định có tồn tại upload file
                 }else{
                    $error['upload'] = 'Hình ảnh chỉ có thể có định dạng là jpg, jpeg, gif';
                 }
             }
            if(empty($error)){
                //Tiến thành thêm dữ liệu  Thông báo thành công và chuyển trang
                $now = date('Y:m:d h:i:s');
                $arrParams['created'] = $now;
                $arrParams['updated'] = $now;
                if($this->Story->save($arrParams)){
                    //Upload hình ảnh
                    if(!empty($fla)){
                        //Vì không lưu tên ảnh vào CSDL nên khi muốn lấy ra cần 1 chuẩn đó là chỉ một loại ảnh duy nhất(phần mở rộng) chỉ khác ở phần tên ảnh thui, ở đây mình chọn loại (.jpg)
                        $file_name = $this->Story->id.'.jpg';//đặt tên lại là id của dữ liệu vừa thêm vào
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/stories/' . $file_name);
                    }
                }
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect('list');
            }
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
}