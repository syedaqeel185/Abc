<?php
  $actual_link = "http://$_SERVER[HTTP_HOST]/details";
  $makeII = $this->input->get('makes',true);
  $modelII = $this->input->get('models',true);    

  $where = array('u_id '=>$this->session->userdata('userid'));
  $usersvalues = $this->homemodel->getSingle(USERS,$where);

  ?>
<!DOCTYPE html>
<html lang='en-US'>

<head>

  <title><?php echo $title; ?></title>
  <meta charset='UTF-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="google-signin-client_id" content="1056613150434-bt221ag02bn3acseb4rjtrjtqics7a7u.apps.googleusercontent.com">
  <meta name='author' content='Ibnul Alam'>
    
  <meta name='title' content='<?=lang("searchresult_title")?>'>
  <meta name='description' content='<?=lang("searchresult_desc")?>'>
  <meta name='keywords' content='<?=lang("searchresult_keywords")?>'>

  <meta name='og:title' content='<?=lang("searchresult_title")?>'>
  <meta name='og:description' content='<?=lang("searchresult_desc")?>'>
  <meta name='og:keywords' content='<?=lang("searchresult_keywords")?>'>

  <link rel="shortcut icon" href="assets/image/sedan-car-front-icon.svg" type="image/svg" sizes="16x16">

<!--<link href='assets/style/selectize.default.css' rel='stylesheet'  media="print" onload="this.media='all'"> -->
  <link href='assets/style/searchresult_style.css' rel='stylesheet' >
 <!-- <link href='assets/style/auto_style.css' rel='stylesheet'  media="print" onload="this.media='all'">-->

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  media="print" onload="this.media='all'">-->
	
  
	
</head>


<!-- start -->
<body>

<div class="clearfix"></div>
  <?php 
    
    $dataMake = $this->input->get('makes',true);
    $dataModel = $this->input->get('models',true);
    $dataRegistration = $this->input->get('formyears',true);
    $dataFromKm = $this->input->get('formrange',true);
    $dataToKm = $this->input->get('torange',true);
    $dataFromPrice = $this->input->get('formprice',true);
    $dataTOPrice = $this->input->get('toprice',true);
    $dataFuelType = $this->input->get('fueltype',true);
    $dataPowerFrom = $this->input->get('powerfrom',true);
    $dataPowetTo = $this->input->get('powerto',true);
    $dataTransmission = $this->input->get('transmission',true);
    $dataSellerType = $this->input->get('sellerttype',true);
    $dataPostCode = $this->input->get('postcode',true);
    $dataCity = $this->input->get('city',true);
    $dataColor = $this->input->get('color',true);
    /* Hemal: D42 */
    $no_car_image = 'car-placeholder-'.$this->session->userdata('lang').'.jpg';
    /*******/
  ?>

<!-- header start -->
<div class='head-top-lang-prof-outer'>
  <div class='head-top-lang-prof-cont'>

    <!-- logo container start -->
    <div class='au2logo-con-hori'>
      <div class='au2logo-cont'>
        <!-- yash:Mobile Task.no 7 -->
        <a class='' href='<?=base_url()?>'>
          <img class='au2logo' src='<?=base_url()?>assets/image/au2mob-logo.svg' alt='<?=lang("logo_title")?>' title="<?=lang("logo_title")?>">
        </a>
        <!-- ********************* -->
      </div>
    </div>
    <!-- logo container end -->

    <!-- language menu container start -->
    <div class='lang-prof-con-hori'>
      <div class='lang-prof-own-cont'>
       <?php 
              $langs = $this->session->userdata('lang'); 
       
       ?>
        <!-- language icon box start -->
        <div class='lang-icon-box'>
          <?php if($langs =='en'){ ?>
      <img class='lang-icon' src='assets/image/united-kingdom.svg' alt=''>
        <?php } else { ?>
       <img class='lang-icon' src='assets/image/germany.svg' alt=''>
        <?php } ?>
          <div class='lang-drop-down-box'>
            <div class='lang-drop-down-cone-box'>
              <div class='lang-dorp-down-cone'></div>
            </div>
            <a class='lang-itemlink' href='setLanguage/en'>
              <div class='lang-selectitem'>
                <img class='lang-select-icon' src='assets/image/united-kingdom.svg' alt=''>
                <p class='lang-select-text'>English</p>
              </div>
            </a>
            <a class='lang-itemlink' href='setLanguage/gr'>
              <div class='lang-selectitem'>
                <img class='lang-select-icon' src='assets/image/germany.svg' alt=''>
                <p class='lang-select-text'>Deutsch</p>
              </div>
            </a>
          </div>
        </div>
        <!-- language icon box end -->
        <!-- profile icon box start -->
       <?php if($this->session->userdata('userid')!=''){ ?>

    <div class='profile-icon-box'>
    <?php if (!empty($usersvalues->profilepic && file_exists("./uploads/profile/".$usersvalues->profilepic))){  ?>
      <img class='profile-icon' src='<?php echo 'uploads/profile/'. $usersvalues->profilepic ?>' alt=''>
        <?php } else{ ?>
        <img class='profile-icon' src='assets/image/profile-user-icon.svg' alt=''>
        <?php 
        
        } 
        /** Yash:Task.no 82 ***/
    $this->load->view("front/profile_header");
    /** ********************/
        ?>

          
    </div>
    <?php }else{ ?>
      <div class='profile-icon-box'>
      <a href="<?=base_url("login")?>" onclick="login('<?=current_url().'?'.$_SERVER['QUERY_STRING']?>')"><img class='profile-icon' src='assets/image/profile-user-icon.svg' alt=''></a>

      </div>
    <?php } ?> 
    <!-- profile icon box end -->
      </div>
    </div>
    <!-- language menu container end-->

  </div>
</div>
<!-- header end -->


<!-- mobile sort section start -->
<div class='mob-fil-sor-con-outer'>
  <div class='mob-fil-sor-con-inner'>

    <div class='mob-sor-ico-con'>
      <img class='mob-sor-icon' src='assets/image/car-mob-icon.svg' alt=''>
      <p class='mob-sor-icon-text'><?php echo number_format($total_cars_count, 0, ',', '.'); ?></p>
    </div>

    <div class='mob-sor-ico-con'>
      <img class='mob-sor-icon' src='assets/image/filter-icon.svg' alt=''>
      <p class='mob-sor-icon-text'><?php echo lang('Filter'); ?></p>
      <div class='mob-filt-overlay-swt'></div>
    </div>

    <div class='mob-sor-rf-gap'></div>

    <div class='mob-sor-ico-con'>
      <img class='mob-sor-icon' src='assets/image/sort-icon.svg' alt=''>
      
      <p class='mob-sor-icon-text'>
        <?php
        if(!isset($_GET['sorting'])){
          echo lang('Price_Ascending');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']==''){ 
         echo lang('Sort'); 
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='km asc'){ 
          echo 'Km '.lang('Ascending');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='km desc'){ 
          echo 'Km '.lang('Descending');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='price asc'){ 
          echo lang('Price_Ascending');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='price desc'){ 
          echo lang('Price_Descending');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='asc'){ 
          echo lang('Oldest_ads_first');
        }
        else if(isset($_GET['sorting']) && $_GET['sorting']=='desc'){ 
          echo lang('Newest_ads_first');
        }
        else{
          echo lang('Price_Ascending');
        }
        
         ?>
       
      </p>
      
      <div class='mob-sor-overlay-swt'></div>
      <div class='mob-sor-menu-con'>
        <div class='mob-sor-menu-conebox'>
          <div class='mob-sor-menu-conetag'></div>
        </div>
        <!-- Yash:Task.no M14 -->
        <?php
        /**Yash:Task.no 374 */
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $qs = "";
        if (isset($queries["sorting"])) {
          unset($queries["sorting"]);
        }
        foreach ($queries as $key => $value) {
          $qs .= $key."=".$value."&";
        }
        ?>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo 'Km'.lang('Ascending');  ?>')" href='<?=current_url()."?".$qs?>sorting=km asc'>Km <?php echo lang('Ascending'); ?></a>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo 'Km'.lang('Descending');  ?>')" href='<?=current_url()."?".$qs?>sorting=km desc'>Km <?php echo lang('Descending'); ?></a>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo lang('Price_Ascending');  ?>')" href='<?=current_url()."?".$qs?>sorting=price asc'><?php echo lang('Price_Ascending'); ?></a>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo lang('Price_Descending');  ?>')" href='<?=current_url()."?".$qs?>sorting=price desc'><?php echo lang('Price_Descending'); ?></a>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo lang('Oldest_ads_first');  ?>')" href='<?=current_url()."?".$qs?>sorting=asc'><?php echo lang('Oldest_ads_first'); ?></a>
        <a class='mob-sor-menu-item' onclick="sortType('<?php echo lang('Newest_ads_first');  ?>')" href='<?=current_url()."?".$qs?>sorting=desc'><?php echo lang('Newest_ads_first'); ?></a>
        <!-- ****************************** -->
      </div>
    </div>

  </div>
</div>
<!-- mobile sort section end -->


<!-- body search filter and result card start -->
<div class='bdy-adv-res-cont-outer'>
  <div class='bdy-adv-res-cont-inner'>
    <!-- search filter start -->
    <form class='det-model-opt-cont' onsubmit="loader_on()" action='searchresult' method='get'>
           <input type="hidden" name="sortingval" id="sortingval" />
            <input type="hidden" name="type" value="<?php echo $this->input->get('type',true); ?>" />
            <input type="hidden" name="latitude" id="lat" value="<?php echo $this->input->get('latitude',true); ?>" />
            <input type="hidden" name="longitude" id="lon" value="<?php echo $this->input->get('longitude',true); ?>" />
            <input type="hidden" name="makes" id="makes_h" value="<?php echo $this->input->get('makes',true); ?>" />
            <input type="hidden" name="models" id="models_h" value="<?php echo $this->input->get('models',true); ?>" />
            <input type="hidden" name="kmval" value="<?php echo $this->input->get('kmval',true); ?>" />
            <input type="hidden" name="price" value="<?php echo $this->input->get('price',true); ?>" />
            <input type="hidden" name="postcodecity" value="<?php echo $this->input->get('city',true); ?>" />
            <input type="hidden" name="rediusval" value="<?php echo $this->input->get('rediusval',true); ?>"/>

      <div class='det-ser-filter-con pb-0'>
        <!-- Yash: Task.no D15 -->
        <?php
          $show_clear_all = false;
          $is_filter=0;
          $detect_default=0;
          if ($this->input->get()) {
            $filters = $_GET;
            foreach ($filters as $f) {
              if ($f != "") {
                $is_filter=$is_filter+1;
                if($f == '0'){
                  $detect_default = 1;
                  $is_filter=$is_filter-1;
                }
                if(isset($_GET['offset'])){
                  $is_filter=$is_filter-1;
                }
                      
              }
            }
          }
          if($is_filter == 0 && $detect_default == 1){
            $show_clear_all = false;
          }

          if($is_filter >= 3){
            $show_clear_all = true;
          }
        
        ?>
        <!-- ***************** -->
      </div>
      <div class='det-ser-filter-con'>
        
         
        <?php if ($show_clear_all) {
            ?>
            <div class="det-ser-filter-item-cont clear_filters">
              <p class="det-sear-filter-text"><?=lang("clear_filter")?></p>
              <a href="<?=current_url()?>?isactive=0"><img class="det-sear-filter-crosbtn" src="assets/image/cross-sign-icon.svg" alt=""></a>
            </div>
            <?php
          }?>
          
        <?php if($this->input->get('makes',true)!='' && strtolower($this->input->get('makes',true)) != 'all'){?>
            <!--Yash: Task.no 295 -->
        <div class='det-ser-filter-item-cont'>
          <!-- Yash: Task.no 386 -->
          <p class='det-sear-filter-text'><?=$this->input->get('makes',true) == "Andere" ? lang('others') : $this->input->get('makes',true) ?></p>
          <!-- ***************** -->
          <?php
          /**Yash:Task.no 416 */
          // $q = $_SERVER['QUERY_STRING'];
          $q  =str_replace("makes=".$_GET['makes'],"makes=", urldecode($_SERVER['QUERY_STRING']));
          /***************** */
          ?>
			    <a href="<?php echo current_url()."?".$q; ?>"><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>

        </div>
          <?php } if($this->input->get('makes',true)!='' && $this->input->get('models',true)!='' && strtolower($this->input->get('models',true)) != 'all'){ ?> 
        <div class='det-ser-filter-item-cont'>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$this->input->get('models',true) == "Andere" ? lang('others') : $this->input->get('models',true) ?></p>
            <!-- ********************** -->
            <?php
            /**Yash:Task.no 416 */
            // $q = $_SERVER['QUERY_STRING'];
            $q  = str_replace("models=".$_GET['models'],"models=", urldecode($_SERVER['QUERY_STRING']));
           
            ?>
			<a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <?php
          }
        if (($_GET['formyears'] != "" && $_GET['formyears'] != "all") || ($_GET['formto'] != "" && $_GET['formto'] != "all")) {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("formyears=".$_GET['formyears'],"formyears=", urldecode($_SERVER['QUERY_STRING']));
            $q  = str_replace("formto=".$_GET['formto'],"formto=", $q);
            
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['formyears'] != "" ? $_GET['formyears'] : "1900" ?> - <?=$_GET['formto'] != ""  ? $_GET['formto'] : date("Y") ?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
          <?php } ?>

          <?php
        if (($_GET['formrange'] != "" && $_GET['formrange'] != 'all') || ($_GET['torange'] != "" && $_GET['torange'] != 'all')) {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("formrange=".$_GET['formrange'],"formrange=", urldecode($_SERVER['QUERY_STRING']));
            $q  = str_replace("torange=".$_GET['torange'],"torange=", $q);
            
            ?>
            <!-- Yash: Task.no 386 -->
            
            <p class='det-sear-filter-text'><?=$_GET['formrange'] != "" ? $_GET['formrange'] : "" ?> km <?=$_GET['torange'] != "" ? "- ".$_GET['torange']." km" : "" ?></p>
            <!-- ********************** -->
            
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
          <?php } ?>

          <?php
        if (($_GET['formprice'] != "" && $_GET['formprice'] != "all") || ($_GET['toprice'] != "" && $_GET['toprice'] != "all")) {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("formprice=".$_GET['formprice'],"formprice=", urldecode($_SERVER['QUERY_STRING']));
            $q  = str_replace("toprice=".$_GET['toprice'],"toprice=", $q);
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['formprice'] != "" ? $_GET['formprice'] : "0" ?> € <?=$_GET['toprice'] != "" ? "- ".$_GET['toprice']." €" : "" ?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if ($_GET['fueltype'] != "" && strtolower($_GET['fueltype'])!='all') {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("fueltype=".$_GET['fueltype'],"fueltype=", urldecode($_SERVER['QUERY_STRING']));
              if($_GET['fueltype'] == 'Other'){
                $sfuel=lang('fuel_other');
              }else{
              $sfuel=lang($_GET['fueltype']);
              }
            
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$sfuel?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if (($_GET['powerfrom'] != "" && $_GET['powerfrom'] != "all") || ($_GET['powerto'] != "" && $_GET['powerto'] != 'all')) {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("powerfrom=".$_GET['powerfrom'],"powerfrom=", urldecode($_SERVER['QUERY_STRING']));
            $q  = str_replace("powerto=".$_GET['powerto'],"powerto=", $q);
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['powerfrom'] != "" ? $_GET['powerfrom'] : "0" ?><?php echo " ".lang('PS'); ?> <?=$_GET['powerto'] != "" ? "- ".$_GET['powerto']." ".lang('PS') : "" ?></p>
            <!-- ***************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if ($_GET['transmission'] != "" && strtolower($_GET['transmission']) != 'all') {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("transmission=".$_GET['transmission'],"transmission=", urldecode($_SERVER['QUERY_STRING']));
            
             
            if($this->input->get('transmission',true) == "Automatic transmission") {
                $transmission=lang('Automatic_transmission');
              }else if($this->input->get('transmission',true) == "Manual gearbox") {
                $transmission=lang('Manual gearbox');
              }else if($this->input->get('transmission',true) == "Semi-automatic") {
              $transmission=lang('Semi-automatic');
            }
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$transmission?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if ($_GET['sellerttype'] != "" && $_GET['sellerttype'] != "all") {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("sellerttype=".$_GET['sellerttype'],"sellerttype=", urldecode($_SERVER['QUERY_STRING']));
            if($this->input->get('sellerttype',true) == "all") {
                $stype = lang('All');
              }else if($this->input->get('sellerttype',true) == 2) {
                $stype = lang('Private');
              }else if($this->input->get('sellerttype',true) == 3) {
                $stype = lang('Agency');
            }
            ?>
            <p class='det-sear-filter-text'><?=$stype?></p>
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <?php } ?>
        
        <?php
        if ($_GET['color'] != "" && strtolower($_GET['color'])!='all') {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("color=".$_GET['color'],"color=", urldecode($_SERVER['QUERY_STRING']));
            
              $scolor=$_GET['color'];
            
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['color']?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if ($_GET['postcode'] != "" &&  $_GET['postcode']!='All') {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
          // echo "<script>alert('".$_GET['postcode']." | ".urldecode($_SERVER['QUERY_STRING'])."')</script>";
            $q  = str_replace("postcode=".$_GET['postcode'],"postcode=", urldecode($_SERVER['QUERY_STRING']));
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['postcode']?></p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>

        <?php
        if ($_GET['radiusval'] != "") {
        ?>
        <div class='det-ser-filter-item-cont'>
          <?php
            $q  = str_replace("radiusval=".$_GET['radiusval'],"radiusval=", urldecode($_SERVER['QUERY_STRING']));
            ?>
            <!-- Yash: Task.no 386 -->
            <p class='det-sear-filter-text'><?=$_GET['radiusval']?> km</p>
            <!-- ********************** -->
			      <a href="<?php echo current_url()."?".$q ?>" ><img class='det-sear-filter-crosbtn' src='assets/image/cross-sign-icon.svg' alt=''></a>
        </div>
        <!-- ***************** -->
        <?php } ?>
		  
      </div>

      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/car-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Brand'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
          <select class='det-sear-model-select search makes-select' name="carmake" onchange="filteronchange('searchfilter')" id="makes" on-load-css> 
          <option value=''><?php echo lang('All'); ?></option>
          <option value='all'><?php echo lang('All'); ?></option>
                   <?php           
              if(!empty($makes))
              {
                /**Yash:Task.no 184 */
                foreach ($makes as $key => $value)
                {
                  if ($value->manufacturename == "Andere") {
                    $others = $value->manufacturename;
                  }
                  if ($value->manufacturename != "Andere") {
                    if ($value->manufacturename == $dataMake && $dataMake != "") {
                      ?>
                      <option value="<?php echo $value->manufacturename; ?>" selected="selected"><?php echo $value->manufacturename; ?></option>
                      <?php
                    } else {
                      ?>
                      <option value="<?php echo $value->manufacturename; ?>"><?php echo $value->manufacturename; ?></option>
                      <?php
                    }
                  }
                  ?>
                  
                  <?php
                }
                ?>
                <!-- Hemal: Filter andre issue -->
                <?php if (isset($others)) { ?>
                  <option value="<?=$others?>" <?php if ($others == $dataMake && $dataMake != "") { echo "selected";} ?>><?php echo lang('others'); ?></option>
                <?php } ?>
                <?php
                /************************ */
              }
              ?>
          </select>
          <select class='det-sear-model-select search model-select' onchange="filteronchange('searchfilter')" id="models" on-load-css>
          <option value=''><?php echo lang('All'); ?></option>
          <option value='all'><?php echo lang('All'); ?></option>
             
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/calendar-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'> <?php echo lang('First_Registration'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
          <select class='det-sear-model-select search numeric-input' name="formyears" onchange="filteronchange('searchfilter')" id="formyears" on-load-css>
            <option value=''><?php echo lang('From'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>
             <?php 
              $formyears = $this->input->get('formyears',true);
              for($i = date('Y'); $i >= 2000 ;$i--){
                
                $selectedyears = '';
                if($formyears==$i)
                {
                  $selectedyears = 'selected="selected"';
                }
                
                echo '<option '.$selectedyears.' value="'.$i.'">'.$i.'</option>';
              }
            ?>
                                <option <?php if($formyears == '1995'){ echo 'selected="selected"'; } ?> value='1995'>1995</option>
                                <option  <?php if($formyears == '1990'){ echo 'selected="selected"'; } ?>value='1990'>1990</option>
                                <option  <?php if($formyears == '1980'){ echo 'selected="selected"'; } ?> value='1980'>1980</option>
                                <option <?php if($formyears == '1970'){ echo 'selected="selected"'; } ?> value='1970'>1970</option>
                                <option  <?php if($formyears == '1950'){ echo 'selected="selected"'; } ?> value='1950'>1950</option>
                                <option  <?php if($formyears == '1920'){ echo 'selected="selected"'; } ?>value='1920'>1920</option>
                                <option  <?php if($formyears == '1900'){ echo 'selected="selected"'; } ?>value='1900'>1900</option>
          </select>
          <select class='det-sear-model-select search numeric-input' onchange="filteronchange('searchfilter')" name="formto" id="formto" on-load-css>
            <option value=''><?php echo lang('To'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>

            <?php 
              $formto = $this->input->get('formto',true);
              
              /* ***** Rizwan: task no.64 ***** */
              //for($i = 1900 ; $i <= date('Y'); $i++){
              for($i = date('Y'); $i >= 2000 ;$i--){    
              /* ********** */
                  
                $selectedmonths = '';
                if($formto==$i)
                {
                  $selectedmonths = 'selected="selected"';
                }
                
                echo '<option '.$selectedmonths.' value="'.$i.'">'.$i.'</option>';
              }
            ?>
              <option <?php if($formto == '1995'){ echo 'selected="selected"'; } ?> value='1995'>1995</option>
                                <option  <?php if($formto == '1990'){ echo 'selected="selected"'; } ?>value='1990'>1990</option>
                                <option  <?php if($formto == '1980'){ echo 'selected="selected"'; } ?> value='1980'>1980</option>
                                <option <?php if($formto == '1970'){ echo 'selected="selected"'; } ?> value='1970'>1970</option>
                                <option  <?php if($formto == '1950'){ echo 'selected="selected"'; } ?> value='1950'>1950</option>
                                <option  <?php if($formto == '1920'){ echo 'selected="selected"'; } ?>value='1920'>1920</option>
                                <option  <?php if($formto == '1900'){ echo 'selected="selected"'; } ?>value='1900'>1900</option>
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/speed-meter-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Kilometer'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
              <?php 
            $formrange = $this->input->get('formrange',true);
          ?>
          <select class='det-sear-model-select search numeric-input' onchange="filteronchange('searchfilter')" name="formrange" id="formrange" on-load-css>
            <option value=''><?php echo lang('From'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>
            
            <option <?php if($formrange==5000){ echo 'selected="selected"'; } ?> value='5000'>5.000 km</option>
            <option <?php if($formrange==10000){ echo 'selected="selected"'; } ?> value="10000">10.000 km</option>
            <option <?php if($formrange==20000){ echo 'selected="selected"'; } ?> value="20000">20.000 km</option>
            <option <?php if($formrange==30000){ echo 'selected="selected"'; } ?> value="30000">30.000 km</option>
            <option <?php if($formrange==40000){ echo 'selected="selected"'; } ?> value="40000">40.000 km</option>
            <option <?php if($formrange==50000){ echo 'selected="selected"'; } ?> value="50000">50.000 km</option>
            <option <?php if($formrange==60000){ echo 'selected="selected"'; } ?> value="60000">60.000 km</option>
            <option <?php if($formrange==70000){ echo 'selected="selected"'; } ?> value="70000">70.000 km</option>
            <option <?php if($formrange==80000){ echo 'selected="selected"'; } ?> value="80000">80.000 km</option>
            <option <?php if($formrange==90000){ echo 'selected="selected"'; } ?> value="90000">90.000 km</option>
            <option <?php if($formrange==100000){ echo 'selected="selected"'; } ?> value="100000">100.000 km</option>
            <option <?php if($formrange==125000){ echo 'selected="selected"'; } ?> value="125000">125.000 km</option>
            <option <?php if($formrange==150000){ echo 'selected="selected"'; } ?> value="150000">150.000 km</option>
            <option <?php if($formrange==175000){ echo 'selected="selected"'; } ?>  value='175000'>175.000 km</option>
            <option <?php if($formrange==200000){ echo 'selected="selected"'; } ?> value='200000'>200.000 km</option>
            <option <?php if($formrange==250000){ echo 'selected="selected"'; } ?> value='250000'>250.000 km</option>
            <option <?php if($formrange==300000){ echo 'selected="selected"'; } ?> value='300000'>300.000 km</option>
          </select>
            <?php 
            $torange = $this->input->get('torange',true);
          ?>
          <select class='det-sear-model-select search numeric-input' onchange="filteronchange('searchfilter')" name="torange" id="torange" on-load-css>
            <option value=''><?php echo lang('To'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>
           <option <?php if($torange==5000){ echo 'selected="selected"'; } ?> value="5000">5.000 km</option>
           <option <?php if($torange==10000){ echo 'selected="selected"'; } ?> value="10000">10.000 km</option>
           <option <?php if($torange==20000){ echo 'selected="selected"'; } ?> value="20000">20.000 km</option>
           <option <?php if($torange==30000){ echo 'selected="selected"'; } ?> value="30000">30.000 km</option>
           <option <?php if($torange==40000){ echo 'selected="selected"'; } ?> value="40000">40.000 km</option>
           <option <?php if($torange==50000){ echo 'selected="selected"'; } ?> value="50000">50.000 km</option>
           <option <?php if($torange==60000){ echo 'selected="selected"'; } ?> value="60000">60.000 km</option>
           <option <?php if($torange==70000){ echo 'selected="selected"'; } ?> value="70000">70.000 km</option>
           <option <?php if($torange==80000){ echo 'selected="selected"'; } ?> value="80000">80.000 km</option>
           <option <?php if($torange==90000){ echo 'selected="selected"'; } ?> value="90000">90.000 km</option>
           <option <?php if($torange==100000){ echo 'selected="selected"'; } ?> value="100000">100.000 km</option>
           <option <?php if($torange==125000){ echo 'selected="selected"'; } ?> value="125000">125.000 km</option>
            <option <?php if($torange==150000){ echo 'selected="selected"'; } ?> value="150000">150.000 km</option>
            <option <?php if($torange==175000){ echo 'selected="selected"'; } ?> value='175000'>175.000 km</option>
            <option <?php if($torange==200000){ echo 'selected="selected"'; } ?> value='200000'>200.000 km</option>
            <option <?php if($torange==250000){ echo 'selected="selected"'; } ?> value='250000'>250.000 km</option>
            <option <?php if($torange==300000){ echo 'selected="selected"'; } ?> value='300000'>300.000 km</option>
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/euro-sign-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'> <?php echo lang('Price'); ?></p>
        </div>
        <div class='det-sear-model-select-option '>
              <?php 
            $formprice = $this->input->get('formprice',true);
          ?>
          <select class='det-sear-model-select search numeric-input' onchange="filteronchange('searchfilter')" name="formprice" id="formprice" on-load-css>
            <option value=''><?php echo lang('From'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>

            <option <?php if($formprice==500){ echo 'selected="selected"'; } ?> value="500">500 €</option>
            <option <?php if($formprice==1000){ echo 'selected="selected"'; } ?> value="1000">1.000 €</option>
            <option <?php if($formprice==2000){ echo 'selected="selected"'; } ?> value="2000">2.000 €</option>
            <option <?php if($formprice==3000){ echo 'selected="selected"'; } ?> value="3000">3.000 €</option>
            <option <?php if($formprice==5000){ echo 'selected="selected"'; } ?> value="5000">5.000 €</option>
            <option <?php if($formprice==10000){ echo 'selected="selected"'; } ?> value="10000">10.000 €</option>
            <option <?php if($formprice==15000){ echo 'selected="selected"'; } ?> value="15000">15.000 €</option>
            <option <?php if($formprice==20000){ echo 'selected="selected"'; } ?> value="20000">20.000 €</option>
            <option <?php if($formprice==25000){ echo 'selected="selected"'; } ?> value="25000">25.000 €</option>
            <option <?php if($formprice==30000){ echo 'selected="selected"'; } ?> value="30000">30.000 €</option>
            <option <?php if($formprice==35000){ echo 'selected="selected"'; } ?> value="35000">35.000 €</option>
            <option <?php if($formprice==40000){ echo 'selected="selected"'; } ?> value="40000">40.000 €</option>
            <option <?php if($formprice==45000){ echo 'selected="selected"'; } ?> value="45000">45.000 €</option>
            <option <?php if($formprice==50000){ echo 'selected="selected"'; } ?> value="50000">50.000 €</option>
            <option <?php if($formprice==55000){ echo 'selected="selected"'; } ?> value="55000">55.000 €</option>
            <option <?php if($formprice==60000){ echo 'selected="selected"'; } ?> value="60000">60.000 €</option>
            <option <?php if($formprice==65000){ echo 'selected="selected"'; } ?> value="65000">65.000 €</option>
            <option <?php if($formprice==70000){ echo 'selected="selected"'; } ?> value="70000">70.000 €</option>
            <option  <?php if($formprice==75000){ echo 'selected="selected"'; } ?>  value='75000'>75.000 €</option>
            <option  <?php if($formprice==100000){ echo 'selected="selected"'; } ?>  value='100000'>100.000 €</option>
            <option  <?php if($formprice==125000){ echo 'selected="selected"'; } ?>  value='125000'>125.000 €</option>
            <option  <?php if($formprice==150000){ echo 'selected="selected"'; } ?>  value='150000'>150.000 €</option>
          </select>
             <?php 
            $toprice = $this->input->get('toprice',true);
          ?>
          <select name="toprice" id="toprice" onchange="filteronchange('searchfilter')" class='det-sear-model-select search numeric-input' on-load-css>
            <option value=''><?php echo lang('To'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>

           <option <?php if($toprice==500){ echo 'selected="selected"'; } ?> value="500">500 €</option>
           <option <?php if($toprice==1000){ echo 'selected="selected"'; } ?> value="1000">1.000 €</option>
           <option <?php if($toprice==2000){ echo 'selected="selected"'; } ?> value="2000">2.000 €</option>
           <option <?php if($toprice==3000){ echo 'selected="selected"'; } ?> value="3000">3.000 €</option>
           <option <?php if($toprice==5000){ echo 'selected="selected"'; } ?> value="5000">5.000 €</option>
           <option <?php if($toprice==10000){ echo 'selected="selected"'; } ?> value="10000">10.000 €</option>
           <option <?php if($toprice==15000){ echo 'selected="selected"'; } ?> value="15000">15.000 €</option>
           <option <?php if($toprice==20000){ echo 'selected="selected"'; } ?> value="20000">20.000 €</option>
           <option <?php if($toprice==25000){ echo 'selected="selected"'; } ?> value="25000">25.000 €</option>
           <option <?php if($toprice==30000){ echo 'selected="selected"'; } ?> value="30000">30.000 €</option>
           <option <?php if($toprice==35000){ echo 'selected="selected"'; } ?> value="35000">35.000 €</option>
           <option <?php if($toprice==40000){ echo 'selected="selected"'; } ?> value="40000">40.000 €</option>
           <option <?php if($toprice==45000){ echo 'selected="selected"'; } ?> value="45000">45.000 €</option>
           <option <?php if($toprice==50000){ echo 'selected="selected"'; } ?> value="50000">50.000 €</option>
           <option <?php if($toprice==55000){ echo 'selected="selected"'; } ?> value="55000">55.000 €</option>
            <option <?php if($toprice==60000){ echo 'selected="selected"'; } ?> value="60000">60.000 €</option>
            <option <?php if($toprice==65000){ echo 'selected="selected"'; } ?> value="65000">65.000 €</option>
            <option <?php if($toprice==70000){ echo 'selected="selected"'; } ?> value="70000">70.000 €</option>
            <option <?php if($toprice==75000){ echo 'selected="selected"'; } ?> value='75000'>75.000 €</option>
            <option <?php if($toprice==100000){ echo 'selected="selected"'; } ?> value='100000'>100.000 €</option>
            <option <?php if($toprice==125000){ echo 'selected="selected"'; } ?> value='125000'>125.000 €</option>
            <option <?php if($toprice==150000){ echo 'selected="selected"'; } ?> value='150000'>150.000 €</option>
          </select>
        </div>
      </div>
    <div class='det-sear-model-btn-con'>
        <button class='search-model-btn' type='submit'>
          <img class='search-model-icon' src='assets/image/search-icon.svg' alt=''>
          <div class="loader"></div><span class='search-model-item-number searchfilterbtn'><?php echo number_format($total_cars_count, 0, ',', '.'); ?></span>
        </button>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/gasoline-pump-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Fuel_Type'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
             <?php 
          $fueltype = $this->input->get('fueltype',true);
        ?>
          <select class='det-sear-model-select search' onchange="filteronchange('searchfilter')" name="fueltype" id="fueltype" on-load-css> 
            <option value=''><?php echo lang('All'); ?></option>
            <option value='all'><?php echo lang('All');?></option>
            <option <?php if($fueltype=='Diesel'){ echo 'selected="selected"'; } ?> value="Diesel"><?php echo lang('Diesel');?></option>
            <option <?php if($fueltype=='Petrol'){ echo 'selected="selected"'; } ?> value="Petrol"><?php echo lang('Petrol');?></option>
            <option <?php if($fueltype=='Other'){ echo 'selected="selected"'; } ?> value="Other"><?php echo lang('fuel_other');?></option>
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/engine-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Power');?></p>
        </div>
        <div class='det-sear-model-select-option'>
           <?php 
            $powerfrom = $this->input->get('powerfrom',true);
          ?>
          <select name="powerfrom" id="powerfrom" onchange="filteronchange('searchfilter')" class='det-sear-model-select search numeric-input' on-load-css>
            <option value=''><?php echo lang('From'); ?></option>
            <option value='all'><?php echo lang('All');?></option>

            <option <?php if($powerfrom == 34){ echo "selected='selected'"; } ?> value="34">34 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 50){ echo "selected='selected'"; } ?> value="50">50 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 60){ echo "selected='selected'"; } ?> value="60">60 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 75){ echo "selected='selected'"; } ?> value="75">75 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 90){ echo "selected='selected'"; } ?> value="90">90 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 101){ echo "selected='selected'"; } ?> value="101">101 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 118){ echo "selected='selected'"; } ?> value="118">118 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 131){ echo "selected='selected'"; } ?> value="131">131 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 150){ echo "selected='selected'"; } ?> value="150">150 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 200){ echo "selected='selected'"; } ?> value="200">200 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 252){ echo "selected='selected'"; } ?> value="252">252 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 303){ echo "selected='selected'"; } ?> value="303">303 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 358){ echo "selected='selected'"; } ?> value="358">358 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 402){ echo "selected='selected'"; } ?> value="402">402 <?php echo lang('PS'); ?></option>
            <option <?php if($powerfrom == 454){ echo "selected='selected'"; } ?>  value='454'>454 <?php echo lang('PS'); ?></option>
          </select>
            <?php 
            $powerto = $this->input->get('powerto',true);
          ?>
          <select name="powerto" id="powerto" onchange="filteronchange('searchfilter')" class='det-sear-model-select search numeric-input' on-load-css>
            <option value=''><?php echo lang('To'); ?></option>
            <option value='all'><?php echo lang('All');?></option>

            <option <?php if($powerto == 34){ echo "selected='selected'"; } ?> value="34">34 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 50){ echo "selected='selected'"; } ?> value="50">50 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 60){ echo "selected='selected'"; } ?> value="60">60 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 75){ echo "selected='selected'"; } ?> value="75">75 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 90){ echo "selected='selected'"; } ?> value="90">90 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 101){ echo "selected='selected'"; } ?> value="101">101 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 118){ echo "selected='selected'"; } ?> value="118">118 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 131){ echo "selected='selected'"; } ?> value="131">131 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 150){ echo "selected='selected'"; } ?> value="150">150 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 200){ echo "selected='selected'"; } ?> value="200">200 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 252){ echo "selected='selected'"; } ?> value="252">252 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 303){ echo "selected='selected'"; } ?> value="303">303 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 358){ echo "selected='selected'"; } ?> value="358">358 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 402){ echo "selected='selected'"; } ?> value="402">402 <?php echo lang('PS'); ?></option>
            <option <?php if($powerto == 454){ echo "selected='selected'"; } ?> value="454">454 <?php echo lang('PS'); ?></option>
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/transmission-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Transmission'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
             <?php 
          $transmission = $this->input->get('transmission',true);
        ?>
          <select class='det-sear-model-select search' onchange="filteronchange('searchfilter')" name="transmission" id="transmission" on-load-css>
            <option value=''><?php echo lang('All'); ?></option>
            <option value='all'><?php echo lang('All');?></option>
            <option <?php if($transmission=='Manual gearbox'){ echo 'selected="selected"'; } ?> value="Manual gearbox"><?php echo lang('Manual gearbox'); ?></option>
            <option <?php if($transmission=='Semi-automatic'){ echo 'selected="selected"'; } ?> value="Semi-automatic"><?php echo lang('Semi-automatic'); ?></option>
            <option <?php if($transmission=='Automatic transmission'){ echo 'selected="selected"'; } ?> value="Automatic transmission"><?php echo lang('Automatic_transmission'); ?></option>
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/car-seller-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Seller'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
             <?php 
          $sellerttype = $this->input->get('sellerttype',true);
        ?>
          <select class='det-sear-model-select search' onchange="filteronchange('searchfilter')" name="sellerttype" id="sellerttype" on-load-css>
            <!-- Yash:Task.no 66 -->
            <option value=''><?php echo lang('All'); ?></option>
            <option value='all'><?php echo lang('All'); ?></option>
            <!-- **************** -->

            <!-- Yash:Task.no 36 -->
            <option  <?php if($sellerttype==2){ echo 'selected="selected"'; } ?> value="2"><?php echo lang('Private'); ?></option>
            <option <?php if($sellerttype==3){ echo 'selected="selected"'; } ?> value="3"><?php echo lang('Agency'); ?></option>
            <!-- **************** -->
          </select>
        </div>
      </div>
      <div class='det-sear-model-optio-cont'>
        <div class='det-sear-model-optio-icon-name'>
          <img class='det-sear-model-optio-icon' src='assets/image/paint-board-icon.svg' alt=''>
          <p class='det-sear-model-optio-icontext'><?php echo lang('Color'); ?></p>
        </div>
        <div class='det-sear-model-select-option'>
          <select class='det-sear-model-select search' onchange="filteronchange('searchfilter')" name="color" id="Color" on-load-css>
          <option value=''><?php echo lang('All'); ?></option>  
          <option value='all'><?php echo lang('All');?></option>
             <?php 
             /**Yash:Task.no 147 */
                if(!empty($colors))
                {
                    $colorlist = array();
                    foreach($colors as  $key=>$value)
                    {
                      
                      if ($this->session->userdata('lang') == "gr") {
                        $colorlist[] = ucfirst($value->name_gr);

                    }else{
                    $colorlist[] = ucfirst($value->name);
                    }                    }
                    sort($colorlist);
                    foreach($colorlist as $value)
                    {
                        ?>
                            <option <?php if($value == $dataColor){ echo "selected='selected'"; } ?> value="<?php echo $value ?>"><?php echo $value ?></option>
                        <?php
                    }
                }
                /**************** */
              ?>
          </select>
        </div>
      </div>
      
      <div class='det-sear-model-optio-cont zip-radi-con'>
          <?php 
			  $postcode = $this->input->get('postcode',true);
			?>
        <div class='det-sear-model-zipcon'>
          <div class='det-sear-model-optio-icon-name'>
            <img class='det-sear-model-optio-icon' src='assets/image/location-icon.svg' alt=''>
            <p class='det-sear-model-optio-icontext'><?php echo lang('Zip')."/".lang('City'); ?></p>
          </div>
         
         <div class='det-sear-model-select-option zip_code'>
            <select  name="postcode" id="zip_code" onchange="filteronchange('searchfilter'); detailszipchange(this.value);" class='det-sear-model-select zip' on-load-css>
            <!-- Yash:Task.no 250 -->
                <?php
                  if ($this->input->get("postcode")) {
                    ?>
                    
                    <option value='<?=$this->input->get("postcode")?>'><?=$this->input->get("postcode")?></option>
                    
                    <?php
                  } else {
                    ?>
                    <option value=''><?php echo lang('All'); ?></option>
                    <?php
                  }
                ?>
                <!-- *************** -->
            </select>
          </div>
        </div>
        <div class='det-sear-model-radicon'>
             <?php 
			  $redius = $this->input->get('transmission',true);
			?>
          <div class='det-sear-model-optio-icon-name'>
            <img class='det-sear-model-optio-icon' src='assets/image/radius-icon.svg' alt=''>
            <p class='det-sear-model-optio-icontext'><?php echo lang('Radius'); ?></p>
          </div>
          <div class='det-sear-model-select-option'>
                 <?php 
            $radiusval = $this->input->get('radiusval',true);
            
          ?>
            <!-- * ***** Rizwan: task no.20 ***** * -->
            <!-- * ***** Rizwan: task no.80 ***** * -->
            <select name="radiusval" id="radiusval" onchange="filteronchange('searchfilter');" class='det-sear-model-select search radius-select' on-load-css>
              <option value=''><?php echo lang('Radius'); ?></option>
              <option <?php if($radiusval == 10){ echo "selected='selected'"; } ?>  value="10">10 km</option>
              <option <?php if($radiusval == 20){ echo "selected='selected'"; } ?> value="20">20 km</option>
              <option <?php if($radiusval == 50){ echo "selected='selected'"; } ?> value="50">50 km</option>
              <option <?php if($radiusval == 100){ echo "selected='selected'"; } ?> value="100">100 km</option>
              <option <?php if($radiusval == 150){ echo "selected='selected'"; } ?> value="150">150 km</option>
              <option <?php if($radiusval == 200){ echo "selected='selected'"; } ?> value="200">200 km</option>
              <option <?php if($radiusval == 300){ echo "selected='selected'"; } ?> value="300">300 km</option>
              <option <?php if($radiusval == 400){ echo "selected='selected'"; } ?> value="400">400 km</option>
              <option <?php if($radiusval == 500){ echo "selected='selected'"; } ?> value="500">500 km</option>
            </select>
            <!-- * ********** * -->
            <!-- * ********** * -->
          </div>
        </div>
      </div>

      <div class='det-sear-model-btn-con'>
        <button class='search-model-btn' type='submit'>
          <img class='search-model-icon' src='assets/image/search-icon.svg' alt=''>
          <div class="loader"></div><span class='search-model-item-number searchfilterbtn'><?php echo number_format($total_cars_count, 0, ',', '.'); ?></span>
        </button>
      </div>
    </form>
    <!-- search filter end -->


    <!-- result card box start -->
    <?php
    /**Yash:Task.no 260 */
      if ($total_rows > 0) {
        ?>
        <div class='res-card-cont'>
      <div class='res-card-sort-sec'>
        <p class='res-card-sort-text'><span class=''><?php echo number_format($total_cars_count, 0, ',', '.'); ?></span> <?php echo lang('au2_for_you');?></p>
            <?php 
                  $km = '';                  
                  $kmdesc = '';                  
                  $price = '';                  
                  $pricedesc = '';                  
                  $asc = '';                  
                  $desc = '';
                  if(isset($_GET['sorting']))
                  {
                    if($_GET['sorting'] == 'km asc'){
                      $km = 'selected';
                    }if($_GET['sorting'] == 'km desc'){
                      $kmdesc = 'selected';
                    }if($_GET['sorting'] == 'price asc'){
                      $price = 'selected';
                    }if($_GET['sorting'] == 'price desc'){
                      $pricedesc = 'selected';
                    }if($_GET['sorting'] == 'asc'){
                      $asc = 'selected';
                    }if($_GET['sorting'] == 'desc'){
                      $desc = 'selected';
                    }
                    if($_GET['sorting'] == 'sort'){
                      $nosort = 'selected';
                    }
                  }else{
                    $price = 'selected';
                  }
                  ?>
        <select class='res-card-sort-select search sortingfilter' id="sortingfilter" name="sortingfilter" on-load-css>
          <option value=''><?php echo lang('Sorting'); ?></option>
          <option value='sort' <?=$nosort;?>><?php echo lang('Sorting'); ?></option>
          <option value="km asc" <?=$km;?>>KM <?php echo lang('Ascending'); ?></option>
          <option value="km desc" <?=$kmdesc;?>>KM <?php echo lang('Descending'); ?></option>
          <option value="price asc" <?=$price;?>><?php echo lang('Price_Ascending'); ?></option>
          <option value="price desc" <?=$pricedesc;?>><?php echo lang('Price_Descending'); ?></option>
          <option value="asc" <?=$asc;?>><?php echo lang('Oldest_ads_first'); ?> </option>
          <option value="desc" <?=$desc;?>><?php echo lang('Newest_ads_first'); ?></option>
        </select>
      </div>
         <?php if(!empty($carlists)){ 
           
            $i = 0;
              foreach($carlists as $rowsval){
                if($rowsval->Company != "quoka.de" || $rowsval->Company != "Autoanzeigen.de"){
                $getimages = explode(',',$rowsval->car_image);
                foreach($getimages as $imgz){
                  if (($key = array_search($imgz, $getimages)) !== false) {
                    if (file_exists("uploads/car/".$imgz )!=1) {
                      unset($getimages[$key]);
                    }
                 }
                  
                   

                }
               
                $getdistance = $rowsval->distance * 1.60934;
                /* Hemal : Task no: S2 */
                $carid_padding=str_replace("=","",base64_encode($rowsval->carid));
                $share_link_url = base_url()."searchresult?ad=".str_replace('=',"",base64_encode($rowsval->carid));
                /******/
               
             

        ?>
     
      <div class='res-card-outer' id="car_<?php echo $carid_padding?>">
        <div class='res-card-top-imginfo-box'>
          <!--Task SF4 By Anwar-- remove class image-holder -->
          <a class="" href='<?php if($rowsval->scrapper_id > 0)  {echo $rowsval->goal_url;} else{?>details/<?php echo base64_encode($rowsval->carid);  ?>/<?php echo $rowsval->cartitleurl;  }?>'   target='_blank'>
            <!-- Yash:Task.no 187 -->
            <?php
            if($rowsval->scrapper_id > 0){
              if ($rowsval->car_image == "" || $rowsval->car_image == null) {
                if($rowsval->image_source =="" || $rowsval->image_source == null){
                 // returns true only if http response code < 400
                
                  /* Hemal: D42 */
                  $img = base_url("assets/image/".$no_car_image);
                  /*******/
                }else{

                  $img = $rowsval->image_source;
                }
            } else {
              
               $img = $rowsval->car_image;
              }
            }else{
            $filename=explode(".",$getimages[0]);
            $fileThumb=$filename[0]."_thumb";
            $filename=$fileThumb.".".$filename[1];
            if (!file_exists("uploads/car/".$filename) || $filename == "") {
              if (!file_exists("uploads/car/".$getimages[0]) || $getimages[0] == "") {
                /* Hemal: D42 */
                $img = base_url("assets/image/".$no_car_image);
                /*******/
                } else {
                $img = base_url("uploads/car/").$getimages[0];
                }            
              
              } 
                else {
              $img = base_url("uploads/car/").$filename;
              }
          }
            ?>
            <!--Task SF4 By Anwar -->
            <img  class='res-card-image' src='<?=$img?>' alt="<?php echo strpos(strtolower($rowsval->cartitlename), 'andere') !== false ? str_replace("Andere", lang('others'), $rowsval->cartitlename) : $rowsval->cartitlename ?>" <?php if($rowsval->scrapper_id > 0){ ?> onclick ="viewdetails('<?php echo $this->session->userdata('userid');?>','<?php echo $rowsval->carid; ?>')" <?php } ?> onerror="this.src='assets/image/<?= $no_car_image?>';"    >
            <!-- ******** removed onerror="this.src='assets/image/<?= $no_car_image?>';" from img tag to resolve it on tool side ********* -->
          </a>
      
          <div class='res-card-info-box'>
            <div class='res-card-title-price-cont'>
              <a class='res-card-title-text res-card-title-text-fixWidth' <?php if($rowsval->scrapper_id > 0){ ?> onclick ="viewdetails('<?php echo $this->session->userdata('userid');?>','<?php echo $rowsval->carid; ?>')" <?php } ?>  href='<?php if($rowsval->scrapper_id > 0)  {echo $rowsval->goal_url;} else{?>details/<?php echo base64_encode($rowsval->carid);  ?>/<?php echo $rowsval->cartitleurl;  }?>'  target="_blank" ><?php echo strpos(strtolower($rowsval->cartitlename), 'andere') !== false ? str_replace("Andere", lang('others'), $rowsval->cartitlename) : $rowsval->cartitlename ?></a>
               <?php 
               if($rowsval->price != "0"){
               $price = number_format($rowsval->price); ?>
              <p class='res-card-price-text'><?php   echo str_replace(',', '.', $price); ?> €</p>
              <?php } ?>
            </div>
            <p class='res-card-det-text'>
            <?php if($rowsval->registrationmonth != '' && $rowsval->registrationyears != '' && $rowsval->registrationmonth != '0' && $rowsval->registrationyears != '0') { ?> <span class=''><?php echo lang('FR'); ?> <?php echo $rowsval->registrationmonth; ?>/<?php echo $rowsval->registrationyears; ?></span><?php } ?>
              <?php if($rowsval->kilometers != '' && $rowsval->kilometers != '0') { ?><span class=''><?php 
                    $num = number_format($rowsval->kilometers); 
                    echo str_replace(',', '.', $num);

                    ?> km</span><?php } ?>
              <?php if($rowsval->power != '' && $rowsval->power != '0' ) {?><span class=''><?php echo $rowsval->power." ".lang('PS');?></span><?php } ?>
              <span class=''><?php if($rowsval->examination_month !='' && $rowsval->examination_year !='' && $rowsval->examination_month !='0' && $rowsval->examination_year !='0'){ echo 'HU '.$rowsval->examination_month."/".$rowsval->examination_year; } ?></span>
            </p>
            <p class='res-card-det-text'>
              <?php
              
              if($rowsval->transmission == "Automatic transmission") {
                $dtransmission=lang('Automatic_transmission');
              }else if($rowsval->transmission == "Manual gearbox") {
                $dtransmission=lang('Manual gearbox');
              }else if($rowsval->transmission == "Semi-automatic") {
                $dtransmission=lang('Semi-automatic');
              } else {
                $dtransmission = $rowsval->transmission;
              }
            
              if($rowsval->scrapper_id > 0){
                if ($rowsval->engine_type == '__Diesel__') {
                  $dengine_type = lang('Diesel');
                } elseif ($rowsval->engine_type == '__Benzin__') {
                  $dengine_type = lang('Petrol');
                } elseif ($rowsval->engine_type == '__Other__') {
                  $dengine_type = lang('fuel_other');
                } else {
                  $dengine_type = str_replace("__","",$rowsval->engine_type);
                }
              }else{
              if ($rowsval->engine_type == 'Diesel') {
                $dengine_type = lang('Diesel');
              } elseif ($rowsval->engine_type == 'Petrol') {
                $dengine_type = lang('Petrol');
              } elseif ($rowsval->engine_type == 'Other') {
                $dengine_type = lang('fuel_other');
              } else {
                $dengine_type = $rowsval->engine_type;
              }
            }
              ?>
              <?php if($dtransmission!=''){ ?><span class=''><?php echo $dtransmission;?></span><?php } ?>
              <?php if($dengine_type!=''){?><span class=''><?php echo $dengine_type;?></span><?php } ?>
             
             
            <?php if($rowsval->co2 !=''){ ?><span class=''><?php echo $rowsval->co2 ."g Co2";?></span><?php } ?>
             <?php if($rowsval->Consumption !=''){ ?> <span class=''><?php echo $rowsval->Consumption." L"; ?></span><?php } ?>
            </p>
               <?php 
               $typeofseller = '';
                    if($rowsval->scrapper_id > 0){
                    if($rowsval->sellerttype == 3){
                      $typeofseller=lang('Agency');
                    }
                    else if($rowsval->sellerttype == 2){
                      $typeofseller=lang('Private');
                    }else{
                      $typeofseller =  lang('Admin');
                    }
                    }else{
                    $sellerinfo = getsellersinfo($rowsval->userid); 
                    
                    if($sellerinfo->usertype == 2){
                      $typeofseller = lang('Private');
                    }else if($sellerinfo->usertype == 3){ 
                      $typeofseller = lang('Agency');
                    }else if($sellerinfo->usertype == 4){ 
                      $typeofseller =  lang('Admin');
                    }
                  }
                  ?>
            <p class='res-card-det-text'>
              <span class=''><?php echo $typeofseller; ?></span>
              <?php if($rowsval->scrapper_id > 0){?>
                <span class='res-dettext-hid' title="<?php echo $rowsval->goal_url; ?>"><?php echo $rowsval->Company; ?></span>

             <?php  }else{ ?>
              <span class='res-dettext-hid' title="au2mobile.com">au2mobile</span>
             <?php } ?>
            </p>
            <div class='res-loc-shre-con'>
                 <div class='res-location-leftsd-con'>
              <img class='res-location-ico showmap' src='assets/image/location-icon-red.svg' alt='' title='<?php echo lang('location_map'); ?>' id="<?php echo $i."_". (strlen($rowsval->postcode)>=5? $rowsval->postcode: "0".$rowsval->postcode)." ".$rowsval->city;?>" data-id="<?php echo $i;?>">
              <p class='res-location-text'><?php echo $rowsval->postcode; ?> <?php echo $rowsval->city; ?></p>
              <div class='res-share-ico-box'>
				 <?php
				 $userid = $this->session->userdata('userid');
				 $vehicleid = $rowsval->carid;
				 $where = array('user_id' => $userid, 'vehicle_id' => $vehicleid);
				 $chkfavorites = $this->homemodel->getSingle(FAVORITES, $where);
				
         ?>
                <?php
                /** Yash:Task.no 155 */
                if ($this->session->userdata('userid')) {
                ?>
                <!--Yash:Task.no M28 -->
                <!--Yash:Task.no 316 -->
                <div class='hand-cursor res-share-ico-link <?php  if($chkfavorites){ echo "activefavorites";}?> usr_fav' href="javascript:void(0);" id="idfavorites<?php echo $rowsval->carid;  ?>" onclick="favoritesvehicle(<?php echo $rowsval->carid;  ?>);">
					        <img id="img_<?php echo $rowsval->carid; ?>" class='res-share-icon <?php  if($chkfavorites){ echo "res-share-icon-clicked";}?>' src='<?php if($chkfavorites){ ?>assets/image/star-icon-darkgray.svg <?php } else {?> assets/image/star-hollow-icon.svg <?php } ?>' alt='' title='<?php echo lang('Favorite'); ?>'>
                </div>
                <!-- ***************** -->
                <?php
                } else {
                    ?>
                    <!--Yash:Task.no 316 -->
                    <div class='hand-cursor res-share-ico-link <?php  if($chkfavorites){ echo "activefavorites";}?> usr_fav' href="javascript:void(0);" id="idfavorites<?php echo $rowsval->carid;  ?>" onclick="login('<?=current_url().'?'.$_SERVER['QUERY_STRING']?>');">
                      <img class='res-share-icon <?php  if($chkfavorites){ echo "res-share-icon-clicked";}?>' src='assets/image/star-hollow-icon.svg' alt='' title='<?php echo lang('Favorite'); ?>'>
                    </div>
                    <!--****************** -->
                <!-- **************** -->
                    <?php
                }
                /***************************** */
                ?>
                <?php
                  $email="";
                

                   if($rowsval->scrapper_id > 0){
                     if(!isset($_GET['offset'])){
                       $offset=0;
                     }else{
                       $offset=$_GET['offset'];
                     }
                     $convertedCarid=str_replace("==","",base64_encode($rowsval->carid));
                     $email=base_url()."searchresult?ad=".$convertedCarid;
                     

                   }else{
                    $email=$actual_link.'/'.base64_encode($rowsval->carid)."/".$rowsval->cartitleurl;
                    
                   }
               
               ?>

                     <div class='hand-cursor res-share-ico-link share-dropdown-con' href=''>
                    <img class='res-share-icon' src='assets/image/share-hollow-icon.svg' alt=''  title='<?php echo lang('Share');?>'>
                    <!-- share dropdown item container start -->
                    
                    <!-- * ***** Rizwan: task no.46 ***** * -->
                    <div class='share-drop-down-box'>
                      <div class='share-drop-down-cone-box'>
                        <div class='share-dorp-down-cone'></div>
                      </div>
                      <a class='share-itemlink' href="mailto:?subject=<?php echo lang('email_subject'); ?>&amp;body=<?php echo $rowsval->cartitlename." ".urlencode($share_link_url); ?>" target="_blank">
                        <div class='share-selectitem'>
                           <img class='share-select-icon' src='<?= base_url();?>/assets/image/email-icon-hollow.svg' alt=''>
                           <p class='share-select-text'>Email</p>
                        </div>
                     </a>
                     <a class='share-itemlink' href="https://api.whatsapp.com/send?text=<?php echo str_replace('#', ' ', $rowsval->cartitlename)." ". $share_link_url; ?>" target="_blank">
                        <div class='share-selectitem'>
                           <img class='share-select-icon' src='<?= base_url();?>/assets/image/whatsapp-icon.svg' alt=''>
                           <p class='share-select-text'>Whatsapp</p>
                        </div>
                     </a>
                     <a class='share-itemlink' href="https://twitter.com/intent/tweet?text=<?php echo str_replace('#', ' ', $rowsval->cartitlename);?>&amp;url=<?php echo $share_link_url; ?>" target="_blank">
                        <div class='share-selectitem'>
                           <img class='share-select-icon' src='<?= base_url();?>/assets/image/twitter-icon.svg' alt=''>
                           <p class='share-select-text'>Twitter</p>
                        </div>
                     </a>
                     <?php
                     if($rowsval->scrapper_id > 0){
                       $sharefb=$rowsval->goal_url;
                     }else{
                     $sharefb=$actual_link.'/'.base64_encode($rowsval->carid).'/'.$rowsval->cartitleurl; 
                     }
                     
                     ?>
                     <a class='share-itemlink' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link_url; ?>" target="_blank">
                        <div class='share-selectitem'>
                           <img class='share-select-icon' src='<?= base_url();?>/assets/image/facebook-icon.svg' alt=''>
                           <p class='share-select-text'>Facebook</p>
                        </div>
                     </a>
                     
                     <a class='share-itemlink' href="https://pinterest.com/pin/create/button/?url=<?php echo $share_link_url; ?>&amp;media=<?php echo $img; ?>&amp;data-pin-media=<?php echo $img; ?>;description=<?php echo $rowsval->cartitlename;?>" target="_blank">
                        <div class='share-selectitem'>
                           <img class='share-select-icon' src='<?= base_url();?>/assets/image/pinterest-icon.svg' alt=''>
                           <p class='share-select-text'>Pinterest</p>
                        </div>
                     </a>
                    </div>
                    <!-- * ********** * -->
                    
                    <!-- share dropdown item container start -->
                  </div>
                 <?php 
                          $where = array('vehicle_id'=>$rowsval->carid);                          
                          $likecount = $this->db->select('*')->from(LIKES)->where($where)->get()->result();
				?>
				<?php
				 $userid = $this->session->userdata('userid');
				 $vehicleid = $rowsval->carid;
				 $where = array('user_id' => $userid, 'vehicle_id' => $vehicleid, 
				 );
				 $chklike = $this->homemodel->getSingle(LIKES, $where);
         ?>
                <?php
                /**Yash:Task.no 155 */
                if ($this->session->userdata('userid')) {
                ?>
                <!--Yash:Task.no 316 -->
                <div class='res-share-ico-link hand-cursor usr_like' href="javascript:void(0)" id="idlikes<?=$rowsval->carid ?>" onclick="likesvehicle(<?php echo $rowsval->carid;  ?>);" >
                   <input type="hidden" name="" class="likecount<?=$rowsval->carid?>" value="<?php echo count($likecount);?>">
					          <img class='res-share-icon <?php if($chklike){ echo "activelikes"; }?> ' src='assets/image/thumbs-up-hollow-icon.svg' alt='' title='<?php echo lang('Like'); ?>'>
                </div>
                <!-- ************** -->
                <?php
                } else {
                    ?>
                    <!--Yash:Task.no 316 -->
                    <div class='res-share-ico-link hand-cursor usr_like' href="javascript:void(0)" id="idlikes<?=$rowsval->carid ?>" onclick="login('<?=current_url().'?'.$_SERVER['QUERY_STRING']?>');">
                      <input type="hidden" name="" class="likecount<?=$rowsval->carid?>" value="<?php echo count($likecount);?>">
                      <img class='res-share-icon <?php if($chklike){ echo "activelikes"; }?> ' src='assets/image/thumbs-up-hollow-icon.svg' alt='' title='<?php echo lang('Like'); ?>'>
                    </div>
                    <!--***************** -->
                    <?php
                }
                /****************************** */
                ?>
                <p class='res-share-like-number usr_like' >
                    <span class="final_cnt<?=$rowsval->carid?>"><?php if(count($likecount) > 0) { echo count($likecount); } ?></span>
                </p>
              </div>
                </div>
                 <!-- edit menu dropdown start -->
              <div class='edit-menu-icon-con'>
                <img class='edit-menu-icon-image' src='assets/image/menu-3dot-icon.svg' alt=''>
                <div class='edit-menu-drop-down-box'>
                  <div class='edit-menu-drop-down-cone-box'>
                    <div class='edit-menu-dorp-down-cone'></div>
                  </div>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Rate_car'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Compare_loans'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Compare_insurances'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Calculate_car_tax'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Register_car_online'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Order_car_parts'); ?></p>
                  </a>
                  <a class='edit-menu-itemlink' href='javascript:void(0)'>
                    <p class='edit-menu-select-text'><?php echo lang('Workshop_and_tires'); ?></p>
                  </a>
                </div>
              </div>
              <!-- edit menu dropdown end -->
            </div>
              
          </div>
        </div>
        <div class='res-card-location-con' id="mapdiv_<?php echo $i; ?>">
        
        </div>
      </div>
      <?php $i++;
      }
     } ?>
      <?php } ?>
      <div >
        <div class="pagefoot">
          <?php  echo $link; ?>
        </div>
      </div>
      
   

    </div>
        <?php
      } else {
        ?>
        <div class='res-card-cont'>
          <div class='res-card-outer text-center'>
            <?=lang('no_car_found')?>
          </div>
        </div>
        <?php
      }
      /**************************** */
      ?>
    
    <!-- result card box end -->

  </div>
</div>
<!-- body search filter and result card end -->


<!-- bottom fix icon start-->
<?php
// Yash:Task.no M51
if(!empty($carlists)){ 
?>
<a class='bottom-fix-icon-con' href='addcar'>
  <img class='bottom-fix-caricon' src='assets/image/sedan-car-front-icon.svg' alt='' title='<?php echo lang('sell_car'); ?>'>
</a>
<?php
}
// **********************
?>
<!-- bottom fix icon end-->

<script src='assets/scripts/jquery.min.js'></script>
<script src='assets/scripts/selectize.min.js'></script>
<script type="text/javascript">
var current_url = "<?=current_url()?>";
var resultbase_url = "<?=base_url()?>";
var to_txt = "<?=lang('To')?>";
var dataModel = '<?=$dataModel?>';
var dataMake = '<?=$dataMake?>';
var pagebase_url = '<?php echo base_url(); ?>';
var all="<?=lang('All')?>";
var zip_city_txt = "<?php echo lang('Zip') . "/" . lang('City'); ?>";
var outer="<?php echo $_GET['ad']; ?>";

</script>
<script src='assets/scripts/searchresult_js_test.js'></script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>



</body>

</html>
<!-- end -->