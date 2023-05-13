<?php  include(VIEWS.'template'.DS.'header.php'); ?>

    <style>
    .form-group 
    {
        padding:2% 0%;
    }
</style>
<div class="container card col-10 mt-5">
    <div class="header text-center" style="background-color:rgb(112, 66, 50);">
    <h2 class="text-white">Add New products</h2>
    </div>
    <div class="content col-10">
    <form action="<?php url('products/store'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">price</label>
            <input type="number" name="price" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">availability</label>
            <input type="number" name="availability" required class="form-control" placeholder="value 0 or 1">
        </div>

        <div class="form-group">
            <label for="">category</label>
            <!-- <input type="number" name="categoryID" required class="form-control"> -->
            <select name="categoryID" class="w-100">
               <?php     foreach($categories as $row):  ?>
                        <option   value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option> 
               <?php  endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Upload Picture</label>
            <input type="file" name="picture" required class="form-control" accept="image/*">
        </div>

        <input type="submit" class="btn mb-2 mt-2" value="Add" style="background-color:rgb(112, 66, 50);
         color:white;" >

    </form>
    </div>
 
</div>


<?php  include(VIEWS.'template'.DS.'footer.php'); ?>
