<?php
include("../../parts/dbQueries.php");
$dbQueries = new dbQueries;
$per_page = 5;
if($_GET){
    $page= $_GET['page'];
    $pin= $_GET['pin'];
    $start = ($page-1)*$per_page;
    $dbQueries->bb([$page, $pin]);
    $result = $dbQueries->Query("SELECT pin FROM users WHERE pin LIKE '%$pin%' order by pin limit $start,$per_page");
}    
?>
<table class="table table-hover" style="">
<thead>
    <tr>
        <th style="border-color: #ab1862 !important;">Pin usuario</th>
    </tr>
</thead>
<?php
while($row = $dbQueries->fetch())
{
$pin=$row->{'pin'};
?>
<tr>
    <td>
        <a href="/v2/user?pin=<?php echo $pin; ?>" class="tdHref">
            <div>
                <?php echo $pin; ?>
            </div>
        </a>
    </td>
</tr>
<?php
}
?>
</table>