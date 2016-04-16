<?php
/* Smarty version 3.1.29, created on 2016-03-31 12:46:15
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\orderDetails.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd545746c2f2_18647412',
  'file_dependency' => 
  array (
    'd4b02194781109ec703756a1638cb236074c83a2' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\orderDetails.tpl',
      1 => 1459442752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fd545746c2f2_18647412 ($_smarty_tpl) {
if (!is_callable('smarty_function_flash_get')) require_once 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\include\\myplugins\\function.flash_get.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_1146256fd5457412566_11285129',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_525556fd54574163e5_21490393',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:orderDetails.tpl */
function block_1146256fd5457412566_11285129($_smarty_tpl, $_blockParentStack) {
?>

  <link href="css/table-display.css" rel="stylesheet" />
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:orderDetails.tpl */
function block_525556fd54574163e5_21490393($_smarty_tpl, $_blockParentStack) {
?>

  <h2>Order #<?php echo $_smarty_tpl->tpl_vars['order_number']->value;?>
</h2>
  <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
    <p>
      Member: <?php echo $_smarty_tpl->tpl_vars['member']->value->name;?>

      <br>
      E-mail: <?php echo $_smarty_tpl->tpl_vars['member']->value->email;?>

    </p>
  <?php }?>
  <hr>
  <br>
    <table class='showDetail'>
    <tr>
      <td>name</td>
      <td>price</td>
      <td>quantity</td>
      <td></td>
      <td>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
          in stock
        <?php }?>
      </td>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['orderDetailArr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemEntry_0_saved_item = isset($_smarty_tpl->tpl_vars['itemEntry']) ? $_smarty_tpl->tpl_vars['itemEntry'] : false;
$_smarty_tpl->tpl_vars['itemEntry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemEntry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemEntry']->value) {
$_smarty_tpl->tpl_vars['itemEntry']->_loop = true;
$__foreach_itemEntry_0_saved_local_item = $_smarty_tpl->tpl_vars['itemEntry'];
?>
    <tr>
      <td>
        <a href="showFlower.php?flower_id=<?php echo $_smarty_tpl->tpl_vars['itemEntry']->value['flower_id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itemEntry']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['itemEntry']->value['price'];?>

      </td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['itemEntry']->value['quantity'];?>

      </td>
      <td>
        <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['itemEntry']->value['lineTotal']);?>

      </td>
      <td>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
          <?php echo $_smarty_tpl->tpl_vars['itemEntry']->value['inStock'];?>

        <?php }?>
      </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['itemEntry'] = $__foreach_itemEntry_0_saved_local_item;
}
if ($__foreach_itemEntry_0_saved_item) {
$_smarty_tpl->tpl_vars['itemEntry'] = $__foreach_itemEntry_0_saved_item;
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
  <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
    <hr>
    <?php if ($_smarty_tpl->tpl_vars['canProcess']->value) {?>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
        <button type="submit" name="processOrder">Process Order</button>
      </form>
      <h3 style="color:red"><?php ob_start();
echo smarty_function_flash_get(array('key'=>'message'),$_smarty_tpl);
$_tmp1=ob_get_clean();
echo $_tmp1;?>
</h3>
    <?php } else { ?>
      <h3 style="color:red">Cannot Process</h3>
    <?php }?>
  <?php }?>
  
  
  
<?php
}
/* {/block 'content'} */
}
