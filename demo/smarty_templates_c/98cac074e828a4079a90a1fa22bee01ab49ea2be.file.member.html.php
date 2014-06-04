<?php /* Smarty version Smarty-3.0.6, created on 2013-07-05 02:47:52
         compiled from "/home/uniskies/public_html/demo/Template/member.html" */ ?>
<?php /*%%SmartyHeaderCode:166469495651cf1a5f8bdb35-87051145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98cac074e828a4079a90a1fa22bee01ab49ea2be' => 
    array (
      0 => '/home/uniskies/public_html/demo/Template/member.html',
      1 => 1372527186,
      2 => 'file',
    ),
    '18434d455fd484a7507e01a6f9063188ddae1b2a' => 
    array (
      0 => '/home/uniskies/public_html/demo/Template/Mian.Master.html',
      1 => 1372954379,
      2 => 'file',
    ),
    'dae7550850f8f21b777214fa2a34f7283d717a29' => 
    array (
      0 => '/home/uniskies/public_html/demo/Template/portlet-signin.html',
      1 => 1372527186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166469495651cf1a5f8bdb35-87051145',
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
        
    <link rel="stylesheet" type="text/css" href="style/member.css" />

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
</span>
	</div>

            <div class="content">
                
	<h1><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h1>
	<div class="section left">
		<span class="notch"></span>
		<h2>Create your account.</h2>
		<form name="register" id="register" action="" method="post">
			<div class="column col1">
				<label for="email">Email Address</label>
				<label for="username">Choose Username</label>
				<label for="password">Password</label>
				<label for="cnfpassword">Confirm Password</label>
				<label for="firstname">First Name</label>
				<label for="lastname">Last Name</label>
				<label for="company">Company</label>
				<label for="city">City</label>
				<label for="state">State/Province</label>
				<label for="postalcode">Postal Code</label>
				<label for="country">Country</label>
			</div>
			<div class="column col2">
				<input type="text" name="email" id="email" class="req" /><span class="req">*</span>
				<input type="text" name="username" id="username" class="req" /><span class="req">*</span>
				<input type="text" name="password" id="password" class="req" /><span class="req">*</span>
				<input type="text" name="cnfpassword" id="cnfpassword" class="req" /><span class="req">*</span>
				<input type="text" name="firstname" id="firstname" class="req" /><span class="req">*</span>
				<input type="text" name="lastname" id="lastname"/>
				<input type="text" name="company" id="company"/>
				<input type="text" name="city" id="city"/>
				<input type="text" name="state" id="state"/>
				<input type="text" name="postalcode" id="postalcode"/>		
				<select name="country" id="country">
					<option></option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="China">China</option>
				</select>
        		<input class="button green" type="submit" value="Continue"/>
			</div>
			<div class="clear"></div>
		</form>
		<div class="clear"></div>
	</div>
	<?php $_template = new Smarty_Internal_Template("portlet-signin.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '166469495651cf1a5f8bdb35-87051145';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2013-07-05 02:47:52
         compiled from "/home/uniskies/public_html/demo/Template/portlet-signin.html" */ ?>
<style type="text/css">
#portletSignIn{
    padding: 45px 30px 0;
    background-color: #1577a8;
    width: 242px;
}

    #portletSignIn h2{
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 25px;
        padding: 0 !important;
        text-align: left;
    }

    #portletSignIn input{
        width: 220px;
        padding: 10px;
        font-size: 16px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        border: solid 1px #d6d6d6;
        display: block;
        margin-bottom: 15px;
    }

    #portletSignIn input[type="submit"]{
        float: right;
    }

    ::-webkit-input-placeholder { /* WebKit browsers */
        color:    #aaaaaa;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #aaaaaa;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #aaaaaa;
    }
    :-ms-input-placeholder { /* Internet Explorer 10+ */
        color:    #aaaaaa;
    }

    #portletSignIn p{
        padding-bottom: 10px;
    }
</style>
<div class="portlet" id="portletSignIn">
    <h2>Sign In</h2>
    <form name="signin" id="signin" action="" method="post">
        <input type="text" name="account" placeholder="Accyount"/>
        <input type="text" name="password" placeholder="Password"/>
        <input class="button green" type="submit" value="Sign In"/>
        <div class="clear"></div>
    </form>
    <br>
    <br>
    <br>
    <p>Forgot your password?</p>
    <p>Register</p>
    <br>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home/uniskies/public_html/demo/Template/portlet-signin.html" */ ?>
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
