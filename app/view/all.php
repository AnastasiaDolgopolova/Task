<?php 
include  __DIR__ .'/header.php';
?>


<div class="container">
    <div class="row">
      <div class="col-md-8 offest-md-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">last name</th>
              <th scope="col">email</th>
              <th scope="col">phone</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($customers as $customer):?>
              <tr>
                <th scope="row"><?php echo $customer['id'];?></th>
                <td><?php echo $customer['name'];?></td>
                <td><?php echo $customer['last_name'];?></td>
                <td><?php echo $customer['email'];?></td>
                <td class="text-primary"><?php echo $customer['phone'];?></td>  
             </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
</body>
</html>