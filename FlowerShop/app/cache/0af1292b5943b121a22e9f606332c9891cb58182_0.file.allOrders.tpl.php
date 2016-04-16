<?php
/* Smarty version 3.1.29, created on 2016-03-31 13:59:00
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\allOrders.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd6564526626_69905464',
  'file_dependency' => 
  array (
    '0af1292b5943b121a22e9f606332c9891cb58182' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\allOrders.tpl',
      1 => 1459446669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fd6564526626_69905464 ($_smarty_tpl) {
if (!is_callable('smarty_function_flash_get')) require_once 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\include\\myplugins\\function.flash_get.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_2947256fd65644ff510_96213159',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2991356fd6564503392_72168263',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:allOrders.tpl */
function block_2947256fd65644ff510_96213159($_smarty_tpl, $_blockParentStack) {
?>

  <link href="css/table-display.css" rel="stylesheet" />
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:allOrders.tpl */
function block_2991356fd6564503392_72168263($_smarty_tpl, $_blockParentStack) {
?>

  
  <h2>All Orders</h2>
  
  <br>
  
  <h3 style="color:red"><?php ob_start();
echo smarty_function_flash_get(array('key'=>'message'),$_smarty_tpl);
$_tmp1=ob_get_clean();
echo $_tmp1;?>
</h3>
  
  <table class='showOrders'>
  <?php
$_from = $_smarty_tpl->tpl_vars['orderArr']->value;
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
      <a href="orderDetails.php?order_number=<?php echo $_smarty_tpl->tpl_vars['orderEntry']->value['order_num'];?>
">Order #<?php echo $_smarty_tpl->tpl_vars['orderEntry']->value['order_num'];?>
</a>
    </td>
    <td>
      Time: <?php echo $_smarty_tpl->tpl_vars['helper']->value->reformat($_smarty_tpl->tpl_vars['orderEntry']->value['date']);?>

    </td>
    <td>
      Made by:<?php echo $_smarty_tpl->tpl_vars['orderEntry']->value['name'];?>

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
