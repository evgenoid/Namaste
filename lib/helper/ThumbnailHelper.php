<?php
function getThumbnail($image, $width=null, $height=null, $crop = false, $scale = true, $inflate = true, $quality = 100)
{
  $image_dir = dirname($image);
  $image_file = basename($image);
  $thumbnail_dir = '';
  if ($width !== null && $height === null):
      $thumbnail_dir .= $width.'x';
  elseif ($width === null && $height !== null):
      $thumbnail_dir .= 'x'.$height;
  elseif ($width !== null && $height !== null):
      $thumbnail_dir .= $width.'x'.$height;
  endif;
  $thumbnail_dir .= DIRECTORY_SEPARATOR;
  $image_thumbnail_file = $image_dir.DIRECTORY_SEPARATOR.$thumbnail_dir.$image_file;
  $full_image_file = sfConfig::get('sf_web_dir').$image_dir.DIRECTORY_SEPARATOR.$image_file;
  $full_image_thumbnail_file = sfConfig::get('sf_web_dir').$image_dir.DIRECTORY_SEPARATOR.$thumbnail_dir.$image_file;
  $full_image_thumbnail_dir = sfConfig::get('sf_web_dir').$image_dir.DIRECTORY_SEPARATOR.$thumbnail_dir;
  if (!file_exists($full_image_thumbnail_file) && ($width != null || $height != null))
  {
    if (!is_dir($full_image_thumbnail_dir))
    {
      mkdir($full_image_thumbnail_dir, 0777, true);
    }

    if($crop && $width && $height)
    {
      cropImage($width, $height,
        sfConfig::get('sf_web_dir').$image_dir.DIRECTORY_SEPARATOR.$image_file,
        sfConfig::get('sf_web_dir').$image_dir.DIRECTORY_SEPARATOR.$thumbnail_dir.$image_file
      );
    }
    else
    {
//      $thumbnail = new sfThumbnail($width, $height, $scale, $inflate, $quality);
//      $thumbnail->loadFile($full_image_file);
//      $thumbnail->save($full_image_thumbnail_file, 'image/png');

      $img = new sfImage($full_image_file);
      $img->load($full_image_file);
      if ($width === null):
        $img->scale($height/$img->getHeight());
      elseif ($height === null):
        $img->scale($width/$img->getWidth());
      else:
        $img->resize($width, $height);
      endif;
      $img->saveAs($full_image_thumbnail_file);
    }
  }

  return $image_thumbnail_file;
}

function cropImage($nw, $nh, $source, $dest)
{ 
  $size = getimagesize($source);
  $len = strlen($source);
  $stype = substr($source, $len-3, 3);
  $w = $size[0];
  $h = $size[1];
  
  switch ($stype) {
    case 'gif':
      $simg = imagecreatefromgif($source);
    break;
    case 'jpg':
      $simg = imagecreatefromjpeg($source);
    break;
    case 'png':
      $simg = imagecreatefrompng($source);
    break;
  }
  $dimg = imagecreatetruecolor($nw, $nh); 
  $wm = $w/$nw;
  $hm = $h/$nh;
  $h_height = $nh/2;
  $w_height = $nw/2;
  if ($w < $h) {
    $adjusted_height = $h / $wm;
    $half_height = $adjusted_height / 2;
    $int_height = $half_height - $h_height;
    imagecopyresampled($dimg, $simg, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
  } elseif ($w > $h) {
    $adjusted_width = $w / $hm;
    $half_width = $adjusted_width / 2;
    $int_width = $half_width - $w_height;
    imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0,$adjusted_width, $nh, $w, $h);
  } else {
    imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
  }
  imagejpeg($dimg, $dest, 150);
}

?>
