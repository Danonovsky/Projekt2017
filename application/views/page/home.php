 <div class="fill">
   <div class="container">
     <ol class="breadcrumb">
       <li class="active">Home</li>
     </ol>
     <?php
     if(!empty($announcments)) {
       for($i=0;$i<count($announcments);$i++) {
         if(count($announcments[$i]['pics'])>0) $path=$announcments[$i]['pics'][0]['path'];
         else $path='img/nofile.jpg';
         ?>
         <a class="user-anchor" href="<?=site_url('announcments/view/'.$announcments[$i]['basic']['id'].'/'.$announcments[$i]['basic']['slug'])?>">
           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 margin-bottom box-sizer">
             <div class="panel panel-default singleAnnouncment">
                 <div class="title panel-heading highlighted"><?=$announcments[$i]['basic']['title']?><span class="glyphicon glyphicon-star-empty padding-left"></span></div>
                 <div class="panel-body no-padding">
                   <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="Image">
                   <div class="price">Price: <?=$announcments[$i]['basic']['price'].' PLN'?></div>
                 </div>
             </div>
           </div>
         </a>
         <?php
       }
     }
     ?>
    </div>
   </div>
