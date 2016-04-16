{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name="localstyle"}
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
{/block}

{block name="content"}

<table class='showFlower'>
  <tr>
  <td><img class='flower' src="img/flower/{$flower->imagefile}" /></td>
  
  <td>
    <b>{$flower->name|escape: 'html'} (#{$flower->id})</b>
    {if $session->member and $session->member->is_admin}
      <a href="modifyFlower.php?flower_id={$flower->id}">[click to edit]</a>
    {/if}
    <br />
    price: ${$flower->price}
    
    <br />
    <br />
    
    {$flower->description|escape: 'html'}
    
    <br />
    <br />
    
    <b>Cart</b>
      <form action="{$smarty.server.PHP_SELF}" method="post">
        <input type="text" name="quantity" value="{$quantity|escape:'html'}" />
        <button type="submit" name="setQ">Set Quantity</button>
        <button type="submit" name="clearQ">Clear</button>
      </form>
      <h2 style="color:red;">{{flash_get key='message'}}</h2>
    </td>
  </tr>
</table>
{/block}
