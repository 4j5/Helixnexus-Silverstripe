<?php

class ArticleSeeder extends BuildTask {

    public $title       = 'Article seeder';
    public $description = 'Creates New article pages and structures them';
    public $enabled     = true;

    public function run ($request) {
        $this->deleteAll(ArticlePage::get());
        $faker = Faker\Factory::create();
        $blogPage = BlogPage::get()->first();

        $img = new Image();
        $imgFile = 'themes/Helix/assets/images/doof.jpg';
        var_dump($imgFile);
        $img->Filename = $imgFile;
        $img->Title = 'Template image';
        $img->write();

        for ($articles = 0; $articles < 20; $articles++) {
            $articlePage = new ArticlePage;
            $articlePage->Title = "Article " . $articles;
            $articlePage->Content = $faker->text(400);
            $articlePage->SummaryImageID = $img->ID;
            $articlePage->setParent($blogPage);
            $articlePage->write();
            $articlePage->doPublish();
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
}
