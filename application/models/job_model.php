<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job_model extends CI_Model{
    public function get_all_count(){
        $sql="SELECT * FROM t_job";
        return $this->db->query($sql)->num_rows();
    }
    public function get_job($limit,$offset){
        $sql="select * from t_job ORDER BY  job_id DESC limit $offset,$limit";
        return $this->db->query($sql)->result();
    }
    public function save_job($job_name,$company_name,$address,$time,$money_start,$money_end,$phone,$description){
        $this->db->insert('t_job',array(
            'job_name'=>$job_name,
            'job_company'=>$company_name,
            'job_address'=>$address,
            'job_time'=>$time,
            'money_start'=>$money_start,
            'money_end'=>$money_end,
            'job_phone'=>$phone,
            'job_description'=>$description
        ));
        return $this->db->affected_rows();
    }
    public function get_job_detail($job_id){
        $sql="SELECT * from t_job where job_id=$job_id ";
        return $this->db->query($sql)->result();
    }
}
