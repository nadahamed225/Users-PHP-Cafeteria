<?php  include(VIEWS.'template'.DS.'header.php');
echo "
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>

    ";
?>
    <link rel="stylesheet" href="<?=BURL.'css/styleTable.css'?>"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto p-4 mb-5">
                <?php $i=1; ?>
                <?php  foreach($orders as $row):  ?>
                    <table  class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th >Order Date</th>
                            <th >Status</th>
                            <th >Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <?php echo $i; $i++; ?></td>
                            <td><?php echo $row['date']; ?>
<!--                                <button onclick="toggleDiv()" type="button" class="btn btn-info text-white" data-bs-toggle="collapse" data-bs-target="#linux">Click me</button>-->
                                <button onclick="toggleDiv('<?php echo $i;?>')" type="button" class="btn btn-warning text-white ms-5" >More Details</button>

                                <div id="<?php echo $i;?>d" class="collapse" style="display: none;" >
                                    <div style="border:1px solid yellow";>
                                        <?php
                                        foreach($orderDetails as $pic): ?>
                                        <?php if($row['id']==$pic['o_id']): ?>
                                       <img src="<?='data:image/jpeg;base64,'.base64_encode($pic['picture'])?>"  height="40px" width="60px" />
                                       <p><?php echo $pic['name']; ?><p>
                                       <p><?php echo $pic['quantity']; ?><p>
                                       <?php endif;?>
                                <?php endforeach;  ?>
                            <p><?php echo $row['totalPrice']; ?><p>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['status']; ?></td>
                            <td class="text-center"><?php echo $row['totalPrice']; ?></td>
                            <td>
                                    <?php if($row['status']=="processing"): ?>
                                        <button id="<?php echo $row['id'];?>btnCancel" onclick="cancelOrder('<?php echo $row['id'];?>')" type="button" class="btn btn-dark">Cancel</button>
                                        <!--                                        <i>processing</i>-->
<!--                                    --><?php //elseif($row['status']=="done") : ?>
<!--                                        <i>done</i>-->
                                    <?php else : ?>
                                        <button type="button" class="btn btn-dark" disabled>Cancel</button>
                                        <!--                                        <i>outfordelivery</i>-->
                                    <?php endif;?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php  endforeach; ?>
            </div>
        </div>
    </div>


<script>
    function toggleDiv(id) {
        var div = document.getElementById(id+"d");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display="none";
        }
    }
    function cancelOrder(id){
        var elm =document.getElementById(id+"btnCancel");
        elm.disabled = true;
        console.log(id);

    }
</script>


<?php  include(VIEWS.'template'.DS.'footer.php'); ?>