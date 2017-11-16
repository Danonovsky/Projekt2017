<section class="top-panel">
  <div class="col-lg-12">
    <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 text-right top-padding"
  <?php
  if($this->userManager->isLogged()) {
    ?>
      <p class="user-anchor">Witaj, <?=anchor('profile',$this->session->userdata('name').' '.$this->session->userdata('surname'), $arrayName = array('class' => 'user-anchor')).', ( '.anchor(site_url('messages'),'Wiadomości', $arrayName = array('class' => 'user-anchor')).' ), '.anchor('wyloguj','Wyloguj', $arrayName = array('class' => 'user-anchor'))?></p>
    <?php
  }
  else {
    ?>
    <div>
      <span class="margined"><?=anchor('rejestracja','Zarejestruj się  <span class="glyphicon glyphicon-pencil"></span>').'</span><span>'.anchor('logowanie','Zaloguj się <span class="glyphicon glyphicon-user"></span>')?></span>
    </div>
    <?php
  }
  ?>
    </div>
  </div>
</section>
