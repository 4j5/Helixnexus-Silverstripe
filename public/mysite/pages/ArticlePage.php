<?php
class ArticlePage extends Page {

    static $allowed_children = "none";
    static $default_parent = "BlogPage";
    static $can_be_root = false;

    private static $db =
    [
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText'
    ];

    private static $has_one =
    [
        'SummaryImage' => 'Image'
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', $BlogImage = new UploadField('SummaryImage'));
        $folderName = 'BlogImages/' . $this->Name . '/';
        $BlogImage->setFolderName($folderName);
        $BlogImage->getValidator()->setAllowedExtensions(array('jpg','jpeg','png','gif'));
        $fields->addFieldToTab('Root.Main', HtmlEditorField::create('Content'));
        return $fields;
    }

    public function onBeforeDelete() {
        Parent::onBeforeDelete();
    }

}

class ArticlePage_Controller extends Page_Controller {

}
