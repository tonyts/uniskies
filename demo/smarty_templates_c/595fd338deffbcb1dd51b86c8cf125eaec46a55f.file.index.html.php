<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:40
         compiled from "D:\websites\uniskies\demo\Template\index.html" */ ?>
<?php /*%%SmartyHeaderCode:30491538f51e47cba57-82756715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '595fd338deffbcb1dd51b86c8cf125eaec46a55f' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\index.html',
      1 => 1401901521,
      2 => 'file',
    ),
    '9f4fb8ae72206a40a1f6a8d045f6e83f620f7a2b' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\Mian.Master.html',
      1 => 1401901519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30491538f51e47cba57-82756715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <title>Uniskies - <?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
        <meta name="Keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
"/>
        <meta name="Description" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
"/>
        <link rel="stylesheet" type="text/css" href="style/global.css" />
        <script language="javascript" src="script/jquery-1.10.1.min.js"></script>
        <script language="javascript" src="script/global.js"></script>
        
    <link rel="stylesheet" type="text/css" href="style/home.css" />

    </head>
    <body>
        <div class="container">
            <div class="header">
                <a class="headerLogo" href="/demo/"><img src="images/logo.jpg"></a>
                <ul>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentAbout')->value;?>
" href="?c=about">About</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentWeDo')->value;?>
" href="?c=wedo">What We Do</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentDonate')->value;?>
" href="?c=donate">Donate</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentMember')->value;?>
" href="?c=member">Member Area</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            

            <div class="content">
                
    <div class="slideShow">
        <!--div class="sliderContainer">
            <div class="slider" style="background:url('images/home-background-1.jpg') center top no-repeat;"></div>
        </div-->
        <h2>What we do</h2>
        <p>To provide a platform for individuals to get in touch with organisations that are in need of services or financial assistance.</p>
        <a class="button blue" href="?c=article">Find out more</a>
    </div>
    <div class="featureNews">
    	<div class="column">
    		<h3>Pellentesque sagittis odio et justo convallis at varius</h3>
    		<p>Vestibulum at tempor ante. Curabitur justo nunc, aliquam at faucibus ac, lacinia a nulla. In hac habitasse platea dictumst. Sed eget lacus tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    	</div>
    	<div class="column">
    		<h3>Cras vel sem semper enim </h3>
    		<p>Donec non turpis id lacus luctus blandit eu at turpis. Aliquam quam metus, mollis eget pretium id, pharetra id lacus. Cras id augue justo. Sed ullamcorper viverra magna, quis accumsan odio porttitor et. Nunc vel sagittis leo.</p>
    	</div>
    	<div class="column">
    		<h3>Vestibulum at tempor ante quis mollis diam</h3>
    		<p>Curabitur justo nunc, aliquam at faucibus ac, lacinia a nulla. In hac habitasse platea dictumst. Sed eget lacus tellus. Cum sociis natoque penatibus et magnis dis parturient monte</p>
    	</div>
    	<div class="readMore">
    		<a href="?c=wedo">More News...</a>
    	</div>
    </div>
    <div class="donate">
    	<h3>Ready to work with us?</h3>
    	<a class="button green" href="?c=donate">Donate</a>
    	<div class="readMore">
    		<a href="?c=donate">or find out more</a>
    	</div>
    </div>
    <div class="about">
    	<div class="aboutContainer">
	    	<img src="images/man-and-woman.png">
	    	<h2>About Uniskies</h2>
	    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis:</p>
	    	<div class="clear"></div>
    	</div>
    </div>
    <div class="aboutDetail">
    	<span class="notch"></span>
    	<div class="row1">
    		<img src="images/little-girl.png">
	    	<h3>Promoting education in China</h3>
	    	<ul>
	    		<li>Promoting education amongst the poor in China and other social charities (including those for orphans and the disable, medical help and people affected by disasters)</li>
	    		<li>Assisting the poor high school students with their school fees, books and boarding and other sundry expenses;<br>
	    		Organising and supervising the construction of schools</li>
	    		<li>Formulating plans for the running of schools and managing and monitoring the administration and finance of schools</li>
	    		<li>Liaising with schools, teachers, parents and students</li>
	    	</ul>
    		<div class="clear"></div>
    	</div>
    	<div class="row2">
    		<img src="images/couple.png">
	    	<h3>Organising community activities for seniors in Hong Kong</h3>
	    	<p>Regular activities are organised in various districts for seniors, which include the giving of gifts, to enable the community to show their care for the seniors who have contributed so much for Hong Kong. Such activities also help to motivate the reclusive elders to take part in community events.</p>
	    	<div class="readMore">
	    		<a href="?c=about">More about our Services...</a>
	    	</div>
    	</div>
    </div>
    <div class="member">
    	<h2>Member Area</h2>
    	<div class="readMore">
    		<a href="?c=member">Find out more</a>
    	</div>
    	<div class="dialogContainer">
			<div class="dialog" id="dialog1">
				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nasc ridiculus mus.</p>
				<span class="notch left"></span>
			</div>
			<div class="dialog" id="dialog2">
				<p>Vestibulum at tempor ante. Curabitur justo nunc, aliquam at faucibus ac, lacinia a nulla. In hac habitasse platea dictumst. Sed eget lacus tellus.</p>
				<span class="notch right"></span>
			</div>
			<div class="dialog" id="dialog3">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet!</p>
				<span class="notch right"></span>
			</div>
		</div>
		<img id="figure1" src="images/dialog-figure1.png">
		<img id="figure2" src="images/dialog-figure2.png">
		<img id="figure3" src="images/dialog-figure3.png">
    </div>

            </div>
            <div class="footer">
                <ul>
                    <li><a href="?c=about">About</a></li>
                    <li><a href="?c=article">Ideology</a></li>
                    <li><a href="?c=article">Services</a></li>
                    <li><a href="?c=article">Organization</a></li>
                    <li><a href="?c=article">History</a></li>
                </ul>
                <span class="copy">© Copyright 2013 Uniskies</span>
                <a class="top" href="#top">back to top</a>
            </div>
        </div>
    </body>
</html>
