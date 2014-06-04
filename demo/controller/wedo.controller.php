<?php
/**
 * This is the donate controller
 *
 * @author Tony
 */
class wedo extends TFController {
    public function index(){
		$view = global_function::viewPage('wedo');
        $view->addDisplayVar("currentWeDo", "current");
        $view->addDisplayVar("title", "What We Do");
        $view->addDisplayVar("keywrods", "");
        $view->addDisplayVar("description", "");
        return $view;
    }
}