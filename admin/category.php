<?php include 'header.php'; ?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Quản lý danh mục </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <class="box-body">
        <form action="" method="POST" class="form-inline" role="form">
          <div class="form-group">
            <label class="sr-only" for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
          </div>
          <button type="submit" class="btn btn-default">
            <i class="fa fa-search"></i>
          </button>
          <a href="category-create.php" class="btn btn-primary pull-right">Thêm mới</a>
        </form>
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên danh mục</th>
              <th>Trạng thái</th>
              <th>Tổng Sản Phẩm</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Toyota</td>
              <td>Hiển thị</td>
              <td>25 (SP)</td>
              <td class="text-right">
                <a href="category-edit.php" class="btn btn-primary">Sửa</a>
                <a href="category-delete.php" class="btn btn-danger">Xóa</a>
              </td>
            </tr>
          </tbody>
        </table>

        </br>
    </div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>