<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImageModel;

class ImageController extends BaseController
{
    
    public function index()
    {
        $model=new ImageModel();
        $data['images']=$model->findAll();
        return view('admin',$data);
    }

    public function upload()
    {
        return view('upload');
    }

    public function save()
    {
        $model=new ImageModel();

        $url1=$this->do_upload();
        $url=$stripped=substr($url1, 1);
        $title=$this->request->getPost('title');
        $data=[
            'title'=>$title,
            'image'=>$url,
        ];

        $model->insert($data);
        return redirect()->to(base_url('admin'));
    }

    private function do_upload()
    {
        $type=explode('.',$_FILES["poza"]["name"]);
        $type=$type[count($type)-1];
        $url="./images/".uniqid(rand()).'.'.$type;

        if(in_array($type, array("jpg","jpeg","gif","png")))
            if(is_uploaded_file($_FILES["poza"]["tmp_name"]))
                if(move_uploaded_file($_FILES["poza"]["tmp_name"], $url))
                    return $url;
        return "";

    }

    public function view($id=NULL)
    {
        $model= new ImageModel();
        $data['image']=$model->where('id',$id)->first();
        return view('single_image_view',$data);

    }

    public function delete($id=NULL)
    {
        $model= new ImageModel();
        $data['image']=$model->where('id',$id)->delete();
        return redirect()->to(base_url('admin'));
    }

    public function edit($id=NULL)
    {
        $model= new ImageModel();
        $data['image']=$model->where('id',$id)->first();
        return view('edit_view',$data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model=new ImageModel();

        $url1=$this->do_upload();
        $url=$stipped=substr($url1,1);
        $id=$this->request->getVar('id');
        $data=[
            'title'=>$this->request->getPost('title'),
            'image'=>$url,
        ];
        $save=$model->update($id,$data);
        return redirect()->to(base_url('admin'));
    }
}
