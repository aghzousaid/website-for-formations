<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>text demo</title>
  <style>
  p {
    color: blue;
    margin: 8px;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p>Test Paragraph.</p>
 
<script>
$( "p" ).text( "<b>Some</b> new text." );
</script>
 
</body>
</html>