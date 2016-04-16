<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  
      {$page_title|default: basename(dirname($smarty.server.PHP_SELF))}
    </title>
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" />
    {block name="localstyle"}{/block}
  </head>
  <body>
  <main>

  <header>
    <img src="img/header.png" />
    <span class="caption">{$session->member->name|default}</span>
  </header>
    
  <nav>
  <ul>
  <li><a href="#" class="no-action"><img class="menu" src="img/menu.png" /></a>
  <ul>
    {include file="links.tpl"}
  </ul>
  </li>
  </ul>
  </nav>
  
  <section>
    {block name="content"}{/block}
  </section>
  
  </main>
  <script type="text/javascript">window.onunload = function(){}</script>
  </body>
</html>
