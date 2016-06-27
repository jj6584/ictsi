<?php
        $getnotifs = $this -> model_admin ->getadminnotifs();
         $getalladminnotifs = $this -> model_admin ->getallnotifs();

             // echo "<pre>";
             // print_r($getnotifs);
             // echo "</pre>";
?>



<li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell-o"></i>
        <span class="badge bg-green"><?php echo $getalladminnotifs;?></span>

    </a>


    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
        <?php

                foreach ($getnotifs as $data) {

                        $foldername = sha1($data['id']);
                        $time = strtotime($data['date_added']);

                           $makeago = $this->model_admin->humanTiming($time);
                        $link = "";
                        $fullname = "";
                            $notid = $data['t_notification_id'];
                        if($notid == 1){
                                $link = "personal_notification?";
                                $fullname = $data['fname']." ".$data['lname'];
                        }if($notid == 2){
                                $link = "skype_notification?";
                                $fullname = $data['fname']." ".$data['lname'];
                        }if($notid >=3 && $notid<=7){
                                $link = "viewfiles/$data[id]";
                                $fullname = $data['fname']." ".$data['lname'];
                        }if($notid >=8 && $notid<=10){
                            $cname = $this->model_admin->getcname($data['sender_id']);
                                foreach ($cname as $dw) {
                                    $fullname = $dw['c_e_name']." ".$dw['c_e_mname'];
                                }

                                if($notid == 8){
                                            // $mpid = $data['id'];
                                            // $seen = $data['notifications_id'];
                                       //$link = "manpower_notification?process=$mpid & seen=$seen";
                                }

                                $link = "asd/";
                                //$fullname = $data['c_e_name']." ".$data['c_e_lname'];
                        }



        ?>
            <li>
            <a>
               <!--  <span class="image">
             <img src="<?php echo base_url();?>users/<?php  if($data['profilepic']){echo "$foldername/" . $data['profilepic'];}else{echo 'icon.gif';}?>" alt="Profile Image" />
        </span> -->

                <span>
            <span><a href="<?php echo base_url();?>admin/<?php echo $link;?>"><?php echo $fullname;?></span>
                <span class="time"><?php
                        echo $makeago." "."ago";

                ?></span>
                </span>
                <span class="message">
            <?php
                echo "<b>".$data['t_notification_desc']."</b>";

            ?>
        </span>
            </a>
        </li>


            <?php
                }
            ?>



        <li>
            <div class="text-center">
                <a href="<?php echo base_url();?>admin/see_all_alerts">

                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
    </ul>
</li>
<?php
    $countmpnotifs = $this->model_admin->countmanpower();
    $getmp = $this -> model_admin ->getallmanpower();
      // echo "<pre>";
      // print_r($getmp);
      // echo "</pre>";

?>
<li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bullhorn"></i>
        <?php
                if($countmpnotifs > 0){


        ?>
        <span class="badge bg-green"><?php echo $countmpnotifs;?></span>

        <?php
            }
        ?>
    </a>
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
            <?php
                    foreach ($getmp as $mp) {
                        # code...

            ?>
        <li>

            <a>
           <!--      <span class="image">
            <img src="<?php echo base_url();?>images/admin/adminphoto.jpg" alt="Profile Image" />
        </span>
-->                                            <span>
            <span><a href="<?php echo base_url();?>admin/manpower_req"><?php echo $mp['c_e_name']." ".$mp['c_e_lname'];?><a></span>
                <span class=""><?php echo $mp['date_added'];?></span>
                </span>
                <span class="message">
            <?php echo $mp['t_notification_desc'];?>
        </span>
            </a>
        </li>
        <li>
            <?php
        }
?>

            <div class="text-center">
                <a href="<?php echo base_url();?>admin/manpower_req">
                    <strong>View all request</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
    </ul>
</li>


</ul>
</nav>
</div>
