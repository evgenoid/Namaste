<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $page->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $page->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('page/edit?id='.$page->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('page/index') ?>">List</a>
