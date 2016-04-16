<?php
chdir(__DIR__);
require_once "../include/db.php";

echo "\n---- database = ", DBProps::which, "\n";

define('USER', 'member');

// name, email, password, for simplicity password = name
$user_data = [
    ["john", "arachnid@oracle.com", "john"],
    ["kirsten", "buffalo@go.com", "kirsten"],
    ["bill", "digger@gmail.com", "bill"],
    ["mary", "elephant@wcupa.edu", "mary"],
    ["joan", "kangaroo@upenn.edu", "joan"],
    ["alice", "feline@yahoo.com", "alice"],
    ["carla", "badger@esu.edu", "carla"],
    ["dave", "warthog@temple.edu", "dave"],
];

R::begin();  // begin transaction

echo "\n---- " . USER . "s\n";
foreach ($user_data as $data) {
  list($username, $email, $password) = $data;
  $user = R::dispense(USER);
  $user->name = $username;
  $user->email = $email;
  $user->password = hash('sha256', $password);
  try {
    $id = R::store($user);
    echo USER . " $id: $username\n";
  }
  catch (Exception $ex) {
    echo $ex->getMessage(), "\n";
  }
}

// Admins: choose a few selected ones
echo "\n---- admins\n";
foreach (['dave', 'carla'] as $name) {
  $user = R::findOne(USER, 'name = ?', [$name]);
  $user->is_admin = true;
  R::store($user);
  echo "admin: $name\n";
}

R::commit(); // commit transaction

echo "\n---- flowers\n";
R::begin();

$flower = R::dispense('flower');
$flower->name = "Missouri Evening Primrose";
$flower->imagefile = "MissouriEveningPrimrose.jpg";
//$flower->price = 7.99;
$flower->price = 8.00;
$flower->instock = 70;
$flower->description = <<<END
Let the sweet scent of Missouri Evening Primrose grace your garden, 
while you enjoy its bright yellow blooms all summer long! 
Very resilient. Will perform even in poor soil and drought conditions. 
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Mixed Liatris";
$flower->imagefile = "MixedLiatris.jpg";
$flower->price = 1.19;
$flower->instock = 80;
$flower->description = <<<END
Unique perennial adds interest to sun areas with stunning, stiff bottlebrush 
of dense white and purple flowers and fine, grasslike foliage! An excellent 
addition to cut flower arrangements, Mixed Liatris has a long vase life 
and captivates passersby when grown out in the garden. 
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Commander in Chief Lily";
$flower->imagefile = "CommanderInChiefLily.jpg";
$flower->price = 2.65;
$flower->instock = 90;
$flower->description = <<<END
This Asiatic lily produces an abundance of large, 6-8" blooms of shimmering, 
scarlet-red atop 3-4' tall plants. This stunner grows almost anywhere in 
zones 3 to 9 in full sun to partial shade. You'll adore these blooms, 
but deer won't; they tend to avoid it. 
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Alaska Shasta Daisy";
$flower->imagefile = "AlaskaShastaDaisy.jpg";
$flower->price = 3.33;
$flower->instock = 60;
$flower->description = <<<END
No garden should be without this classic flower! This longlived perennial requires 
little care and delivers masses of frilly, double blooms with yellow centers. 
Butterflies love them! 
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Orange Glory Flower";
$flower->imagefile = "OrangeGloryFlower.jpg";
$flower->price = 4.69;
$flower->instock = 85;
$flower->description = <<<END
If you like to watch beautiful butterflies, then you'll love Orange Glory Flower.
It's one of their favorites! These eye-catching blooms look like a fiery floral 
sunset in the garden, creating a lasting statement all season long. 
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Peruvian Daffodil";
$flower->imagefile = "PeruvianDaffodil.jpg";
$flower->price = 4.15;
$flower->instock = 75;
$flower->description = <<<END
Large, trumpet-shaped flower heads unfurl to show off their exotic look and 
intense fragrance. A delicately fringed trumpet atop amaryllis-like foliage 
provides an attractive accent for this daffodil look-alike.
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Red Spider Lily";
$flower->imagefile = "RedSpiderLily.jpg";
$flower->price = 4.25;
$flower->instock = 120;
$flower->description = <<<END
Multi-flowering, bright red flowers make a dramatic statement! Strap-shaped 
green foliage disappears in July in preparation for the flower spike bursting 
forth in August. Grow in cool greenhouses or outdoors in warmer areas where 
little or no frost is experienced. Apply winter cover in zones lower than 7.
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

$flower = R::dispense('flower');
$flower->name = "Sweet William";
$flower->imagefile = "SweetWilliam.jpg";
$flower->price = 3.33;
$flower->instock = 85;
$flower->description = <<<END
One sniff of its clusters of small blooms will tell you why this perennial 
is so popular! An old-fashioned favorite, it grows fast and brings early-season 
color and fragrance to your borders and rock gardens.
END;
$id = R::store($flower);
echo "flower #$id: $flower->name\n";

R::commit(); // commit transaction

function NdaysBefore($n) {
  return time() - 24 * 3600 * $n - rand(0,3*3600);  
}

foreach (range(1,8) as $i) {
  $flower[$i] = R::load('flower', $i);
}

echo "\n---- orders\n";
R::begin();

$basket = R::dispense('basket');
$basket->member_id = 5; 
$basket->made_on = date("Y-m-d H:i:s", NdaysBefore(8));
$basket->link('item', ['quantity' => 22, 'price' => $flower[4]->price ]
  )->flower = $flower[4];
$basket->link('item', ['quantity' => 33, 'price' => $flower[7]->price ]
  )->flower = $flower[7];
$basket->link('item', ['quantity' => 11, 'price' => $flower[2]->price ]
  )->flower = $flower[2];
$order_id = R::store($basket);
echo "order #$order_id made by {$basket->member->name} on {$basket->made_on}\n";

$basket = R::dispense('basket');
$basket->member_id = 6; 
$basket->made_on = date("Y-m-d H:i:s", NdaysBefore(4));
$basket->link('item', ['quantity' => 22, 'price' => $flower[3]->price ]
  )->flower = $flower[3];
$basket->link('item', ['quantity' => 33, 'price' => $flower[2]->price ]
  )->flower = $flower[2];
$basket->link('item', ['quantity' => 11, 'price' => $flower[5]->price ]
  )->flower = $flower[5];
$order_id = R::store($basket);
echo "order #$order_id made by {$basket->member->name} on {$basket->made_on}\n";

$basket = R::dispense('basket');
$basket->member_id = 5; 
$basket->made_on = date("Y-m-d H:i:s", time()); // now
$basket->link('item', ['quantity' => 15, 'price' => $flower[1]->price ]
  )->flower = $flower[1];
$basket->link('item', ['quantity' => 70, 'price' => $flower[8]->price ]
  )->flower = $flower[8];
$order_id = R::store($basket);
echo "order #$order_id made by {$basket->member->name} on {$basket->made_on}\n";

R::commit(); // commit transaction
