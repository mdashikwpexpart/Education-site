<?php
require("php/function.php");
require("php/db.php");
session_start();
if (isset($_REQUEST['id'])) {
    $category=$_REQUEST['id'];
}

if (isset($_SESSION['ssn_id'])) {
    $ssnId=$_SESSION['ssn_id'];
    $query_for_check_user=mysqli_query($conn,"SELECT * FROM users WHERE unique_id='$ssnId' ");
    if (mysqli_num_rows($query_for_check_user) == 0 ) {
        $profile='images/default.jpg';
        $name="Default User";
        $bio="default bio";
        $profile_btn_mobo="";
        $profile_btn_desk="";
    }else {
        $current_user=$_SESSION['ssn_id'];
        $query=mysqli_query($conn,"SELECT * FROM users WHERE unique_id='$current_user' ");
        $fetch=mysqli_fetch_assoc($query);
        $name= $fetch['name'];
        $profile='images/'.$fetch['profile'];
        $bio=$fetch['bio'];
        $profile_btn_mobo='
            <li>
                <a href="profile.php">
                    <img src="'.$profile.'" alt="">
                </a>
            </li>
        ';
        $profile_btn_desk='
            <a href="profile.php">
                <li class="footer_content">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="text">Profile</span>
                </li>
            </a>
        ';
    }
    
$loginBtn='Logout';
}else {
    $profile='images/default.jpg';
    $name="Default User";
    $bio="default bio";
    $loginBtn='Login';
    $profile_btn_desk="";
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category; ?></title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style/primary_style.css">
</head>
<body>
    <div class="main_wrapper">
        
    <div class="navbar_main">
            <div class="nav_header">
                <img src="<?php echo $profile; ?>" alt="">
                <div class="text">
                    <span class="name">
                    <?php echo $name; ?>
                    </span>
                    <span class="bio">
                    <?php echo $bio; ?>
                    </span>
                </div>
                <span>
                    <i id="toggle_btn" class='bx bx-chevron-left'></i>
                </span>
            </div>
            <ul>
               <li class="list item home_mobo">
                   <a href="home.php">
                       <i class='bx bx-home-alt'></i>
                        <span class="text list_text">
                            Home
                        </span>
                    </a>
                    <span class="toltip">
                        Home
                    </span>
               </li>
               <li class="list item">
                <a href="category.php?id=Bangla First">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Bangla First
                        </span>
                    </a>
                    <span class="toltip">
                        Bangla First
                    </span>
                </li>
                <li class="list item">
                    <a href="category.php?id=Bangla Second">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Bangla Second
                        </span>
                    </a>
                    <span class="toltip">
                        Banlga Second
                    </span>
                </li> 
                <li class="list item">
                    <a href="category.php?id=English">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            English
                        </span>
                    </a>
                    <span class="toltip">
                        English
                    </span>
                </li>
                <li class="list item">
                    <a href="category.php?id=Physics">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Physics
                        </span>
                    </a>
                    <span class="toltip">
                        Physics
                    </span>
                </li> 
                <li class="list item">
                    <a href="category.php?id=Chemistry">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Chemistry
                        </span>
                    </a>
                    <span class="toltip">
                        Chemistry
                    </span>
                </li> 
                <li class="list item">
                    <a href="category.php?id=Biology">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Biology
                        </span>
                    </a>
                    <span class="toltip">
                        Biology
                    </span>
                </li>
                <li class="list item">
                    <a href="category.php?id=Math">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Math
                        </span>
                    </a>
                    <span class="toltip">
                        Math
                    </span>
                </li>
                <li class="list item">
                    <a href="category.php?id=Islam">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Islam
                        </span>
                    </a>
                    <span class="toltip">
                        Islam
                    </span>
                </li> 
                <li class="list item">
                    <a href="category.php?id=Ict">
                    <i class='bx bx-book-alt'></i>
                        <span class="text list_text">
                            Ict
                        </span>
                    </a>
                    <span class="toltip">
                        Ict
                    </span>
                </li>  
                <li class="footer_content_wrapper">
                    <ul>
                        <a href="php/logout.php">
                            <li class="footer_content">
                                <i class='bx bx-log-out'></i>
                                <span class="text"><?php echo $loginBtn; ?></span>
                            </li>
                        </a>
                    <?php echo $profile_btn_desk; ?>
                    <li  class="footer_content darkmode">
                        <div class="text">
                            <i class='bx bxs-sun sun'></i>
                            <i class='bx bxs-moon moon'></i>
                            <span class="text add_text">Dark Mode</span>
                        </div>
                        <i class="fa-solid fa-toggle-off tglicon"></i>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>

            <div class="questions_container profile category" style="positation:relative">
                        <?php
                        $question_query=mysqli_query($conn,"SELECT * FROM questions WHERE category='$category' ORDER BY id DESC");
                        $all_userquery=mysqli_query($conn,"SELECT * FROM users ORDER BY id DESC");
                        $fetch_all_user=mysqli_fetch_assoc($all_userquery);
                        
                        if (mysqli_num_rows($question_query) > 0) {
                            while ($data=mysqli_fetch_assoc($question_query)) {
                                $userinfo=get_user_details($conn,$data['owner']);
                                $like_react=question_like_count($conn,$data['question_unique_id']);
                                $unlike_count=question_unlike_count($conn,$data['question_unique_id']);
                                $comment_count=question_comment_count($conn,$data['question_unique_id']);
                                $like_btn='
                                    <button class="react_btn insert_like" style="background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-like"></i></button>
                                    <button class="react_btn insert_unlike wrng" style="background: background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-dislike" ></i></button>
                                    ';
                                if ($data['answer'] !== "") {
                                    $ansText='Answer: ';
                                    $asked_text="posted a answer";
                                }
                                else {
                                    $ansText="";
                                    $asked_text='asked';
                                }
                                if ($userinfo['studying']=="") {
                                    $studying='';
                                }else {
                                    $studying='
                                        <div>
                                            <i class="bx bx-book-open"></i>
                                            <span class="default_text">Studying at: </span>
                                            <span class="dynamic_text">'.$userinfo['studying'].'</span>
                                        </div>
                                    ';
                                }
                                if ($userinfo['studied']=="") {
                                    $studied='';
                                }else {
                                    $studied='
                                    <div>
                                        <i class="bx bxs-graduation" ></i>  
                                        <span class="default_text">Studied at: </span>
                                        <span class="dynamic_text">'.$userinfo['studied'].'</span>
                                    </div>
                                    ';
                                }

                                if ($userinfo['location']=="") {
                                    $location='';
                                }else {
                                    $location='
                                    <div>
                                        <i class="bx bx-current-location"></i>
                                        <span class="default_text">From: </span>
                                        <span class="dynamic_text">'.$userinfo['location'].'</span>
                                    </div>
                                    ';
                                }
                                if (isset($_SESSION['ssn_id'])) {
                                    $fetch=check_like_or_not($conn,$data['question_unique_id'],$current_user);
                                    if ($fetch == 0) {
                                        $like_status='';
                                    }else {
                                        $like_status= $fetch['like_statur'];
                                        
                                    }
                                    if ($like_status == "Like") {
                                        $like_btn='
                                        '.$like_react.'
                                        <button class="react_btn delete_like" style="background:#7084d6;" data-id="'.$data['question_unique_id'].'"><i style="color:white" class="bx bx-like"></i></button>
                                        '.$unlike_count.'
                                        <button class="react_btn insert_unlike wrng" style="background: background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-dislike" ></i></button>
                                        ';
                                    }
                                    elseif ($like_status == "UnLike") {
                                        $like_btn='
                                        '.$like_react.'
                                        <button class="react_btn insert_like" style="background: background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-like"></i></button>
                                        '.$unlike_count.'
                                        <button class="react_btn delete_unlike wrng" style="background:#7084d6;" data-id="'.$data['question_unique_id'].'"><i style="color:white" class="bx bx-dislike" ></i></button>
                                        ';
                                    }else {
                                        $like_btn='
                                        '.$like_react.'
                                        <button class="react_btn insert_like" style="background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-like"></i></button>
                                        '.$unlike_count.'
                                        <button class="react_btn insert_unlike wrng" style="background: background: var(--white-color-);border: 1px solid var(--primary-color--);color: var(--font-color--);" data-id="'.$data['question_unique_id'].'"><i class="bx bx-dislike" ></i></button>
                                        ';
                                    }
                                }





                                echo '
                                    <div class="question_posts">
                                    <div class="user_details_container_class" id="user_details_container_class'.$userinfo['unique_id'].'" style="
                                    width: fit-content;
                                    height: fit-content;
                                    top: 24%;
                                    left: 4%;
                                    background: var(--white-color-);
                                    box-shadow: 0px 0px 20px var(--primary-light-color--);
                                    position: absolute;
                                    border-radius: 6px;
                                    padding: 4px;
                                    border: 1px solid var(--primary-color--);
                                    transform:scaleY(0);
                                    transition:0.3s ease-in;
                                    transform-origin:top;
                                    z-index:3;
                                    ">
                                    
                                    <div>
                                        <div style="display:flex;border-bottom:1px solid #ccc">
                                            <img src="images/'.$userinfo['profile'].'" style="width:35px;height:35px;border-radius:50%;object-fit:cover">
                                                <strong>
                                                    '.$userinfo['name'].'
                                                </strong>
                                        </div>
                                        <div id="user_detail_center_content" style="display:flex;flex-direction:column;line-height: 13px;">
                                            '.$studying.'
                                            '.$studied.'
                                            '.$location.'
                                            <button>Follow</button>
                                        </div>
                                        
                                    </div>
                                    

                                    </div>
                                        <div>
                                            <div class="post_user_details">
                                                <img src="images/'.$userinfo['profile'].'" alt="">
                                                <span class="user_name">
                                                    <a class="user_details_show_class" data-id="'.$userinfo['unique_id'].'" href="user.php?ui='.$userinfo['unique_id'].'">
                                                        <strong>
                                                            '.$userinfo['name'].'
                                                        </strong>
                                                    </a>
                                                    '.$asked_text.'
                                                </span>
                                            </div>
                                            
                                            <span class="question_text">
                                               '.$data['question'].'
                                            </span>
                                        </div>
                                        <div>
                                            <span class="answer_text">
                                                '.$ansText.'
                                            </span>
                                            <span>
                                            '.$data['answer'].'
                                            </span>
                                        </div>
                                        <div class="pst_footer_content">
                                            <div>
                                                '.$like_btn.'
                                            </div>
                                            <form onsubmit="return false" class="comment_form">
                                                <button type="button" id="comment_show_icon" data-id="'.$data['question_unique_id'].'" style="
                                                    display: flex;
                                                    justify-content: space-between;
                                                    align-items: center;
                                                    gap: 5px;
                                                ">
                                                    <i class="bx bx-comment"></i>
                                                    '.$comment_count.'
                                                </button>
                                                <button type="button" class="react_btn cmnt">
                                                    <input type="text" required name="comment_text" placeholder="reply a answer..">
                                                    <input type="hidden" name="pst_id" value="'.$data['question_unique_id'].'">
                                                    <button type="submit" class="sent_comment">
                                                        <i class="bx bx-paper-plane"></i>
                                                    </button>
                                                
                                                </button>
                                            </form>
                                        </div>
                
                                        <div class="comment_section" id="comment_section'.$data['question_unique_id'].'">
                                            
                                        </div>
                                    </div>                                
                                ';
                            }
                        }else{
                            echo "<h3>No Question Found</h3>";
                        }
                        ?>
                    </div>
                </div>
        </div>

        <div class="navbar_for_bottom">
            <ul class="mob-nav-bar">
                <li class="mobo_home_icon">
                    <a href="home.php">
                        <i class='bx bx-home-alt'></i>
                    </a>
                </li>
                
                <li class="show_books">
                    <i class='bx bx-book-alt'></i>
                </li>
                <li href="profile.php">
                    <a href="profile.php">
                        <img src="<?php echo $profile; ?>" alt="">
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script/jequery.js"></script>

    <script>
        var tglbtn=document.querySelector("#toggle_btn");
        var sidebar=document.querySelector(".navbar_main");
        var darkallbtn=document.querySelector(".darkmode");
        var darkall=document.querySelector("body");
        var darktext=document.querySelector('.add_text');
        var sun_change=document.querySelector(".darkmode .sun");
        var moon_change=document.querySelector(".darkmode .moon");
        var tglicon=document.querySelector(".tglicon");
        var show_booksbtn=document.querySelector(".show_books");


    
        tglbtn.addEventListener("click",()=>{
            tglbtn.classList.toggle('hide');
            sidebar.classList.toggle('hide');
        })

        darkallbtn.addEventListener("click",()=>{
            darkall.classList.toggle("darkAll");
        })

        function darkall_class(params) {
            if(darkall.classList.contains('darkAll')){
                darktext.innerText="Light Mode";
                sun_change.classList.remove('active');
                moon_change.classList.add('active');
                tglicon.style.transform="rotateY(180deg)";
            }else{
                darktext.innerText="Dark Mode";
                sun_change.classList.add('active');
                moon_change.classList.remove('active');
                tglicon.style.transform="rotateY(0deg)";
            }
        }
        setInterval(() => {
            darkall_class();
        }, 100);


        show_booksbtn.addEventListener("click",()=>{
            sidebar.classList.toggle('mobo_active');
        })



    </script>
</body>
</html>