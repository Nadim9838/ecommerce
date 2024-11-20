            <!-- Start right Content here -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <?php if($this->session->flashdata('successMsg')) { 
                            echo '<div class="alert alert-success">'.$this->session->flashdata('successMsg').'</div>';
                        } elseif($this->session->flashdata('dangerMsg')) {
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('dangerMsg').'</div>';
                        }
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex pb-0">
                                            <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Floating labels</h5>
                                        <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>

                                        <?=form_open_multipart()?>                              
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="product_id" id="floatingFirstnameInput" placeholder="Product Id" readonly value="<?=set_value('product_id', ($productId) ? $productId : '' )?>">
                                                        <label for="floatingFirstnameInput">Product Id</label>
                                                    </div>
                                                    <?=form_error('product_id')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" onchange="get_categories(this.value)"id="floatingSelectGrid" name="cat">
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            foreach($categories as $r) {
                                                                echo "<option value='".$r->cat_id."'>".$r->cat_name."</option>";
                                                            };
                                                            ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Category</label>
                                                    </div>
                                                    <?=form_error('cat')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select sub_cat" id="floatingSelectGrid" name="sub_cat">
                                                        </select>
                                                        <label for="floatingSelectGrid">Sub Category</label>
                                                    </div>
                                                    <?=form_error('sub_cat')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="product_name" id="floatingFirstnameInput" placeholder="Product Name">
                                                        <label for="floatingFirstnameInput">Product Name</label>
                                                    </div>
                                                    <?=form_error('product_name')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="brand" id="floatingFirstnameInput" placeholder="Product Brand">
                                                        <label for="floatingFirstnameInput">Product Brand</label>
                                                    </div>
                                                    <?=form_error('brand')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" name="featured">
                                                            <option value="">Select Featured</option>
                                                            <option value="1">Deal of the month</option>
                                                            <option value="2">New arrival</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Featured</label>
                                                    </div>
                                                    <?=form_error('featured')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea type="text" class="form-control" name="highlights" id="floatingFirstnameInput" placeholder="Highlights"></textarea>
                                                        <label for="floatingFirstnameInput">Highlights</label>
                                                    </div>
                                                    <?=form_error('highlights')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea type="text" class="form-control" name="description" id="floatingFirstnameInput" placeholder="Description"></textarea>
                                                        <label for="floatingFirstnameInput">Description</label>
                                                    </div>
                                                    <?=form_error('description')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="mrp" id="floatingFirstnameInput" placeholder="Product MRP">
                                                        <label for="floatingFirstnameInput">Product MRP</label>
                                                    </div>
                                                    <?=form_error('mrp')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="selling_price" id="floatingFirstnameInput" placeholder="Product Selling Price">
                                                        <label for="floatingFirstnameInput">Product Selling Price</label>
                                                    </div>
                                                    <?=form_error('selling_price')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="stock" id="floatingFirstnameInput" placeholder="Product Stock">
                                                        <label for="floatingFirstnameInput">Product Stock</label>
                                                    </div>
                                                    <?=form_error('stock')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="meta_title" id="floatingFirstnameInput" placeholder="Meta Title">
                                                        <label for="floatingFirstnameInput">Meta Title</label>
                                                    </div>
                                                    <?=form_error('meta_title')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="meta_keywords" id="floatingFirstnameInput" placeholder="Meta Keywords">
                                                        <label for="floatingFirstnameInput">Meta Keywords</label>
                                                    </div>
                                                    <?=form_error('meta_keywords')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="meta_desc" id="floatingFirstnameInput" placeholder="Meta Description">
                                                        <label for="floatingFirstnameInput">Meta Description</label>
                                                    </div>
                                                    <?=form_error('meta_desc')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" name="pro_main_image" id="floatingFirstnameInput">
                                                        <label for="floatingFirstnameInput">Product Image</label>
                                                    </div>
                                                    <?=form_error('pro_main_image')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" name="gallery_image" id="floatingFirstnameInput">
                                                        <label for="floatingFirstnameInput">Gallery Image</label>
                                                    </div>
                                                    <?=form_error('gallery_image')?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" name="status">
                                                            <option value="">Select status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Status</label>
                                                    </div>
                                                    <?=form_error('status')?>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                            <?=form_close()?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>