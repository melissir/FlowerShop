{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name="localstyle"}
<link href="css/table-display.css" rel="stylesheet" />
<style type="text/css">
</style>
{/block}

{block name="content"}
  
<h2>My Cart</h2>

{if $session->member and !$session->member->is_admin and $cart_data|@count < 1}
  Empty Cart
{else}
  {* iterate through the data, creating the tabular listing *}
  <table class='showCartItems'>
    <tr>
      <td>name</td>
      <td>price</td>
      <td>quantity</td>
      <td></td>
    </tr>
    {foreach $cart_data as $cartEntry}
    <tr>
      <td>
        <a href="showFlower.php?flower_id={$cartEntry['flower_id']}">{$cartEntry['name']|escape: 'html'}</a>
      </td>
      <td>
        {$cartEntry['price']}
      </td>
      <td>
        {$cartEntry['quantity']}
      </td>
      <td>
        {($cartEntry['price'] * $cartEntry['quantity'])|string_format:"%.2f"}
      </td>
    </tr>
    {/foreach}
    <tr>
      <td>
        <strong>Total:</strong>
      </td>
      <td></td>
      <td></td>
      <td>
        <strong>{$total_price|string_format:"%.2f"}</strong>
      </td>
    </tr>
  </table>
{/if}
    
<p>
  {if $session->member and !$session->member->is_admin}
  <form action="{$smarty.server.PHP_SELF}" method="post">
    <button type="submit" name="placeOrder">Place Order</button>
  </form>
  {/if}
</p>

{/block}
