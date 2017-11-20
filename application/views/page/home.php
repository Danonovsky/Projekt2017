 <div class="fill">
   <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
     <?php
     if(!empty($announcments)) {
       for($i=0;$i<count($announcments);$i++) {
         if(count($announcments[$i]['pics'])>0) $path=$announcments[$i]['pics'][0]['path'];
         else $path='img/nofile.jpg';
         ?>
         <a href="<?=site_url('announcments/view/'.$announcments[$i]['basic']['id'].'/'.$announcments[$i]['basic']['slug'])?>">
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-bottom">
             <div class="highlighted margined">
                 <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
                 <div><?=$announcments[$i]['basic']['title']?></div>
                 <div>Price: <?=$announcments[$i]['basic']['price'].' PLN'?></div>
             </div>
           </div>
         </a>
         <?php
       }
     }
     ?>
    </div>
   </div>
