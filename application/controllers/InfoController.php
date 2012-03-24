<?php

class InfoController extends Zend_Controller_Action
{
    public function init()
	{
		$this->info = new Model_DbTable_Infopages();
		$this->MdUser = new Model_DbTable_Users();
		$this->user_session = new Zend_Session_Namespace('user_session');
		if($this->user_session->loggedIn == true)
		{
			$this->view->user_session = $this->user_session;
		}	
	}
	public function indexAction()
    {
		$pageContent = $this->info->getPagesContent('1');
		$this->view->content = $pageContent;
    }
	
	/* About Us */
	public function aboutusAction()
    {
		$pageContent = $this->info->getPagesContent('1');
		$this->view->content = $pageContent;
    }
	
	/* How it works */
	public function howitworksAction()
    {
		$pageContent = $this->info->getPagesContent('2');
		$this->view->content = $pageContent;
    }
	
	/* Privacy Polcy */
	public function privacypolicyAction()
    {
		$pageContent = $this->info->getPagesContent('3');
		$this->view->content = $pageContent;
    }
	
	/* Terms & Conditions */
	public function termsAction()
    {
		$pageContent = $this->info->getPagesContent('4');
		$this->view->content = $pageContent;
    }
	
	/* Contact us */
	public function contactusAction()
    {
		$pageContent = $this->info->getPagesContent('5');
		$this->view->content = $pageContent;
    }
	
	/* Affiliate */
	public function affiliatesAction()
    {
		$pageContent = $this->info->getPagesContent('6');
		$this->view->content = $pageContent;
    }
}