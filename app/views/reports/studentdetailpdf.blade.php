<html>
<head>
  <title>Kingmakers</title>
  <style type="text/css">

      @page { margin: 100px 50px; }
    #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 80px;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 80px}
    #footer .page:after { content: counter(page); }
    </style>
</head>
<body>
  <div id="header">
  
  <table>
      <img width="400" src="http://indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
  </table>

  </div>
    <div id="footer">
    <p class="page">Page </p>
  </div>
 
 <div id="content">

 <?php

  echo urldecode($data); ?>
  
</div>
</body>
</html>
