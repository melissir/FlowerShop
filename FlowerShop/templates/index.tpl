{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name='localstyle'}
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
{/block}

{block name="content"}
<h2>Listing (by {$session->order})</h2>

<form class='setOrder' action='setOrder.php'>
  <button type="submit" name="doit">list by: </button>
  <select name="listBy">
    {html_options options=$choices selected=$session->order}
  </select>
</form>

<table class='showFlowers'>
  {foreach $flowers as $flower}
  <tr>
    <td>
      <a href="showFlower.php?flower_id={$flower->id}">{$flower->name|escape: 'html'}</a>
      <br />
      price: ${$flower->price} 
      {if $session->member and $session->member->is_admin}
        (in stock: {$flower->instock})
      {/if}
    </td>
    <td><img class='flower' src="img/flower/{$flower->imagefile}" /></td>
  </tr>
  {/foreach}
</table>

{/block}
