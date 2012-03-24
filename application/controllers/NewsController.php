<?php

class NewsController extends Zend_Controller_Action
{
    public function init()
	{
		$this->news = new Model_DbTable_News();
		$this->MdUser = new Model_DbTable_Users();
		$this->user_session = new Zend_Session_Namespace('user_session');
		if($this->user_session->loggedIn == true)
		{
			$this->view->user_session = $this->user_session;
		}	
	}
	public function indexAction()
    {
		$pageContent = $this->news->getAllNews()->toArray();
		//echo "<pre>";
		//print_r($pageContent);die;
		$this->view->content = $pageContent;
    }
}