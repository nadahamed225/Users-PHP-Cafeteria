<?php  include(VIEWS.'template'.DS.'header.php'); ?>

    <style>
        .form-group
        {
            padding:2% 0%;
        }
    </style>

    <div class="container card col-10 mt-5">
        <div class="header text-center" style="background-color:rgb(112, 66, 50);">
            <h2 class="text-white">Add New User</h2>
        </div>

        <div class="content col-10">

            <?php if(isset($success)): ?>
                <h3 class="alert alert-success text-center"><?php  echo $success; ?></h3>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <h3 class="alert alert-danger text-center"><?php  echo $error; ?></h3>
            <?php endif; ?>
            <form action="<?php url('users/store'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm-password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Room No.</label>
                    <input type="number" name="roomNumber" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Ext.</label>
                    <input type="number" name="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Profile Picture</label>
                    <input type="file" name="picture" class="form-control">
                </div>

                <input type="submit" class="btn mb-2 mt-2" value="Add" name="submit"style="background-color:rgb(112, 66, 50);
         color:white;" >

            </form>
        </div>

    </div>



<?php  include(VIEWS.'template'.DS.'footer.php'); ?>