<?php
/* Smarty version 3.1.29, created on 2016-03-31 16:55:09
  from "C:\Users\Missy\Documents\NetBeansProjects\FlowerShop\FlowerShop\templates\addFlower.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd8ead8cec48_17852770',
  'file_dependency' => 
  array (
    '1abd52e8e0027bf2d405173fa167087347596cf7' => 
    array (
      0 => 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\templates\\addFlower.tpl',
      1 => 1459456013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fd8ead8cec48_17852770 ($_smarty_tpl) {
if (!is_callable('smarty_function_flash_get')) require_once 'C:\\Users\\Missy\\Documents\\NetBeansProjects\\FlowerShop\\FlowerShop\\include\\myplugins\\function.flash_get.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "localstyle", array (
  0 => 'block_345556fd8ead8a3cb9_71000951',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_852456fd8ead8a7b31_53629420',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'localstyle'}  file:addFlower.tpl */
function block_345556fd8ead8a3cb9_71000951($_smarty_tpl, $_blockParentStack) {
?>

<link href="css/table-display.css" rel="stylesheet" />
<?php
}
/* {/block 'localstyle'} */
/* {block 'content'}  file:addFlower.tpl */
function block_852456fd8ead8a7b31_53629420($_smarty_tpl, $_blockParentStack) {
?>

  <h1>Add Flower</h1>
  
  <table>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
      <tr>
        <td>Name: </td>
        <td><input type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></td>
      </tr>
      <tr>
        <td>Price: </td>
        <td>$<input type="text" name="price" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['price']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></td>
      </tr>
      <tr>
        <td>Description: </td>
        <td><textarea name="description" rows="10" cols="50"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea></td>
      </tr>
      <tr>
        <td>Imagefile: </td>
        <td><input type="text" name="imagefile" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['imagefile']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></td>
      </tr>
      <tr>
        <td># in stock: </td>
        <td><input type="text" name="instock" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['instock']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button type="submit" name="add">Add</button>
          <button type="submit" name="cancel">Cancel</button>
        </td>
      </tr>
    </form>
    <h2 style="color:red;"><?php ob_start();
echo smarty_function_flash_get(array('key'=>'message'),$_smarty_tpl);
$_tmp1=ob_get_clean();
echo $_tmp1;?>
</h2>
  </table>
    
<?php
}
/* {/block 'content'} */
}
