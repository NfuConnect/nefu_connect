<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/27
 * Time: 13:13
 */
class Like_model extends CI_Model{

    public function get_message_like($msg_id){
        $sql="select count(*) num from t_like where msg_id=$msg_id";
        return $this->db->query($sql)->result();
    }
    public function get_msgId_by_user($user_id){
        $sql = "select * from t_like WHERE user_id = $user_id";
        return $this -> db -> query($sql) -> result();
    }
    public function get_by_user_msgId($user_id,$msg_id){
        $query=$this->db->get_where('t_like',array(
            "user_id"=>$user_id,
            "msg_id"=>$msg_id
        ));
        return $query->row();
    }
    public function save_like($msg_id,$user_id){
        $this -> db -> insert('t_like',array(
            'msg_id' => $msg_id,
            'user_id' => $user_id
        ));
        return $this -> db -> affected_rows();
    }
    public function delete_like($msg_id,$user_id){
        $this->db->delete('t_like', array(
            'msg_id' => $msg_id,
            'user_id' => $user_id
        ));
        return $this -> db -> affected_rows();
    }


}