<?php
/* Smarty version 3.1.29, created on 2016-03-26 19:10:22
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\links.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f716de5977f8_63275105',
  'file_dependency' => 
  array (
    'fe7318d1956f870f7ff001550ef245031243cd51' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\links.tpl',
      1 => 1459027472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f716de5977f8_63275105 ($_smarty_tpl) {
?>


<li><a href=".">Home</a></li>
<li><a href="cart.php">My Cart</a></li>

<?php if ($_smarty_tpl->tpl_vars['session']->value->member && !$_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
<li><a href="myOrder.php">My Orders</a></li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
<li><a href="allOrders.php">All Orders</a></li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
<li><a href="addFlower.php">Add Flower</a></li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->member) {?>
<li><a href="logout.php">Logout</a></li>
<?php } else { ?>
<li><a href="login.php">Login</a></li>
<?php }
}
}
