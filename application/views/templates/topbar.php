<section> <!-- dodac wyglad, zeby byl cienki, napisy do prawej !-->
  <?php
  if($this->userManager->isLogged()) {
    ?>
    <p>Witaj, <?=anchor('profile',$this->session->userdata('name').' '.$this->session->userdata('surname')).', ( '.anchor(site_url('messages'),'Wiadomości').' ), '.anchor('wyloguj','Wyloguj')?></p>
    <?php
  }
  else {
    ?>
    <p><?=anchor('rejestracja','Zarejestruj się').', '.anchor('logowanie','Zaloguj się')?></p>
    <?php
  }
  ?>
</section>
