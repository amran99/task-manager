<?php
class MY_Controller extends Controller
{
 function __construct()
 {
  parent::Controller();
  if (! $this->session->userdata('logged_in'))
  {
   redirect('login');
  }
 }
}
?>