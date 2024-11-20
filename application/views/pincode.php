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
                                            <h4 class="card-title mb-0 flex-grow-1">Pincode</h4>
                                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Floating labels</h5>
                                        <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>

                                        <?=form_open()?>                              
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="pincode" id="floatingFirstnameInput" placeholder="Enter Pincode">
                                                        <label for="floatingFirstnameInput">Pincode</label>
                                                    </div>
                                                    <?=form_error('pincode')?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="deliver_charge" id="floatingFirstnameInput" placeholder="Enter Delivery Charges">
                                                        <label for="floatingFirstnameInput">Delivery Charges</label>
                                                    </div>
                                                    <?=form_error('deliver_charge')?>
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