<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  

  <video id="myVideo" controls width="540px" class="mb-4">
    <source src="storage/wideo.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>




<hr>

<h2>Products</h2>

<?php
ini_set('memory_limit', '8192M');

  $file = 'https://marini.pl/b2b/marini-b2b.xml';


// Load the XML file into a DOMDocument object
$dom = new DOMDocument;
$dom->load($file);

// Use the DOMXPath class to query the XML data
$xpath = new DOMXPath($dom);
$items = $xpath->query('b2b');



//dd($items);
echo 'Mamy tutaj'.$items->count().' produktow.<br>';
echo '<table class="table table-striped" >';
echo '<thead>';
  echo '<tr>';
    echo '<th>KOD</th>';
    echo '<th>NAZWA</th>';
    echo '<th>CENA</th>';
    echo '<th>VAT</th>';
    echo '<th>STAN</th>';
    echo '<th>EAN</th>';
    echo '<th>GRUPA</th>';
    echo '<th>OPIS</th>';
    echo '<th>ZDJECIA</th>';
  echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach($items as $item){
  echo '<tr>';
   // troche sie to laduje ^^
    echo '<td>'.$item->getElementsByTagName('kod')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('nazwa')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('cena')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('VAT')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('stan')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('EAN')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('grupa')[0]->nodeValue.'</td>';
    echo '<td>'.$item->getElementsByTagName('opis')[0]->nodeValue.'</td>';
    if(isset($item->getElementsByTagName('zdjecia')[0]->nodeValue)){
      $fotos = explode(" ", $item->getElementsByTagName('zdjecia')[0]->nodeValue);
      echo '<td class="w-25">';
      foreach($fotos as $foto){
        echo '<img src="'.$foto.'" class="w-100 mb-2">';        
      }
      echo '</td>';
    }else{
      echo '<td>brak</td>';
    }

  echo '</tr>';
}
echo '</tbody>';
echo '</table>'
?>

  
  <script>
    // Get a reference to the video element on the page
    var video = document.getElementById("myVideo");




// Set the width of the element
//video.style.width = "400px";


  
    // When the video is clicked, play or pause it
    video.addEventListener("click", function() {
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    });
  </script>
  