{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name="localstyle"}
  <link href="css/table-display.css" rel="stylesheet" />
{/block}

{block name="content"}
  <h2>My Orders</h2>
  
  <table class='showOrders'>
  {foreach $orders as $orderEntry}
  <tr>
    <td>
      <a href="orderDetails.php?order_number={$orderEntry->id}">Order #{$orderEntry->id}</a>
    </td>
    <td>
      Time: {$helper->reformat($orderEntry->made_on)}
    </td>
  </tr>
  {/foreach}
  
{/block}