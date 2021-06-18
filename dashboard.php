<!DOCTYPE html>
<html lang="en">
    <?php include 'parts/headDash.php'?>
    <?php include "init.php";?>
    <?php include "authorized.php";?>
    <?php include "timeDash.php";?>
<body>
<nav class="header-bg">
  <div style="text-align: right;margin-right: 8%;">
    <p style="font-size: 1.1rem;">
      <a href="/v2/dashboardMonth" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%; margin-right: 1%">Dashboard Fechas</a>
      <a href="/v2/logoutDash" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%;">Cerrar sesion</a>
    </p>
  </div>
</nav>
<div class="container">
  <div class="row">
        <div class="col-12 d-flex justify-content-between" style="margin: 2% 0 2% 0">
            <h2>Dashboard</h2>
            <div class="d-flex">
                <div class="form-outline">
                    <input type="search" id="search" class="form-control" style="" placeholder="Search"/>
                </div>
            </div>
            <div class="d-flex">
                <a href="#" class="" data-toggle="modal" data-target="#add"><img src="img/plus.svg" alt="" style="width:100%;"></a>
            </div>
        </div>
        <div class="col-12">
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Registrar pin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="re" style="border-color: #ab1862 !important;">
                        <span aria-hidden="true" style="color: #ab1862;">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Pin</label>
                          <input type="text" class="form-control" id="pin" style="">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="your-id" style="background-color: #ab1862 !important; border-color: #ab1862 !important;">Registrar</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="content"></div>
        <div class="d-flex justify-content-center mt-4">
            <div id="paginationPrevious">
                <ul class="pagination">
                    <li id="previous" class="page-item"><a class="page-link" href="javascript:void(0)" style="color: #ab1862 !important;">Previous</a></li>
                </ul>
            </div>
            <div id="pagination"></div>
            <div id="paginationNext">
                <ul class="pagination">
                    <li id="next" class="page-item"><a class="page-link" href="javascript:void(0)" style="color: #ab1862 !important;">Next</a></li>
                </ul>
            </div>
            <div id="paginationLast">
                <ul class="pagination">
                    <li id="last" class="page-item"><a class="page-link" href="javascript:void(0)" style="color: #ab1862 !important;">Last >></a></li>
                </ul>
            </div>
            <input type="hidden" value="<?php echo $_SESSION['admin'] ?>">
        </div>
      </div>
  </div>
</div>
<script src="dist/js/pin.js"></script>
<!-- <script src="dist/js/pagination.js"></script> -->
</body>
</html>