<?php
include '../database/connect.php';

$id = $_GET['id'];

$sql_str = "SELECT * FROM brands WHERE id=$id";
$result = mysqli_query($conn, $sql_str);

$brand = mysqli_fetch_assoc($result);
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    // Cập nhật lại
    $sql_str2 = "UPDATE brands SET NAME='$name', slug='$slug' WHERE id=$id";

    mysqli_query($conn, $sql_str2);

    header("location: ./listbrands.php");
} else {
    include './includes/header.php';
}
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật thương hiệu (brand)</h1>
                        </div>
                        <form class="user" method="post" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="name" name="name" aria-describedby="emailHelp"
                                    placeholder="Tên thương hiệu"
                                    value=<?php echo $brand['name'] ?>>
                            </div>
                            <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
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