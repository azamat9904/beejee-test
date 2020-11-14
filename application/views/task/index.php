<div class="container mt-4">
    <?php showFeedback("task_created"); ?>
    
    <div class="row">
      <div class="col-12">
        <form action="<?php echo URLROOT; ?>/task/sort" method="POST">
          <div class="d-flex d-flex justify-content-between">
              <div class="sort">
                <label for="column">Choose a column for sorting:</label>
                <select name="columnName" id="column" value="id">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="status">Status</option>
                    <option value="Task">Task</option>
                </select>
                <br><br>
              </div>
              <div class="sort">
                <label for="order">Choose the order of sorting:</label>
                <select name="columnOrder" id="order" value="asc">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
                <br><br>
              </div>
              <div class="submit-block">
                  <input type="submit" value="Sort tasks" class="btn btn-primary btn-sm" />
              </div>
          </div>
        </form>
      </div>
    </div>
    
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
            <h5 class="card-title">Name: <?= $task->name ?></h5>
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