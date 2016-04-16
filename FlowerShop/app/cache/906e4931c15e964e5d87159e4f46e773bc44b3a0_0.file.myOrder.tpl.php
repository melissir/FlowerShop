<?php
/* Smarty version 3.1.29, created on 2016-03-31 12:47:08
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\myOrder.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd548cb4e200_45685434',
  'file_dependency' => 
  array (
    '906e4931c15e964e5d87159e4f46e773bc44b3a0' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\myOrder.tpl',
      1 => 1459131572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fd548cb4e200_45685434 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_1430156fd548cb2af82_50837941',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2030656fd548cb32c81_08980402',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:myOrder.tpl */
function block_1430156fd548cb2af82_50837941($_smarty_tpl, $_blockParentStack) {
?>

  <link href="css/table-display.css" rel="stylesheet" />
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:myOrder.tpl */
function block_2030656fd548cb32c81_08980402($_smarty_tpl, $_blockParentStack) {
?>

  <h2>My Orders</h2>
  
  <table class='showOrders'>
  <?php
$_from = $_smarty_tpl->tpl_vars['orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_orderEntry_0_saved_item = isset($_smarty_tpl->tpl_vars['orderEntry']) ? $_smarty_tpl->tpl_vars['orderEntry'] : false;
$_smarty_tpl->tpl_vars['orderEntry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['orderEntry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['orderEntry']->value) {
$_smarty_tpl->tpl_vars['orderEntry']->_loop = true;
$__foreach_orderEntry_0_saved_local_item = $_smarty_tpl->tpl_vars['orderEntry'];
?>
  <tr>
    <td>
      <a href="orderDetails.php?order_number=<?php echo $_smarty_tpl->tpl_vars['orderEntry']->value->id;?>
">Order #<?php echo $_smarty_tpl->tpl_vars['orderEntry']->value->id;?>
</a>
    </td>
    <td>
      Time: <?php echo $_smarty_tpl->tpl_vars['helper']->value->reformat($_smarty_tpl->tpl_vars['orderEntry']->value->made_on);?>

    </td>
  </tr>
  <?php
$_smarty_tpl->tpl_vars['orderEntry'] = $__foreach_orderEntry_0_saved_local_item;
}
if ($__foreach_orderEntry_0_saved_item) {
$_smarty_tpl->tpl_vars['orderEntry'] = $__foreach_orderEntry_0_saved_item;
}
?>
  
<?php
}
/* {/block 'content'} */
}
