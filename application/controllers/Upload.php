<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/3
 * Time: 18:04
 */
class Upload extends CI_Controller {
    public function clip(){
        $this->load->view('clip');
    }
    public function upload_portrait(){
        $flag = TRUE;
        $user_id = get_cookie('user_id');
        $username = get_cookie('username');
        $base64_image_content = $this->input->post('str');
        $this->load->model('user_model');
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = "./assets/img/user_portrait/";
            if(!file_exists($new_file))
            {
        //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file = $new_file.$username.".{$type}";
            if(file_exists($new_file)){
                $flag = FALSE;
            }
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                $this->load->model("user_model");
                if($flag){
                    $rows=$this->user_model->update_portrait($new_file,$user_id);
                    if($rows>0){
                        $row = $this -> user_model -> get_by_user_id($user_id);
                        set_cookie("portrait",$row->portrait,86400);
                        echo 'success';
                    }else{
                        echo 'fail';
                    }
                }else{
                    $row = $this -> user_model -> get_by_user_id($user_id);
                    set_cookie("portrait",$row->portrait,86400);
                    echo 'success';
                }
            }else{
                echo 'fail';
            }
        }
    }
}