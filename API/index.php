<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NASA APOD Display</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="astronaut.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Dongle&family=Neuton:wght@200&family=PT+Serif&family=Secular+One&family=Tangerine:wght@700&display=swap" rel="stylesheet">
 
</head>
<body>
  <div class="header">
<h1 class="page1">
   <span class="title-word title-word-1">Astronomy</span> Picture of the Day</h1>
<p>Each day a different image or photograph of our fascinating universe is featured, along with a brief explanation written by a professional astronomer.</p>
<a href="#apod-content" class="button-1">View</a>
</div>
<hr>
  <div id="apod-content"></div>
 
  <hr>
  <h2>Other Links</h2>
  <a href="page2.php">Asteroids - Near Earth Objects</a>
  <a href="page3.php">EPIC</a>
 

  <script>
    function displayAPOD() {
      const apiKey = 'DhgElpnGhaqLjQi1gY9c0UVBCziH60r4NL5QBpXV'; // Replace with your NASA API key
      const apodUrl = `https://api.nasa.gov/planetary/apod?api_key=${apiKey}`;
     
      // Fetch APOD data
      fetch(apodUrl)
        .then(response => response.json())
        .then(data => {
          const apodContent = document.getElementById('apod-content');
          const title = `<h2>${data.title}</h2>`;
          const date = `<h4>Date: ${data.date}</h4>`;
          const explanation = `<p class="explanation">${data.explanation}</p>`;
          let media = '';

if (data.media_type === 'image') {
  media = `<img src="${data.url}" alt="NASA APOD" title=" ">`;
} else if (data.media_type === 'video') {
  const videoId = extractYouTubeVideoId(data.url);
  if (videoId) {
    // If it's a YouTube video, embed the video
    media = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
  } else {
    media = 'Video not available.';
  }
} else {
  media = 'Media type not supported.';
}
          apodContent.innerHTML =  title + date + media +explanation;
          const table = `
      <table>
        <tr>
          <h2>${data.title}</h2>
          <h4>Date: ${data.date}</h4>
          <th>${media}</th>
          <th> ${explanation}
          <a href="https://apod.nasa.gov/apod/archivepix.html" class="button-2"><span> Discover More</span></a> </th>
        </tr>
        
      </table>
    `;

    // Set the table HTML content to the apodContent element
    apodContent.innerHTML = table;

        })
        .catch(error => {
          console.log('Error fetching APOD:', error);
          const apodContent = document.getElementById('apod-content');
          apodContent.innerHTML = '<p>Failed to fetch data from NASA APOD API</p>';
        });

        
    }

    function extractYouTubeVideoId(url) {
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  const match = url.match(regExp);
  return (match && match[2].length === 11) ? match[2] : null;
}
    displayAPOD();
  </script>

</body>
</html>
