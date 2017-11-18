<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <p>
      <h2>Kategorie</h2>
      <table class="table table-responsive table-bordered">
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
              <td><?=anchor(site_url('management/previewCategory/'.$a['id']),'Podgląd',$arrayName = array('class' => 'user-anchor' ))?></td>
              <td><?=anchor(site_url('management/deleteCategory/'.$a['id']),'Usuń',$arrayName = array('class' => 'user-anchor' ))?></td>
            </tr>
            <?php
          }
          ?>
          <tr>
            <td colspan="4"><?=anchor('management/newCategory','Nowa kategoria',$arrayName = array('class' => 'user-anchor' ))?></td>
          </tr>
        </tbody>
      </table>
    </p>
  </div>
</div>
