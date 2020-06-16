<?php


class ChaptersController extends AppController
{
    var $layout = 'admin';
    var $uses = array('Story', 'Chapter');
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function admin_list(){
        $this->set('title_for_layout', 'Chapter');
        $data = $this->Chapter->find('all', array(
            'conditions'=>array('Chapter.status'=>1),
            'order'       =>array('Chapter.created'=>'desc','Chapter.name'=>'asc'),
            'recursive'   => 0
        ));
        $this->set('data', $data);
    }
    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->Chapter->find('first', array(
                'conditions'=>array('id = '.$id),
                'recursive'   =>-1
            ));
            if(!empty($data)){
                $this->Chapter->delete($id);
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
            }else{
                $this->Session->setFlash('Error','default',array('class'=>"alert alert-success"));
            }
            $this->redirect('list');
        }
    }
    public function admin_edit($id = null){
        $this->set('title_for_layout', 'Edit Chapter');
        ///Lấy dữ liệu truyện đang có để chọn
        $result = $this->Story->find(
            'all', array(
            'conditions'=>array('status'=>1),
            'order'       =>array('created'=>'desc','name'=>'asc'),
            'recursive'   => -1
        ));
        //đưa dữ liệu truyện vào mảng để hiển thị select ngoài view
        $arr = array("0"=>"Vui lòng chọn");
        foreach($result as $row){
            $arr[$row['Story']['id']] = $row['Story']['name']; 
        }
        $this->set("result", $arr);
        //mảng thông báo 
        $error = array();
        $detail = $this->Chapter->find('first', array(
            'fields' => array('id', 'name','link_img', 'story_id','ordering'),
            'conditions'=>array('id = '.$id),
            'recursive'   =>-1
        ));
        $this->set('detail', $detail);
        if($this->request->is('post')){
            $arrParams = $this->data['Chapter'];
            if($arrParams['name']==null){
                $error['name'] = 'Tên chap không thể rỗng';
            }
            if(empty($arrParams['story_id'])) $error['story_id'] = 'Vui lòng chọn truyện';
            if(empty($arrParams['link_img'])) $error['link_img'] = 'Vui lòng điền link ảnh trong chap';
            if(!empty($arrParams['ordering'])){
                if(!is_numeric($arrParams['ordering'])){
                    $error['ordering'] = 'Vui lòng điền số thứ tự';
                }
            }
            if(empty($error)){
                $now = date('Y:m:d h:i:s');
                $data = array(
                    'Chapter'=>array(
                        'name'=> $arrParams['name'],
                        'created'=>$now,
                        'story_id'=>$arrParams['story_id'],
                        'link_img'=>$arrParams['link_img'],
                        'ordering'=>$arrParams['ordering'],
                    )
                );
                $this->Chapter->id = $id;
                if($this->Chapter->save($data)){
                    $dataStory = array(
                        'Story' => array(
                            'id'    => $arrParams['story_id'],
                            'updated'   => $now
                        )
                    );
                    $this->Story->save($dataStory);
                    $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                    $this->redirect('list');
                }
            }
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
    public function admin_review($id = null){
        $this->set('title_for_layout', 'Review');
        $detail = $this->Chapter->find('first', array(
            'fields' => array('id', 'name','link_img', 'story_id','ordering'),
            'conditions'=>array('id = '.$id),
            'recursive'   =>-1
        ));
        $this->set('detail', $detail);
    }
    public function admin_add(){
        //Lấy dữ liệu truyện đang có để chọn
        $result = $this->Story->find(
            'all', array(
            'conditions'=>array('status'=>1),
            'order'       =>array('created'=>'desc','name'=>'asc'),
            'recursive'   => -1
        ));
        //đưa dữ liệu truyện vào mảng để hiển thị select ngoài view
        $arr = array("0"=>"Vui lòng chọn");
        foreach($result as $row){
            $arr[$row['Story']['id']] = $row['Story']['name']; 
        }
        $this->set("result", $arr);

        //mảng thông báo lỗi (cách này không dùng validate bên model)
        $error = array();
        if($this->request->is('post')){
            $arrParams = $this->data['Chapter'];//dữ liệu sau khi submit
            //kiểm tra lỗi
            if($arrParams['name']==null){
                $error['name'] = 'Tên chap không thể rỗng';
            }
            if(empty($arrParams['story_id'])) $error['story_id'] = 'Vui lòng chọn truyện';
            if(empty($arrParams['link_img'])) $error['link_img'] = 'Vui lòng điền link ảnh trong chap';
            if(!empty($arrParams['ordering'])){
                if(!is_numeric($arrParams['ordering'])){
                    $error['ordering'] = 'Vui lòng điền số thứ tự';
                }
            }
            if(empty($error)){
                //Tiến thành thêm dữ liệu  Thông báo thành công và chuyển trang
                $now = date('Y:m:d h:i:s');
                $arrParams['created'] = $now;
                if($this->Chapter->save($arrParams)){
                    $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                    $this->redirect('list');
                }
            }
            $this->set("error", $error);//gửi thông báo lỗi qua view
        }
    }
}