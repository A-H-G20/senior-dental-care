<div class="side_dental">
		<script language="javascript" type="text/javascript">
			/* Visit http://www.yaldex.com/ for full source code
			and get more free JavaScript, CSS and DHTML scripts! */
			<!-- Begin
			var timerID = null;
			var timerRunning = false;
			function stopclock (){
			if(timerRunning)
			clearTimeout(timerID);
			timerRunning = false;
			}
			function showtime () {
			var now = new Date();
			var hours = now.getHours();
			var minutes = now.getMinutes();
			var seconds = now.getSeconds()
			var timeValue = "" + ((hours >12) ? hours -12 :hours)
			if (timeValue == "0") timeValue = 12;
			timeValue += ((minutes < 10) ? ":0" : ":") + minutes
			//timeValue += ((seconds < 10) ? ":0" : ":") + seconds
			timeValue += (hours >= 12) ? " P.M." : " A.M."
			document.clock.face.value = timeValue;
			timerID = setTimeout("showtime()",1000);
			timerRunning = true;
			}
			function startclock() {
			stopclock();
			showtime();
			}
			window.onload=startclock;
			// End -->
		</SCRIPT>								      
<p>
		<form name="clock">
		Time is:&nbsp;<input type="submit" class="trans" name="face" value="">
			</form>
</p>	

							  <div class="alert alert-info">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('y:m:d');
                        $new = date(' d/m/Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>
						
								<div class="navbar">
									<div class="navbar-inner">
										<div class="pull-right">					
										</div>
									</div>
								</div>
								<ul class="nav nav-tabs nav-stacked">
									<li class="active">
										<a href="dasboard.php"><i class="icon-home icon-large"></i>&nbsp;Home<i class="icon-arrow-right icon-large"></i></a>
									</li>
									<li><a href="sched_today.php"><i class="icon-file-alt icon-large"></i>&nbsp;Schedule for Today <i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="schedule.php"><i class="icon-list icon-large"></i>&nbsp;Schedule<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="service.php"><i class="icon-medkit	icon-large"></i>&nbsp;Service<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="user.php"><i class="icon-user icon-large"></i>&nbsp;Admin Accounts<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="members.php"><i class="icon-group icon-large"></i>&nbsp;Members<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="doctor.php"><i class="icon-group icon-large"></i>&nbsp;Doctor<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="feedback.php"><i class="icon-pencil icon-large"></i>&nbsp;Feedback<i class="icon-arrow-right icon-large"></i></a></li>
									<li><a href="note.php"><i class="icon-file icon-large"></i>&nbsp;Note<i class="icon-arrow-right icon-large"></i></a></li>
								</ul>
							</div>