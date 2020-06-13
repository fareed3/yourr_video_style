

<!DOCTYPE html>
<html>
  <head>
   <title>Video</title>
  </head>
  <body>



    <?php if ($pc): ?>
      <video  onchange="setPlaySpeed()"  Seek width="1350" height="620" onchange=""  preload="metadata" controls="controls" autoplay>

        <source src="/video/{{$url}}" type="video/mp4">

     </video>
    <?php else: ?>
      @php

       function get_url($url)
      {

      $pattern='%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
         preg_match($pattern, $url, $match);

         return isset($match[1])? $match[1]:"";
      }

      @endphp
      @php $url=get_url($url) @endphp
      <iframe width="1350" height="620" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <?php endif; ?>


  </body>
</html>
