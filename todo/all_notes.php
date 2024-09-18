<?php require "header.php"; 
require "database/Task.php";
if (!isset($_SESSION['user'])) {header ("Location: index.php"); }
else {
    unset($_SESSION['mess']);
} ?>
<body id="body">
    <div class="vh8 exit_grid">
        <a href='user/exit.php' class="inputSubmitModal w10 exit">ВЫЙТИ</a>
    </div>
    <div class="headline">TODO LIST</div>
    <div class="vh2_3"></div>
    <div class="searchRow">
        <input class="searchInput" placeholder="Найти задачу..." id="search" name="search">
        <svg class="searchIcon" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.7773 20.184L15.9056 15.312H15.8531C17.3547 13.5415 18.1136 11.2588 17.9709 8.94156C17.8282 6.62433 16.7951 4.45202 15.0876 2.87905C13.3801 1.30608 11.1306 0.454303 8.80958 0.501892C6.48855 0.549481 4.27583 1.49275 2.63427 3.13439C0.992706 4.77602 0.0494786 6.98885 0.00189181 9.30999C-0.045695 11.6311 0.806045 13.8808 2.37894 15.5883C3.95184 17.2958 6.12404 18.329 8.44117 18.4717C10.7583 18.6144 13.0408 17.8555 14.8113 16.3539C14.8113 16.3539 14.8113 16.3914 14.8113 16.4063L19.6831 21.2783C19.7527 21.3485 19.8356 21.4043 19.927 21.4424C20.0183 21.4804 20.1163 21.5 20.2152 21.5C20.3141 21.5 20.4121 21.4804 20.5034 21.4424C20.5948 21.4043 20.6777 21.3485 20.7473 21.2783C20.8242 21.2103 20.8862 21.1272 20.9296 21.0342C20.9731 20.9412 20.9969 20.8402 20.9997 20.7376C21.0025 20.635 20.9842 20.533 20.946 20.4377C20.9077 20.3425 20.8503 20.2561 20.7773 20.184ZM9.00276 16.9685C7.5204 16.9685 6.07133 16.5289 4.83879 15.7053C3.60625 14.8817 2.64561 13.7111 2.07833 12.3415C1.51106 10.9719 1.36263 9.46488 1.65183 8.01094C1.94102 6.55699 2.65485 5.22146 3.70303 4.17322C4.75122 3.12499 6.08669 2.41113 7.54057 2.12192C8.99445 1.83272 10.5014 1.98115 11.871 2.54845C13.2405 3.11575 14.411 4.07644 15.2346 5.30904C16.0581 6.54163 16.4977 7.99077 16.4977 9.4732C16.4977 10.4575 16.3038 11.4322 15.9272 12.3415C15.5505 13.2509 14.9985 14.0772 14.3025 14.7732C13.6065 15.4692 12.7803 16.0213 11.871 16.3979C10.9616 16.7746 9.98701 16.9685 9.00276 16.9685Z" fill="#6C63FF"/>
        </svg>
        <select class="violet" id="filter" name="filter">
            <option value="all">ВСЕ</option>
            <option value="true">☑</option>
            <option value="false">⊠</option>
        </select>
        <div class="violet" id="theme">
            <svg viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1249 0.548798C11.3387 0.917354 11.321 1.3762 11.0791 1.72705C10.3455 2.79152 9.91599 4.08062 9.91599 5.47334C9.91599 9.12428 12.8757 12.084 16.5266 12.084C17.9194 12.084 19.2085 11.6545 20.2729 10.9208C20.6238 10.6791 21.0826 10.6613 21.4512 10.8751C21.8197 11.089 22.0319 11.4962 21.9961 11.9208C21.5191 17.567 16.7867 22 11.0178 22C4.93282 22 0 17.0672 0 10.9822C0 5.21328 4.43301 0.480873 10.0792 0.00392422C10.5038 -0.0319387 10.911 0.180242 11.1249 0.548798ZM8.17985 2.63461C4.70452 3.81573 2.20355 7.10732 2.20355 10.9822C2.20355 15.8502 6.14981 19.7964 11.0178 19.7964C14.8927 19.7964 18.1843 17.2955 19.3654 13.8202C18.4741 14.1232 17.5191 14.2875 16.5266 14.2875C11.6587 14.2875 7.71244 10.3413 7.71244 5.47334C7.71244 4.48086 7.87682 3.52582 8.17985 2.63461Z" fill="#F7F7F7"/>
            </svg>
        </div>
        <select class="violet" id="sort" name="sort">
            <option value="created_at ASC">СНАЧАЛА СТАРЫЕ</option>
            <option value="created_at DESC">СНАЧАЛА НОВЫЕ</option>
            <option value="is_completed ASC">СНАЧАЛА ☑</option>
            <option value="is_completed DESC">СНАЧАЛА ⊠</option>
        </select>
    </div>
    <div class="vh3_3"></div>
    <main id="main">
    <?php 
    $tasks = new Task;
    if (isset($_POST['filter']) and $_POST['filter'] == 'all') {$_POST['filter'] = NULL;}

    if (!isset($_POST['filter'])) {$_POST['filter'] = NULL;}
    if (!isset($_POST['sort'])) {$_POST['sort'] = NULL;}
    if (!isset($_POST['search'])) {$_POST['search'] = NULL;}

    $tasks = $tasks->get_tasks($_POST['search'], $_POST['filter'], $_POST['sort']);
  
    $count = count($tasks);
    $counter = 0;
    if ($count !=0) {
    foreach ($tasks as $task) {
    ?>
      <img src="images/Detective-check-footprint 1.svg" class="detective" id="detective" style="display: none; ">
    <div class="vh2_3" id="vh_empty" style="display: none; "></div>
    <div class="empty" id="empty" style="display: none; ">Пусто...</div>
    <?php

        $counter++;
        if ($task[4] == 'false') {
    ?>
     <div class="one_note_block">
        <form class="not_done"> 
            <input type="hidden" value="<?=$task[0]?>" name="id">
            <input type="checkbox" checked value="false" name="checkbox" style="display:none;">
        </form>
        <div></div>
        <div class="not_done_note"><?=$task[2]?></div>
        <svg class="edit" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="getEdit(<?=$task[0]?>)">
            <path d="M7.67272 3.99106L1 10.6637V14H4.33636L11.0091 7.32736M7.67272 3.99106L10.0654 1.59837L10.0669 1.59695C10.3962 1.26759 10.5612 1.10261 10.7514 1.04082C10.9189 0.986392 11.0993 0.986392 11.2669 1.04082C11.4569 1.10257 11.6217 1.26735 11.9506 1.59625L13.4018 3.04738C13.7321 3.37769 13.8973 3.54292 13.9592 3.73337C14.0136 3.90088 14.0136 4.08133 13.9592 4.24885C13.8974 4.43916 13.7324 4.60414 13.4025 4.93398L13.4018 4.93468L11.0091 7.32736M7.67272 3.99106L11.0091 7.32736" stroke="#CDCDCD" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg class="trash" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="sendDelete(<?=$task[0]?>)">
            <path d="M3.87414 7.61505C3.80712 6.74386 4.49595 6 5.36971 6H12.63C13.5039 6 14.1927 6.74385 14.1257 7.61505L13.6064 14.365C13.5463 15.1465 12.8946 15.75 12.1108 15.75H5.88894C5.10514 15.75 4.45348 15.1465 4.39336 14.365L3.87414 7.61505Z" stroke="#CDCDCD"/>
            <path d="M14.625 3.75H3.375" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 2.25C7.5 1.83579 7.83577 1.5 8.25 1.5H9.75C10.1642 1.5 10.5 1.83579 10.5 2.25V3.75H7.5V2.25Z" stroke="#CDCDCD"/>
            <path d="M10.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
        </svg>
    </div>
    <?php
        } else {
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
        <svg class="edit" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="getEdit(<?=$task[0]?>)">
            <path d="M7.67272 3.99106L1 10.6637V14H4.33636L11.0091 7.32736M7.67272 3.99106L10.0654 1.59837L10.0669 1.59695C10.3962 1.26759 10.5612 1.10261 10.7514 1.04082C10.9189 0.986392 11.0993 0.986392 11.2669 1.04082C11.4569 1.10257 11.6217 1.26735 11.9506 1.59625L13.4018 3.04738C13.7321 3.37769 13.8973 3.54292 13.9592 3.73337C14.0136 3.90088 14.0136 4.08133 13.9592 4.24885C13.8974 4.43916 13.7324 4.60414 13.4025 4.93398L13.4018 4.93468L11.0091 7.32736M7.67272 3.99106L11.0091 7.32736" stroke="#CDCDCD" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg class="trash" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="sendDelete(<?=$task[0]?>)">
            <path d="M3.87414 7.61505C3.80712 6.74386 4.49595 6 5.36971 6H12.63C13.5039 6 14.1927 6.74385 14.1257 7.61505L13.6064 14.365C13.5463 15.1465 12.8946 15.75 12.1108 15.75H5.88894C5.10514 15.75 4.45348 15.1465 4.39336 14.365L3.87414 7.61505Z" stroke="#CDCDCD"/>
            <path d="M14.625 3.75H3.375" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 2.25C7.5 1.83579 7.83577 1.5 8.25 1.5H9.75C10.1642 1.5 10.5 1.83579 10.5 2.25V3.75H7.5V2.25Z" stroke="#CDCDCD"/>
            <path d="M10.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
            <path d="M7.5 9V12.75" stroke="#CDCDCD" stroke-linecap="round"/>
        </svg>
    </div>
    <?php
    }
    if ($counter != $count) {
    ?>
      <div class="line"></div>
    <?php
    }
    ?>
  
    <?php
    } } else {
    ?>
    <img src="images/Detective-check-footprint 1.svg" class="detective" id="detective">
    <div class="vh2_3" id="vh_empty"></div>
    <div class="empty" id="empty">Пусто...</div>
    <?php
    } ?>
    </main>
<div class="plus" id="plus">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 22.5C10.5 22.8978 10.658 23.2794 10.9393 23.5607C11.2206 23.842 11.6022 24 12 24C12.3978 24 12.7794 23.842 13.0607 23.5607C13.342 23.2794 13.5 22.8978 13.5 22.5V13.5H22.5C22.8978 13.5 23.2794 13.342 23.5607 13.0607C23.842 12.7794 24 12.3978 24 12C24 11.6022 23.842 11.2206 23.5607 10.9393C23.2794 10.658 22.8978 10.5 22.5 10.5H13.5V1.5C13.5 1.10218 13.342 0.720644 13.0607 0.43934C12.7794 0.158035 12.3978 0 12 0C11.6022 0 11.2206 0.158035 10.9393 0.43934C10.658 0.720644 10.5 1.10218 10.5 1.5V10.5H1.5C1.10218 10.5 0.720644 10.658 0.43934 10.9393C0.158035 11.2206 0 11.6022 0 12C0 12.3978 0.158035 12.7794 0.43934 13.0607C0.720644 13.342 1.10218 13.5 1.5 13.5H10.5V22.5Z" fill="#F7F7F7"/>
    </svg>
</div>

<div class="dark_body_new" id="shadow"></div>
    <!-- <div class="vh17"></div> -->
    <form class="modal_block_new" method="post" id="modal">
         <div class="headline r2 c2" id="headline_modal">НОВАЯ ЗАДАЧА</div>
         <input type="hidden" value="<?="<script>$('#search').val()</script>"?>" name="search" id="search_val">
         <input type="hidden" value="<?="<script>$('#filter').val()</script>"?>" name="filter" id="filter_val">
         <input type="hidden" value="<?="<script>$('#sort').val()</script>"?>" name="sort" id="sort_val">
         <input class="r3 c2 inputTextModal" placeholder="Введите заголовок задачи..." name="title" required>
         <textarea class="r5 c2 textarea" name="description" placeholder="Введите описание задачи..."></textarea>
         <input type="submit" class="r7 c2 inputSubmitModal w32" value="СОХРАНИТЬ">
         <div class="r7 c2 cancelModal" id="cancel"><div>ОТМЕНА</div></div>
    </form>

<div id="ajax"></div>

<script src="js/script.js"></script>

</body>
</html>