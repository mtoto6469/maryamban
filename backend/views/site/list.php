<div class="container">
    <div class="row col-md-9 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>

            <tr>

                <th style="text-align:center">نام</th>
                <th style="text-align:center">شماره تماس</th>

            </tr>
            </thead>
            <?php 
            foreach ($allpost as $all){?>
                
                <tr>
                    <td style="text-align:center"><?=$all->costomer?></td>
                    <td style="text-align: center"><?=$all->tel?></td>
                </tr>
                
          <?php  }
            
            
            ?>
            

        </table>