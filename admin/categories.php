<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon">
                        <a href="form_add_category.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th>Categorie Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Parent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getAllCategories as $value): ?>
                                    <tr class="">
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['slug'] ?></td>
                                        <td><?php echo $value['parent'] ?></td>
                                        <td>
                                            <a href="#45" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="delete.php?cate_id=<?php echo $value['id'] ?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <ul class="pagination">
                                <li class="active">1</li>
                                <li>2</li>
                                <li>3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>