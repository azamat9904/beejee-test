<div class="container mt-4">
    <?php showFeedback("task_created"); ?>
    <?php showFeedback("task_updated"); ?>
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
              <?php if(!empty($tasks)) : ?>
                  <?php foreach($tasks as $task):?>
                    <div class="card my-3">
                      <div class="card-header">
                        TASK ID: <?= $task->id ?>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Task Name: <?= $task->name ?></h5>
                        <p class="card-text">
                            Email: <?= $task->email ?><br />
                            Status: <?= $task->status == '0' ? "Не выполнено" : "Выполнено"?> <?= $task->edited == '1' ? ', Отредактирован админом': '' ?><br />
                            Task: <?= $task->task ?>
                        </p>
                        <?php if(isUserLoggedIn()):?>
                              <?php if($task->status == '0'): ?>
                                  <a 
                                href="<?= URLROOT ?>/task/check/<?=$task->id ?>" 
                                class="btn btn-success"
                                >
                                  Отметить как выполнено
                                </a>
                              <?php else: ?>
                                  <a 
                                  href="<?= URLROOT ?>/task/check/<?=$task->id ?>" 
                                  class="btn btn-danger"
                                  >
                                   отметить как не выполнено
                                  </a>
                              <?php endif ?>
                              <a 
                            href="<?= URLROOT ?>/task/edit/<?=$task->id ?>" 
                            class="btn btn-primary"
                            >
                              Редактировать
                            </a>
                        <?php endif; ?>
                      </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                      <div class="row">
                          <div class="col text-center">
                              No tasks created. Please, try to add new one
                          </div>
                      </div>
                <?php endif ?>
              <div class="row">
                  <div class="col">
                    <?php echo $pagination; ?>
                  </div>
            </div>
          </div>
        </div>

      </div>
</div>