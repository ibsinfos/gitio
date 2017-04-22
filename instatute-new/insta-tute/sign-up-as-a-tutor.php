<?php include('header.php'); ?>

<div id="sign-up-as-a-tutor-page">
    <div class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="images/slide1.jpg" />
                </li>
                <li>
                    <img src="images/slide2.jpg" />
                </li>
<!--                <li>
                    <img src="slide3.jpg" />
                </li>
                <li>
                    <img src="slide4.jpg" />
                </li>-->
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <h3>FIND THE PERFECT TUTOR</h3>
                <p class="grey-text">SIMPLY SUBMIT THE FORM, CONFIRM WHAT YOU'RE LOOKING FOR AND START LEARNING ASAP!</p>
                <hr>
                <form action="#">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone" class="control-label">Phone</label>
                                <input type="number" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="address" class="control-label">Address</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?> 