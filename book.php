<?php
// Load the JSON file
$booksJson = file_get_contents('books.json'); // Change this to the correct path
$books = json_decode($booksJson);

// Get the title from the query parameter
$title = $_GET['title'] ?? '';

// Find the book by title
$book = null;
foreach ($books as $b) {
    if ($b->title === $title) {
        $book = $b;
        break;
    }
}

// If book not found, redirect or show an error
if (!$book) {
    echo "<h1>Book not found</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book->title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

<section>


<div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="<?= htmlspecialchars($book->cover) ?>" class="d-block mx-lg-auto img-fluid" alt="<?= htmlspecialchars($book->title) ?> Cover" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= htmlspecialchars($book->title) ?></h1>
                <p class="lead"><?= htmlspecialchars($book->description) ?></p>
                <?php if (isset($book->discount_price) && !empty($book->discount_price)): ?>
                    <p><del><strong>Price:</strong> $<?= number_format($book->price, 2) ?></del></p>
                    <p class='text-success'><strong>Discount Price:</strong> $<?= number_format($book->discount_price, 2) ?></p>
                <?php else: ?>
                    <p><strong>Price:</strong> $<?= number_format($book->price, 2) ?></p>
                <?php endif; ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button class="btn btn-outline-secondary btn-lg px-4"> Add to Cart</button>
                </div>
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
