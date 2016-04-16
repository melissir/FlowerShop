{* Author: Melissa Rhein *}

{extends file="layout.tpl"}

{block name="localstyle"}
  <link href="css/table-display.css" rel="stylesheet" />
{/block}

{block name="content"}
  
  <h2>All Orders</h2>
  
  <br>
  
  <h3 style="color:red">{{flash_get key='message'}}</h3>
  
  <table class='showOrders'>
  {foreach $orderArr as $orderEntry}
  <tr>
    <td>
      <a href="orderDetails.php?order_number={$orderEntry['order_num']}">Order #{$orderEntry['order_num']}</a>
    </td>
    <td>
      Time: {$helper->reformat($orderEntry['date'])}
    </td>
    <td>
      Made by:{$orderEntry['name']}
    </td>
  </tr>
  {/foreach}
  
  
{/block}