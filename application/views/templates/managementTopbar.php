<p>
  <span><?=anchor('management','Zarządzanie - strona główna', $arrayName = array('class' => 'user-anchor'))?></span>
  <span class="user-anchor">Witaj <?=$this->session->userdata('adminNick', $arrayName = array('class' => 'user-anchor' ))?>, <?=anchor('management/logout','Wyloguj się', $arrayName = array('class' => 'user-anchor' ))?></span>
</p>
