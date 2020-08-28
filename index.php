<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CND sCSS only -->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous">
        <!-- assets -->
        <link rel="stylesheet"
              href="./assets/css/counter.css">
        <title>Hackers-Poulette Support</title>
    </head>
    <body>
        <!-- Header menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
            <img src="./assets/img/hackers-poulette-logo.png" width="90" height="90" class="d-inline-block align-center" alt="" loading="lazy">
            Hackers Poulette</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Webshop</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="support.php">Support<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <!-- Form area -->
        <nav>
            <div class="container" id="support">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                        <p class="text-center w-responsive mx-auto mb-5">Any problems, let us know.</p>
                        <form action="./assets/php/form.php" method="post" accept-charset='UTF-8' id="myform">
                            <!-- Input name -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">First & last name</span>
                                </div>
                                <input type="text" class="form-control" name="firstname" placeholder="Firstname" required value="<?php echo htmlspecialchars($_POST['firstname']); ?>" pattern="[A-Za-z -]+" title="Your firstname">
                                <input type="text" class="form-control" name="lastname" placeholder="Lastname" required value="<?php echo htmlspecialchars($_POST['lastname']); ?>" pattern="[A-Za-z -]+" title="Your lastname">
                            </div>
                            <!-- Select the gender -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Gender</span>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="Male" name="gender" value="male" required>
                                    <label class="custom-control-label" for="Male">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="Female" name="gender" value="female" required>
                                  <label class="custom-control-label" for="Female">Female</label>
                                </div>
                            </div>
                            <!-- Input email -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com" value= "" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Your email like emai@example.com"> 
                            </div>
                            <!-- Select the Country -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Country</span>
                                </div>
                                <select class="custom-select my-1 mr-sm-2" name="country" required>
                                    <option value=""> Select a country</option>
                                    <?php foreach ($countries as $country) {
                                        echo "<option value='" . array_search($country, $countries, true) . "'> $country </option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <!-- Select the subject -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Subjects</span>
                                </div>
                                <select class="custom-select my-1 mr-sm-2" name="subject">
                                    <option value="technical">01. Technical</option>
                                    <option value="functional">02. Functional</option>
                                    <option value="other" selected="selected">03. Other</option>
                                </select>
                            </div>
                            <!-- Insert message -->
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Problem description</span>
                                </div>
                                <textarea type="text" id="message" name="message" maxlength="500" rows="5" class="form-control md-textarea" placeholder="Describe the problem here" required></textarea>
                                <span class="pull-right label label-default" id="count_message"></span>
                            </div>
                            <!-- Submit button -->
                            <button class="btn btn-primary btn-sm btn-rounded" type="submit" value="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <footer>

        </footer>
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous"></script>
        <!-- Add extra libs: textarea coutner, form validation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.10.0/bootstrap-maxlength.min.js"></script>
        <script src="./libs/javascript_form/gen_validatorv4.js"></script>
        <!-- personnal javascript using libs -->
        <script src="./assets/js/counter.js"></script>
        <!-- add countries list-->
        <script src=".assets/php/countries.php"></script>
    </body>
</html>