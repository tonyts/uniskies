<?php
/**
 * This is the donate controller
 *
 * @author Tony
 */
class member extends TFController {
    public function index(){
		$view = global_function::viewPage('member');
        $view->addDisplayVar("currentMember", "current");
        $view->addDisplayVar("title", "Member Area");
        $view->addDisplayVar("keywrods", "");
        $view->addDisplayVar("description", "");
        return $view;
    }
}