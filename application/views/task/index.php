<div class="container mt-4">
    <?php showFeedback("task_created"); ?>
    
      <div class="row">

        <div class="col-lg-3 order-lg-2 mb-5">
          <div class="sorting">
                <div class="row">
                  <div class="col">
                    <form action="<?php echo URLROOT; ?>/task/sort" method="POST">
                      <div class="d-flex d-flex flex-column align-items-center text-center border p-2">
                          <div class="sort">
                            <label for="column">Sorting column:</label>
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
                            <label for="order">Sorting order:</label>
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
              </div>
        </div>

        <div class="col-lg-9 order-lg-1">
          <div class="content">
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
                      <h5 class="card-title">Task Name: <?= $task->name ?></h5>
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
        </div>

      </div>
</div>