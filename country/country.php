<?php
include '../include.php';
include 'countryLoader.php';
include '../countryList.php';

$countryCode = $_GET['countryCode'];

// Redirect permanently to uppercase variant of provided URL when not uppercase
if ($countryCode != strtoupper($countryCode)) {
    header('Location: /country/'.strtoupper($countryCode), true, 301);
    exit;
}

$countryLoader = new CountryLoader();
$details = $countryLoader->loadCountry($countryCode);
if (! $details) {
    http_response_code(404);
    include '../404.shtml';
    exit();
}
$countryName = $countries[$countryCode]
?>
<!DOCTYPE html>
<html>
  <head>  
    <meta content="width=device-width, initial-scale=1" name="viewport" />	
    <title>UN/LOCODEs in <?= $countryName?>: Codes, Locations & Functions</title>
    <meta name="description" content="All <?= count($details)?> UN/LOCODEs in <?= $countryName?>. Find the codes, functions, coordinates and more."/>
    <link rel="icon" href="../favicon.svg">
    <link rel="stylesheet" href="../flat-remix.min.css">
    <link rel="stylesheet" href="../unlocode.css">
  </head>
  <body class="selectable">
  <main>
    <div class="paper">

      <h1><a href="/">UN/LOCODE</a> in <?= $countryName?></h1>
      <div class="unlocodesContainer">
    
    <?php
foreach ($details as $entry) {
    echo "<div style='padding: 8px 0;'><a href='https://unlocode.info/{$entry->unlocode}'>{$entry->unlocode}</a>: ".$entry->name."</div>\n";
}
  ?>
    </div>
  </div>
  <div class="footer">
From <a href='https://unece.org/trade/uncefact/unlocode' target='_blank'><?= $unlocodeVersion?></a>
</div>
  </main>
</body>
</html>