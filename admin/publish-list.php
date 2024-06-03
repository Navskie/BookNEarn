<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include_once 'inc/header.php' ?>
<body >
        <div class="page">
        <!-- Top Navbar -->
        <?php include_once 'inc/top-navigation.php' ?>
        <!-- Top Navbar -->
        <?php include_once 'inc/navigation.php' ?>



                <div class="page-wrapper">
                        <!-- Page header -->
                        <div class="page-header d-print-none">
                        <div class="container-xl">
                                <div class="row g-2 align-items-center">
                                        <div class="col">
                                                <h2 class="page-title">
                                                        Publish List
                                                </h2>
                                        </div>
                                </div>
                        </div>
                        </div>
                        <!-- Page body -->
                        <div class="page-body">
                                <div class="container">
                                        <div class="card">
                                                <div class="card-body">
                                                        <table class="table table-vcenter table-mobile-md card-table">
                                                                <thead>
                                                                        <tr>
                                                                                <th><button class="table-sort" data-sort="sort-name">Creator</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-city">Post ID</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">Image</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">Title</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">City</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">Province</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">Status</button></th>
                                                                                <th><button class="table-sort" data-sort="sort-type">Console</button></th>
                                                                                <th></th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php 

                                                                                $get_data = mysqli_query($con, "SELECT * FROM publish ORDER BY id DESC");
                                                                                foreach ($get_data as $data)
                                                                                {
                                                                                        $creator = $data['creator'];
                                                                                        $unique_id = $data['unique_id'];
                                                                                        $title = $data['title'];
                                                                                        $city = $data['city'];
                                                                                        $province = $data['province'];
                                                                                        $status = $data['status'];

                                                                                        // image
                                                                                        $get_img = mysqli_query($con, "SELECT `filename` FROM `publish_img` WHERE `status` = 'main' AND unique_id = '$unique_id'");
                                                                                        $get_img_fetch = mysqli_fetch_array($get_img);
                                                                                        $filename = $get_img_fetch['filename'];

                                                                                        // creator
                                                                                        $get_creator = mysqli_query($con, "SELECT * FROM users WHERE _token = '$creator'");
                                                                                        $get_creator_fetch = mysqli_fetch_array($get_creator);
                                                                                        $fullname = $get_creator_fetch['fullname'];
                                                                                        $email = $get_creator_fetch['email'];
                                                                                        $img = $get_creator_fetch['img'];
                                                                                        if ($fullname == "") {
                                                                                                $fullname = "Administrator";
                                                                                                $email = "admin@gmail.com";
                                                                                                $img = "default.png";
                                                                                        }

                                                                                        $get_price = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
                                                                        ?>
                                                                        <tr>
                                                                                <td data-label="Name" >
                                                                                        <div class="d-flex py-1 align-items-center">
                                                                                                <span class="avatar me-2" style="background-image: url(../assets/img/profile/<?php echo $img ?>)"></span>
                                                                                                <div class="flex-fill">
                                                                                                        <div class="font-weight-medium"><?php echo $fullname ?></div>
                                                                                                        <div class="text-secondary"><a href="#" class="text-reset"><?php echo $email ?></a></div>
                                                                                                </div>
                                                                                        </div>
                                                                                </td>
                                                                                <td data-label="Title" >
                                                                                        <div><?php echo $unique_id ?></div>
                                                                                </td>
                                                                                <td data-label="Name" >
                                                                                        <div class="d-flex py-1 align-items-center">
                                                                                                <span class="avatar me-2" style="background-image: url(../assets/img/publish/<?php echo $filename ?>)"></span>
                                                                                        </div>
                                                                                </td>
                                                                                <td class="text-secondary" data-label="Role" >
                                                                                        <?php echo $title ?>
                                                                                </td>
                                                                                <td class="text-secondary" data-label="Role" >
                                                                                        <?php echo $city ?>
                                                                                </td>
                                                                                <td class="text-secondary" data-label="Role" >
                                                                                        <?php echo $province ?>
                                                                                </td>
                                                                                <td class="text-secondary" data-label="Role" >
                                                                                        <?php if ($status == 'Pending') { ?>
                                                                                        <span class="badge bg-blue text-blue-fg">Pending</span>
                                                                                        <?php } elseif ($status == 'Reject') { ?>
                                                                                        <span class="badge bg-red text-red-fg">Rejected</span>
                                                                                        <?php } elseif ($status == 'Publish') { ?>
                                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                                        <?php } ?>
                                                                                </td>
                                                                                <td class="text-secondary" data-label="Role" >
                                                                                        <?php 
                                                                                                if ($filename == '') {
                                                                                        ?>
                                                                                                <span class="badge bg-red text-red-fg">img missing</span>
                                                                                        <?php
                                                                                                } elseif (mysqli_num_rows($get_price) < 1) {
                                                                                        ?>
                                                                                                <span class="badge bg-red text-red-fg">no price</span>
                                                                                        <?php
                                                                                                } else {
                                                                                        ?>
                                                                                        <span class="badge bg-green text-green-fg">Good</span>
                                                                                        <?php
                                                                                                }
                                                                                        ?>
                                                                                </td>
                                                                                <td>
                                                                                        <div class="btn-list flex-nowrap">
                                                                                                <?php
                                                                                                        if ($status == 'Publish') {
                                                                                                ?>
                                                                                                <button class="btn">
                                                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bolt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 3l0 7l6 0l-8 11l0 -7l-6 0l8 -11" /></svg>
                                                                                                        Unpublish
                                                                                                </button>
                                                                                                <?php 
                                                                                                        } else {
                                                                                                ?>
                                                                                                <button class="btn">
                                                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bolt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 3l0 7l6 0l-8 11l0 -7l-6 0l8 -11" /></svg>
                                                                                                        Publish
                                                                                                </button>
                                                                                                <?php
                                                                                                        }
                                                                                                ?>
                                                                                                <div class="dropdown">
                                                                                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                                                                                                Actions
                                                                                                        </button>
                                                                                                        <div class="dropdown-menu">
                                                                                                                <a class="dropdown-item" href="#">
                                                                                                                        Reject
                                                                                                                </a>
                                                                                                                <a class="dropdown-item" href="#">
                                                                                                                        Price
                                                                                                                </a>
                                                                                                                <a class="dropdown-item" href="#">
                                                                                                                        Update
                                                                                                                </a>
                                                                                                                <a class="dropdown-item" href="#">
                                                                                                                        More
                                                                                                                </a>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </td>
                                                                        </tr>
                                                                        <?php
                                                                                }
                                                                        ?>
                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- Footer -->
                        <?php include_once 'inc/footer.php' ?>
                </div>





        </div>
        <!-- Footer Links -->
        <?php include_once 'inc/footer_link.php' ?>
</body>
</html>