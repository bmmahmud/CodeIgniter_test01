<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function index(){
	$this->load->model('queries');
	$post = $this->queries->getpost();
	
	$this->load->view('welcome_message',['post'=>$post]);
	
}
public function creat(){
	$this->load->view('creat');
}
public function update($id){
	$this->load->model('queries');
	$post = $this->queries->getSinglePost($id);
	
	$this->load->view('update',['post'=>$post]);
}
public function save()
{
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');

	if ($this->form_validation->run() )
	{
			$data= $this->input->post();
			unset($data['submit']);
			
			$today = date('Y-m_d');
			$data['date_created']=$today;

			$this->load->model('queries');
		    if($this->queries->addPost($data)){
			   $this->session->set_flashdata("msg",'Post Save Successfully');
		    }	
			else{
				$this->session->set_flashdata("msg",'Failed to Save Post');
		 	}
		return redirect('welcome');
	}
	else
	{
		$this->load->view('creat');
	}
}

public function change($id){
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');

	if ($this->form_validation->run() )
	{
			$data= $this->input->post();
			unset($data['submit']);
			
			$today = date('Y-m_d');
			$data['date_created']=$today;

			$this->load->model('queries');
		    if($this->queries->updatePost($data,$id)){
			   $this->session->set_flashdata("msg",'Post Update Successfully');
		    }	
			else{
				$this->session->set_flashdata("msg",'Failed to Update Post');
		 	}
		return redirect('welcome');
	}
	else
	{
		$this->load->view('creat');
	}

}

public function delete($id){
	$this->load->model('queries');
	if ($this->queries->deletePost($id)){
	$this->session->set_flashdata("msg",'Post Deleted Successfully');
	}
	else{
		$this->session->set_flashdata("msg",'Failed to Deleted Post');
	}
	return redirect('welcome');	    
}

}
