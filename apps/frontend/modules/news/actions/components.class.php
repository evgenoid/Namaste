<?php

class newsComponents extends sfComponents
{
    public function executeLastSeveralNews(sfWebRequest $request)
    {
        $this->news = NewsTable::getInstance()->getLastNews(sfConfig::get('app_news_count_index'));
    }

    public function executeLastNews(sfWebRequest $request)
    {
        $this->news = NewsTable::getInstance()->getLastNews();
    }
}
?>
