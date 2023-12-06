<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni SMK Negeri 1 Indramayu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo" id="logoLink">
            <img src="img/logo_gatsoe.png" alt="Logo" class="navbar-logo-img" id="logoImg">
            <span class="navbar-text">Data Alumni SMK Negeri 1 Indramayu</span>
        </a>
    </nav>
    <!-- Navbar end -->

    <!-- Search bar start -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Cari alumni...">
        <button onclick="searchAlumni()">Cari</button>
    </div>
    <!-- Search bar end -->

    <!-- Search results start -->
    <div class="search-results" id="searchResults">
        <!-- Hasil pencarian akan ditampilkan di sini -->
    </div>
    <!-- Search results end -->

    <!-- Rest of your page content goes here -->

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Initialize Feather Icons

        function searchAlumni() {
            var searchValue = document.getElementById('searchInput').value;
            var searchResultsContainer = document.getElementById('searchResults');

            // Logika pencarian dummy (gantilah dengan logika pencarian yang sesuai)
            var dummyData = [
                { name: 'John Doe', class: 'XII-A', year: '2020' },
                { name: 'Jane Doe', class: 'XII-B', year: '2019' },
                // ... data dummy lainnya
            ];

            // Bersihkan hasil pencarian sebelumnya
            searchResultsContainer.innerHTML = '';

            // Lakukan pencarian
            var searchResults = dummyData.filter(function (alumni) {
                return alumni.name.toLowerCase().includes(searchValue.toLowerCase());
            });

            // Tampilkan hasil pencarian
            searchResults.forEach(function (alumni) {
                var resultItem = document.createElement('div');
                resultItem.classList.add('search-result-item');
                resultItem.textContent = `${alumni.name} - ${alumni.class} - ${alumni.year}`;
                searchResultsContainer.appendChild(resultItem);
            });
        }
    </script>
</body>

</html>
