<?php

/**
 * Project form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  }

   public function saveEmbeddedForms($con = null, $forms = null)
  {
    /* this hack fixes what appears to be a bug in Doctrine that prevents nested embedded forms from working correctly. */
    $this->getObject()->save();
    parent::saveEmbeddedForms($con, $forms);
  }

  public function updateObjectEmbeddedForms($values, $forms = null)
  {
    if (null === $forms):
      $forms = $this->embeddedForms;
    endif;
    foreach ($forms as $name => $form):
      if (!isset($values[$name]) || !is_array($values[$name])):
        continue;
      endif;
      if ($form instanceof sfFormObject):
        /* this hack seems to fix bug resulting in doctrine not saving embedded forms correctly */
        $this->getObject()->save();
        $form->updateObject($values[$name]);
      else:
        $this->updateObjectEmbeddedForms($values[$name], $form->getEmbeddedForms());
      endif;
    endforeach;
  }
    public function removeThumbnail($path, $field)
  {
  $dirlist = array();
  if(is_dir($path)):
      $dh = opendir($path);
      while (false !== ($subdir = readdir($dh))):
          if (is_dir($path.DIRECTORY_SEPARATOR.$subdir) && $subdir !== '.' && $subdir !== '..'):
              $dirlist[] = $subdir;
          endif;
      endwhile;
  endif;
  foreach($dirlist as $dir):
      if (file_exists($path.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$field)):
          unlink($path.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$field);
      endif;
  endforeach;
  }

  protected function removeFile($field)
  {
    if (!$this->validatorSchema[$field] instanceof sfValidatorFile)
    {
      throw new LogicException(sprintf('You cannot remove the current file for field "%s" as the field is not a file.', $field));
    }
    $directory = $this->validatorSchema[$field]->getOption('path');
    if ($directory && is_file($file = $directory.DIRECTORY_SEPARATOR.$this->getObject()->$field))
    {
      unlink($file);
      $this->removeThumbnail($directory, $this->getObject()->$field);
    }
  }
}
