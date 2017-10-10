<section> <!-- dodac wyglad, zeby byl cienki, napisy do prawej !-->
  <?php
  if($this->userManager->isLogged()) {
    ?>
    <p>Witaj, <?=$this->session->userdata('name').' '.$this->session->userdata('surname').', '.anchor('wyloguj','Wyloguj')?></p>
    <?php
  }
  else {
    ?>
    <p><?=anchor('rejestracja','Zarejestruj się').', '.anchor('logowanie','Zaloguj się')?></p>
    <?php
  }
  ?>
</section>
