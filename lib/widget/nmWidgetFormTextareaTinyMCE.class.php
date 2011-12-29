<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kula
 * Date: 20.10.11
 * Time: 9:36
 * To change this template use File | Settings | File Templates.
 */
 
class nmWidgetFormTextareaTinyMCE extends sfWidgetFormTextareaTinyMCE {

     protected function configure($options = array(), $attributes = array())
  {
      parent::configure();
  }

    public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $textarea = sfWidgetFormTextarea::render($name, $value, $attributes, $errors);

    $js = sprintf(<<<EOF
<script type="text/javascript">
  tinyMCE.init({
    mode:                              "exact",
    elements:                          "%s",
    theme:                             "%s",
    %s
    %s
    theme_advanced_toolbar_location:   "top",
    theme_advanced_toolbar_align:      "left",
    theme_advanced_statusbar_location: "bottom",
    imagemanager_contextmenu: true,
    plugins : "advhr, advimage, advlink, advlist, autolink, autoresize, autosave, contextmenu, directionality, emotions, fullscreen, iespell, inlinepopups, insertdatetime, layer, legacyoutput, lists, media, nonbreaking, noneditable, pagebreak, paste, preview, print, save, searchreplace, spellchecker, style, tabfocus, table, template, visualchars, wordcount, xhtmlxtras, imagemanager",
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    language : "uk",
    theme_advanced_resizing:  false
    %s
  });
</script>
EOF
    ,
      $this->generateId($name),
      $this->getOption('theme'),
      $this->getOption('width')  ? sprintf('width:                             "%spx",', $this->getOption('width')) : '',
      $this->getOption('height') ? sprintf('height:                            "%spx",', $this->getOption('height')) : '',
      $this->getOption('config') ? ",\n".$this->getOption('config') : ''
    );

    return $textarea.$js;
  }
}
