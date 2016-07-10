<?php
class HomePage extends Page {

}
class HomePageController extends Page_Controller {
    private static $allowed_actions = array (
	);

    public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

    public function featurePosts() {
        $blog_page = ArticlePage::get()->first();
        
        $latest_posts[] = $blog_page;
        return $latest_posts;
    }
}
