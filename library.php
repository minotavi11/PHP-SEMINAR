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

<style>
  #myCarousel .carousel-item img {
    width: 100%;
    max-height: 500px; /* Set the maximum height for the images */
    object-fit: fill; /* Ensures images cover the container without distorting */
  }
</style>

<div id="myCarousel" class="carousel slide mb-6 bg-dark" data-bs-ride="carousel">
    <div class="carousel-inner">


      <div class="carousel-item">
        <img class="bd-placeholder-img opacity-50" src="https://i.mdel.net/i/db/2023/12/2118888/2118888-800w.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption ">
            <h1>Attain perfection</h1>
            <p class="">Through the knowledge we provide, you shall be closer to perfection each day.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn More</a></p>
          </div>
        </div>
      </div>


      <div class="carousel-item">
        <img class="bd-placeholder-img opacity-50" src="https://i.mdel.net/i/db/2023/12/2118886/2118886-800w.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Be one with God</h1>
            <p>Be fulfilled, and content with your achievments. We provide resources for you to find your own path to enlightment.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>


      <div class="carousel-item active">
        <img class="bd-placeholder-img opacity-50" src="https://i.mdel.net/i/db/2023/12/2118885/2118885-800w.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption ">
            <h1>Open your third eye</h1>
            <p>Be independent of worldy desires and needs. Stay above the top, outside the pyramid. Be great - be enlightened.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn More</a></p>
          </div>
        </div>
      </div>
    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>


  </div>



</section>


 <section class=" mx-5">

<div class="container px-4 py-5 border-bottom">
<h1>Books in <?= htmlspecialchars($selectedCategory); ?> Category</h1> 

<form action="" method="get" class="form-inline d-flex w-50 align-items-end">
    <div class="form-group mb-3 me-2">
        <label for="category" class="form-label">Choose a category:</label>
        <select name="category" id="category" class="form-select">
        <option value=""></option>
            <option value="Fiction">Fiction</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Horror">Horror</option>
            <option value="Poetry">Poetry</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Filter Books</button>
</form>


        <div class="book-list feature col">
        <div class="row g-4 py-5 d-flex flex-wrap  justify-content-center">
    <?php if (count($filteredBooks) > 0): ?>
        <?php foreach ($filteredBooks as $book): ?>
            <div class="col mb-3">
                <div class="book">
                <h3><a href="book.php?title=<?= urlencode($book->title); ?>"><?= htmlspecialchars($book->title); ?></a></h3>
                    <img class='border rounded-3 shadow-lg' width='350' height='250' loading='lazy' src="<?= htmlspecialchars($book->cover); ?>" alt="<?= htmlspecialchars($book->title); ?> Cover" />
                    <p style="width:350px"><strong>Description:</strong> <?= htmlspecialchars($book->description); ?></p>
                    <?php if (isset($book->discount_price) && !empty($book->discount_price)): ?>
                        <p><del><strong>Price:</strong> $<?= number_format($book->price, 2); ?></del></p>
                        <p class='text-success'><strong>Discount Price:</strong> $<?= number_format($book->discount_price, 2); ?></p>
                    <?php else: ?>
                        <p><strong>Price:</strong> $<?= number_format($book->price, 2); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No books found in this category.</p>
    <?php endif; ?>
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