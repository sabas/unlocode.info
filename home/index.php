<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Unlocode.info | Info about every UN/LOCODE</title>
    <meta name="description" content="All the UN/LOCODEs, five-character codes for every location used in international trade."/>
    <link rel="icon" href="favicon.svg">
    <link rel="stylesheet" href="flat-remix.min.css">
    <link rel="stylesheet" href="unlocode.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css"
    />
    <script>
      function redirect() {
          var inputValue = document.getElementById('unlocodeField').value.trim();
          window.location.href = '/' + inputValue;
      }
    </script>
  </head>
  <body class="selectable">
  <main>
    <div class="paper">
    <h1>UN/LOCODE</h1>
UN/LOCODEs are five-character codes to uniquely identify geographic places which are in any way related to international trade.<br/>
<br/>
To view a code, go to unlocode.info/<strong>XXXXX</strong> or enter it here:<br/>

<form onsubmit="redirect(); return false;" style="margin-top:8px;">
    <label for="unlocodeField">UN/LOCODE</label> <input id="unlocodeField" type="text" placeholder="XXXXX" maxlength="5" minlength="5" required>
    <button class="green-button" style="display: unset;">Go</button>
</form>
</div>
<div class="paper">
<h1>Countries</h1>
<div class="countriesContainer">
<?php
include '../include.php';
include '../countryList.php';

asort($countries);
foreach ($countries as $countryCode => $countryName) {
    echo "<a href='https://unlocode.info/country/{$countryCode}'><span class='fi fi-".strtolower($countryCode)."'></span> {$countryName}</a><br/>\n";
}
?>
</div>
  </div>
  <div class="footer">
  From <a href='https://unece.org/trade/uncefact/unlocode' target='_blank'><?= $unlocodeVersion?></a> | <a href="about">About us</a>
  </div>
</main>
</body>
</html>