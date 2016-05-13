<!DOCTYPE html>
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="<?php echo base_url('javascript:;')?>" class="remove"></a>
                        <input type="text" placeholder="Search..." />
                        <input type="button" class="submit" value=" " />
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active ">
                <a href="<?php echo base_url('index.html')?>">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li >
                <a href="<?php echo site_url('admin/adminuser/')?>">
                    Admin Managment</a>
            </li>

            <li >
                <a href="<?php echo site_url('admin/product/')?>">
                    Product Managment</a>
            </li>


            <li >
                <a href="<?php echo site_url('admin/banner')?>">
                    Banner Managment</a>
            </li>
            <li >
                <a href="<?php echo site_url('admin/category')?>">
                    Category Management</a>
            </li>

            <li >
                <a href="<?php echo site_url('admin/dashboard/reply')?>">
                    Complints Book</a>
            </li>

            <li >
                <a href="<?php echo site_url('admin/userlist')?>">
                    User List</a>
            </li>
            <li >
                <a  href="<?php echo site_url('admin/dashboard/news')?>">news</a>
                <a  href="<?php echo site_url('admin/dashboard/done')?>">done</a>

            </li>
            <li >
                <a href="<?php echo site_url('admin/dashboard/setting')?>">
                    Setting</a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>portlet Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here will be a configuration form</p>
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN STYLE CUSTOMIZER -->
                    <div class="color-panel hidden-phone">
                        <div class="color-mode-icons icon-color"></div>
                        <div class="color-mode-icons icon-color-close"></div>
                        <div class="color-mode">
                            <p>THEME COLOR</p>
                            <ul class="inline">
                                <li class="color-black current color-default" data-style="default"></li>
                                <li class="color-blue" data-style="blue"></li>
                                <li class="color-brown" data-style="brown"></li>
                                <li class="color-purple" data-style="purple"></li>
                                <li class="color-grey" data-style="grey"></li>
                                <li class="color-white color-light" data-style="light"></li>
                            </ul>
                            <label>
                                <span>Layout</span>
                                <select class="layout-option m-wrap small">
                                    <option value="fluid" selected>Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </label>
                            <label>
                                <span>Header</span>
                                <select class="header-option m-wrap small">
                                    <option value="fixed" selected>Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </label>
                            <label>
                                <span>Sidebar</span>
                                <select class="sidebar-option m-wrap small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected>Default</option>
                                </select>
                            </label>
                            <label>
                                <span>Footer</span>
                                <select class="footer-option m-wrap small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected>Default</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <!-- END BEGIN STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        User Details <small>User Details</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?php echo site_url('admin/dashboard/')?>">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/userlist')?>">Back</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">User Details</a></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>

            <table class="table" style="border: 0px">
            <tr>
                <th>Title</th>
                <th>Details</th>
            </tr>

            <?php
            foreach($user as $value)
            {

            $value=(array)$value;
            ?>     </div>

        <tr>
        <div class="control-group">
            <td>
                <label style="display: inline">Username</label>
            </td>
            <td>
              <?php echo $value['user_name']?>
            </td>
        </div>
        </tr>
        <tr>
        <div class="control-group">
            <td>
                <label style="display: inline">Lastname</label>
            </td>
            <td>
                <?php echo $value['user_lastname']?>
            </td>
        </div>
        </tr>


        <tr>
    <div class="control-group">
        <td><label style="display: inline" >E-mail</label></td>
        <td><?php echo $value['user_email']?></td>
    </div>
        </tr>
        <tr>
        <div class="control-group">
            <td><label style="display: inline" >address_1</label>
            </td><td><?php echo $value['address_1']?>
        </td></div>
            </tr>
        <tr>
        <div class="control-group">
            <td><label style="display: inline" >address_2</label></td>
            <td><?php echo $value['address_2']?>
            </td></div>
            <tr><td>
        <div class="control-group">
            <label style="display: inline" >city</label>
            </td><td><?php echo $value['city']?></td>
        </div>
        </tr>
        <tr>
        <div class="control-group">
            <td>
                <label style="display: inline" >state</label>
            </td>
            <td>
                <?php echo $value['state']?>
            </td>
        </div>
        </tr>
        <tr>
        <div class="control-group">
            <td><label style="display: inline" >country</label></td>
            <td><?php echo $value['country']?></td>
        </div>
        </tr>
        <tr>
        <div class="control-group">
            <td><label style="display: inline" >zipcode</label>
            </td><td><?php echo $value['zipcode']?>
        </td></div></tr>

        <?php
        }
        ?>
    </div>
</table>
</div>
</form>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2013 &copy; Metronic. Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<script>
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
