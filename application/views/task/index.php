<div class="container-fluid mt-5 px-5">
    <?php showFeedback("task_created"); ?>
    
    <div class="row mb-4">
        <div class="col-md-11">
            <h4>To Do List</h4>
        </div>
        <div class="col-md-1">
            <a class="btn btn-primary" href="<?= URLROOT; ?>/task/createTask">Add Task</a>
        </div>
    </div>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Task</th>
      </tr>
    </thead>
    <tbody>
      <?php
          foreach($tasks as $task): 
      ?>
          <tr>
              <th scope="row"><?= $task->id ?></th>
              <td><?= $task->name ?></td>
              <td><?= $task->email ?></td>
              <td><?= $task->status ?></td>
              <td><?= $task->task ?></td>
          </tr>
      <?php
          endforeach;
      ?>
    </tbody>
  </table>
  <div class="row">
      <div class="col">
         <?php echo $pagination; ?>
      </div>
  </div>
</div>