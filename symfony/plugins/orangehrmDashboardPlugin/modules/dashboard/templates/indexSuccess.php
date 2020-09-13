<?php //echo stylesheet_tag(plugin_web_path('orangehrmDashboardPlugin', 'css/orangehrmDashboardPlugin.css')); ?>
<?php echo stylesheet_tag(theme_path('css/bootstrap.min.css')); ?>
<?php  echo stylesheet_tag(theme_path('css/main_nabi.css')); ?>

<style type="text/css">
  /* XXX:   .loadmask {
        top:0;
        left:0;
        -moz-opacity: 0.5;
        opacity: .50;
        filter: alpha(opacity=50);
        background-color: #CCC;
        width: 100%;
        height: 100%;
        zoom: 1;
        background: #fbfbfb url("<?php //echo plugin_web_path('orangehrmDashboardPlugin', 'images/loading.gif') ?>") no-repeat center;
    } */
</style>
    <div class="inner1">

        <?php if (count($settings) == 0): ?>
            <div id="messagebar" style="margin-left: 16px;width: 700px;">
                <span style="font-weight: bold;">No Groups are Assigned</span>
            </div>
        <?php endif; ?>
        <?php
        foreach ($settings->getRawValue() as $groupKey => $config): ?>
            <div class="outerbox no-border">
            <div id="<?php echo "group_" . $groupKey ?>" class="maincontent group-wrapper">
            <?php
            if (!empty($config['attributes']['title'])):
                ?>
                 <div class="mainHeading">
                    <h2 class="paddingLeft"><?php echo $config['attributes']['title']?></h2>
                </div>
                <?php
            endif;
            ?>
                <?php
                ?>
                    <?php foreach ($config['panels'] as $panelKey => $panel): ?>
                        <?php $styleString = isset($panel['attributes']['width']) ? "width:" . $panel['attributes']['width'] . "px;" : ""; ?>

                            <div id="<?php echo "group" . $groupKey . "_" . $panelKey; ?>" class="panel_draggable panel-preview" >
                                <?php include_component('dashboard', 'ohrmDashboardSection', $panel['attributes']) ?>
                            </div>


                    <?php endforeach; ?>
                    <?php /*</div>*/?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>

<style type="text/css">
    .outerbox:last-of-type{
        width: 100%;
    }
    .container-statistique{
        align-items: self-start;
    }
</style>
<script>
    $("#group_1").addClass("row");
    $("#group_1").addClass("container-statistique");
    $("#group1_0").addClass("col-lg-4");
    //$("#group1_1").addClass("col-lg-4");
    $("#group1_2").addClass("col-lg-8");
    /**/
    $("#group1_1").css("display","none");
</script>
