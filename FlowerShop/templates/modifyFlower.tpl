{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name="localstyle"}
<link href="css/table-display.css" rel="stylesheet" />
{/block}

{block name="content"}
  <h1>Modify Flower</h1>
  
  <table>
    <form action="{$smarty.server.PHP_SELF}" method="post">
      <tr>
        <td>Name: </td>
        <td>{$session->name|escape: 'html'}</td>
      </tr>
      <tr>
        <td>Price: </td>
        <td>$<input type="text" name="price" value="{$price|escape:'html'}" /></td>
      </tr>
      <tr>
        <td>Description: </td>
        <td><textarea name="description" rows="10" cols="50">{$description|escape:'html'}</textarea></td>
      </tr>
      <tr>
        <td>Imagefile: </td>
        <td><input type="text" name="imagefile" value="{$imagefile|escape:'html'}" /></td>
      </tr>
      <tr>
        <td># in stock: </td>
        <td><input type="text" name="instock" value="{$instock|escape:'html'}" /></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button type="submit" name="modify">Modify</button>
          <button type="submit" name="cancel">Cancel</button>
        </td>
      </tr>
    </form>
    <h2 style="color:red;">{{flash_get key='message'}}</h2>
  </table>
    
{/block}