<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/23
 * Time: 16:53
 */
class Message_model extends CI_Model{

    public function get_message($limit, $offset){
        $sql = "select m.*,u.realname,u.sex,u.portrait from t_message m,t_user u where m.user_id = u.user_id order by msg_id DESC limit $offset, $limit ";
        return $this -> db -> query($sql) -> result();
    }

    public function get_message_details($msg_id){
        $sql="select m.*,u.realname,u.sex,u.portrait from t_message m,t_user u where m.msg_id=$msg_id and m.user_id = u.user_id";
        return $this->db->query($sql)->row();
    }

    public function add_like($ids){
        $sql = "update t_message set love_num = (love_num + 1) where msg_id = $ids;";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function reduce_like($ids){
        $sql = "update t_message set love_num = (love_num - 1) where msg_id = $ids;";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function save_message($content,$anonymity,$user_id){
        $this -> db -> insert('t_message',array(
            'content' => $content,
            'user_id' => $user_id,
            'is_anonymity' => $anonymity
        ));
        return $this -> db -> affected_rows();
    }
    public function get_your_msg($user_id){
        $sql="SELECT u.*,msg.*
                FROM t_user u,t_message msg
                WHERE u.user_id=$user_id and msg.user_id=$user_id ORDER BY post_date DESC";
        return $this->db->query($sql)->result();
    }
    public function get_your_love($msg_id){
        $sql="SELECT msg.*,u.* FROM t_like,t_message msg,t_user u WHERE t_like.user_id=$msg_id and msg.msg_id=t_like.msg_id and u.user_id=msg.user_id";
        return $this->db->query($sql)->result();
    }
    public function get_all_count()
    {
        $sql = "select m.*,u.realname,u.sex,u.portrait from t_message m,t_user u where m.user_id = u.user_id order by msg_id DESC ";
        return $this->db->query($sql)->num_rows();
    }
}