<?php 
class queries extends CI_Model{
   
   public function getpost(){
    $query = $this->db->get('post_table');  // Produces: SELECT * FROM mytable
    if($query->num_rows()>0)
      {
        return $query->result();
      }
    }
    public function addPost($data){
      return $this->db->insert('post_table', $data);
    }  
    public function getSinglePost($id){
      $query = $this->db->get_where('post_table', array('id' => $id));
      if($query->num_rows()>0)
      {
        return $query->row();
      }
    }
    public function updatePost($data,$id){
      return $this->db->where('id',$id)->update('post_table',$data) ;
    }
    public function deletePost($id){
      return $this->db->delete('post_table',['id'=>$id]) ;
    }
}
?>