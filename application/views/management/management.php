<p>
  <h2>Kategorie</h2>
  <table class="table table-responsive">
    <thead>
      <tr>
        <td>Id</td>
        <td>Nazwa</td>
        <td colspan="2">Zarządzanie</td>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($categories as $a) {
        ?>
        <tr>
          <td><?=$a['id']?></td>
          <td><?=str_replace('_',' ', $a['name'])?></td>
          <td><?=anchor(site_url('management/previewCategory/'.$a['id']),'Podgląd')?></td>
          <td><?=anchor(site_url('management/deleteCategory/'.$a['id']),'Usuń')?></td>
        </tr>
        <?php
      }
      ?>
      <tr>
        <td colspan="4"><?=anchor('management/newCategory','Nowa kategoria')?></td>
      </tr>
    </tbody>
  </table>
</p>
