<?php
/* Smarty version 3.1.29, created on 2016-03-27 21:05:41
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f88365bace69_48622887',
  'file_dependency' => 
  array (
    '33547d69f4c673758bdf309d32a0bb4c93281b93' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\index.tpl',
      1 => 1459127134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f88365bace69_48622887 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\include\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'localstyle', array (
  0 => 'block_2880856f883658c2c32_96720530',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_259356f883658ce7b7_48214738',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:index.tpl */
function block_2880856f883658c2c32_96720530($_smarty_tpl, $_blockParentStack) {
?>

<style type='text/css'>
  img.flower {
    width: 50px;
    height: 50px;
  }
  .showFlowers tr td:first-child {
    padding-right: 10px;
  }
  .setOrder {
    position: absolute;
    top: 10px;
    right: 10px;
  }
</style>
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:index.tpl */
function block_259356f883658ce7b7_48214738($_smarty_tpl, $_blockParentStack) {
?>

<h2>Listing (by <?php echo $_smarty_tpl->tpl_vars['session']->value->order;?>
)</h2>

<form class='setOrder' action='setOrder.php'>
  <button type="submit" name="doit">list by: </button>
  <select name="listBy">
    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['choices']->value,'selected'=>$_smarty_tpl->tpl_vars['session']->value->order),$_smarty_tpl);?>

  </select>
</form>

<table class='showFlowers'>
  <?php
$_from = $_smarty_tpl->tpl_vars['flowers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_flower_0_saved_item = isset($_smarty_tpl->tpl_vars['flower']) ? $_smarty_tpl->tpl_vars['flower'] : false;
$_smarty_tpl->tpl_vars['flower'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['flower']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['flower']->value) {
$_smarty_tpl->tpl_vars['flower']->_loop = true;
$__foreach_flower_0_saved_local_item = $_smarty_tpl->tpl_vars['flower'];
?>
  <tr>
    <td>
      <a href="showFlower.php?flower_id=<?php echo $_smarty_tpl->tpl_vars['flower']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flower']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
      <br />
      price: $<?php echo $_smarty_tpl->tpl_vars['flower']->value->price;?>
 
      <?php if ($_smarty_tpl->tpl_vars['session']->value->member && $_smarty_tpl->tpl_vars['session']->value->member->is_admin) {?>
        (in stock: <?php echo $_smarty_tpl->tpl_vars['flower']->value->instock;?>
)
      <?php }?>
    </td>
    <td><img class='flower' src="img/flower/<?php echo $_smarty_tpl->tpl_vars['flower']->value->imagefile;?>
" /></td>
  </tr>
  <?php
$_smarty_tpl->tpl_vars['flower'] = $__foreach_flower_0_saved_local_item;
}
if ($__foreach_flower_0_saved_item) {
$_smarty_tpl->tpl_vars['flower'] = $__foreach_flower_0_saved_item;
}
?>
</table>

<?php
}
/* {/block 'content'} */
}
