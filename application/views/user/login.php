<div class="container mt-3">
  <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-3">
    <h2>Login</h2>
    <p>Login to your account</p>
    <form action="<?php echo URLROOT; ?>/user/login" method="POST">

      <div class="form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="text" name="email" id="email" class="form-control  <?= (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?= $email??""; ?>">
        <span class="invalid-feedback"><?= $email_err?? ""; ?></span>
      </div>

      <div class="form-group">
        <label for="password">Password: <sup>*</sup></label>
        <input type="password" name="password" id="password" class="form-control  <?= (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?= $password??""; ?>">
        <span class="invalid-feedback"><?= $password_err?? ""; ?></span>
      </div>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
</div>