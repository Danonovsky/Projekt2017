<div class="fill">
  <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 user-access bg-white">
    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
      <p>
        <span class="label label-default font-sizer"><span class="glyphicon glyphicon-user"> </span> Imię i Nazwisko:</span><span class="font-sizer-bigger"> <?=$this->session->userdata('name').' '.$this->session->userdata('surname')?></span>
      </p>
      <p>
        <span class="label label-default font-sizer"><span class="glyphicon glyphicon-globe"> </span> Miasto:</span><span class="font-sizer-bigger"> <?=$this->session->userdata('city')?></span>
      </p>
      <p>
        <span class="label label-default font-sizer"><span class="glyphicon glyphicon-phone-alt"> </span> Numer telefonu:</span><span class="font-sizer-bigger"> <?=$this->session->userdata('phoneNr')?></span>
      </p>
      <p>
        <?=anchor('profile/edit','<span class="glyphicon glyphicon-pencil"></span> Edytuj dane', $arrayName = array('class' => 'user-anchor' ))?>
      </p>
      <p>
        <?=anchor('profile/changePassword','<span class="glyphicon glyphicon-lock"></span> Zmień hasło', $arrayName = array('class' => 'user-anchor' ))?>
      </p>
      <p>
        <?=anchor('profile/newAnnouncment','<span class="glyphicon glyphicon-plus"></span> Nowe ogłoszenie', $arrayName = array('class' => 'user-anchor' ))?>
      </p>
      <p>
        <?=anchor('profile/myAnnouncments','<span class="glyphicon glyphicon-ok"></span> Moje ogłoszenia ('.$active.')', $arrayName = array('class' => 'user-anchor' ))?>
      <p>
        <?=anchor('profile/myUnactiveAnnouncments','<span class="glyphicon glyphicon-remove"></span> Nieaktywne ogłoszenia ('.$unactive.')', $arrayName = array('class' => 'user-anchor' ))?>
      </p>
    </div>
  </diV>
</div>
