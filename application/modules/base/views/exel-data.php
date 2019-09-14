<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=".$title.'.xls');
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
                <th>No</th>
                <th>Nomo Pemesanan</th>
                <th>Nomor Kursi</th>
                <th>Total Harga</th>
                <th>status Reservation</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($data as $dt) { ?>
 
           <tr>
 
                <td><?php echo $i; ?></td>
                <td><?php echo $dt->reservation_number; ?></td>
                <td><?php echo $dt->chair_reserv; ?></td>
                <td><?php echo $dt->amount_resev; ?></td>
                <td><?php echo $dt->status_resev; ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>