<?php
//  $conn = mysqli_connect('localhost', 'worldsuc_assign', 'asdf1234', 'worldsuc_stftitle');
 $servername = "localhost";
$username = "root";
$password = "c2fpwd2019";
$dbname = "ctf-admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$date = "26th, 27th and 28th July'19";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href=style.css rel=stylesheet type=text/css>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Libre Franklin:300,400,500,700|Raleway:300,400,500,700|Roboto:300,400,500,700" type="text/css" rel="stylesheet">

 <style>
 
        </style>

</head>
<body>
<section class="top">
	<div class="container">
		<div class="top-main">
			<div class="top-bar">
				<strong class="topcolor topfontsize">MUMBAI || DELHI || BANGALORE || KOLKATA || HYDERABAD || GURGAON || CHENNAI || CHANDIGARH || GOA || DUBAI || LONDON </strong>
			</div>
			<div class="top-bar">
				<img class="lp-image-react w-3a42fe42-75d4-ea0f-d5d6-dfed891e9d49 css-hxeopb lazyload" src="https://lh3.googleusercontent.com/tdmhK8OhvzfeMBIxX0irYtKzLtd22GiiOZD3XoehOBWYChoXvc4rZnqzoZW18U0EgxC0vztjoRqjPBfdaCvZiVw=w1064" data-src="https://lh3.googleusercontent.com/tdmhK8OhvzfeMBIxX0irYtKzLtd22GiiOZD3XoehOBWYChoXvc4rZnqzoZW18U0EgxC0vztjoRqjPBfdaCvZiVw" data-image-upload-source="" alt="" >
			</div>
				<div class="top-bar">
			    <h3 style="margin: 0;">In this<b style="color:#f77534;"> FREE </b>Seminar I will share with you a step-by-step system that can help you begin your career as a coach</h3>
			</div>
	    </div>
	    
	    <div class="sessions">
    		<div class="top-left">
    			<div class="top-bar top-date">
    				<span style="font-family: Libre Franklin, sans-serif;"><strong>&nbsp;<?php echo $date; ?></strong></span>
    			</div>
    			<div class="top-bar top-time">
    				<span style="font-family: Libre Franklin, sans-serif;"><strong>Time: 9.00 am to 1.00 pm or 7.00 pm to 11.00 pm&nbsp;</strong></span>
    			</div>
    			<!--<div class="top-bar">-->
    			<!--	<a data-widget-link="true" href="#section-5" target="_top" data-link-type="section" class="lp-button top-bar" contenteditable="false" data-reveal-id="myModal">YES! I WANT TO COACH PEOPLE &amp; LEAVE A MARK &gt;&gt;</a>-->
    			<!--</div>-->
    			<div class="top-bar top-last">
    				<span style=""><strong>* Only 20 spots are available for each seminar, so claim yours now! *</strong></span>
    			</div>
    		</div>
    		<div class="top-right">
    		      <p class="mod-title">You’re almost there! Fill out your details to reserve your spot… </p>
                            <form class="pop-form" action="http://www.arfeenkhan.com/landingpage/online.php" method="post">
                                <select style="" class="drop_options" name="city" id="city" onchange="myFunction()" required>
                                    <option value="">city</option>
                                    <!-- <option value="mumbai">Mumbai</option>
                                    <option value="pune">Bangalore</option>
                                    <option value="chennai">Chennai</option>
                                    <option value="bangalore">Kolkata</option>
                                    <option value="hyderabad">Hyderabad</option>
                                    <option value="gurgaon">Gurgaon</option>
                                    <option value="delhi">Delhi</option> -->
                                    <?php
                                    $sql = "SELECT * FROM `datatablecity`";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                            $city = $row['city'];
                                            $sql1 = "SELECT * FROM `datatable` WHERE city ='$city'";
                                            $result2 = $conn->query($sql1);
                                            while($row2 = $result2->fetch_assoc()) {
                                               ?>
                                               <option value="<?php echo $row2["city"]; ?>"><?php echo $row2["city"]; ?></option>
                                               <?php
                                             }
                                            }
                                    ?>
                                </select>
                                <div class="date"></div>
                                <div class="time"></div>

                                <input class="text_value" type="text" name="name" placeholder="Name" required>
                                <input class="text_value" type="text" name="email" placeholder="E-mail" required>
                                <input class="text_value" type="text" name="tel" placeholder="Phone Number" required>
                                <div>
                                    <label><input type="checkbox" class="checkab" /> <p>Yes, I consent to receiving emails</p></label>
                                </div>
                            <div class="modal-footer pop_footer">
                                <button type="submit" value="Submit" class="btn btn-default count_button">YES! I WANT TO COACH PEOPLE &amp; LEAVE A MARK &gt;&gt;</button>
                                <!--<p class="policy">Privacy Policy: We hate spam and promise to keep your email address safe</p>-->
                            </div>
                          </form>
    		</div>
		</div>
		
	</div>
</section>
<section>
	<div class="containers">
		<div class="mid-top">
			<span class="topcolor" style="font-family: Raleway, sans-serif;"><strong><u>In This Exclusive Coach To A Fortune Workshop,
Here's What You'll Learn:</u></strong></span>
		</div>
		<div>
			<div class="first-div" style="">
				<ul class="ul-md" data-guid="ff331806-7b1f-44b0-8713-e76033b2bf2e">
					<li><em>How To Build A Strong Personal Brand &amp; Share Your Expertise To The World&nbsp;</em></li>
					<li><em>How To Build A Profitable &amp; Successful Coaching Business (where you can make over 1 lakh a month)</em></li>
					<li><em>How to transform people's lives and earn more doing It as a Coach.&nbsp;</em></li>
					<li><em>How To Create An Impact In The World, Be Known For Something &amp; Leave Behind A Legacy&nbsp;</em></li>
				</ul>
				<p class="font-left"><em>
And much more...  &nbsp;</em></p>
			</div>
			<div class="mid-youtube">
				<iframe width="727" height="409" class="xyz" src="https://www.youtube.com/embed/X4Pe1WzkC0A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			</div>
		</div>
		<div class="full-width">
			<p class="mid-last">So if you feel that it's time that you stopped working for a living &amp; started making money doing what you love...        &nbsp;</p>
			<p class="mid-last">... creating changes &amp; transformations in other people's lives, click on the link below to reserve your spot for the Coach To A Fortune Seminar.</p>
		</div>
		<div class="button-md">
			<a data-widget-link="true" href="#section-5" target="_top" data-link-type="section" class="lp-button top-bar button-width" contenteditable="false" data-reveal-id="myModal">YES! I WANT TO COACH PEOPLE &amp; LEAVE A MARK &gt;&gt;</a>
		</div>
		<div class="button-md">
			<span style="color: rgb(0, 0, 0);"><strong>* Only 20 spots are available for each seminar, so claim yours now! *</strong></span>
		</div>
		<div class="button-md">
			<hr class="hrclass">
		</div>
	</div>
</section>
<section>
		<div class="containers">
			<div class="button-md">
				<span class="topline" style="color: rgb(221, 108, 69);"><strong>Who Else Wants To Start Coaching People &amp; Make A Living Doing What You Love?</strong></span>
			</div>
			<div class="lp-text-react" data-widget-type="LpTextReact" contenteditable="false" data-gramm="false" spellcheck="false"><p class="">Dear Friend,  &nbsp;</p><p class="">Would you like to start coaching people so you can serve people &amp; impact more lives?  &nbsp;</p><p class="">Would you like to have a profitable coaching business where you MAKE money doing what you love?  &nbsp;</p><p class="">Then you're in the right place...   &nbsp;</p><p class="">Today, coaching is one of the word's fastest growing industries and it's currently estimated to be over $2 billion.  &nbsp;</p><p class="">It's ALSO one of the most meaningful professions because when you coach, you share your message &amp; use it more &amp; tra&amp;sform people's lives.  &nbsp;</p><p class="">... because EVERYBODY has a message they can share with the world &amp; use to more people's hearts, touch lives and create a transformation.  &nbsp;</p><p class="">You may be a housewife, a mom, a working professional or an entrepreneur.  &nbsp;</p><p class="">Regardless of who you are, there's DEFINITELY an unsung melody in you that people don't know about yet.  &nbsp;</p><p class="">There's a message that hides behind your years of experience.   &nbsp;</p><p class="">And it's time to bring that forward...  &nbsp;</p><p class="">That's why I would like to invite you to participate in my exclusive, "Coach To A Fortune" seminar happening on the<br><strong> 
			<span class="midline" style="color: rgb(221, 108, 69);"><span class="font-scale-7"><em> </em></span></span></strong></p><p class="">The Coach To A Fortune workshop teaches professionals, housewives &amp; other experts on how they can start a coaching business &amp; make a living doing what they love.&nbsp;</p></div>
			<div class="button-md">
				<hr class="hrclass">
			</div>
			<div>
				<p class="button-md"><span style="color: rgb(0, 0, 0);"><strong class="midtopline" >Listen To What People Have To Say About Arfeen Khan</strong></span></p>
			</div>
			<div class="testi" style="">
				<div class="topboxa">
					<div class="topboxb">
						<p><span style="color: rgb(255, 255, 255);"><span style="font-family: Georgia, sans-serif;"><em><span class="font-scale-8"><strong>“</strong></span>Arfeen Khan is a person of spirit, insight, leadership &amp; talent who comes along to lead a generation of people to a new, fresh and wholly inviting place for understanding &amp; love<span class="font-scale-8">"</span></em></span></span></p>
						<p class="topboxc"><span style="color: rgb(255, 255, 255);"><strong>- <span class="font-scale-4">Anthony Robbins (World-Recognized Authority on the Psychology of Leadership and Peak Performance)</span></strong></span></p>
					</div>
				</div>
				<div class="topboxaa">
					<div class="topboxb">
						<p><span style="color: rgb(255, 255, 255);"><span style="font-family: Georgia, sans-serif;"><em><span class="font-scale-8"><strong>“</strong></span>Arfeen, your beliefs and ideas make it all the more revealing!<span class="font-scale-8">"</span></em></span></span></p>
						<p class="topboxc"><span style="color: rgb(255, 255, 255);"><strong>- <span class="font-scale-4"> -Amitabh Bachchan (Actor & Superstar)</span></strong></span></p>
					</div>
				</div>
				<div class="topboxaaa">
					<div class="topboxb">
						<p><span style="color: rgb(255, 255, 255);"><span style="font-family: Georgia, sans-serif;"><em><span class="font-scale-8"><strong>“</strong></span>Arfeen Khan is a person of spirit, insight, leadership &amp; talent who comes along to lead a generation of people to a new, fresh and wholly inviting place for understanding &amp; love<span class="font-scale-8">"</span></em></span></span></p>
						<p class="topboxc"><span style="color: rgb(255, 255, 255);"><strong>- <span class="font-scale-4">Anthony Robbins (World-Recognized Authority on the Psychology of Leadership and Peak Performance)</span></strong></span></p>
					</div>
				</div>
			</div>
			<div class="button-md">
				<hr class="hrclass">
			</div>
			<div class="lp-text-react1" data-widget-type="LpTextReact" contenteditable="false" data-gramm="false" spellcheck="false"><p class="divcenter"><strong><u>This workshop is <span style="color: rgb(221, 108, 69);">NOT</span> for everybody.</u>  &nbsp;</strong></p><p class="divleft">This workshop is only for people who ARE really serious about becoming a coach, who are hardworking &amp; really want to help people's lives.  &nbsp;</p><p class="divleft">It's not for you if you think coaching can make you rich overnight &amp; you can make money as a coach without doing the work.  &nbsp;</p><p class="divleft"><strong><span style="color: rgb(221, 108, 69);"><span class="divleft font-scale-6">To get started with the 'Coach To A Fortune' workshop, here's what you need to do:</span></span>  &nbsp;</strong></p><p class="divleft">1. Click on the button below &amp; fill out the details on the form that pops up.             &nbsp;</p><p class="divleft">2. We'll email you the details about the location      &nbsp;</p><p class="divleft">3. Make sure that you show up at the venue 30 minutes before the start. Latecomers will not be allowed under any circumstances</p><p class="divleft">4. That's it! You're all set!&nbsp;</p></div>
			<div class="button-md">
			<a data-widget-link="true" href="#section-5" target="_top" data-link-type="section" class="lp-button top-bar button-width" contenteditable="false" data-reveal-id="myModal">YES! I WANT TO COACH PEOPLE &amp; LEAVE A MARK &gt;&gt;</a>
			</div>
			<div class="button-md">
				<hr>
			</div>
			<div class="button-md">
				<span class="akfont" style="color: rgb(221, 108, 69);"><strong>Arfeen Khan</strong></span>
			</div>
			<div class="lp-text-react1">
			<div class="mid-youtube1">
				<iframe width="727" height="409" class="xyz" style="" src="https://www.youtube.com/embed/X4Pe1WzkC0A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			</div>
			<div class="bollywood" style="">
				<p class="bhtop"><strong>Bollywood's #1 Coach || TEDster || Transformation Expert || International Speaker</strong></p>
				<p class="bhmid">For almost 25 years, he has helped over 600,000 people in over 49 countries create personal &amp; professional transformation.
It's Arfeen’s mission to provide tools and strategies that everyone needs to transcend beyond their limiting fears and beliefs, accomplish their goals and realize their true desires. 
Arfeen has worked with an extensive range of people including CEOs, students, bollywood celebrities and industrialists. He considers all people intrinsically the same, but what sets them apart and determines their future is the reach of their thoughts and ambition.</p>
				</div>
			</div>
			<div class="button-md">
			
			</div>
			
		
		</div>
</section>

<div class="footer" style=" background-color: rgba(0, 0, 0, 1);  text-align: center;  width: 100%;">
	<span style="color: rgb(255, 255, 255);padding: 26px;   display: -webkit-inline-box;">Copyright © 2019 | Privacy Policy | Terms &amp; Conditions</span>
  	 
  </div>
<!-- <link rel="stylesheet" href="http://www.speaktofortune.com/mumbai/css/style.css"> -->


<script src="js/pop.js"></script>
<!-- <script src="js/jquery-1.9.1.min.js"></script> -->
<script src="js/popup.js"></script>

  <script>
    $("#city").change(function () {
        var x = this.value;
        //var firstDropVal = $('#pick').val();
        <?php
                                     $sql2 = "SELECT * FROM `datatablecity`";
                                    $result2 = $conn->query($sql2);
                                    
                                    while($row2 = $result2->fetch_assoc()) {
                                    $city = $row2['city'];
                                    
                                        $sql = "SELECT DISTINCT date FROM `datatable` WHERE city = '$city'";
                                        $result = $conn->query($sql);
                                        
                                        
                                    ?>
                                    if(x == "<?php echo $city; ?>")
                                    {
                                        <?php
                                        $setdate = "";
                                        
                                        
                                        
                                        $setdate .= "<select class='drop_options' name='date' id='dateid' onchange='myFunction()' required><option value=''>Date</option>";
                                        while($rowdate = $result->fetch_assoc()) 
                                        {
                                            $setdate .= "<option value='".$rowdate['date']."' >".$rowdate['date']."</option>";
                                            
                                            $date = $rowdate['date'];
                                            $sql1 = "SELECT * FROM `datatable` WHERE city = '$city' AND date = '$date'";
                                            $result1 = $conn->query($sql1);
                                         }
                                        $setdata .= "</select>";
                                        ?>
                                        var setdata = "<?php echo $setdate; ?>";
                                        //var settime = "<?php echo $settime ?>";
                                        $(".date").html(setdata);
                                        //$(".time").html(settime);
                                    }
                                    <?php
                                    }
                ?>
    });         
    
    function myFunction() {
        var x = document.getElementById("dateid").value;
        var y = document.getElementById("city").value;
               <?php
               
               $sql2 = "SELECT * FROM `datatablecity`";
                                    $result2 = $conn->query($sql2);
                                     
                                    while($row2 = $result2->fetch_assoc()) {
                                    $city = $row2['city'];
                                    
                                        $sql = "SELECT DISTINCT date,time FROM `datatable` WHERE city = '$city'";
                                        $result = $conn->query($sql);
                                        
                                         while($rowdate = $result->fetch_assoc()) 
                                        {
                                            $date = $rowdate['date'];
                                            ?>
                                        if(y == "<?php echo $city; ?>" && x == "<?php echo $date; ?>" ){
                                           <?php
                                           $settime = "";
                                           $sql5 = "SELECT DISTINCT date,time FROM `datatable` WHERE city = '$city' AND date ='$date'";
                                            $result5 = $conn->query($sql5);
                                            $settime .= "<select class='drop_options' name='time' required><option value=''>Time Slot</option>";
                                            while($row5 = $result5->fetch_assoc()) {
                                                $settime .= "<option value='".$row5['time']."' >".$row5['time']."</option>";
                                            }
                                           $settime .= "</select>";
                                           ?>
                                           var settime = "<?php echo $settime ?>";
                                           $(".time").html(settime);
                                        }
                                        <?php
                                        }
                                         
                                    }
                                
               ?>
              // var settime = "<?php echo $settime ?>";
             //  $(".time").html(settime);
    }
             
    $(".lp-button").click(function() {
    $('html,body').animate({
        scrollTop: $(".top-right").offset().top},
        'slow');
});       
        </script> 
</body>
</html>