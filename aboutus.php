<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
        <img src="logo.png" class="logo" />
        </div>
        <ul class="nav-links">
            
            <div class="menu">
                <li> <a href="index.php">Home</a></li>
                <li> <a href="services.php">Services</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li class="signup"><a href="signup.php">Sign Up</a></li>
            </div>
        </ul>  
    </nav>
    <div>
        <div class="example">
            <img  src="unsplash_cue0DuZ8cUU.png"/>
          </div>
        
        <p class="about" style="text-align:justify;">
            Quick Clean Laundry is a leading laundry service provider based in Kathmandu, Nepal. Our mission is to offer our customers high-quality, clean, and affordable laundry solutions.
            We were inspired to start this business by our own personal experiences of struggling to find reliable laundry services in the city. As a result, we decided to create a solution 
            that would make people's lives easier and less stressful. Our services are priced affordably and we ensure a quick turnaround time. At Quick Clean Laundry, we are dedicated to
            providing top-notch laundry services that meet the needs of our customers.
        </p>
        <p class = "service1">Service Terms & Condition</p>
        <div class="terms">
            <ul>
                <li>
                    Customers are responsible for determining whether an item requires dry cleaning or can be washed in the laundry.
                </li>
                <li>
                    Quick Clean Laundry cannot be held responsible for damage or discoloration that may occur during the laundering process or for the removal of strong stains.
                </li>
                <li>
                    Branded or valuable items should be washed with caution, and customers should decide whether to have them washed with Quick Clean Laundry or taken to a dry cleaner.
                </li>
                <li>
                    Quick Clean Laundry guarantees the use of clean and safe water, the best available detergent, and hygienic laundry services.
                </li>
                <li>
                    In the event of any loss of items, Quick Clean Laundry will cover 50% of the current market price of general items (excluding branded items), which may take up to 3-4 weeks to settle.
                </li>
                <li>
                    Quick Clean Laundry covers mechanical damage caused by their machinery, but normal wear and tear is not covered.
                </li>
                <li>
                    Customers can contact Quick Clean Laundry at info@quickcleanlaundry.com or by phone for complaints or further information.
                </li>
            </ul>
        </div>
        <div class="footer">
                <div class="map">
                        <!-- Replace the "YOUR_GOOGLE_MAPS_API_KEY" text with your own Google Maps API key -->
                         <iframe src="https://www.google.com/maps?q=27.694424926326036,85.32943775385198&z=15&output=embed" 
                             width="300px" height="350" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                </div>
                <h3>Some has to take care of your clothes. And we do it for you.</h3>
        </div> 
      
        
    </div>

    <style>
        .footer
        {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 50vh;

        }
        .footer iframe
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%; /* Adjust the width as desired */
            height: 70%
        }
        .footer h3
            {
                font-size: 24px; /* Adjust the font size as desired */
                color: rgb(66, 0, 0);
                position: absolute;
                top: 100%; /* Adjust the spacing between the form and text */
                left: 50%;
                transform: translateX(-50%);
                z-index: 2;
                text-align: center;
                width: 100%;
                font-family: 'jokerman','arial','calibri';
                font-size: 2rem;
                margin: 1%;
                padding: 1%;
            }
        
    </style>
</body>
</html>