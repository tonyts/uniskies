<?php
/**
 * This is the donate controller
 *
 * @author Tony
 */
class article extends TFController {
    public function index(){
		$view = global_function::viewPage('article');
        $view->addDisplayVar("currentAbout", "current");
        $view->addDisplayVar("category", "About Uniskies");
        $view->addDisplayVar("title", "History of Uniskies");
        $view->addDisplayVar("keywrods", "");
        $view->addDisplayVar("description", "");
        return $view;
    }
}