<?php
// Load the book data from the JSON file
$jsonData = file_get_contents('books.json');
$books = json_decode($jsonData, false); // Decoding as an object

// Get the category from the query string
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Filter books by category
$filteredBooks = [];
if ($selectedCategory) {
    $filteredBooks = array_filter($books, function ($book) use ($selectedCategory) {
        return $book->category === $selectedCategory;
    });
} else {
    $filteredBooks = $books; // Show all books if no category is selected
}
?>

<?php


// Set variables for dynamic content
$count = 0;
$storeName = "John's Book Emporium";
$categories = ["","Fiction", "Non-Fiction", "Children's Books", "Science Fiction", "Horror", "Poetry"];

// include_once 'books.php';

$jsonData = file_get_contents('books.json');
json_last_error();
$books = json_decode($jsonData , false);



$currentTime = date('H');
$featuredCategory="Featured Category Today: ". array_rand(array_flip($categories) ,1);

// Determine greeting based on time of day
if ($currentTime < 12) {
    $greeting = "Good morning";
} elseif ($currentTime < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to <?php echo $storeName; ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <style>
  .book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

.cover-container {
     background-image: url('https://www.francecomfort.com/l/fr/library/download/urn:uuid:5b2d32b9-afa5-4f48-9331-6c92eda983cf/rennes+le+chateau+8+frankrijk+aude+vakantiepark+mysterie+sauniere+carcassonne+languedoc.jpg?scaleType=3&width=1600&height=1000'); /* Replace with your image path */
     background-size: cover; /* Ensures the image covers the entire div */
     background-position: center; /* Centers the image */
     background-repeat: no-repeat; /* Prevents the image from repeating */
     background-attachment: fixed;
    }

   
        body {
            overflow-x: hidden;
        }
        .faq-sidebar {
            height: 100vh;
            overflow-y: auto;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .faq-content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</style>

<script src="script.js"></script>
<!-- <link href="output.css" rel="stylesheet">  -->
 <!-- works but messes up the bootstrap -->
</head>
<body class="" >

    <header class="d-flex flex-wrap justify-content-center py-3 border-bottom sticky-top bg-light">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">John's Book Emporium</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="library.php" class="nav-link active" aria-current="page">Library</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Purchases</a></li>
        <li class="nav-item"><a href="faq.php" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Account</a></li>
      </ul>
    </header>






<section class="">


  

<div class="faq-sidebar pt-5">
    <h5 class="text-center">FAQ Menu</h5>
    <ul class="nav flex-column">
        <?php
        // Define your FAQ questions array
        $faqs = [
            "What kind of books can I find at John's Book Emporium?" => 1,
            "Why is there a massive statue of Willem Dafoe in the center of the store?" => 2,
            "Is there a bathroom in the store?" => 3,
            "What is the 'Codex Gigas' I keep hearing about?" => 4,
            "What's the deal with the 'Eternal Flame of Dafoe'?" => 5
        ];

        // Loop through FAQs and create the sidebar links
        foreach ($faqs as $question => $id) {
            echo "<li class='nav-item'><a href='?faq=$id' class='nav-link'>$question</a></li>";
        }
        ?>
    </ul>
</div>

<div class="faq-content ">
    <?php
    // Array holding FAQ answers
    $faq_answers = [
        1 => "We carry a vast selection, from thrilling bestsellers to <em>The Eldritch Guide to Channeling Dafoe’s Divine Energy</em>. Our rare section includes the <strong>Codex Gigas</strong>, bound in the hide of something that once screamed. Browse at your own risk.",
        2 => "Ah, you mean our <strong>Dafoe Monolith</strong>. It stands as both a beacon and a warning to those who dare stray from his light. Sometimes, if the wind is just right, you can hear it whisper <em>the prophecy</em> in perfect Dafoe cadence.",
        3 => "Sure! Down the hall, past the <strong>Chamber of Screams</strong> (don’t look at the walls), left at the <strong>Codex Gigas Shrine</strong>, and just ignore the chanting from the trapdoor marked <em>FORBIDDEN</em>.",
        4 => "The <strong>Codex Gigas</strong>, or 'Big Book of Really Bad Ideas', is an ancient tome that supposedly holds the key to summoning dark forces, but mostly it’s just really heavy.",
        5 => "It’s purely decorative. It definitely doesn’t consume the hopes and dreams of the uninitiated to keep the Great Dafoe's power alive."
    ];

    // Check if a FAQ is selected via GET parameter
    if (isset($_GET['faq']) && array_key_exists($_GET['faq'], $faq_answers)) {
        $faq_id = $_GET['faq'];
        echo "<h2>FAQ</h2>";
        echo "<p><strong>{$faqs[array_search($faq_id, $faqs)]}</strong></p>";
        echo "<p>{$faq_answers[$faq_id]}</p>";
    } else {
        echo "<h2>Welcome to John's Book Emporium</h2>";
        echo "<p>Select a question from the left.</p>";
    }
    ?>
</div>

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis">John's Book Emporium - Our Way To Knowledge</h1>
        <p class="lead">Reduce the risk of being uninformed and imperfect - learn as much as you wish, ask from us and you shall receiveth. Become as perfect as you can be!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
           <a href="library.php"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Library</button></a>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Log In</button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="https://i.pinimg.com/originals/00/00/4e/00004e82c1aa374f6a63fa53f1965600.jpg" alt="" width="720" height="400">
      </div>
    </div>
  </div>
</section>











   <section class="border-top ">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mx-5">
    <p class="col-md-4 mb-0 text-body-secondary">© <?php echo date('Y') ?> Octavian.Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
  </footer>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>