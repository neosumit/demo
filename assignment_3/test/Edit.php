<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie" lang="en" dir="ltr"><![endif]-->
<!--[if gt IE 8]> <html class="no-js gt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<?php

session_start();

$_GET['id'];

$ids=$_GET['id'];
$_SESSION['i']=$ids;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "training";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$qury="select * from  `customer` WHERE `id`=$ids";

$qry = $conn->query($qury);

//var_dump($qry);


include('update.php');
//function selected($blood_group, $choice) {
//    if($blood_group==$choice) echo "selected";
//}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Vital Partners Leading Dating and Introduction Agency in Sydney &amp; Canberra</title>
    <link href="css/default.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all">
    <!--<link href="css/small-resolution.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/medium-resolution.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/high-resolution.css" rel="stylesheet" type="text/css" media="all">-->

    <!-- jQuery library (served from Google) -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <!--    <script src="js/validationphp.js"></script>-->
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <!-- Responsive -->
    <link href="css/responsive.css" rel="stylesheet" />


</head>

<body>
<!--wrapper-starts-->
<div id="wrapper">

    <!--header-starts-->
    <header class="clearfix">

        <div class="container"><!--container Start-->

            <div class="Logo_Cont left"><!--Logo_Cont Start-->

                <a href="http://wireframes.php-dev.in/training/php/assignment/index.html"><img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/logo.png" alt=""></a>

            </div><!--Logo_Cont End-->

            <div class="Home_Cont_Right right"><!--Home_Cont_Right Start-->

                <div class="Home_Cont_Right_Top left"><!--Home_Cont_Right_Top Start-->

                    <div class="Top_Search1 left">Call Us Today! (02) 9017 8413</div>
                    <div class="Top_Search2 right"><input id="tags1" name="" onclick="this.value='';" onblur="validate_field('phone');" value="Type desired Job Location" type="text"></div>

                </div><!--Home_Cont_Right_Top End-->

                <div class="Home_Cont_Right_Bottom left"><!--Home_Cont_Right_Bottom Start-->
                    <div class="toggle_menu"><a href="javascript:void(0)">Menu</a></div>
                    <div id="topMenu">
                        <ul>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/index.html">Home</a></li>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/blog_index.html">Dating Blog</a></li>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/who_we_help.html">Who We Help</a></li>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/why_vital.html">Why Vital</a></li>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/reviews.html">Reviews</a></li>
                            <li><a href="http://wireframes.php-dev.in/training/php/assignment/contact_us.html">Contact Us</a></li>
                        </ul>
                    </div>

                </div><!--Home_Cont_Right_Bottom End-->

            </div><!--Home_Cont_Right End-->

        </div><!--container End-->

    </header>
    <!--header-ends-->

    <div class="section banner_section who_we_help">
        <div class="container">
            <h4>Edit Customer</h4>
            <?php echo "$display_output";?>
        </div>
    </div>
    <form action="update.php" method="POST" >
        <!-- Content Section Start-->
        <div class="section content_section">
            <div class="container">
                <div class="filable_form_container">
                    <div class="form_container_block">
                        <ul>
                          <?php  if ($qry->num_rows > 0) {
                            // phpheader("Location:main.php");
                            //echo "See th record";
                            while ($user = $qry->fetch_assoc())
                            {
                            $result[]=$user;
                           // echo $user['first_name'];
                            // echo $result;
                            //echo $display = " User is " . $user['first_name'] . " " . $user['last_name'];

                            ?>
                            <li class="fileds">
                                <div class="name_fileds">
                                    <label>First Name</label>
                                    <input name="firstname" type="text" value="<?php echo $user['first_name'];?>">
                                    <!--firstname validation-->
                                    <?php echo $ferror?>

                                    <!--                                    --><?php
                                    //                                    if(isset($_GET['msgf_em']))
                                    //                                    {
                                    //                                        echo $_GET['msgf_em'];
                                    //                                    }?>
                                </div>
                                <div class="name_fileds">
                                    <label>Last Name</label>
                                    <input name="lastname" type="text"  value="<?php echo $user['last_name'];?>">
                                    <!--lastname validation-->
                                    <?=$lastname_error?>

                                </div>
                            </li>
                            <li class="fileds">
                                <div class="phone_fileds">
                                    <label>Phone No</label>
                                    <input name="phone" type="number"  id="phone" onblur="Phone(this.value)"  value="<?php echo $user['phone_no'];?>">
                                    <!--lastname validation-->
                                    <?=$phone_error?>
                                </div>
                                <div class="phone_fileds">
                                    <label>Office No</label>
                                    <input name="office" type="number" value="<?php echo $user['office_no'];?>">
                                </div>
                            </li>
                            <li class="fileds">
                                <div class="email_fileds">
                                    <label>Email</label>
                                    <input name="email" type="email"  value="<?php echo $user['email'];?>">
                                    <?=$email_error?>
                                    <!--                                    --><?php
                                    //                                    if(isset($_GET['msg_email']))
                                    //                                    {
                                    //                                        echo $_GET['msg_email'];
                                    //                                    }
                                    //                                    ?>
                                </div>
                                <div class="gender_fileds">
                                    <label>Gender</label>
                                    <ul>
                                        <li><input type="radio" value="M" class="radio" id="residence1" name="gender" checked><label class="radio-label" for="residence1">Male</label></li>
                                        <li><input  type="radio" value="F" class="radio" id="residence2" name="gender" ><label class="radio-label" for="residence2">Female</label></li>

                                        <!--                                        --><?php
                                        //                                        if(isset($_GET['msg_gen']))
                                        //                                        {
                                        //                                            echo $_GET['msg_gen'];
                                        //                                        }
                                        //                                        ?>

                                    </ul>
                                </div>

                            </li>

                            <li class="fileds">
                                <div class="pass_fileds">
                                    <label>Password</label>
                                    <input name="password" type="password"  id="password"  onblur="passWord(this.value)" value="<?php echo $user['password'];;?>">
                                    <?=$password_error?>
                                    <!--                                    --><?php
                                    //                                    if(isset($_GET['msgpass']))
                                    //                                    {
                                    //                                        echo $_GET['msgpass'];
                                    //                                    }
                                    //                                    ?>

                                </div>
                                <div class="pass_fileds">
                                    <label>Confirm Password</label>
                                    <input name="compass" type="password"  id="compass"  onblur="comPass(this.value)"  value="<?php echo $user['password'];?>">
                                    <?=$compass_error?>
                                    <?php
                                    //                                    if(isset($_GET['msg_com']))
                                    //                                    {
                                    //                                        echo $_GET['msg_com'];
                                    //                                    }
                                    //                                    ?>
                                </div>

                            </li>
                            <li class="fileds">
                                <div class="dob_fileds selectbox">
                                    <label>My birthdate is</label>

                                    <ul>
                                        <li>
                                            <select name="month" class="select month" id='month' required onblur="mnt(this.value) " value="<?php echo $first;?>">
                                                <option value="0">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="day" class="select day" onblur="dt(this.value)" required id="day" value="<?php echo $user['month'];?>">
                                                <option value="0">Day</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>

                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>

                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </li>

                                        <li>
                                            <select name="year" class="select year" id='year' required onclick="years(this.value)" value="<?php echo $user['day'];?>">
                                                <option value="0">Year</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                                <div class="age_fileds">
                                    <label>Age</label>
                                    <input name="age" id="age" type="text"   value="<?php echo $user['age'];;?>">

                                    <?php
                                    //                                    if(isset($_GET['msg_age']))
                                    //                                    {
                                    //                                        echo $_GET['msg_age'];
                                    //                                    }
                                    //                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="pincode_fileds">
                                    <label>Pincode</label>
                                    <input name="pincode" type="number" value="<?php echo  $user['pincode'];?>" id="pincode" onblur="code(this.value)">
                                    <?=$pin_error?>

                                </div>
                            </li>
                            <li>
                                <div class="about_you_fileds">
                                    <label>About you</label>
                                    <textarea  name="about" > <?php echo $user['aboutus'];?></textarea>
                                    <?=$about_error?>
                                    <!--                                    --><?php
                                    //                                    if(isset($_GET['msg_about']))
                                    //                                    {
                                    //                                        echo $_GET['msg_about'];
                                    //                                    }
                                    //                                    ?>
                                </div>
                            </li><?php
                            }
                          }else {
                              echo "No match found";
                          }?>
                        </ul>
                        <div class="next_btn_block">
                            <div class="next_btn">

                                <input type="SUBMIT" name="SUBMIT" style="text-align: center;    margin-left: 280px;border-radius: 5px;;  font-family: 'roboto_slablight';width: 150px; height: 50px;background-color: #9fbc35 " type="button" value="submit">
                                <!--<a href="http://wireframes.php-dev.in/training/php/assignment/partners_preference_form.html">Submit  <span><img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/small_triangle.png" alt="small_triangle"> </span></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Section End-->

    </form>


    <div class="section clearfix section-colored7"><!--section start-->

        <div class="container"><!--container Start-->

            <div class="Download_Cont_Top_Left left"><!--Download_Cont_Top Start-->
                <img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/icon5.png" alt=""> <h1 style="display:inline;">FREE: Men Are From Mars</h1> <a href="#">Download Now</a>

            </div><!--Download_Cont_Top End-->

        </div><!--container End-->

    </div><!--section End-->




    <!--footer-starts-->
    <footer class="footer_wrapper">

        <div class="container"><!--container Start-->

            <div class="Footer_Cont_Top clearfix"><!--Footer_Cont_Top Start-->

                <span class="left"><img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/foot_logo.png" alt=""></span>
                <p class="right">Shortcut your search to happiness right now.
                    Live a life without regrets and take action today!</p>
            </div><!--Footer_Cont_Top End-->

            <div class="Footer_Cont_Top2 clearfix"><!--Footer_Cont_Top2 Start-->

                <h1>Call Us Today! (02) 9017 8413</h1>
                <a href="#">Book an Appointment <img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/icon7.png" alt=""></a>
                <a href="#">Contact a Consultant <img src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/icon6.png" alt=""></a>
            </div><!--Footer_Cont_Top2 End-->

            <div class="Footer_Cont_Top3 clearfix"><!--Footer_Cont_Top3 Start-->

                <div class="Foot_Link1"><!--Foot_Link1 Start-->

                    <h1>CONTACT INFO</h1>

                    <div class="Foot_Link2"><!--Foot_Link2 Start-->

                        <span>4/220 George St, Sydney NSW 2000</span>
                        <p>Phone: (02) 9017 8413</p>
                        <p>Email: <a href="mailto:info@syd.vitalpartners.com.au" target="_blank">info@syd.vitalpartners.com.au</a></p>

                    </div><!--Foot_Link2 End-->

                    <div class="Foot_Link2"><!--Foot_Link2 Start-->

                        <span>Canberra City Act 2600 </span>
                        <p>Phone: (02) 9017 8426</p>
                        <p>Email: <a href="mailto:can@syd.vitalpartners.com.au" target="_blank">can@syd.vitalpartners.com.au</a></p>

                    </div><!--Foot_Link2 End-->

                </div><!--Foot_Link1 End-->

                <div class="Foot_Link1"><!--Foot_Link2 Start-->
                    <h1>RECENT POSTS</h1>

                    <div class="Foot_Link3"><!--Foot_Link3 Start-->
                        <ul>
                            <li><a href="#">How to Recover After a Bad Date</a></li>
                            <li><a href="#">Review | Vital Partners Review</a></li>
                            <li><a href="#">Review | Vital Partners Review</a></li>
                            <li><a href="#">Review | Vital Partners Derek and Julie</a></li>
                            <li><a href="#">7 Rules for a Happy Relationship | Vital Partners Dating Sydney</a></li>
                        </ul>
                    </div><!--Foot_Link3 End-->

                </div><!--Foot_Link1 End-->

                <div class="Foot_Link1"><!--Foot_Link2 Start-->
                    <h1>RECENT TWEETS</h1>

                    <div class="Foot_Link4"><!--Foot_Link4 Start-->
                        <ul>
                            <li class="left">
                                <p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p>
                                <div class="Page_Link left"><a href="#">http://t.co/hGCgHEU6If</a></div>
                                <div class="Page_Link right"> 1 week ago</div>
                            </li>
                            <li class="left">
                                <p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p>
                                <div class="Page_Link left"><a href="#">http://t.co/hGCgHEU6If</a></div>
                                <div class="Page_Link right"> 2 week ago</div>
                            </li>
                        </ul>
                    </div><!--Foot_Link4 End-->

                </div><!--Foot_Link2 End-->


            </div><!--Footer_Cont_Top3 End-->

        </div><!--container End-->

        <div class="section clearfix section-colored9"><!--section section-colored9 start-->

            <div class="container"><!--container Start-->

                <div class="Foot_Link5 left"><!--Foot_Link5 Start-->
                    © VitalPartners.com.au
                </div><!--Foot_Link5 End-->

                <div class="Foot_Link6 left"><!--Foot_Link5 Start-->
                    <a href="http://wireframes.php-dev.in/training/php/assignment/contact_us.html">Contact</a> |  <a href="http://wireframes.php-dev.in/training/php/assignment/terms_of_use.html">Terms of Use</a> |   <a href="http://wireframes.php-dev.in/training/php/assignment/privacy_policy.html">Privacy Policy</a> |  <a href="http://wireframes.php-dev.in/training/php/assignment/disclaimer.html">Disclaimer</a>
                </div><!--Foot_Link6 End-->


                <div class="Foot_Link7 right"><!--Foot_Link7 Start-->
                    <span>FOLLOW US:</span>

                    <ul class="social_media">
                        <li><a href="#" class="fb">facebook</a></li>
                        <li><a href="#" class="twitter">Twitter</a></li>
                        <li><a href="#" class="linkedin">LinkedIn</a></li>
                        <li><a href="#" class="you_tube">You Tube</a></li>
                        <li><a href="#" class="gplus">googl plus</a></li>
                    </ul>


                    <!-- <p><a href="#"><img src="images/icon10.png" alt=""></a></p>
                    <p><a href="#"><img src="images/icon11.png" alt=""></a></p>
                    <p><a href="#"><img src="images/icon12.png" alt=""></a></p>
                    <p><a href="#"><img src="images/icon13.png" alt=""></a></p>
                    <p><a href="#"><img src="images/icon14.png" alt=""></a></p> -->
                </div><!--Foot_Link7 End-->

            </div><!--container End-->

        </div><!--section section-colored9 End-->

        <div class="section section-colored10"><!--section section-colored9 start-->

            <div class="container"><!--container Start-->
                <div class="Foot_Link8 "><!--Foot_Link8 Start-->
                    <a href="#">Who Designed This Site?</a> <a href="#">Who  Built This Site?</a>
                </div><!--Foot_Link8 End-->
            </div><!--container End-->

        </div><!--section section-colored9 End-->
    </footer>
    <!--footer-ends-->

    <!-- Sticky Contact Number Start
    <div class="fixed_contact_number">
        <div class="container">
            <div class="contact_number">
                <span>Call Us Today! (02) 9017 8413</span>
                <a href="contact_us.html">Conatct Us</a>
            </div>
        </div>
    </div>
     Sticky Contact Number End-->

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>
<!--wrapper-starts-->

<script type="text/javascript" src="Vital%20Partners%20Leading%20Dating%20and%20Introduction%20Agency%20in%20Sydney%20&amp;%20Canberra_files/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.select').each(function(){
            var title = $(this).attr('title');
            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
            $(this).css({'z-index':10,'opacity':0,'-khtml-appearance':'none'}).after('<span class="select">' + title + '</span>').change(function(){
                val = $('option:selected',this).text();
                $(this).next().text(val);
            })
        });
    });
</script>

<?php
//if (isset($_POST['SUBMIT']) && $ferror == '' && $lastname_error=='' && $phone_error==''&&
//            $password_error==''&& $compass_error==''&& $email_error==''&&
//            $pin_error==''&& $about_error=='')
//
if($hasError){
    echo $ferror;
}

?>

</body></html>

<?php


?>