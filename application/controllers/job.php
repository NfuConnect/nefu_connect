<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//时间友好转换开始
header("Content-type: text/html; charset=utf8");
date_default_timezone_set("Asia/Shanghai");   //设置时区
function time_tran($the_time) {
    $now_time = date("Y-m-d H:i:s", time());
    $now_time = strtotime($now_time);
    $show_time = strtotime($the_time);
    $dur = $now_time - $show_time;
    if ($dur < 0) {
        return $the_time;
    } else {
        if ($dur < 60) {
            return $dur . '秒前';
        } else {
            if ($dur < 3600) {
                return floor($dur / 60) . '分钟前';
            } else {
                if ($dur < 86400) {
                    return floor($dur / 3600) . '小时前';
                } else {
                    if ($dur < 259200) {//3天内
                        return floor($dur / 86400) . '天前';
                    } else {
                        return $the_time;
                    }
                }
            }
        }
    }
}
//时间友好转换结束
class Job extends CI_Controller {
    public function load_job(){
        $this->load->view('job');
    }
    public function get_job(){
        $user_id = get_cookie('user_id');
        $this->load->model('job_model');
        $page=$this->input->get('page');
        $per_page=10;
        $total_records=$this->job_model->get_all_count();
        $total_page=ceil($total_records/$per_page);
        $job=$this->job_model->get_job($per_page,($page-1)*$per_page);
        foreach($job as $jobs){
            $jobs->post_date=time_tran($jobs->post_date);
        }
        if($page==$total_page){
            $data=array(
                'job'=>$job,
                'isEnd'=>true
            );
        }else{
            $data=array(
                'job'=>$job,
                'isEnd'=>false
            );
        }
        echo json_encode($data);
    }
    public function publish_job(){
        $this->load->view('publish_job');
    }
    public function add_job(){
        $job_name=$this->input->post('job_name');
        $company_name=$this->input->post('company_name');
        $job_address=$this->input->post('job_address');
        $job_time=$this->input->post('job_time');
        $money_start=$this->input->post('money_start');
        $money_end=$this->input->post('money_end');
        $phone=$this->input->post('phone');
        $description=$this->input->post('description');
        $this->load->model('job_model');
        $jobs=$this->job_model->save_job($job_name,$company_name,$job_address,$job_time,$money_start,$money_end,$phone,$description);
        if($jobs>0){
            echo '<script>alert("发布成功!");top.location=\'load_job\';</script>';
        }else{
            echo '<script>alert("发布失败!");top.location=\'publish_job\';</script>';
        }
    }
    public function job_details(){
        $job_id=$this->input->get('job_id');
        $this->load->model('job_model');
        $jobs=$this->job_model->get_job_detail($job_id);
        $this->load->view('job_detail',array(
            "jobs"=>$jobs
        ));
    }
}
