<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo __('Контакти') ?></li>
</ul>
<h1><?php echo __('Контакти') ?></h1>
<?php include_component('page','contacts') ?>
<script type="text/javascript">
function initialize() {
  var position = new google.maps.LatLng(49.44563, 32.06242);
  var options = {
    zoom: 16,
    center: position,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map"), options);
  var contentString = '<div id="content"><img align="middle" width="150" alt="" src="../../../uploads/tinymce/contacts.jpg"></div>';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  marker = new google.maps.Marker({
    map:map,
    draggable:false,
    animation:google.maps.Animation.ROADMAP,
    position: position,
    title: 'Мэджик дизайн'
  });
 google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
 });
}
function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&language=<?php echo $culture; ?>";
  document.body.appendChild(script);
}
window.onload = loadScript;
</script>
<div  align="center"><div id="map" style="width: 600px; height: 300px;"></div></div>
<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php else: ?>
    <?php if ($sf_user->hasFlash('error')): ?>
      <div class="error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
    <?php endif; ?>  
    <div id="send_mess">
        <?php include_partial('form', array('form' => $form)) ?>
    </div>
 <?php endif; ?> 
