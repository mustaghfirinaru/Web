<body>
  <div class="container">
    <div class="container bg-gradient-primary">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- Nested Row within Card Body -->
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registration</h1>
              </div>
              <?php echo $this->session->flashdata('mess'); ?>
              <form method="POST" class="user" action="<?php echo base_url('acc/regis'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control " placeholder="Input Username" name="username">
                  <?php echo form_error('username', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control " placeholder="Input Full Name" name="name">
                  <?php echo form_error('name', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control " placeholder="Input Email" name="email">
                  <?php echo form_error('email', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control " name="dob">
                  <?php echo form_error('dob', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group ">
                  <select name="gender" class="form-control">
                    <option>- Select gender -</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select><?php echo form_error('gender', '<div class="text-danger small">', '</div>'); ?></div>
                <div class="form-group">
                  <input type="text" class="form-control " placeholder="Input City" name="add">
                  <?php echo form_error('add', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <input type="password" class="form-control " placeholder="Input Password" name="pass1">
                      <?php echo form_error('pass1', '<div class="text-danger small">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <input type="password" class="form-control " placeholder="Input Password Again" name="pass2">
                      <?php echo form_error('pass2', '<div class="text-danger small">', '</div>'); ?>
                    </div>
                  </div>
                </div>
                <!-- <div class="row"> -->
                <!-- </div> -->
                <button type="submit" class="btn btn-primary form-control">Login</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('acc/login'); ?>">Already have account? login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>