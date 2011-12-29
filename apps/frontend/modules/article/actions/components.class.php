<?php

class articleComponents extends sfComponents
{
    public function executeLastSeveralArticles(sfWebRequest $request)
    {
        $this->articles = ArticleTable::getInstance()->getLastArticle(sfConfig::get('app_articles_count_index'));
    }

    public function executeLastArticle(sfWebRequest $request)
    {
        $this->article = ArticleTable::getInstance()->getLastArticle();
    }
}
?>
