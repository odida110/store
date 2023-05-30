
<?php 

$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link);
$page = $link_array[3];

?>
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
    <div class="logo">
        <a hef="store">
            <h2>Library</h2>
        </a>
    </div>
    <div class="navi">
        <ul>
            <li class="<?php if($page == "store") { echo 'active'; } ?>"><a href="<?php echo $dB ?>"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">stores</span></a></li>
        
            <li class="<?php if($page == "Category") { echo 'active'; } ?>"><a href="<?php echo $dC ?>"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Categories</span></a></li>
        </ul>
    </div>
</div>