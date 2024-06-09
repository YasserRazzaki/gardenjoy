<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&family=Poppins:wght@300&display=swap');

        * {
            font-family: "Poppins";
        }
    </style>
</head>
<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="Earth">
                <path
                    d="M16 2.5C8.55 2.5 2.5 8.55 2.5 16S8.55 29.5 16 29.5 29.5 23.45 29.5 16 23.45 2.5 16 2.5zm0 1c1.915 0 3.72.441 5.342 1.209-1.171.236-2.166.75-2.404.697-.365-.08-2.133.226-2.782.469-.649.244-.588.553-.75.594-.162.04-.249.185-.5.468-.251.284.125.625.125.625s.963.217 1.125-.5c.096-.425-.04.364 0 .688.04.325.645.405.969 0 .146-.183.126-.63.219-.781.114-.186.366-.044.5-.063.08-.01-.104.127 0 .188.207.122.633-.087.531.406-.041.199-.669.238-.75.531-.082.293-.219.469-.219.469l-1.343.031-.438-.625s-.426.185-.313.563c.079.26-.124.562-.124.562s-.688.11-.688.313c0 .111-.28.125-.438.187-.129.051-.216.263-.343.281-.076.01-.551.08-.656.094-.286.035-.157.1-.157.219 0 .162.531.188.531.188s.34.131.22.374c-.122.244.086.344-.157.344-.106 0-.35-.033-.594-.031-.315 0-.617-.099-.625.031-.03.5-.031 1.219-.031 1.219s.427.21.656.156c.318-.074.784.175 1-.406.017-.045.028-.142.063-.188.15-.197.313-.595.562-.718.153-.077.366-.027.438-.031.162-.01.437-.22.437-.22s.718.098.906.813c.056.211.003.558.125.625.075.041.407-.312.407-.312l.375.031-.219-.5-.688-.781.125-.06s.522.034.563.155c.04.122.668.43.563.782-.176.581.25.718.25.718s.369.087.53-.218c.141-.267.157-.5.157-.5l.469-.096s-.045-.973.468-1c.514-.026.563 0 .563 0s1.128.373 1.25.656c.121.284.177.554-.188.594-.364.041-.906-.03-.906-.03s-1.434-.217-1.312.188c.121.406.25.813.25.813s.311-.033.593.029c.302.069.688.031.688.031l.063.688-.188.062c-.204.057-.807.096-.969.156-.162.06-1.928-.248-1.968-.187-.041.06-.614.268-.938.188-.324-.082-.406-.844-.406-.844s-.059-.364-.281-.344l-1.75.156s-.5.223-.5.344c0 0-.142-.102-.344 0-.203.102-.513.088-.594.25-.081.162-.4.466-.563.75-.161.283-.627.306-.75.813-.121.506-.207 1.353-.187 1.718.02.365.01 1.27.375 1.469.365.2.849.692 1.031.875.182.182 1.16.33 1.281.25.122-.081.559-.25.782-.25.223 0 .702.035.844.156.141.122.315.384.437.688.121.304.243.817.344 1 .101.182.486.53.343.875-.141.345-.384.688-.343 1.093.04.405.283.943.375 1.125.092.182.677.755.656.938-.02.182.152.137.375.219.223.08 1.17-.181 1.313-.344.141-.162.361-.674.625-.938.263-.263.81-.695 1.093-1 .284-.304.574-.583.594-.968.02-.386-.203-1.233 0-1.375.203-.142.484-.362.688-.625.202-.264.633-.243.937-1.094.304-.851.404-1.116.344-1.156-.06-.041-.544.16-.625.281-.081.122-.555.152-.657.25-.1.098-.562 0-.562 0s.195-.768.094-1.031c-.102-.263-.62-1.292-.782-1.657-.133-.299-.156-.645-.093-.874.026.037.042.057.062.093.072.13.461.59.625 1.063.35 1.013.75 1.75.75 1.75s.528.02 1.407-.657c.597-.459 1.236-.483 1.343-.718.203-.446-.625-.844-.625-.844h-.75l-.562-.969.156-.062s.623.719.906.719c.284 0 1.038-.066 1.282.218.243.284 1.003.764 1.125 1.25.122.486.06 1.166.28 1.407.312.338.595.312.595.312l.375-.875.875-1 .185-.094C28.481 22.926 22.898 28.5 16 28.5a12.443 12.443 0 0 1-8.469-3.322l.375-.553.438-1.75-1.063-.656-1.218-.407-.813-1.968s-.758-.613-1.387-.897A12.505 12.505 0 0 1 3.5 16c0-.737.077-1.456.2-2.158.768-.59 1.8-1.06 1.8-1.06s.57-.066-.406-1.688a2.45 2.45 0 0 1-.278-.656c.41-.824.899-1.601 1.473-2.31-.05.297-.244 1.53.117 1.747.405.243.794-.507.875-.75.081-.243.926-1.17 1.25-1.656.231-.347.15-1.02-.088-1.414A12.433 12.433 0 0 1 16 3.5zm-2.469 2.25c-.194.019-.594.123-.594.438v.593s-.12.214-.187.282c-.068.067-.009.378.031.5s.063.5.063.5.196.102.25.156c.054.053.516.17.719.062.202-.107.32-.392.468-.406.149-.014.058-.013.031-.125-.026-.108.126-.5.126-.5l-.407-.344s-.246-.525-.219-.687c.027-.163-.2-.45-.187-.469.003-.01-.03-.01-.094 0zM12.47 6.938c-.055.024-.161.156-.219.187-.077.039-.053.173-.094.281-.04.108-.156.5-.156.5l.25.094s.397-.075.438-.156c.032-.065-.085-.42-.126-.563-.01-.034 0-.062 0-.062l-.062-.25c-.01-.02-.013-.04-.031-.032zm10.469 3.437c.091 0 .271.064.312.094.054.04.054.515 0 .812a.455.455 0 0 0 .25.5c.082.027.139.678.125.813-.013.135-.395.236-.5.25-.105.014-.545.01-.531-.188.014-.196-.076-.837-.157-1.094-.08-.256-.059-.62.063-.687.122-.067.375-.469.375-.469.01-.022.032-.03.063-.031zm-.563 11.063c-.049 0-.12.01-.188.03 0 0-.028.6-.312.782-.283.183-.469.536-.469.719 0 .182-.06.348 0 .531.061.182.2.333.375.313.176-.02.366-.4.407-.563.04-.162.191-.512.312-.625.122-.113.146-.431.125-.594-.017-.141.09-.601-.25-.593z"
                    color="#000" font-family="sans-serif" font-weight="400" overflow="visible"
                    style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;"
                    fill="#ffffff" class="color000000 svgShape"></path>
            </svg>
            <span class="font-semibold text-xl tracking-tight">GardenJoy</span>
    </div>
    <div class="block lg:hidden">
        <button id="mobile-menu-button"
            class="flex items-center px-3 py-2 border rounded text-white border-teal-400 hover:text-white hover:border-white"
            aria-controls="mobile-menu" aria-expanded="false">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <div class="flex flex-col top-right lg:flex-row lg:justify-end">
    <?php if (isset($_SESSION['user_id'])) : ?>
        <!-- Si l'utilisateur est connecté -->
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect("localhost", "root", "root", "gardenjoy");

        // Vérifier la connexion
        if (!$conn) {
            die("Échec de la connexion à la base de données: " . mysqli_connect_error());
        }

        // Récupérer l'URL de l'image de profil de l'utilisateur connecté
        $userId = $_SESSION['user_id'];
        $sql = "SELECT image_profil FROM utilisateurs WHERE id = $userId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $profileImageUrl = $row['image_profil'] ?? ''; // Si l'image de profil n'est pas définie, utiliser une valeur par défaut

        // Fermer la connexion à la base de données
        mysqli_close($conn);
        ?>

        <div class="absolute right-2 top-6">
            <button id="profile-button" type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="<?php echo $profileImageUrl ?: 'https://static.vecteezy.com/ti/vecteur-libre/t2/2318271-icone-de-profil-utilisateur-vectoriel.jpg'; ?>" alt="Profile Picture">
            </button>
        </div>

        <!-- Dropdown menu, show/hide based on menu state -->
        <div id="profile-dropdown" class="absolute right-0 z-10 mt-8 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Bonjour, <span><b><?php echo $_SESSION['username']; ?></b></span></a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="./logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</a>
        </div>
    <?php endif; ?>
</div>

    <div id="mobile-menu" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden">
        <div class="text-sm lg:flex-grow">
            <a href="./home.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                Accueil
            </a>
            <div class="relative inline-block">
                <button type="button" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4"
                    id="dropdownMenuButtonz" aria-haspopup="true" aria-expanded="false">
                    Recherche par :
                </button>
                <ul class="absolute ml-0 lg:ml-20 hidden bg-white text-gray-800 rounded-md shadow-md mt-2 py-1 w-64"
                    aria-labelledby="dropdownMenuButtonz">
                    <li><a href="./search.php" class="block px-4 py-2 hover:bg-gray-200">Recherche par nom</a></li>
                    <li><a href="./search_id.php" class="block px-4 py-2 hover:bg-gray-200">Recherche par Id</a></li>
                    <li><a href="./search_category.php" class="block px-4 py-2 hover:bg-gray-200">Recherche par catégorie</a></li>
                </ul>
            </div>
            <a href="./create_tutorial.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                Créer un tutoriel
            </a>
            <a href="./tutorials.php"
            class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
            Voir les tutoriels
        </a>
        <a href="#"
            class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
            Mes préférés
        </a>
        <a href="#"
            class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
            Mes messages
        </a>
        </div>
        
        <div>
   
    </div></div>
</nav>

<body>


</body>

</html>
<script>
    // Cacher le menu déroulant lorsqu'on clique en dehors
    window.addEventListener('click', function (event) {
        var dropdownMenu = document.getElementById('dropdownMenuButtonz').nextElementSibling;
        var mobileMenu = document.getElementById('mobile-menu');
        var dropdownButton = document.getElementById('dropdownMenuButtonz');
        var mobileMenuButton = document.getElementById('mobile-menu-button');
         var profileDropdown = document.getElementById('profile-dropdown');
         var profileButton = document.getElementById('profile-button');
        if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
        if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
            profileDropdown.classList.add('hidden');
        }
    });

    // Toggle le menu déroulant
    document.getElementById('dropdownMenuButtonz').addEventListener('click', function () {
        var dropdownMenu = document.getElementById('dropdownMenuButtonz').nextElementSibling;
        dropdownMenu.classList.toggle('hidden');
    });

    // Cacher le menu burger lorsque le menu déroulant est cliqué
    document.getElementById('dropdownMenuButtonz').addEventListener('click', function (event) {
        var mobileMenu = document.getElementById('mobile-menu');
        if (!mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Toggle le menu burger
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });  
       
        document.getElementById('profile-button').addEventListener('click', function() {
        var profileDropdown = document.getElementById('profile-dropdown');
        profileDropdown.classList.toggle('hidden');
    });
</script>