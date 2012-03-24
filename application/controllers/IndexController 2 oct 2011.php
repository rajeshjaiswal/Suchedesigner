<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
		$this->db = Zend_Registry::get('db');
		$this->user_session = new Zend_Session_Namespace('user_session');
		$this->view->user_session = $this->user_session;
    }

    public function indexAction()
    {
		$project = new Model_DbTable_Project();
		
		#Get Job list 
		$paginator = $project->getJob();
		//$paginator = $project->select()->from(array('tbl_job'));
		
		$itemPerPage = $this->_getParam('show',20);
		$page = $this->_getParam('page',10);
		$this->view->page = $page;
		$this->view->rowsPerPage = $itemPerPage;
		#$paginator = Zend_Paginator::factory($result);
		$paginator->setCurrentPageNumber($page);
		$paginator->setItemCountPerPage($itemPerPage);			
		$this->view->projectList = $paginator;
		
		
		#Job Budget object
		$budget = new Model_DbTable_Jobbudget();
		$this->view->budget = $budget;
		
		#Job Bid count
		$bid = new Model_DbTable_Bid();
		$this->view->bid_obj = $bid;
		
		#category Object
		$category = new Model_DbTable_Category();
		$this->view->category = $category;
		
		
    }
	
}