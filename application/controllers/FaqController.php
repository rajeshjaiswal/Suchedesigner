<?php

class FaqController extends Zend_Controller_Action
{
    public function init()
	{
		$this->faq = new Model_DbTable_Faq();
		$this->faqcategory = new Model_DbTable_Faqcategory();
		$this->MdUser = new Model_DbTable_Users();
		$this->user_session = new Zend_Session_Namespace('user_session');
		if($this->user_session->loggedIn == true)
		{
			$this->view->user_session = $this->user_session;
		}	
	}
	public function indexAction()
    {
		$allFaqCategory = $this->faqcategory->getAllFaqcategory();
		$data_array = array();
		foreach($allFaqCategory as $cat)
		{
			$faq_data = $this->faq->getFaqByCatId($cat['id']);
			$faq_data_array = array();
			foreach($faq_data as $faqData)
			{
				$faq_data_array['id'] =  $faqData['id'];
			 	$faq_data_array['faq_que'] =  $faqData['faq_que'];
				$faq_data_array['faq_ans'] =  $faqData['faq_ans'];
				$data_array[$cat['faq_category']][] = $faq_data_array;
			}
		}
		#echo "<pre>";print_r($data_array);
		$this->view->allFaqContent = $data_array;
		
    }
}