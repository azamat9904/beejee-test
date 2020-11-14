<div class="container mt-3">
  <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-3">
    <h2>Add Task</h2>
    <p>Create a task with this form</p>
    <form action="<?php echo URLROOT; ?>/task/createTask" method="POST">

      <div class="form-group">
        <label for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" id="name" class="form-control  <?= (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?= $name??""; ?>">
        <span class="invalid-feedback"><?= $name_err??""; ?></span>
      </div>

      <div class="form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="email" name="email" id="email" class="form-control  <?= (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?= $email??""; ?>">
        <span class="invalid-feedback"><?= $email_err?? ""; ?></span>
      </div>

      <div class="form-group">
        <label for="task">Task: <sup>*</sup></label>
        <textarea name="task" id="task" class="form-control <?= (!empty($task_err)) ? 'is-invalid' : ''; ?>"><?= $task??""; ?></textarea>
        <span class="invalid-feedback"><?= $task_err??""; ?></span>
      </div>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
</div>