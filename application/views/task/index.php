<div class="container mt-4">
    <?php showFeedback("task_created"); ?>
    <!-- <div class="row">
      <div class="col">
        <div class="d-flex d-flex justify-content-between">
            <h4>To Do List</h4>
            <a class="btn btn-primary" href="<?= URLROOT; ?>/task/createTask">Add Task</a>
        </div>
      </div>
    </div>
     -->
    <div class="row">
      <div class="col">
        <div class="d-flex d-flex justify-content-between">
          <h4>To Do List</h4>
          <a class="btn btn-primary" href="<?= URLROOT; ?>/task/createTask">Add Task</a>
       </div>
      </div>
    </div>

    <?php foreach($tasks as $task):?>
        <div class="card mt-3">
          <div class="card-header">
            TASK ID: <?= $task->id ?>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $task->name ?></h5>
            <p class="card-text">
                Email: <?= $task->email ?><br />
                Status: <?= $task->status ?><br />
                Task: <?= $task->task ?>
            </p>
          </div>
        </div>
    <?php endforeach; ?>

    <div class="row">
        <div class="col">
          <?php echo $pagination; ?>
        </div>
    </div>

</div>