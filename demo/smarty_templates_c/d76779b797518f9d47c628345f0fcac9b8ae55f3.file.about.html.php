<?php /* Smarty version Smarty-3.0.6, created on 2013-06-26 00:42:48
         compiled from "D:\uniskies\Template\about.html" */ ?>
<?php /*%%SmartyHeaderCode:2554751c9c8883d8da7-23865411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd76779b797518f9d47c628345f0fcac9b8ae55f3' => 
    array (
      0 => 'D:\\uniskies\\Template\\about.html',
      1 => 1372177456,
      2 => 'file',
    ),
    '7393ec5bf795491beca27ad81061536e9097dbf4' => 
    array (
      0 => 'D:\\uniskies\\Template\\Mian.Master.html',
      1 => 1372178305,
      2 => 'file',
    ),
    'c3c2e04080c9f216e297dc246604cbb6380f6a7d' => 
    array (
      0 => 'D:\\uniskies\\Template\\portlet-latest.html',
      1 => 1372177721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2554751c9c8883d8da7-23865411',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <title>Uniskies</title>
        <link rel="stylesheet" type="text/css" href="style/global.css" />
        <script language="javascript" src="script/jquery-1.10.1.min.js"></script>
        <script language="javascript" src="script/global.js"></script>
        
    <link rel="stylesheet" type="text/css" href="style/about.css" />

    </head>
    <body>
        <div class="container">
            <div class="header">
                <a class="headerLogo" href="/"><img src="images/logo.jpg"></a>
                <ul>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentAbout')->value;?>
" href="?c=about">About</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentWhatWeDo')->value;?>
" href="?c=whatwedo">What We Do</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentDonate')->value;?>
" href="?c=donate">Donate</a></li>
                    <li><a class="<?php echo $_smarty_tpl->getVariable('currentMember')->value;?>
" href="?c=member">Member Area</a></li>
                </ul>
            </div>
            
	<div class="breadCrumb">
	    <span><a href="/">Home</a> > <?php echo $_smarty_tpl->getVariable('title')->value;?>
</spa>
	</div>

            <div class="content">
                
	<h1><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h1>
	<div class="section left blue" id="section1">
		<span class="notch"></span>
		<div class="col1">
			<img src="images/logo-large.jpg">
		</div>
		<div class="col2">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis</p>
			<a class="viewMore" href="#">View more</a>
		</div>
		<div class="clear"></div>
	</div>
	<?php $_template = new Smarty_Internal_Template("portlet-latest.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '2554751c9c8883d8da7-23865411';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2013-06-26 00:42:48
         compiled from "D:\uniskies\Template\portlet-latest.html" */ ?>
<style type="text/css">
#portletLatest{
    width: 200px;
    height: 300px;
    top: 0px;
    right: 79px;
    padding: 30px;
}

    #portletLatest h2{
        font-size: 20px;
        margin-bottom: 25px;
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
<?php /*  End of included template "D:\uniskies\Template\portlet-latest.html" */ ?>
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
				<li><a class="withArrow" href="javascript:void(0);">Lorem ipsum dolor sit</a></li>
				<li><a class="withArrow" href="javascript:void(0);">Lorem ipsum dolor sit amet</a></li>
				<li><a class="withArrow" href="javascript:void(0);">Lorem ipsum dolor</a></li>
				<li><a class="withArrow" href="javascript:void(0);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit ame</a></li>
				<li><a class="withArrow" href="javascript:void(0);">Lorem ipsum dolor sit a</a></li>
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

            </div>
            <div class="footer">
                <ul>
                    <li><a href="javascript:void(0);">About</a></li>
                    <li><a href="javascript:void(0);">Ideology</a></li>
                    <li><a href="javascript:void(0);">Services</a></li>
                    <li><a href="javascript:void(0);">Organization</a></li>
                    <li><a href="javascript:void(0);">History</a></li>
                </ul>
                <span class="copy">© Copyright 2013 Uniskies</span>
                <a class="top" href="#top">back to top</a>
            </div>
        </div>
    </body>
</html>