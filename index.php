<?php include('include/entete.inc');?>
    <body class="homepage">

    <section id="bienvenue">
        <div class="container">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="medias/hd1.jpg" height="1920" width="1080" alt="photo 1">
                    </div>

                    <div class="item">
                        <img src="medias/3.jpg" height="1920" width="1080" alt="photo 2">
                    </div>

                    <div class="item">
                        <img src="medias/cq5dam.web.1280.1280.jpeg" height="1920" width="1080" alt="photo 3">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

<?php include('include/pied-page.inc');?>