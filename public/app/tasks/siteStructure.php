<?php

class CreateSiteStructure extends BuildTask {

    public $title       = 'Site Tree Structure Creator';
    public $description = 'Creates New pages and structures them as per wireframe';
    public $enabled     = true;

    public function run ($request) {
        $this->removeInitialPages();
        $this->deleteAll(BlogPage::get());
        // $this->deleteAll(ContactPage::get());

        $pages = [
            'Home' => new HomePage,
            'Blog' => new BlogPage,
            // 'Contact' => new ContactPage,
        ];

        // $homepage = HomePage::get()->first();
        // $homepage->IntroText = "WELL CRAFTED INTRO";
        // $homepage->PromoText = "PARTNERSHIP PROMOTION";
        // $introImg = new Image();
        // $imgFile = 'themes/Default/assets/images/doof.jpg';
        // var_dump($imgFile);
        // $introImg->Filename = $imgFile;
        // $introImg->Title = 'Intro background image';
        // $introImg->write();
        // $homepage->IntroImageID = $introImg->ID;


        foreach ($pages as $name => $class) {
            $this->findOrCreatePage($name, $class);
        }
    }

    private function findOrCreatePage($name, $page) {
        if (!Page::get()->filter(['Title' => $name])->first()) {
            print("Creating new $page<br>");
            $page->Title = $name;
            $page->write();
            $page->doPublish();
        }
    }

    public function deleteAll($model) {
        foreach($model as $object)
        {
            $object->doUnpublish();
            $object->doDeleteFromLive();
            $object->getIsDeletedFromStage();

            $object->delete();
        }
    }

    public function removeInitialPages()
    {
        if($aboutus = Page::get()->filter(['Title' => "About us"])->first()){
            $contactus = Page::get()->filter(['Title' => "Contact us"])->first();
            $this->deleteAll([$aboutus,$contactus]);
        }
    }
}
