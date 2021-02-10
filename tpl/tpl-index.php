<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Folders</div>
        <ul class="folder-list">
          <li class="<?= isset($_GET['folder_id']) ? '' : 'active'; ?>"><i class="fa fa-folder"></i>All</li>
        

          <?php foreach ($folders as $folder): ?>
            <li <?= (@$_GET['folder_id'] == $folder->id) ? "class='active'" : ''; ?>>
              <a href="?folder_id=<?= $folder->id; ?>"><i class="fa fa-folder"></i><?= $folder->name; ?></a>  
              <a href="?delete_folder=<?= $folder->id; ?>" class="remove" onclick="return confirm('Are you sure to delete this item?');">X</a>  
            </li>
          <?php endforeach; ?>

        </ul>
      </div>
      <div>
        <input type="text" style="width: 70%; margin-left: 5px;" id="addFolderInput" placeholder="Add New Folder">
        <button id="addFolderBtn" class="clickable">+</button>
      </div>
    </div>


    <div class="view">
      <div class="viewHeader">
        <div class="title" style="width: 50%;">
          <input type="text" style="width: 100%;margin-left: 5px;line-height: 30px;border-left: 4px solid #54b9cd;" id="taskNameInput" placeholder="Add New Task">
          
        </div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
  
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>

          <?php if (sizeof($tasks)): ?>
          <?php foreach ($tasks as $task): ?>

            <li class="<?php echo $task->is_done ? 'checked' : '' ; ?>">
            <!-- <i class="fa fa-check-square-o"></i> -->
            <i class="fa fa-<?php echo $task->is_done ? 'check-' : '' ; ?>square-o"></i>
            <span><?php echo $task->title; ?></span>
              <div class="info">
                <span class="created-at">Created at <?php echo $task->created_at; ?></span>
                <a href="?delete_task=<?php echo $task->id; ?>" class="remove" onclick="return confirm('Are you sure to delete this item?\n <?= $task->title; ?>');">X</a>
              </div>
            </li>
            
            <?php endforeach; ?>
            <?php else: ?>
              <li>
                No tasks Here ...
              </li>
            <?php endif; ?>

          </ul>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='<?= BASE_URL; ?>assets/js/jquery-3.5.1.min.js'></script>
  <script  src="<?= BASE_URL; ?>assets/js/script.js"></script>

  <script>
    $(document).ready(function () {
      $("#addFolderBtn").click(function (e) {
        var input = $("input#addFolderInput");
        
        $.ajax({
          url: 'proccess/ajaxHandler.php',
          method: 'post',
          data: {action: "addFolder", folderName : input.val()},
          success: function (response) {
            if (response == 1) {
              //  <a href="?delete_folder=8" class="remove">X</a> </li>
              $('<li> <a href="#"><i class="fa fa-folder"></i>'+ input.val() +'</a>').appendTo('.folder-list');
            } else {
              alert(resopnse);
            }
          }
        });
        


      });

    });


  </script>


</body>
</html>
