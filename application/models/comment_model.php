<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model{
    public function add_com($content,$msg_id,$user_id){
        $this->db->insert("t_comment",array(
            'content_com'=>$content,
            'com_sender'=>$user_id,
            'msg_id'=>$msg_id
        ));
        return $this->db->affected_rows();
    }
    public function add_com_num($msg_id){
        $sql="update t_message set com_num = (com_num+1) where msg_id=$msg_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_comment_details($msg_id){
        $sql="SELECT com.* ,u.realname,u.portrait FROM t_comment com,t_user u WHERE com.msg_id=$msg_id and com.com_sender=u.user_id";
        return $this->db->query($sql)->result();
    }
}