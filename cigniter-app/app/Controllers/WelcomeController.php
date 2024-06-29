<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ImageModel;

class WelcomeController extends BaseController
{
    public function index()
    {
        return view("welcome_message");
    }

    public function contact()
    {
        return view("contact");
    }

    

    public function signup()
    {

        //$users = new UsersModel(); 

        helper(['form']);

        $_SESSION['username']='';

        $err = [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'capchea'  => 'Hope you are not a robot',
        ];
        $errors = 0;

        if(isset($_POST['submit'])) {
            // validare Username
            if (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $_POST['username'])) {
                $err['username'] = "Username lenghts : 5-15 no specials";
                $errors = 1;
            }else{
                $_SESSION['username']=$_POST['username'];
            }
        
            // validare E-mail
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Email-ul nu este valid.";
                $errors = 1;
            }
        
            // Validare parolă
            if (!preg_match("/^[a-zA-Z0-9_]{6,15}$/", $_POST['password'])) {
                $err['password'] = "Parola 6 caractere, fara lucruri speciale";
                $errors = 1;
            }
        
            //verificare capchea
            if ($_POST['captcha']!=$_POST['correctsum']){
                $err['capchea'] = "Suma nu e corecta :( .";
                $errors = 1;
            }
        
            if($errors == 0){
                $_SESSION['username'] = $err['username'];
                $data = [
                    'username' => $_POST['username'],
                ];

               return redirect()->to('/');
            } else {
                return view('signup', $err);
            }
        }

        return view("signup", $err);
    }

    public function login()
    {
            
	    $_SESSION["username"]= "";
	    $_SESSION["password"]= "";
        
	    $_SESSION["AdminUsername"]= "admin";
	    $_SESSION["AdminPassword"]= "admin";
        
	    // VERIFICARE PAGINA ADMIN / USER !!!
        
	    if((isset($_POST["username"])) && (isset($_POST["password"]))){
	    	$username=$_POST["username"];
	    	$password=$_POST["password"];
        
	    	$_SESSION["username"]=$username;
	    	$_SESSION["password"]=$password;

            if((isset($_POST['username'])) && (isset($_POST['password']))){
                if(($_POST['username']==$username) && ($_POST['password']==$password)){
                    if(isset($_POST['remember'])){
                        /* Set cookie to last 1 month */
                        setcookie('username', $_POST['username'], time()+60*60*24);
                        setcookie('password', md5($_POST['password']), time()+60*60*24*30);
                    }else {
                        /* Cookie expires after 1 hour */
                        setcookie('username', $_POST['username'], time() + 60*60);
                        setcookie('password', md5($_POST['password']), time ()+ 60*60);
                    }
                } 
            }
        
	    	if($username == $_SESSION["AdminUsername"] && $password == $_SESSION["AdminPassword"]){
	    		return redirect()->to(base_url('admin'));
	    	} else {
	    		return redirect()->to('/');
	    	}
	    }

        return view("login");
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        setcookie("username","", time() -3600,);
        setcookie("password","", time() -3600,);

        return redirect()->to('/');
    }

    public function admin()
    {   
        $model=new ImageModel();
        $data['images']=$model->findAll();
        return view("admin", $data);
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
        return redirect()->to(base_url('pagina2'));
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
        return redirect()->to(base_url('pagina2'));
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
