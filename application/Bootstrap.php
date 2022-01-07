<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');
	}

	/**
	 * _initHelpers
	 *
	 * @desc Sets alternative ways to helpers
	 */
	protected function _initHelpers()
	{
	    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
	    $viewRenderer->initView();
	 
	    // add zend view helper path
	    $viewRenderer->view->addHelperPath('Zend/View/Helper/');
	 
	    // add zend action helper path
	    Zend_Controller_Action_HelperBroker::addPath('Zend/Controller/Helper/');
	}
	
}

