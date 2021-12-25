<style type="text/css">

	.logo a {
		font-size: 30px;
	}
	a.account {
		padding: 6px 7px;
	}

	.top-menu {
		z-index: 1;
		overflow: hidden;
		/*background-color: #333;*/
		position: absolute;
		/*position: fixed;*/
		top: 0;
		width: 100%;
		/*z-index: -9999;*/
		margin-top: 0;
	}
	.main {
		/*padding: 16px;*/
  		margin-top: 120px;
	}
	
	.navbar-default .navbar-nav > li > a {
        /*color: #f3c500;*/
        color: #fff;
    }
    #welcome {
        color: #000;
    }
    @media screen and (max-width: 600px) {
        #welcome {
            color: #f3c500;
        }
        .navbar-default .navbar-nav > li > a {
            color: #f3c500;
            /*color: #fff;*/
        }   
    }
</style>
<div class="header top-menu">
	<div class="container">
		<div class="logo" style="width: 300px;">
			<a href="index.php"><span>Classsified</span> Auction System</a>
		</div>
		
        <div class="header-right">
        <nav class="navbar navbar-default" style="background-color: #fff; border-color: #fff;">
            <div class="container-fluid">
                
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!--<a class="navbar-brand" href="#">Brand</a>-->
                  <!--<a class="navbar-brand" href="index.php"><span>Classsified</span> Auction System</a>-->
                </div>
        
            
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <!-- <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                  </ul> -->
                  
                  <ul class="nav navbar-nav navbar-right">
                    
                    <?php
        				if (isset($_SESSION['loggedIn'])) {
        			?>
        			    <li><a href="#"><span id="welcome">Welcome: <?php echo $_SESSION['userName']; ?> &nbsp;&nbsp;&nbsp;</span></a></li>
        				
                  
        				
        				<?php if (isset($_SESSION['userTypeCompany'])) { ?>	
        				
        						<li><a class="account" href="auction.php">Create Auction</a></li>
                    <li><a class="account" href="post-ad.php">Submit New Ads</a></li>
        						
        				<?php }
        					 else if (isset($_SESSION['userTypeUsers'])) {
        				?>
        					 	
        					 	<li><a class="account" href="all-classifieds.php?uid= <?php echo $_SESSION['uid']; ?>">My Posts/Ads</a></li>
                    <li><a class="account" href="post-ad.php">Submit New Ads</a></li>
                    <li><a class="account" href="my_chat.php">My Chats</a></li>
                    <li><a class="account" href="profile.php">Profile</a></li>
        					 	
        			<?php }
              ?>
                    <li><a class="account" href="logout.php">Logout</a></li>
              <?php
        				}
        				else {
        			?>
        				    <li><a class="account" href="login.php">My Account</a></li>
        				    
        			<?php } ?>
                  </ul>
                </div>
            </div>
        </nav>
        </div>
	</div>
</div>
<div class="main"></div>
