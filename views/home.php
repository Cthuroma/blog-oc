<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'img/home-bg.jpg', ENT_COMPAT, 'utf-8'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Owen Jolivet</h1>
                    <span class="subheading">Developer::orderBy('skill', 'DESC')->first();</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy.</p>
            </div>
            <div class="col-lg-4">
                <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
            </div>
            <div class="col-lg-4">
                <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
            </div>
            <div class="col-lg-12 text-center">
                <a href="<?= htmlspecialchars(STORAGE.'app/jolivet_resume.pdf', ENT_COMPAT, 'utf-8'); ?>" class="btn btn-outline-primary" download="jolivet_resume.pdf">
                    <i class="fa fa-download"></i> Download Resume
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" method="post" action="#">
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="name">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
