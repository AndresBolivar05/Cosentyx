<?php
    include("../../parts/dbQueries.php");
    $dbQueries = new dbQueries;
    $per_page = 5;
    if($_GET){
        $pin= $_GET['pin'];
        $dbQueries->bb([$pin]);
        $resultPin = $dbQueries->Query("SELECT COUNT(pin) As pines FROM users WHERE pin LIKE '%$pin%'");
        $count = $dbQueries->fetch();
        $count = $count->{'pines'};
        $pages = ceil($count/$per_page);
    }    
?>
</table>
<ul class="pagination">
    <?php
    //Pagination Numbers
    for($i=1; $i<=$pages; $i++){
        echo '<li id="'.$i.'" class="page-item"><a class="page-link" href="javascript:void(0)" style="color: #ab1862 !important;">'.$i.'</a></li>';
    }
    ?>
</ul>
<input type="hidden" id="final" value="<?php echo $pages?>">
