<!DOCTYPE html>
<html>

<head>
    <title>BioNews</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/header_icon.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="icon" href="images/iconTitle.svg" type="image/svg">
    <style>
        .wow:first-child {
            visibility: hidden;
        }

        * {
            box-sizing: border-box;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav input[type=text] {
            float: right;
            padding: 6px;
            margin-top: 8px;
            margin-right: 16px;
            border: none;
            font-size: 17px;
        }

        @media screen and (max-width: 600px) {

            .topnav a,
            .topnav input[type=text] {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
        #accordion>.cap  { 
        background: lightseagreen; padding: 8px 10px;
        font-weight: bold; text-transform: uppercase; 
        cursor: pointer; color: white;font-size: 18px;
}
#accordion > .ct > label {
        margin: 8px 0 8px 30px;
        font-size: 18px; 
        display: block; 
        cursor: pointer; 
}
#accordion > .ct input { width: 16px; height: 16px; margin-right: 10px;}
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_crawler";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
$keyword = "ESR1 breast cancer";
$sql = "SELECT * FROM baidang WHERE pmid = 36232774";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $timestamp = $row['created'];
    $datetime = date('Y-m-d H:i:s', $timestamp);
    
?>
    <!-- Start Header  -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="home.php">Bio<span>!</span>News</a>
            </div>
            <div class="topnav">
                <input type="text" placeholder="<?php echo $keyword ?>" />
            </div>

        </div>
    </header>
    <!-- End Header  -->

   

    <!-- Start Hype News -->
    <section class="classes" id="classes">
        <div class="container">
            <div class="content">
                
                <div class="box img wow slideInLeft">
                <div id="accordion">
                <div class="cap">BIOCONCEPTS</div>
<div class="ct" > 
    <label><input type="checkbox" class="thuonghieu" value="Gene">Gene</label>
    <label><input type="checkbox" class="thuonghieu" value="Disease">Disease</label>
    <label><input type="checkbox" class="thuonghieu" value="Chemical">Chemical</label>
    <label><input type="checkbox" class="thuonghieu" value="Species">Species</label>
    <label><input type="checkbox" class="thuonghieu" value="Mutation">Apple</label>
    <label><input type="checkbox" class="thuonghieu" value="Apple">Cellline</label>
</div>

</div>  
                    <img src="images/new1.jpg" alt="classes" />
                </div>
                <div class="box text wow slideInRight">
                    <h2><?php echo $row['title'] ?></h2>
                    <p style="font-size: 12px;"><a href="https://www.ncbi.nlm.nih.gov/pubmed/36232774">PMID36232774 </a> * <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC9570294/"> PMC9570294 </a><?php echo $datetime ?></p>
                    <p><?php echo $row['text'] ?></p>
                    <?php  } ?>

                    <?php   $offset=1;
                    $sql1 = "SELECT * FROM indexing WHERE pmid = 36232774 AND offset = (SELECT MIN(offset) FROM indexing WHERE pmid = 36232774)";
$query1 =  mysqli_query($conn, $sql1);

while ($indexing_row = mysqli_fetch_assoc($query1)) {
  
     ?>
                    <div class="class-items">
                      <div class="content-1">
                            <h3> <?php echo $offset; ?>. <?php echo $indexing_row['name']; ?>  </h3>
                            <?php }
                    $sql_content = "SELECT * FROM chitiet_baidang WHERE pmid = 36232774 AND offset = (SELECT MIN(offset) FROM chitiet_baidang WHERE pmid = 36232774)";
$query_content =  mysqli_query($conn, $sql_content);

while ($con_row = mysqli_fetch_assoc($query_content)) {
    ?>
                            <p> <?php echo $con_row['text'] ?> </p>
                            <?php } ?>
                      </div>

                    </div>

                   
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Classes -->

    <!-- Start Clean your shoes -->
    <section class="start-today">
        <div class="container">
            <div class="content">
                <div class="box text wow slideInLeft">
                    <h2>Please apply here</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries,</p>
                </div>
                <div class="box img wow slideInRight">
                    <img src="images/apply.jpg" alt="start today" />
                </div>

            </div>
        </div>
    </section>
    <!-- End Start Today -->




    <!-- Start Contact -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="content">
                <div class="box form wow slideInLeft">
                    <form>
                        <input type="text" placeholder="Enter Name">
                        <input type="text" placeholder="Enter Email">
                        <input type="text" placeholder="Enter Mobile">
                        <textarea placeholder="Enter Message"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
                <div class="box text wow slideInRight">
                    <h2>Get Connected with us</h2>
                    <p class="title-p">This tool shows the results of research conducted in the Computational Biology Branch, NLM/NCBI.<br><br>
                        The information produced on this website is not intended for direct diagnostic use or medical decision-making without review and oversight by a clinical professional. Individuals should not change their health behavior solely on the basis of information produced on this website. NIH does not independently verify the validity or utility of the information produced by this tool. If you have questions about the information produced on this website, please see a health care professional.<br><br>
                        More information about NLM/NCBI's disclaimer policy is available.</p>
                    <div class="info">
                        <ul>
                            <li style="color:honeydew"><a href="mailto:luzh@ncbi.nlm.nih.gov?cc=chih-hsuan.wei@nih.gov;alexis.allot@nih.gov;robert.leaman@nih.gov&subject=PubTatorCentral%20feedback"><span></span>Zhiyong Lu, PhD</li></a>
                            <li><a href="mailto:luzh@ncbi.nlm.nih.gov?cc=chih-hsuan.wei@nih.gov;alexis.allot@nih.gov;robert.leaman@nih.gov&subject=PubTatorCentral%20feedback"><span></span>Chih-Hsuan Wei, PhD</li></a>
                            <li><a href="mailto:luzh@ncbi.nlm.nih.gov?cc=chih-hsuan.wei@nih.gov;alexis.allot@nih.gov;robert.leaman@nih.gov&subject=PubTatorCentral%20feedback"><span></span>Alexis Allot, PhD</li></a>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->



    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".ham-burger, .nav ul li a").click(function() {

                $(".nav").toggleClass("open")

                $(".ham-burger").toggleClass("active");
            })
            $(".accordian-container").click(function() {
                $(".accordian-container").children(".body").slideUp();
                $(".accordian-container").removeClass("active")
                $(".accordian-container").children(".head").children("span").removeClass("fa-angle-down").addClass("fa-angle-up")
                $(this).children(".body").slideDown();
                $(this).addClass("active")
                $(this).children(".head").children("span").removeClass("fa-angle-up").addClass("fa-angle-down")
            })

            $(".nav ul li a, .go-down").click(function(event) {
                if (this.hash !== "") {

                    event.preventDefault();

                    var hash = this.hash;

                    $('html,body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {
                        window.location.hash = hash;
                    });

                    // add active class in navigation
                    $(".nav ul li a").removeClass("active")
                    $(this).addClass("active")
                }
            })
        })
    </script>
    <script src="js/wow.min.js"></script>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 0,
        });
        wow.init();
    </script>
</body>

</html>