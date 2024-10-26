<?php
// Load the book data from the JSON file
$jsonData = file_get_contents('books.json');
$books = json_decode($jsonData, false); // Decoding as an object

// Get the category from the query string
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Filter books by category
$filteredBooks = array_filter($books, function ($book) use ($selectedCategory) {
    return $book->category === $selectedCategory;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books in <?= htmlspecialchars($selectedCategory); ?> Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

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

<section class="mx-5">
<h1>Books in <?= htmlspecialchars($selectedCategory); ?> Category</h1>
  <div class="container px-4 py-5 border-bottom">
        <div class="book-list feature col">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <?php if (count($filteredBooks) > 0): ?>
                <?php foreach ($filteredBooks as $book): ?>
                    <div class='book'>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>