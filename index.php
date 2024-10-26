

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
  .book {
    border: 1px solid #ddd;
    padding: 10px;
    width: 200px;
  }
  .book img {
    width: 100%;
    height: auto;
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


<div class="cover-container w-100 vh-100 " >
<div class="bg-dark bg-opacity-50 w-100 vh-100 d-flex align-items-center justify-content-center border-bottom text-white" >
  <main class="px-3">
    <h1 class ="display-5 fw-semibold lh-1 mb-3 text-white" ><?php echo  $storeName;?></h1>
    <p class="lead">All books in one place for all bastards everywhere.</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">About Us</a>
    </p>
  </main>
</div>
</div>

 <section class=" mx-5 ">


  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://www.indiewire.com/wp-content/uploads/2024/01/Willem-Dafoe-Best-Performances.png?w=600&h=337&crop=1" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?php echo $greeting . ", you bastard... welcome to " . $storeName;?>!</h1>
        <p class="lead">Here are some of our book categories:</p>
    <ul>
        <?php
        // Loop through categories array and display each one
        foreach ($categories as $category) {
            echo "<li>" . $category . "</li>";
        }
        ?>
    </ul>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Browse All</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Your Account</button>
        </div>
      </div>
    </div>
  </div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h2 class="display-5 fw-bold text-body-emphasis"><?php echo $featuredCategory ?></h2>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Browse</button>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="https://images.pb.pl/filtered/d0636ef9-505f-447e-bcd7-76666ccf6ccf/bd9fa029-2d37-5bff-b718-0bd501a3c319_og_1200_630.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
  </div>
   

  <div class="container px-4 py-5 border-bottom" id="featured-3">
    <h2 class="pb-2 border-bottom">Also Check Out These Books</h2>

 

    <form action="category.php" method="get" class="form-inline d-flex w-50 align-items-end">
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







<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

<?php $count = 0; ?>
<?php foreach ($books as $book): ?>
  <?php if ($count >= 9): ?>
    <?php break; ?>
<?php endif; ?>
  
  <div class='feature col'>
  <h3><a href="book.php?title=<?= urlencode($book->title); ?>"><?= htmlspecialchars($book->title); ?></a></h3>
      <p style="width:350px"><strong>Description:</strong> <?= $book->description ?><a class='link-info' href='/'> Read More </a></p>
      <p><strong>Category:</strong> 
      <a href="category.php?category=<?= urlencode($book->category); ?>">
          <?= $book->category ?> 
      </a>
      </p>
      <img class='border rounded-3 shadow-lg' width='350' height='250' loading='lazy' src='<?= $book->cover ?>' alt='<?= $book->title ?> Cover' />

      <?php if (isset($book->discount_price) && !empty($book->discount_price)): ?>
          <p><del><strong>Price:</strong> $<?= number_format($book->price, 2) ?></del></p>
          <p class='text-success'><strong>Discount Price:</strong> $<?= number_format($book->discount_price, 2) ?></p>
      <?php else: ?>
          <p><strong>Price:</strong> $<?= number_format($book->price, 2) ?></p>
      <?php endif; ?>
  </div>
  
  <?php $count++; ?>
<?php endforeach; ?>

</div>

</div>












<div class="container col-xl-10 col-xxl-8 d-flex align-items-center justify-content-center" id="signup" style="min-height: 75vh; padding: 0 15px;">
  <div class="row align-items-center w-100">
    <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">
      <h1 class="display-5 fw-bold lh-1 text-body-emphasis mb-3">Join us, bastard.</h1>
      <p class="col-lg-10 fs-4">We promise that if you join, you shall be the most handsome and knowledgeable bastard in no time. So do not hesitate and give us your personal data (we'll jump you on the street).</p>
    </div>
    <div class="col-md-8 col-lg-5 mx-auto">
      <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <hr class="my-4">
        <small class="text-body-secondary">Bastard, by clicking Sign up, you agree to the terms of use (and that we can jump you on the street).</small>
      </form>
    </div>
  </div>
</div>











  </section>
   <section class="border-top ">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mx-5">
    <p class="col-md-4 mb-0 text-body-secondary"><a href="secret.php">©</a><?php echo date('Y') ?> Octavian.Inc</p>

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