<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    public function save($name,$realname,$password,$portrait,$sex,$Ip){
        $this->db->insert("t_user",array(
            "username"=>$name,
            "realname"=>$realname,
            "password"=>$password,
            "portrait"=>$portrait,
            "sex"=>$sex,
            "ip"=>$Ip
        ));
        return $this->db->affected_rows();
    }
    public function get_by_name_pwd($name,$password){
        $query=$this->db->get_where('t_user',array(
            "username"=>$name,
            "password"=>$password
        ));
        return $query->row();
    }
    public function get_by_Id_pwd($user_id,$password){
        $query=$this->db->get_where('t_user',array(
            "user_id"=>$user_id,
            "password"=>$password
        ));
        return $query->row();
    }
    public function get_message_count($user_id){
        $sql="select count(*) num from t_message where user_id=$user_id";
        return $this->db->query($sql)->result();
    }
    public function get_love_count($user_id){
        $sql="SELECT count(*) num FROM t_like WHERE user_id=$user_id";
        return $this->db->query($sql)->result();
    }
    public function update_realname($user_id,$realname){
        $this->db->set('realname',$realname);
        $this->db->where('user_id',$user_id);
        $this->db->update('t_user');
        return $this->db->affected_rows();
    }
    public function update_portrait($photo_url,$user_id){
        $this->db->set('portrait',$photo_url);
        $this->db->where('user_id',$user_id);
        $this->db->update('t_user');
        return $this->db->affected_rows();
    }
    public function new_pass($user_id,$new_pass){
        $this->db->set('password',$new_pass);
        $this->db->where('user_id',$user_id);
        $this->db->update('t_user');
        return $this->db->affected_rows();
    }
    public function get_by_user_id($user_id)
    {
        return $this->db->get_where('t_user', array(
            'user_id' => $user_id
        ))->row();
    }
}