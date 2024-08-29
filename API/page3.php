<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Moon Phase Calendar</title>
</head>
<body>
  <div class="container">
    <h1>Moon Phase Calendar</h1>
    <div class="data-container">
      <p>Loading moon phase data...</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script >
    document.addEventListener('DOMContentLoaded', async function() {
  const options = {
    method: 'GET',
    url: 'https://moon-phase.p.rapidapi.com/calendar',
    params: { format: 'html' },
    headers: {
      'X-RapidAPI-Key': 'bf4b3d271bmshf667e01e6ff32d3p1e7556jsnd3e7c54897f6',
      'X-RapidAPI-Host': 'moon-phase.p.rapidapi.com'
    }
  };

  try {
    const response = await axios.request(options);
    const dataContainer = document.querySelector('.data-container');
    if (response.data) {
      dataContainer.innerHTML = response.data;
    } else {
      dataContainer.innerHTML = '<p>Moon phase data not found</p>';
    }
  } catch (error) {
    console.error('Error fetching moon phase data:', error);
    const dataContainer = document.querySelector('.data-container');
    dataContainer.innerHTML = `<p>Error fetching moon phase data: ${error.message}</p>`;
  }
});

  </script>
</body>
</html>
