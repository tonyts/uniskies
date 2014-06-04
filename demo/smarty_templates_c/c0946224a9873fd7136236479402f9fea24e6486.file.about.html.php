<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:43
         compiled from "D:\websites\uniskies\demo\Template\about.html" */ ?>
<?php /*%%SmartyHeaderCode:18413538f51e78ba836-86937445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0946224a9873fd7136236479402f9fea24e6486' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\about.html',
      1 => 1401901472,
      2 => 'file',
    ),
    '9f4fb8ae72206a40a1f6a8d045f6e83f620f7a2b' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\Mian.Master.html',
      1 => 1401901519,
      2 => 'file',
    ),
    '13fce8a2860d5573e604dea171c2080e8c46df09' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\portlet-latest.html',
      1 => 1401901420,
      2 => 'file',
    ),
    '0948e4baa168152028da7e7b0bcb8232ee5ecd28' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\portlet-media.html',
      1 => 1401901519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18413538f51e78ba836-86937445',
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
        
    <link rel="stylesheet" type="text/css" href="style/about.css" />

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
            
	<div class="breadCrumb">
	    <span><a href="/demo/">Home</a> > <?php echo $_smarty_tpl->getVariable('title')->value;?>
</spa>
	</div>

            <div class="content">
                
	<h1><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h1>
	<div class="section left blue" id="section1">
		<span class="notch"></span>
		<img src="images/logo-large.jpg">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis</p>
		<a class="viewMore" href="?c=article">View more</a>
		<div class="clear"></div>
	</div>
	<?php $_template = new Smarty_Internal_Template("portlet-latest.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '18413538f51e78ba836-86937445';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:43
         compiled from "D:\websites\uniskies\demo\Template\portlet-latest.html" */ ?>
<style type="text/css">
#portletLatest{
    width: 200px;
    height: 300px;
    padding: 30px;
}

    #portletLatest h2{
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 25px;
        padding: 0 !important;
        text-align: left;
    }

    #portletLatest img{
        margin-bottom: 15px;
    }
</style>
<div class="portlet" id="portletLatest">
	<h2>Latest from Uniskies</h2>
    <img src="images/school.jpg">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non</p>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "D:\websites\uniskies\demo\Template\portlet-latest.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
	<div class="section twoColumn">
		<div class="column">
			<h3>Annual report/audit report</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus </p>
			<h3>Constitution</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis</p>
			<h3>O-chart</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper.</p>
			<img src="images/lady.jpg" style="float:left;margin-right:20px;">
			<ul>
				<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit</a></li>
				<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit amet</a></li>
				<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor</a></li>
				<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit ame</a></li>
				<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit a</a></li>
			</ul>
		</div>
		<div class="column col2">
			<h3>Annual report/audit report</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
			<h3>Contact us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. consectetur adipiscing elit. Nam sit amet lorem nisl.</p>
		</div>
		<div class="clear"></div>
	</div>
	<?php $_template = new Smarty_Internal_Template("portlet-media.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '18413538f51e78ba836-86937445';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:43
         compiled from "D:\websites\uniskies\demo\Template\portlet-media.html" */ ?>
<div class="section left gray mediaCoverage">
    <h2>Media Coverage</h2>
    <div class="column">
        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
        <img src="images/children05.jpg">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
    </div>
    <div class="column">
        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
        <img src="images/children05.jpg">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
    </div>
    <div class="column">
        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
        <img src="images/children05.jpg">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
    </div>
    <div class="column last">
        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
        <img src="images/children05.jpg">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
    </div>
    <div class="clear"></div>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "D:\websites\uniskies\demo\Template\portlet-media.html" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

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
