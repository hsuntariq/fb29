 <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    background: #f0f2f5;
}

/* ================= NAVBAR ================= */

.facebook-navbar {
    height: 70px;
    background: #ffffff;
    padding: 0 10px;
    position: relative;
    border-bottom: 1px solid #ddd;
}


/* ================= LEFT ================= */

.nav-left {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.facebook-logo {
    width: 40px;
    height: 40px;
    object-fit: contain;
}


/* ================= SEARCH ================= */

.search-box {
    width: 250px;
    height: 42px;
    background: #f0f2f5;
    transition: 0.3s;
}

.search-box i {
    color: #65676b;
    font-size: 18px;
}

.search-box input {
    outline: none;
    width: 100%;
    font-size: 14px;
}

.search-box:focus-within {
    background: #e4e6eb;
    box-shadow: 0 0 0 2px #1877f2;
}


/* ================= CENTER ================= */

.nav-center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.nav-item {
    width: 110px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;

    color: #65676b;
    font-size: 25px;

    border-radius: 10px;

    cursor: pointer;

    transition: all 0.25s ease;
}


/* Hover */

.nav-item:hover {
    background: #f0f2f5;
    color: #1877f2;
    transform: translateY(-2px);
}


/* Active */

.nav-item.active {
    color: #1877f2;
}

.nav-item.active::after {
    content: "";

    position: absolute;

    bottom: -8px;
    left: 10px;
    right: 10px;

    height: 3px;

    background: #1877f2;

    border-radius: 10px;
}


/* ================= RIGHT ================= */

.nav-right {
    position: absolute;

    right: 20px;
    top: 50%;

    transform: translateY(-50%);

    display: flex;
    align-items: center;
    gap: 8px;
}

.right-icon {
    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: #e4e6eb;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;

    color: #050505;

    cursor: pointer;

    transition: all 0.25s ease;
}

.right-icon:hover {
    background: #d8dadf;
    color: #1877f2;

    transform: scale(1.08);

    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}


/* Profile */

.profile-icon {
    background: #1877f2;
    color: white;
}

.profile-icon:hover {
    background: #166fe5;
    color: white;
}


/* ================= TABLET ================= */

@media (max-width: 1100px) {

    .nav-item {
        width: 75px;
    }

    .search-box {
        width: 200px;
    }
}


/* ================= MOBILE ================= */

@media (max-width: 768px) {

    .facebook-navbar {
        height: 60px;
        padding: 0 10px;
    }

    .nav-left {
        left: 10px;
    }

    .facebook-logo {
        width: 35px;
        height: 35px;
    }

    /* Search becomes icon */

    .search-box {
        width: 40px;
        height: 40px;
        padding: 0 !important;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-box input {
        display: none;
    }


    /* Hide center navigation */

    .nav-center {
        display: none;
    }


    /* Right */

    .nav-right {
        right: 10px;
    }

    .right-icon {
        width: 38px;
        height: 38px;
        font-size: 18px;
    }

    .nav-right .grid-icon {
        display: none;
    }
}


/* ================= SMALL MOBILE ================= */

@media (max-width: 480px) {

    .nav-right {
        gap: 5px;
    }

    .right-icon {
        width: 35px;
        height: 35px;
        font-size: 17px;
    }
}
 </style>
 <nav class="facebook-navbar">


     <!-- LEFT -->

     <div class="nav-left d-flex align-items-center gap-2">

         <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/04/Facebook_f_logo_%282021%29.svg/3840px-Facebook_f_logo_%282021%29.svg.png"
             class="facebook-logo" alt="Facebook">


         <div class="search-box rounded-pill px-3 d-flex align-items-center gap-2">

             <i class="bi bi-search"></i>

             <input type="text" class="border-0 bg-transparent" placeholder="Search Facebook">

         </div>

     </div>



     <!-- ================= CENTER ================= -->

     <div class="nav-center">

         <div class="nav-item active">
             <i class="bi bi-house-fill"></i>
         </div>

         <div class="nav-item">
             <i class="bi bi-play-circle"></i>
         </div>

         <div class="nav-item">
             <i class="bi bi-people-fill"></i>
         </div>

         <div class="nav-item">
             <i class="bi bi-shop"></i>
         </div>

         <div class="nav-item">
             <i class="bi bi-person-workspace"></i>
         </div>

     </div>



     <!-- ================= RIGHT ================= -->

     <div class="nav-right">

         <div class="right-icon grid-icon">
             <i class="bi bi-grid-fill"></i>
         </div>

         <div class="right-icon">
             <i class="bi bi-messenger"></i>
         </div>

         <div class="right-icon">
             <i class="bi bi-bell-fill"></i>
         </div>

         <div class="right-icon profile-icon">
             <i class="bi bi-person-fill"></i>
         </div>

     </div>

 </nav>