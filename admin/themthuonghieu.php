<?php
include './includes/header.php';
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 text-uppercase font-weight-bold">Thêm mới thương hiệu (brand)</h1>
                        </div>
                        <form class="user" method="post" action="addbrands.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="name" name="name" aria-describedby="emailHelp"
                                    placeholder="Tên thương hiệu">
                            </div>
                            <button class="btn btn-primary">Tạo mới</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './includes/footer.php';
?>