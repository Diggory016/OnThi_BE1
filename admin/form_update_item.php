<?php
include "header.php";
include "sidebar.php";
if(isset($_GET['id'])):
    $id = $_GET['id'];
    $getitemById = $item->getItemById($id);

?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Update Items</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="updateitem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Title </label>
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?php echo $getitemById[0]['id'] ?>">
                                    <input type="text" class="span11" name="tile" value="<?php echo $getitemById[0]['tile']?>"/> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Excerpt</label>
                                <div class="controls">
                                    <textarea class="span11" name="excerpt">
                                        <?php echo $getitemById[0]['excerpt']?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Content</label>
                                <div class="controls">
                                    <textarea class="span11" name="conten">
                                        <?php echo $getitemById[0]['conten']?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose
                                    an image</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                    <img src = "../img/<?php echo $getitemById[0]['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose a
                                    category</label>
                                <div class="controls">
                                    <select name="category" id="category">
                                        <?php foreach ($getAllCategories as $value): 
                                            if($value['id'] == $getitemById[0]['category']):
                                        ?>
                                                <option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php
                     
                                            else: ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endif;
                                        endforeach ?>
                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Featured
                                </label>
                                <div class="controls">
                                    <select name="featured" id="featured">
                                        <?php 
                                        if($getitemById[0]['featured'] == 1): ?>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        <?php 
                                        else:
                                        ?>
                                        <option value="1">Yes</option>
                                        <option selected value="0">No</option>
                                        <?php endif; ?>
                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">View
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="views" value="<?php echo $getitemById[0]['views'] ?>"/> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Author</label>
                                <div class="controls">
                                    <select name="author" id="category">
                                        <?php foreach ($getAllUsers as $value): 
                                            if($value['id'] == $getitemById[0]['author']):
                                            ?>
                                                 <option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endif;
                                        endforeach ?>
                                    </select> *
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php endif; include "footer.php" ?>