{* Author: Melissa Rhein *}

{extends file="layout.tpl"}


{block name="localstyle"}
  <link href="css/table-display.css" rel="stylesheet" />
{/block}

{block name="content"}
  <h2>Order #{$order_number}</h2>
  {if $session->member and $session->member->is_admin}
    <p>
      Member: {$member->name}
      <br>
      E-mail: {$member->email}
    </p>
  {/if}
  <hr>
  <br>
    <table class='showDetail'>
    <tr>
      <td>name</td>
      <td>price</td>
      <td>quantity</td>
      <td></td>
      <td>
        {if $session->member and $session->member->is_admin}
          in stock
        {/if}
      </td>
    </tr>
    {foreach $orderDetailArr as $itemEntry}
    <tr>
      <td>
        <a href="showFlower.php?flower_id={$itemEntry['flower_id']}">{$itemEntry['name']|escape: 'html'}</a>
      </td>
      <td>
        {$itemEntry['price']}
      </td>
      <td>
        {$itemEntry['quantity']}
      </td>
      <td>
        {$itemEntry['lineTotal']|string_format:"%.2f"}
      </td>
      <td>
        {if $session->member and $session->member->is_admin}
          {$itemEntry['inStock']}
        {/if}
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
  {if $session->member and $session->member->is_admin}
    <hr>
    {if $canProcess}
      <form action="{$smarty.server.PHP_SELF}" method="post">
        <button type="submit" name="processOrder">Process Order</button>
      </form>
      <h3 style="color:red">{{flash_get key='message'}}</h3>
    {else}
      <h3 style="color:red">Cannot Process</h3>
    {/if}
  {/if}
  
  
  
{/block}