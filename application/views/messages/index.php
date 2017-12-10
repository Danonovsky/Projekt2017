<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li class="active">Conversations</li>
  </ol>
</div>

<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2 text-center padding-bottom">
    <?php
    if(count($conversations)>0) {
      foreach($conversations as $a) {
        ?>
        <table class="col-lg-12 table table-bordered">
          <theah>
            <tr>
              <td>Profil użytkownika</td>
              <td>Konwersacja</td>
            </tr>
          </thead>
          </tbody>
            <tr>
              <td>

                  <?=anchor(site_url('profile/view/'.$a['id']),$a['name'].' '.$a['surname'],$arrayName = array('class' => 'col-lg-6 col-md-6 user-anchor' ))?>

              </td>
              <td>

                  <?=anchor(site_url('messages/conversation/'.$a['id']),'Otwórz rozmowę',$arrayName = array('class' => 'col-lg-6 col-md-6 user-anchor' ))?>

              </td>
            </tr>
          </tbody>
        </table>
        <?php
      }
    }
    ?>
  </div>
</div>
