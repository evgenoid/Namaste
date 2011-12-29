<?php if ($field->isPartial()): ?>
  <?php include_partial('work/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('work', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
      <?php echo $form[$name]->renderLabel($label) ?>

      <div class="content">
        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
        <?php if ($name == 'plus'):?>
        <!---------------Скрипт добавления формы картинки----------------->
        <script type="text/javascript">
            var pics = <?php echo ($form['showcases']->count())?>;
            function addPic(num) {
                var r = $.ajax({
                    type: 'GET',
                    url: '<?php echo url_for('showcase/addPicForm').($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
                    async: false
                }).responseText;
                return r;
            }
            $().ready(function() {
                $('img#add_picture').click(function() {
                    $(".sf_admin_form_field_showcases .content table:first").append(addPic(pics));
                    pics = pics + 1;
                });
                $('img#del_picture').click(function() {
                    if (pics > <?php echo ($form['showcases']->count())?>){
                        $(".sf_admin_form_field_showcases .content").children("table").children("tbody").children("tr:last").remove();
                        pics = pics - 1;
                    }
                });
            });
        </script>
        <!-------------------------------->
        <?php endif; ?>
      </div>
      <?php if ($help): ?>
        <div class="help"><?php echo __($help, array(), 'messages') ?></div>
      <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="help"><?php echo $help ?></div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
