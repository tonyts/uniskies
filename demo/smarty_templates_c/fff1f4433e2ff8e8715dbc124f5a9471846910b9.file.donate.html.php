<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:42
         compiled from "D:\websites\uniskies\demo\Template\donate.html" */ ?>
<?php /*%%SmartyHeaderCode:10997538f51e60fc964-69868475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fff1f4433e2ff8e8715dbc124f5a9471846910b9' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\donate.html',
      1 => 1401901519,
      2 => 'file',
    ),
    '9f4fb8ae72206a40a1f6a8d045f6e83f620f7a2b' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\Mian.Master.html',
      1 => 1401901519,
      2 => 'file',
    ),
    'db3e5978055d4fbca204b908613df58c2ed3b9d0' => 
    array (
      0 => 'D:\\websites\\uniskies\\demo\\Template\\portlet-amount.html',
      1 => 1401901496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10997538f51e60fc964-69868475',
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
        
    <link rel="stylesheet" type="text/css" href="style/donate.css" />

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
	<div class="section left blue">
		<span class="notch"></span>
		<div class="section1">
			<h2>I want to donate</h2>
			<p>Address: Flat G  5/fl Lok Fu Mansion , 201  Fa Yuen street, Mongkok , Kowloon</p>
			<p>E-mail: <a href="mailto:uniskies@yahoo.com.hk">uniskies@yahoo.com.hk</a></p>
			<p>HK$ saving account: 012-349-1-007647-0</p>
			<p>Bank: Bank of China (Hong Kong) Ltd</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="section section2 right gray">
		<span class="notch"></span>
		<h2>Donation FAQ</h2>
		<h3>1. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
		<h3>2. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
		<h3>3. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
		<h3>4. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
		<h3>5. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
		<h3>6. Lorem ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
	</div>
	<?php $_template = new Smarty_Internal_Template("portlet-amount.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '10997538f51e60fc964-69868475';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2014-06-05 01:05:42
         compiled from "D:\websites\uniskies\demo\Template\portlet-amount.html" */ ?>
<style type="text/css">
#portletAmount{
    width: 204px;
    padding: 40px 28px 20px;
}

    #portletAmount .title{
        font-size: 18px;
        padding-bottom: 13px;
    }

    #portletAmount .amount{
        font-size: 30px;
        font-weight: bold;
        text-align: right;
        padding-bottom: 30px;
    }
</style>
<div class="portlet" id="portletAmount">
	<p class="title">Total amount (HK$)</p>
	<p class="amount">156,486,000</p>
	<p class="title">Total donors</p>
	<p class="amount">6,486,000</p>
	<br>
	<br>
	<br>
	<p>Introduction of how the money will be used</p>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "D:\websites\uniskies\demo\Template\portlet-amount.html" */ ?>
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
