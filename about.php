<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About UniFY</title>
    <link rel="stylesheet" href="assets/css/navbar.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/about.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/button.css?v=<?= time() ?>">
    <script src="assets/js/navbar.js?v=<?= time() ?>" defer></script>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png?v=<?= time() ?>">
</head>

<body>
    <?php require_once "includes/navbar.php" ?>    
    <main>
        <section class="about">
            <div class="tag-line">
                <img src="assets/img/logo/rocket-front-color.png?v=<?= time() ?>" draggable="false">
                <h1><span style="color: #F9AB00">Platform </span><span style="color: #34A853">that </span><span style="color: #EA4335">connects.</span></h1>
            </div>
            <div class="grid">
                <div class="about-unify">
                    <p>Welcome to the UniFY. We have designed the perfect learning community for all the students. Our community is a platform where trained coaches, mentors, moderators and learners share ideas, spark deep conversations, transfer knowledge and help the enthusiasts pursue their passion. The community is the ideal go-to resource for all the students as it aims to provide guidance, advice and valuable feedback to the students. UniFY is also the most reliable platform to network with peers and share innovations and ideas.
                    </p>
                </div>
                <div class="grids">
                    <div class="card">
                        <h3>Vision</h3>
                        <p>To be the world's most student-centric community platform.</p>
                    </div>
                    <div class="card">
                        <h3>Mission</h3>
                        <p>To provide the students with a secure platform to share their ideas by communicating with each other.</p>
                    </div>
                </div>
            </div>
            <div class="developer-info">
                <h3>Founder & CEO</h3>
                <img src="assets/img/logo/developer.jpg?v=<?= time() ?>" alt="founder-ceo" class="developer-img" draggable="false">
                <h5>Sushant Pandey</h5>
                <h6>Full stack web developer and Data science expert</h6>
            </div>
        </section>
    </main>
</body>

</html>