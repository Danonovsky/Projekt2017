<p>Imię i nazwisko: <?=$this->session->userdata('name').' '.$this->session->userdata('surname')?></p>
<p>Miasto: <?=$this->session->userdata('city')?></p>
<p>Numer telefonu: <?=$this->session->userdata('phoneNr')?></p>
<p><?=anchor('profile/edit','Edytuj dane')?></p>
<p><?=anchor('profile/changePassword','Zmień hasło')?></p>
