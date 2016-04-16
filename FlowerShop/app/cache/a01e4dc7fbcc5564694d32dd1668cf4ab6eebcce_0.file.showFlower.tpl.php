<?php
/* Smarty version 3.1.29, created on 2016-04-01 20:53:40
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\showFlower.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ff1814476de1_42359418',
  'file_dependency' => 
  array (
    'a01e4dc7fbcc5564694d32dd1668cf4ab6eebcce' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\showFlower.tpl',
      1 => 1459558403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56ff1814476de1_42359418 ($_smarty_tpl) {
if (!is_callable('smarty_function_flash_get')) require_once 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\include\\myplugins\\function.flash_get.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_2099856ff18141adf72_31952267',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2887156ff18141c17f3_35448147',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:showFlower.tpl */
function block_2099856ff18141adf72_31952267($_smarty_tpl, $_blockParentStack) {
?>

<link href="css/table-display.css" rel="stylesheet" />
<style type="text/css">
.showFlower {
  margin-top: 20px;
}
.showFlower tr {
  vertical-align: top;
}
.showFlower tr td:first-child {
  padding-right: 10px;
}
img.flower {
  width: 220px;
  height: 220px;
}
</style>
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:showFlower.tpl */
function block_2887156ff18141c17f3_35448147($_smarty_tpl, $_blockParentStack) {
?>


<table class='showFlower'>
  <tr>
  <td><img class='flower' src="img/flower/<?php echo $_smarty_tpl->tpl_vars['flower']->value->imagefile;?>
" /></td>
  
  <td>
    <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flower']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 (#<?php echo $_smarty_tpl->tpl_vars['flower']->value->id;?>
)</b>
    <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
      <a href="modifyFlower.php?flower_id=<?php echo $_smarty_tpl->tpl_vars['flower']->value->id;?>
">[click to edit]</a>
    <?php }?>
    <br />
    price: $<?php echo $_smarty_tpl->tpl_vars['flower']->value->price;?>

    
    <br />
    <br />
    
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flower']->value->description, ENT_QUOTES, 'UTF-8', true);?>

    
    <br />
    <br />
    
    <b>Cart</b>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
        <input type="text" name="quantity" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['quantity']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
        <button type="submit" name="setQ">Set Quantity</button>
        <button type="submit" name="clearQ">Clear</button>
      </form>
      <h2 style="color:red;"><?php ob_start();
echo smarty_function_flash_get(array('key'=>'message'),$_smarty_tpl);
$_tmp1=ob_get_clean();
echo $_tmp1;?>
</h2>
    </td>
  </tr>
</table>
<?php
}
/* {/block 'content'} */
}
