<?php
    layouts('header');
?>



<div class="container">
    <div class="col-3" style="margin: 50px auto">
        <h2 class="text-center text-uppercase">Thêm sách </h2>
        
        <form action="" method="POST">
            <div class="form-group mb-2 mt-3px">
                <label for="" class="mb-2">Tên sách</label>
                <input type="text" name="nameb" class="form-control" placeholder="Nhập tên sách">
            </div>
            <div class="form-group mb-2">
                <label for="" class="mb-2">Tác giả</label>
                <input type="text" name="author" class="form-control" placeholder="Nhập tên tác giả">
            </div>
            <div class="form-group mb-2">
                <label for="" class="mb-2">Năm phát hành</label>
                <input type="text" name="publish" class="form-control" placeholder="Nhập năm phát hành">
            </div>
            <div class="form-group mb-3">
                <label for="" class="mb-2 d-block">Thể loại</label>
                <input type="text" name="genre" class="form-control" placeholder="Nhập thể loại sách">
            </div>
            <div class="form-group mb-3">
                <label for="" class="mb-2">Nhập giá</label>
                <input type="text" name="price" class="form-control" placeholder="Nhập giá sách">
            </div>


            <div>
                <button type="submit" class="btn btn-primary btn-block mg-btn">Thêm sách</button>
                <a href="?action=list" class="btn btn-success btn-block mg-btn">Quay lại</a>
            </div>

        </form>
    </div>
</div>