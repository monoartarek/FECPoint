<link rel="stylesheet" href="headerFooter.css">
<header style=" position:fixed; top: 0; left: 0;">
    <div class="logo">
        <h2><img src="" alt="" height="" width=""><a href="newsfeed.php"style="color:white;text-decoration:none; ">FECPOINT</a></h2>
    </div>
    <nav>
        <ul>
            <li class="hideOnMobile"><a href="newsfeed.php"><button class="btn">NEWS FEED</button></a></li>
            <!-- <li class="hideOnMobile"><a href="home.html"><button class="btn">FEC</button></a></li> -->
            <li class="hideOnMobile"><a href="cse.php"><button class="btn">CSE</button></a></li>
            <li class="hideOnMobile"><a href="eee.php"><button class="btn">EEE</button></a></li>
            <li class="hideOnMobile"><a href="civil.php"><button class="btn">CIVIL</button></a></li>
            <li class="hideOnMobile"><a href="clubs.php"><button class="btn">CLUBS</button></a></li>
            <li class="hideOnMobile"><a href="cgcal.php"><button class="btn">CG cal</button></a></li>
            <li class="hideOnMobile"><a href="profile.php"><button class="btn">Profile</button></a></li>

            <li class="menu-button" onclick=showSidebar()>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -1200 960 1200" width="38px" fill="#e8eaed">
                        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                    </svg>
                </a>
            </li>
        </ul>

        <!-- Sidebar responsive for mobile -->
        <ul class="sidebar">
            <li onclick=hideSidebar()>
                <a href="">
                    <button class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg>
                    </button>
                </a>
            </li>
            <li><a href="newsfeed.php"><button class="btn">NEWS FEED</button></a></li>
            <!-- <li><a href="home.html"><button class="btn">FEC</button></a></li> -->
            <li><a href="cse.php"><button class="btn">CSE</button></a></li>
            <li><a href="eee.php"><button class="btn">EEE</button></a></li>
            <li><a href="cicil.php"><button class="btn">CIVIL</button></a></li>
            <li><a href="clubs.php"><button class="btn">CLUBS</button></a></li>
            <li><a href="cgcal.php"><button class="btn">CG cal</button></a></li>
            <li><a href="profile.php"><button class="btn">Profile</button></a></li>
        </ul>
    </nav>
</header>


 <!-- javascript for the sidebar which is responsive for mobile  -->


<script>
    function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}

function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}


</script>
