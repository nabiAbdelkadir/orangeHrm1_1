<?php
echo use_stylesheet(plugin_web_path('orangehrmCorePlugin', 'css/mainMenuComponent.css'));
echo use_javascript(plugin_web_path('orangehrmCorePlugin', 'js/mainMenuComponent.js'));

function getSubMenuIndication($menuItem) {
    if (count($menuItem['subMenuItems']) > 0) {
        return ' class="arrow"';
    } else {
        return '';
    }

}
function getListItemClass($menuItem, $currentItemDetails, $additionalClasses = []) {
    $additionalClasses = implode(" ", $additionalClasses);

    if ($menuItem['level'] == 1 && $menuItem['id'] == $currentItemDetails['level1']) {
        return empty($additionalClasses) ? ' class="current"' : ' class="current ' . $additionalClasses . '"';
    } elseif ($menuItem['level'] == 2 && $menuItem['id'] == $currentItemDetails['level2']) {
        return empty($additionalClasses) ? ' class="selected"' : ' class="selected ' . $additionalClasses . '"';
    }
    return empty($additionalClasses) ? '' : ' class="' . $additionalClasses . '"';
}
function getMenuUrl($menuItem) {
    $url = '#';
    if (!empty($menuItem['module']) && !empty($menuItem['action'])) {
        $url = url_for($menuItem['module'] . '/'. $menuItem['action']);
        $url = empty($menuItem['urlExtras'])?$url:$url . $menuItem['urlExtras'];
    }
    return $url;
}

function getHtmlId($menuItem) {

    $id = '';

    if (!empty($menuItem['action'])) {
        $id = 'menu_' . $menuItem['module'] . '_' . $menuItem['action'];
    } else {
        $module             = '';
        $firstSubMenuItem   = $menuItem['subMenuItems'][0];
        $module             = $firstSubMenuItem['module'] . '_';

        $id = 'menu_' . $module . str_replace(' ', '', $menuItem['menuTitle']);
    }
    return $id;
}
  function getUniqueId($menuItem){
    return "unique_". getHtmlId($menuItem);
  }
?>

<?php
function getIcon($mkey){
    $arrayIcons = array(
        "Admin" => "fa fa-lock",
        "PIM"   => "fa fa-user",
        "Leave" => "fa fa-calendar",
        "Time"  => "fa fa-clock-o"
    );
    foreach($arrayIcons as $key=>$value){
        if ($mkey==$key){
            return $value;
        }
    }
    return "fa fa-user";
}
?>
<?php
    function generateId($id,$href){
        $subHref =substr($href,getPostionSlash($href));
        return $id.$subHref;
    }
    function getPostionSlash($str){
        $pos =strrpos($str,"/");
        return $pos;
    }
?>

    <p style="font-weight: bold;">GENERAL</p>
    <ul class= "list-sidebar bg-defoult list-unstyled">
          <?php foreach ($menuItemArray as $firstLevelItem) : ?>
              <li id="<?php echo getHtmlId($firstLevelItem); ?>">
              <a href="<?php echo getMenuUrl($firstLevelItem); ?>"
                 id="<?php echo getHtmlId($firstLevelItem); ?>"
                  <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>
                 data-toggle="collapse"
                 data-target="#<?php echo getUniqueId($firstLevelItem);?>"
                 <?php endif;  ?>
                 class="collapsed">
                    <i class=" data <?php getIcon($firstLevelItem['menuTitle']); ?>"></i>
                     <span class="nav-label" style="margin-rigth:10px;">
                        <?php echo __($firstLevelItem['menuTitle']) ?>
                     </span>
                     <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>
                      <i class="fa fa-chevron-right pull-right" style="float:right;margin-top: 7px;"></i>
                     <?php endif;  ?>
                  </a>
              <ul class="sub-menu collapse list-unstyled" id="<?php echo getUniqueId($firstLevelItem);?>" >
              <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>
                      <?php foreach ($firstLevelItem['subMenuItems'] as $secondLevelItem) : ?>

                      <li id="<?php echo getHtmlId($secondLevelItem); ?>">
                        <?php // XXX:<a href="<?php echo getMenuUrl($secondLevelItem); ?>
                      <a href="<?php echo getMenuUrl($secondLevelItem); ?>"
                          id="<?php echo getHtmlId($secondLevelItem); ?>"

                           <?php if (count($secondLevelItem['subMenuItems'])  > 0) :  ?>
                            data-toggle="collapse"
                            data-target="#<?php echo getUniqueId($secondLevelItem); ?>"
                           <?php endif;  ?>

                          class="collapsed"
                          <?php echo getSubMenuIndication($secondLevelItem); ?>>
                           <?php if (count($secondLevelItem['subMenuItems']) > 0) :  ?>
                               <i class="fa fa-th-large"></i>
                             <?php endif;  ?>
                           <span class="nav-label"><?php echo __($secondLevelItem['menuTitle']); ?></span>
                           <?php if (count($secondLevelItem['subMenuItems']) > 0) :  ?>
                               <span class="fa fa-chevron-right pull-right" style="float:right;margin-top: 7px;"></span>
                             <?php endif;  ?>

                      </a>

                          <?php if (count($secondLevelItem['subMenuItems']) > 0) : ?>
                              <ul class="sub-menu collapse list-unstyled thirdLevelItem" id="<?php echo getUniqueId($secondLevelItem); ?>" >
                                  <?php foreach ($secondLevelItem['subMenuItems'] as $thirdLevelItem) : ?>
                                      <li>
                                            <li>
                                              <a
                                                href="<?php echo getMenuUrl($thirdLevelItem);?>">
                                                <?php echo __($thirdLevelItem['menuTitle']) ?>
                                            </a>
                                          </li>
                                        </a>
                                    </li>
                                  <?php endforeach; ?>
                              </ul> <!-- third level -->

                          <?php endif; ?>

                          </li>

                      <?php endforeach; ?>
              <?php else:
                  // Empty li to add an orange bar and maintain uniform look.
              ?>
              <?php endif;?>
                  </ul> <!-- second level -->
              </li>
          <?php endforeach; ?>
      </ul> <!-- first level -->

      <div class="row">
          <div class="" style="flex:1">
              Milestone
          </div>
          <div class="">
                30%
          </div>
      </div>
      <div class="progress">
            <div class="progress-bar"
             role="progressbar"
             aria-valuenow="40"
             aria-valuemin="0"
             aria-valuemax="100"
              style="width:40%"></div>
      </div>
      <div class="row">
          <div class="" style="flex:1">
              Relase
          </div>
          <div class="">
                60%
          </div>
      </div>
        <div class="progress">
            <div class="progress-bar bg-warning"
            role="progressbar" style="width: 60%;"
            aria-valuenow="25"
            aria-valuemin="0"
             aria-valuemax="100"></div>
        </div>
        <div class="row icons text-center">
          <i class="fa fa-users" ></i>
          <i class="fa fa-users" ></i>
          <i class="fa fa-users" ></i>


        </div>
<?php
/*

<div id="mainMenu" class="menu">

    <ul id="mainMenuFirstLevelUnorderedList1" class="main-menu-first-level-unordered-list main-menu-first-level-unordered-list-width">

        <?php foreach ($menuItemArray as $firstLevelItem) : ?>

            <li<?php echo getListItemClass($firstLevelItem, $currentItemDetails, ['main-menu-first-level-list-item']); ?>><a href="<?php echo getMenuUrl($firstLevelItem); ?>" id="<?php echo getHtmlId($firstLevelItem); ?>" class="firstLevelMenu"><b><?php echo __($firstLevelItem['menuTitle']) ?></b></a>

            <ul>
            <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>

                    <?php foreach ($firstLevelItem['subMenuItems'] as $secondLevelItem) : ?>

                    <li<?php echo getListItemClass($secondLevelItem, $currentItemDetails); ?>><a href="<?php echo getMenuUrl($secondLevelItem); ?>" id="<?php echo getHtmlId($secondLevelItem); ?>"<?php echo getSubMenuIndication($secondLevelItem); ?>><?php echo __($secondLevelItem['menuTitle']) ?></a>

                        <?php if (count($secondLevelItem['subMenuItems']) > 0) : ?>

                            <ul>
                                <?php foreach ($secondLevelItem['subMenuItems'] as $thirdLevelItem) : ?>
                                    <li><a href="<?php echo getMenuUrl($thirdLevelItem); ?>" id="<?php echo getHtmlId($thirdLevelItem); ?>"><?php echo __($thirdLevelItem['menuTitle']) ?></a></li>
                                <?php endforeach; ?>
                            </ul> <!-- third level -->

                        <?php endif; ?>

                        </li>

                    <?php endforeach; ?>
            <?php else:
                // Empty li to add an orange bar and maintain uniform look.
            ?>
                        <li></li>
            <?php endif; ?>

                </ul> <!-- second level -->
            </li>

        <?php endforeach; ?>

    </ul> <!-- first level -->

</div> <!-- menu -->

*/

 ?>

