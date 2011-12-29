<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatedFile represents a validated uploaded file.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatedFile.class.php 30915 2010-09-15 17:10:37Z Kris.Wallsmith $
 */
class mdValidatedFile extends sfValidatedFile
{

  public function generateFilename()
  {
    return $this->getOriginalName();
  }

}
