<?php
class BlogPage extends Page {

    static $allowed_children = ['ArticlePage'];
    static $default_child = 'ArticlePage';

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main','Content');
        return $fields;
    }

}

class BlogPage_Controller extends Page_Controller {

    public function PaginatedArticles()
    {
        $list = ArticlePage::get();
        $pages =  new PaginatedList($list, $this->request);
        $pages->setPageLength(6);
        return $pages;
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main','Content');
        return $fields;
    }
    
}
