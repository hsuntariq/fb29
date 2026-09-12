<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include './bootstrap.php' ?>

    <style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
    }

    .sidebar-item {
        transition: 0.2s;
    }

    .sidebar-item:hover {
        background-color: #e4e6eb;
    }

    .feed-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .small-text {
        font-size: 13px;
    }

    .extra-small {
        font-size: 12px;
    }

    .icon-box {
        width: 38px;
        height: 38px;
        flex-shrink: 0;
    }

    .post-action {
        transition: 0.2s;
    }

    .post-action:hover {
        background-color: #f0f2f5;
    }


    .underlay {
        background-color: rgba(255, 255, 255, 0.7);
    }
    </style>

</head>

<body>


    <!-- add post modal -->


    <form action="./add-post.php" method="POST" enctype="multipart/form-data"
        class="min-vh-100 d-none d-flex justify-content-center align-items-center w-100 position-fixed top-0 start-0 underlay z-3">
        <div
            class="col-xl-3 position-relative col-lg-4 col-md-6 col-sm-8 col-11 mx-auto  rounded-3 border-0 shadow card">
            <h6 class="text-center m-1 p-2">Create post</h6>
            <i class="bi close-modal bi-x-lg d-flex justify-content-center align-items-center position-absolute"
                style="top: 10px;right:10px;width:30px;height:30px;background:#E2E5E9;border-radius:50%;cursor:pointer;"></i>
            <hr class="m-1">
            <div class="p-2">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-person-circle fs-3"></i>
                    <div class="">
                        <h6 style="font-size: 0.7rem;" class="m-0 fw-bold">Username</h6>
                        <button style="padding:0.2rem;font-size:0.5rem;background:#E2E5E9"
                            class="btn  btn-sm">Friends</button>
                    </div>
                </div>
                <textarea name="caption" class="border-0 w-100" style="outline:0" rows="5"
                    placeholder="What's on your mind" id=""></textarea>



                <img src="" alt="" height="200px" class="preview object-fit-contain d-none w-100">



                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0">Add to your post</h6>
                        <div class="fs-5 d-flex gap-2">

                            <input class="d-none" type="file" accept="" name="media" id="media">
                            <label for="media">
                                <i class="bi bi-image"></i>
                            </label>
                            <i class="bi bi-play"></i>
                            <i class="bi bi-person"></i>
                            <i class="bi bi-geo-alt"></i>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-sm w-100 my-2">
                    Post
                </button>
            </div>
        </div>
    </form>






    <!-- ================= NAVBAR ================= -->

    <?php include './navbar.php' ?>


    <!-- ================= MAIN CONTENT ================= -->

    <main class="container-fluid px-2 px-md-3 px-lg-4">

        <div class="row align-items-start">


            <!-- ================================================= -->
            <!-- LEFT SIDEBAR -->
            <!-- ================================================= -->

            <?php include './sidebar.php' ?>


            <!-- main content -->
            <div class="col-lg-5 col-md-6  d-md-block">-

                <div class="card border-0 shadow mt-4  p-3 rounded-3">
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <i class="bi bi-person"></i>
                        <div style="cursor: pointer;" class="add-post p-2 rounded-pill bg-body-secondary w-100">
                            <p class="m-0">What's on your mind? username</p>
                        </div>
                        <i class="bi bi-play"></i>
                        <i class="bi bi-image"></i>
                        <i class="bi bi-emoji-smile"></i>

                    </div>
                </div>



                <!-- posts section -->



                <?php 
                    include './config.php';
                    $select = "SELECT * FROM post";
                    $data = mysqli_query($connection,$select);
                    foreach($data as $item){
                ?>
                <div class="card my-3 p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- user details -->
                        <div class="d-flex gap-3">
                            <i class="bi bi-person-circle fs-3"></i>
                            <div class="">
                                <h6 class="m-0" style="font-size: 0.8rem;">Username</h6>
                                <p class="fw-semibold text-secondary" style="font-size: 0.8rem;">time</p>
                            </div>
                        </div>
                        <!-- right icons -->
                        <div class="">
                            <i class="bi bi-three-dots"></i>
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>
                    <p class="text-secondary m-0">
                        <?php echo $item['caption'] ?>
                    </p>

                    <!-- check if image exists -->


                    <?php 
                        if($item['media'] == ''){
                            echo "";
                        }else{

                        // check if media is video
                        $isVideo = explode('.',$item['media']);
                        


                    ?>
                    <img class="object-fit-cover" src="./postImages/<?php echo $item['media'] ?>" width="100%"
                        height="600px" alt="">


                    <?php 
                        }?>

                    <!-- bottom bar -->

                    <div class="d-flex mt-3 justify-content-between align-items-center">
                        <!-- left side -->
                        <div class="d-flex gap-4">
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-hand-thumbs-up"></i>
                                <p class="text-secondary m-0" style="font-size:0.9rem">7K</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-chat"></i>
                                <p class="text-secondary m-0" style="font-size:0.9rem">7K</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-share"></i>
                                <p class="text-secondary m-0" style="font-size:0.9rem">7K</p>
                            </div>
                        </div>

                        <!-- right side -->
                        <i class="bi bi-hand-thumbs-up-fill text-primary"></i>


                    </div>
                </div>


                <?php 
                    }
                ?>


            </div>




        </div>




        </div>


        <!-- my posts -->








    </main>







    <script>
    let seeBtn = document.querySelector('.see-btn')
    let seeText = document.querySelector('.see-text')
    let seeIcon = document.querySelector('.see-icon')
    let listItems = document.querySelectorAll('.li-show')
    let addBtn = document.querySelector('.add-post')
    let underlay = document.querySelector('.underlay')
    let closeBtn = document.querySelector('.close-modal')
    let imageInput = document.querySelector('#media')
    let imagePreview = document.querySelector('.preview')



    imageInput.addEventListener('input', (e) => {
        let file = e.target.files[0]
        // convert to a link
        let link = URL.createObjectURL(file)
        imagePreview.src = link
        imagePreview.classList.remove('d-none')
    })



    addBtn.addEventListener('click', () => {
        underlay.classList.remove('d-none')
    })
    closeBtn.addEventListener('click', () => {
        underlay.classList.add('d-none')
    })






    seeBtn.addEventListener('click', () => {
        if (seeText.innerHTML == 'See More') {
            seeText.innerHTML = 'See Less'
            seeIcon.style.transform = 'rotate(180deg)'
            listItems.forEach((item, index) => {
                item.classList.remove('d-none')
            })
        } else {
            seeText.innerHTML = 'See More'
            seeIcon.style.transform = 'rotate(0)'
            listItems.forEach((item, index) => {
                item.classList.add('d-none')
            })
        }
    })
    </script>


</body>

</html>