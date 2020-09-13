<?php  echo stylesheet_tag(theme_path('css/bootstrap.min.css')); ?>
<?php  echo stylesheet_tag(theme_path('css/main_nabi.css')); ?>

<div class="row">
    <p style="flex:1" >Pending Leave Request <span class="dot text-center">5</span></p>
    <p >See all</p>
</div>

<?php $recCount = count($leaveList); ?>
<div id="task-list-group-panel-container ">
    <div id="task-list-group-panel-menu_holder"
         class="task-list-group-panel-menu_holder" style="height:85%; overflow-x: hidden; overflow-y: auto;">
        <table class="table hover">
          <?php
            /*
             *   <thead>
            <tr class="title">
                <th scope="col">Emplyoyee</th>
                <th scope="col">Leave type</th>
                <th scope="col">date</th>
                <th scope="col">day</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>*/
          ?>

            <tbody>
                <?php
                if ($recCount > 0):
                    $count = 0;
                    foreach ($leaveList as $key => $leaveData):
                        ?>
                        <tr class="<?php echo ($count & 1) ? 'even' : 'odd' ?> class="title"">
                            <td>
                                <a href="<?php echo url_for('leave/viewLeaveRequest') . '/id/' . $leaveData['leaveRequestId'] ?>">
                                    <?php
                                    $count++;
                                    echo str_pad($count, 2, '0', STR_PAD_LEFT) . ". " . $leaveData['firstName'] . " " . $leaveData['lastName'] . " " . set_datepicker_date_format($leaveData['dateApplied']);
                                    ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>                    
                <?php else: ?>
                        <tr class="odd"><td><?php echo __(DashboardService::NO_REC_MESSAGE); ?></td></tr>
                <?php endif; ?>
            </tbody>  
        </table>
    </div>

    <div id="total" >
        <table class="table">
            <tr class="total">
                <td style="text-align:left;padding-left:20px; cursor: pointer">
                    <?php
                    $date = pendingLeaveRequestsAction::getDateRange();
                    $dateRange = set_datepicker_date_format($date->getFromDate()) .' '. __('to') . ' ' .set_datepicker_date_format($date->getToDate());
                    echo ' <span title = "' . $dateRange . '">' . __('%months% month(s)', array('%months%' => 3)) . '</span>';
                    ?>
                </td>
                <td style="text-align:right;padding-right:20px;">
                    <?php
                    echo __('Total : ') . $recCount . ' / ' . $recordCount;
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // hover color change effect
        $("#task-list-group-panel-slider li").hover(function() {
            $(this).animate({opacity: 0.90}, 100, function(){ 
                $(this).animate({opacity: 1}, 0);
            } );
        });     
    });

</script>
<style>
     .dot {
        height: 25px;
        width: 25px;
        background-color: #DC3545;
        border-radius: 50%;
        display: inline-block;
        color: white;
    }
</style>