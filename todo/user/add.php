
    <?php 
   
require "../database/Task.php";

if (isset($_POST['title']) && isset($_POST['description'])) {
    $task_class = new Task;
   $task_mess =  $task_class->add_task($_POST['title'], $_POST['description']);
    $task_last_id = $task_class->get_last_id();
    $count = $task_class->get_count();
    $task_check =  $task_class->check_task($_POST['title'], $_POST['description'], $_POST['search'], $_POST['filter'], $task_last_id);
    // var_dump($_POST);
    // var_dump($task_check);
    if ($task_check!=0) {
        if ($count != 1) {
            echo "<div class='line'></div>";
        }
        
       echo "
        <div class='one_note_block'>
            <form class='not_done'> 
                <input type='hidden' value='$task_last_id' name='id'>
                <input type='checkbox' checked value='false' name='checkbox' style='display:none;'>
            </form>
            <div></div>
            <div class='not_done_note'>".$_POST['title']."</div>
            <svg class='edit' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg' onclick='getEdit($task_last_id)'>
                <path d='M7.67272 3.99106L1 10.6637V14H4.33636L11.0091 7.32736M7.67272 3.99106L10.0654 1.59837L10.0669 1.59695C10.3962 1.26759 10.5612 1.10261 10.7514 1.04082C10.9189 0.986392 11.0993 0.986392 11.2669 1.04082C11.4569 1.10257 11.6217 1.26735 11.9506 1.59625L13.4018 3.04738C13.7321 3.37769 13.8973 3.54292 13.9592 3.73337C14.0136 3.90088 14.0136 4.08133 13.9592 4.24885C13.8974 4.43916 13.7324 4.60414 13.4025 4.93398L13.4018 4.93468L11.0091 7.32736M7.67272 3.99106L11.0091 7.32736' stroke='#CDCDCD' stroke-linecap='round' stroke-linejoin='round'/>
            </svg>
            <svg class='trash' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg' onclick='sendDelete($task_last_id)'>
                <path d='M3.87414 7.61505C3.80712 6.74386 4.49595 6 5.36971 6H12.63C13.5039 6 14.1927 6.74385 14.1257 7.61505L13.6064 14.365C13.5463 15.1465 12.8946 15.75 12.1108 15.75H5.88894C5.10514 15.75 4.45348 15.1465 4.39336 14.365L3.87414 7.61505Z' stroke='#CDCDCD'/>
                <path d='M14.625 3.75H3.375' stroke='#CDCDCD' stroke-linecap='round'/>
                <path d='M7.5 2.25C7.5 1.83579 7.83577 1.5 8.25 1.5H9.75C10.1642 1.5 10.5 1.83579 10.5 2.25V3.75H7.5V2.25Z' stroke='#CDCDCD'/>
                <path d='M10.5 9V12.75' stroke='#CDCDCD' stroke-linecap='round'/>
                <path d='M7.5 9V12.75' stroke='#CDCDCD' stroke-linecap='round'/>
            </svg>
        </div>
     </div>";
        // $new_task = $task_mess->get_last_task();
    
        // echo "<div class='task'>
        //         <h3>{$new_task['title']}</h3>
        //         <p>{$new_task['description']}</p>
        //       </div>";
    }
    }
    
// $task_mess = new Task;
// $task_mess = $task_mess -> add_task($_POST['title'], $_POST['description']);

// echo "dsfsd";
// echo "<div>$task</div>";
?>
<!-- <?php 
    // $tasks = new Task;
    // $tasks = $tasks->get_tasks(NULL, NULL);
    // $count = count($tasks);
    // $counter = 0;
    // foreach ($tasks as $task) {
    //     $counter++;
    //     if ($task[4] == 'false') {
    ?>
     <div class="one_note_block">
        <form class="not_done"> 
            <input type="hidden" value="<?=$task[0]?>" name="id">
            <input type="checkbox" checked value="false" name="checkbox" style="display:none;">
        </form>
        <div></div>
        <div class="not_done_note"><?=$task[2]?></div>
        <svg class="edit" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.67272 3.99106L1 10.6637V14H4.33636L11.0091 7.32736M7.67272 3.99106L10.0654 1.59837L10.0669 1.59695C10.3962 1.26759 10.5612 1.10261 10.7514 1.04082C10.9189 0.986392 11.0993 0.986392 11.2669 1.04082C11.4569 1.10257 11.6217 1.26735 11.9506 1.59625L13.4018 3.04738C13.7321 3.37769 13.8973 3.54292 13.9592 3.73337C14.0136 3.90088 14.0136 4.08133 13.9592 4.24885C13.8974 4.43916 13.7324 4.60414 13.4025 4.93398L13.4018 4.93468L11.0091 7.32736M7.67272 3.99106L11.0091 7.32736" stroke="#CDCDCD" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg class="trash" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.87414 7.61505C3.80712 6.74386 4.49595 6 5.36971 6H12.63C13.5039 6 14.1927 6.74385 14.1257 7.61505L13.6064 14.365C13.5463 15.1465 12.8946 15.75 12.1108 15.75H5.88894C5.10514 15.75 4.45348 15.1465 4.39336 14.365L3.87414 7.61505Z" stroke="#CDCDCD"/>
            <path d="M14.625 3.75H3.375" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 2.25C7.5 1.83579 7.83577 1.5 8.25 1.5H9.75C10.1642 1.5 10.5 1.83579 10.5 2.25V3.75H7.5V2.25Z" stroke="#CDCDCD"/>
            <path d="M10.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
        </svg>
    </div>
    <?php
        // } else {
    ?>
    <div class="one_note_block">
        <form class="done">
        <input type="hidden" value="<?=$task[0]?>" name="id">
        <input type="checkbox" checked value="true" name="checkbox"  style="display:none;">
            <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="path-1-inside-1_18_421" fill="white">
                <path d="M4.9978 14.6488L1.72853e-05 9.74756L9.55927 2.22748e-06L14.5571 4.90124L4.9978 14.6488Z"/>
                </mask>
                <path d="M4.9978 14.6488L3.59745 16.0767L5.02539 17.4771L6.42574 16.0491L4.9978 14.6488ZM6.39816 13.2209L1.40037 8.31962L-1.40034 11.1755L3.59745 16.0767L6.39816 13.2209ZM13.1291 3.50089L3.56986 13.2484L6.42574 16.0491L15.985 6.30159L13.1291 3.50089Z" fill="#F7F7F7" mask="url(#path-1-inside-1_18_421)"/>
            </svg>
        </form>
        <div></div>
        <div class="done_note"><?=$task[2]?></div>
        <svg class="edit" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.67272 3.99106L1 10.6637V14H4.33636L11.0091 7.32736M7.67272 3.99106L10.0654 1.59837L10.0669 1.59695C10.3962 1.26759 10.5612 1.10261 10.7514 1.04082C10.9189 0.986392 11.0993 0.986392 11.2669 1.04082C11.4569 1.10257 11.6217 1.26735 11.9506 1.59625L13.4018 3.04738C13.7321 3.37769 13.8973 3.54292 13.9592 3.73337C14.0136 3.90088 14.0136 4.08133 13.9592 4.24885C13.8974 4.43916 13.7324 4.60414 13.4025 4.93398L13.4018 4.93468L11.0091 7.32736M7.67272 3.99106L11.0091 7.32736" stroke="#CDCDCD" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg class="trash" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.87414 7.61505C3.80712 6.74386 4.49595 6 5.36971 6H12.63C13.5039 6 14.1927 6.74385 14.1257 7.61505L13.6064 14.365C13.5463 15.1465 12.8946 15.75 12.1108 15.75H5.88894C5.10514 15.75 4.45348 15.1465 4.39336 14.365L3.87414 7.61505Z" stroke="#CDCDCD"/>
            <path d="M14.625 3.75H3.375" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 2.25C7.5 1.83579 7.83577 1.5 8.25 1.5H9.75C10.1642 1.5 10.5 1.83579 10.5 2.25V3.75H7.5V2.25Z" stroke="#CDCDCD"/>
            <path d="M10.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
        </svg>
    </div>
    <?php
    // }
    // if ($counter != $count) {
    ?>
      <div class="line"></div>
    <?php
    // }
    ?>
  
    <?php
    // } ?>




-->
<div id="mess" style="position: absolute;
    top:23.5%;
    left:0;
    font-size:1vmax;
    border-radius: 0.5vmax;
    width: 17vmax;
    text-align: center;
    color:#F7F7F7;
    height:3vmax;
    display:grid;
    align-items:center;
    font-family: 'KanitM';
    text-transform: uppercase;
    transition: all 1s ease-out;
    background-color:  rgba(108,99,255, 0.6); "><div><?=$task_mess?></div></div>
<script src="js/mess.js"></script>
<script src="js/script.js"></script> 