<?php

/**
 * ArticleTranslation form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleTranslationForm extends BaseArticleTranslationForm
{
    public function configure()
    {
        $this->setWidget('text', new nmWidgetFormTextareaTinyMCE(
            array(
                'width' => '700',
                'height' => '250',
            )
        ));
  }
}
