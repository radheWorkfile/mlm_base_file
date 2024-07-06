<?php 
  class Custum_lib
  {
     // uploading img start ishu#############################

     function upload_image($path, $name)
     {
         $config['upload_path']          = './uploads/' . $path;
         $config['allowed_types']        = 'jpg|png|jpeg';
         // $config['max_size']             = 100;
         // $config['max_width']            = 1024;
         // $config['max_height']           = 768;
 
         $this->load->library('upload', $config);
 
         if ($this->upload->do_upload($name)) {
             $upload_data =  $this->upload->data();
             $image_path = "uploads/" . $path . '/' . $upload_data['file_name'];
 
 
             $a = array('photo' => $image_path);
             $this->session->set_userdata($a);
 
 
             $val = array('text' => $image_path, 'icon' => 'success');
         } else {
             $val = array('text' => $this->upload->display_errors(), 'icon' => 'error');
         }
 
         return $val;
     }
 
     // uploading img start ishu#############################
  }
?>