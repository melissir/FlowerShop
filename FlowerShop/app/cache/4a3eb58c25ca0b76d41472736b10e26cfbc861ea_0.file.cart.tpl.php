<?php
/* Smarty version 3.1.29, created on 2016-03-26 22:58:52
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f74c6c9d6267_24073943',
  'file_dependency' => 
  array (
    '4a3eb58c25ca0b76d41472736b10e26cfbc861ea' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\cart.tpl',
      1 => 1459047528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f74c6c9d6267_24073943 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_548456f74c6c98fd58_52938121',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_1413356f74c6c993bd6_89660294',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:cart.tpl */
function block_548456f74c6c98fd58_52938121($_smarty_tpl, $_blockParentStack) {
?>

<link href="css/table-display.css" rel="stylesheet" />
<style type="text/css">
</style>
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:cart.tpl */
function block_1413356f74c6c993bd6_89660294($_smarty_tpl, $_blockParentStack) {
?>

  
<h2>My Cart</h2>

<?php if ($_smarty_tpl->tpl_vars['session']->value->member && !$_smarty_tpl->tpl_vars['session']->value->member->is_admin && count($_smarty_tpl->tpl_vars['cart_data']->value) < 1) {?>
  Empty Cart
<?php } else { ?>
  
  <table class='showCartItems'>
    <tr>
      <td>name</td>
      <td>price</td>
      <td>quantity</td>
      <td></td>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['cart_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cartEntry_0_saved_item = isset($_smarty_tpl->tpl_vars['cartEntry']) ? $_smarty_tpl->tpl_vars['cartEntry'] : false;
$_smarty_tpl->tpl_vars['cartEntry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cartEntry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cartEntry']->value) {
$_smarty_tpl->tpl_vars['cartEntry']->_loop = true;
$__foreach_cartEntry_0_saved_local_item = $_smarty_tpl->tpl_vars['cartEntry'];
?>
    <tr>
      <td>
        <a href="showFlower.php?flower_id=<?php echo $_smarty_tpl->tpl_vars['cartEntry']->value['flower_id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cartEntry']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['cartEntry']->value['price'];?>

      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['cartEntry']->value['quantity'];?>

      </td>
      <td>
        <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['cartEntry']->value['price']*$_smarty_tpl->tpl_vars['cartEntry']->value['quantity']));?>

      </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['cartEntry'] = $__foreach_cartEntry_0_saved_local_item;
}
if ($__foreach_cartEntry_0_saved_item) {
$_smarty_tpl->tpl_vars['cartEntry'] = $__foreach_cartEntry_0_saved_item;
}
?>
    <tr>
      <td>
        <strong>Total:</strong>
      </td>
      <td></td>
      <td></td>
      <td>
        <strong><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_price']->value);?>
</strong>
      </td>
    </tr>
  </table>
<?php }?>
    
<p>
  <?php if ($_smarty_tpl->tpl_vars['session']->value->member && !$_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
    <button type="submit" name="placeOrder">Place Order</button>
  </form>
  <?php }?>
</p>

<?php
}
/* {/block 'content'} */
}
