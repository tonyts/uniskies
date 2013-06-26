<?php
/**
 * This is the donate controller
 *
 * @author Tony
 */
class donate extends TFController {
    public function index(){
		$view = global_function::viewPage('donate');
        $view->addDisplayVar("currentDonate", "current");
        $view->addDisplayVar("title", "Donate");
        return $view;
    }
}