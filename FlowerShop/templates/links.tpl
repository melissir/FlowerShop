{* Author: Melissa Rhein *}

<li><a href=".">Home</a></li>
<li><a href="cart.php">My Cart</a></li>

{if $session->member and !$session->member->is_admin}
<li><a href="myOrder.php">My Orders</a></li>
{/if}

{if $session->member and $session->member->is_admin}
<li><a href="allOrders.php">All Orders</a></li>
{/if}

{if $session->member and $session->member->is_admin}
<li><a href="addFlower.php">Add Flower</a></li>
{/if}

{if $session->member}
<li><a href="logout.php">Logout</a></li>
{else}
<li><a href="login.php">Login</a></li>
{/if}
